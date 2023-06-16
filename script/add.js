#!/usr/bin/env node

'use strict'
const args = process.argv.slice(2)
const stylusArgs = ['--stylus', '-s', '-S'],
			jsArgs = ['--js', '-j', '-J']
const paths = require('../config/paths'),
			inquiries = require('./inquiries.js')
const path = require('path'),
			fs = require('fs'),
			os = require('os'),
			inquirer = require('inquirer')

function isStylus() { return stylusArgs.some(a => args.includes(a)) }

function isJS() { return jsArgs.some(a => args.includes(a)) }

function addStylus(inputs) {
	let { type, name } = inputs
	let src = paths.src.stylus
	let dir = path.resolve(src, type, name)
	let eol = os.EOL
	let files = ['index', 'md', 'lg']

	if (fs.existsSync(dir)) {
		console.error(`The file "${type}\/${name}" already exists.`)
		return
	}

	fs.mkdirSync(dir)
	files.forEach(f => fs.writeFileSync(path.resolve(dir, `${f}.styl`), ''))
	fs.appendFileSync(path.resolve(src, 'style.styl'), `@import "${type}/${name}"${eol}`)
	fs.appendFileSync(path.resolve(src, 'medium.styl'), `@import "${type}/${name}/md"${eol}`)
	fs.appendFileSync(path.resolve(src, 'large.styl'), `@import "${type}/${name}/lg"${eol}`)

	let msg = (`The following files have been created:
		src/${type}/${name}/index.stylus
		src/${type}/${name}/md.stylus
		src/${type}/${name}/lg.stylus
		Done.`)
	
	console.log(msg.replace(/\t+/g, ''))
}

if (isStylus()) inquirer.prompt(inquiries.addStylus).then(inputs => addStylus(inputs))
else if (isJS()) console.log('Sorry, JS is not supported yet.')
else console.log('Please provide a type of source you want to add:\n\t--style\n\t--js')
