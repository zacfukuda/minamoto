/* eslint-env node */
const path = require('path')
const themeRoot = process.cwd()

const srcRoot = path.resolve(themeRoot, 'src')

const src = {
	stylus: path.resolve(srcRoot, 'stylus'),
	js: path.resolve(srcRoot, 'ts'),
}

module.exports = { src }
