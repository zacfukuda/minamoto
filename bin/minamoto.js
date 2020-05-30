#!/usr/bin/env node

'use strict'

const path = require('path')
const fs = require('fs')
const os = require("os")
const inquirer = require('inquirer')

const paths = require('../config/paths')

const src = {
	style: paths.src.stylus,
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
	let dir = path.resolve(src.style, type, name)

	if (fs.existsSync(dir)) {
		console.error(`The ${type} "${name}" already exists.`)
		return
	}

	fs.mkdirSync(dir)

	let files = ['index', 'md', 'lg']
	files.forEach(val => {
		fs.writeFileSync(path.resolve(dir, `${val}.styl`), '')
	})

	InsertToRoot(args)
}

function InsertToRoot(args) {
	let {type, name} = args

	fs.appendFileSync(path.resolve(src.style, 'style.styl'), `@import "${type}/${name}"${os.EOL}`)
	fs.appendFileSync(path.resolve(src.style, 'medium.styl'), `@import "${type}/${name}/md"${os.EOL}`)
	fs.appendFileSync(path.resolve(src.style, 'large.styl'), `@import "${type}/${name}/lg"${os.EOL}`)
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
