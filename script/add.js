#!/usr/bin/env node

'use strict'
const args = process.argv.slice(2)
const cssArgs = ['--css', '--style', '-s', '-S'],
			jsArgs = ['--js', '-j', '-J']
const paths = require('../config/paths'),
			inquiries = require('./inquiries.js')
const path = require('path'),
			fs = require('fs'),
			os = require('os'),
			inquirer = require('inquirer')

function isCSS() { return cssArgs.some(a => args.includes(a)) }

function isJS() { return jsArgs.some(a => args.includes(a)) }

function addCSS(inputs) {
	let { type, name } = inputs
	let src = paths.src.css
	// Components belong to the global CSS; pages have their own entry.
	let group = type === 'component' ? 'globals/components' : 'pages'
	let dir = path.resolve(src, group, name)
	let eol = os.EOL
	let files = ['index', 'md', 'lg']
	let created = files.map(f => `src/css/${group}/${name}/${f}.css`)

	if (fs.existsSync(dir)) {
		console.error(`The ${type} "${name}" already exists.`)
		return
	}

	fs.mkdirSync(dir, { recursive: true })
	files.forEach(f => fs.writeFileSync(path.resolve(dir, `${f}.css`), ''))

	if (type === 'page') {
		// A page has its own entry that is loaded only on that page.
		fs.writeFileSync(path.resolve(src, group, `${name}.css`), [
			`@import "./${name}/index.css";`,
			`@import "./${name}/md.css" (min-width: 768px);`,
			`@import "./${name}/lg.css" (min-width: 1024px);`,
			''
		].join(eol))
		created.unshift(`src/css/${group}/${name}.css`)
	} else {
		let globals = path.resolve(src, 'globals')
		fs.appendFileSync(path.resolve(globals, 'globals.css'), `@import "./components/${name}/index.css";${eol}`)
		fs.appendFileSync(path.resolve(globals, 'globals@md.css'), `@import "./components/${name}/md.css" (min-width: 768px);${eol}`)
		fs.appendFileSync(path.resolve(globals, 'globals@lg.css'), `@import "./components/${name}/lg.css" (min-width: 1024px);${eol}`)
	}

	let msg = `The following files have been created:\n\t${created.join('\n\t')}\nDone.`

	if (type === 'page') {
		msg += `\nLoad it from the page template with {% set page_styles = ['pages/${name}'] %}.`
	}

	console.log(msg)
}

if (isCSS()) inquirer.prompt(inquiries.addCSS).then(inputs => addCSS(inputs))
else if (isJS()) console.log('Sorry, JS is not supported yet.')
else console.log('Please provide a type of source you want to add:\n\t--style\n\t--js')
