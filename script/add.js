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
	let dir = path.resolve(src, type, name)
	let eol = os.EOL
	let files = ['index', 'md', 'lg']

	if (fs.existsSync(dir)) {
		console.error(`The file "${type}\/${name}" already exists.`)
		return
	}

	fs.mkdirSync(dir)
	files.forEach(f => fs.writeFileSync(path.resolve(dir, `${f}.css`), ''))
	fs.appendFileSync(path.resolve(src, 'style.css'), `@import "./${type}/${name}/index.css";${eol}`)
	fs.appendFileSync(path.resolve(src, 'medium.css'), `@import "./${type}/${name}/md.css" (min-width: 768px);${eol}`)
	fs.appendFileSync(path.resolve(src, 'large.css'), `@import "./${type}/${name}/lg.css" (min-width: 1024px);${eol}`)

	let msg = (`The following files have been created:
		src/${type}/${name}/index.css
		src/${type}/${name}/md.css
		src/${type}/${name}/lg.css
		Done.`)
	
	console.log(msg.replace(/\t+/g, ''))
}

if (isCSS()) inquirer.prompt(inquiries.addCSS).then(inputs => addCSS(inputs))
else if (isJS()) console.log('Sorry, JS is not supported yet.')
else console.log('Please provide a type of source you want to add:\n\t--style\n\t--js')
