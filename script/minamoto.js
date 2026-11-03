#!/usr/bin/env node

'use strict'

const path = require('path')
const fs = require('fs')
const os = require("os")
const inquirer = require('inquirer')

const paths = require('../config/paths')

const src = {
	style: paths.src.css,
	javascript: paths.src.js,
}

const args = process.argv.slice(2)
const command = args[0]

const questions = {
	style: [
		{
			type: 'list',
			name: 'type',
			message: 'Type of style:',
			choices: ['Component', 'Page'],
			filter: (val) => {
				return new Promise((resolve, reject) => {
					resolve(val.toLowerCase())
				})
			},
		},
		{
			type: 'input',
			name: 'name',
			message: 'Name of new style: '
		}
	],
}

function isStylesheet() {
	return (
		args.includes('--style')
		|| args.includes('-s')
		|| args.includes('-S'))
}

function isJS() {
	return (
		args.includes('--js')
		|| args.includes('-j')
		|| args.includes('-J'))
}

function add() {
	if ( isStylesheet() ) {
		inquirer.prompt(questions.style).then(answers => addStylesheet(answers))
	}
}

function addStylesheet(args) {
	let {type, name} = args
	let group = type === 'component' ? 'globals/components' : 'pages'
	let dir = path.resolve(src.style, group, name)

	if (fs.existsSync(dir)) {
		console.error(`The ${type} "${name}" already exists.`)
		return
	}

	fs.mkdirSync(dir, {recursive: true})

	let files = ['index', 'md', 'lg']
	files.forEach(val => {
		fs.writeFileSync(path.resolve(dir, `${val}.css`), '')
	})

	InsertToRoot({type, group, name})
}

function InsertToRoot(args) {
	let {type, group, name} = args

	if (type === 'page') {
		// A page has its own entry that is loaded only on that page.
		fs.writeFileSync(path.resolve(src.style, group, `${name}.css`), [
			`@import "./${name}/index.css";`,
			`@import "./${name}/md.css" (min-width: 768px);`,
			`@import "./${name}/lg.css" (min-width: 1024px);`,
			''
		].join(os.EOL))
		return
	}

	let globals = path.resolve(src.style, 'globals')

	fs.appendFileSync(path.resolve(globals, 'globals.css'), `@import "./components/${name}/index.css";${os.EOL}`)
	fs.appendFileSync(path.resolve(globals, 'globals@md.css'), `@import "./components/${name}/md.css" (min-width: 768px);${os.EOL}`)
	fs.appendFileSync(path.resolve(globals, 'globals@lg.css'), `@import "./components/${name}/lg.css" (min-width: 1024px);${os.EOL}`)
}

function remove () {}

(function() {
	switch(command) {
		case 'add':
			add()
			break
		case 'remove':
			remove()
			break
		default:
			console.error(`Invalid command "${command}".`)
			break
	}
})()
