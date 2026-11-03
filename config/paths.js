/* eslint-env node */
const path = require('path')
const themeRoot = process.cwd()

const srcRoot = path.resolve(themeRoot, 'src')

const src = {
	css: path.resolve(srcRoot, 'css'),
	js: path.resolve(srcRoot, 'ts'),
}

module.exports = { src }
