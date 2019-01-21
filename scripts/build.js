'use strict'

process.env.BABEL_ENV = 'production'
process.env.NODE_ENV = 'production'

process.on('unhandledRejection', err => {
  throw err;
})

const paths = require('../config/paths')

const path = require('path')
const fs = require('fs-extra')
const chalk = require('chalk')
const webpack = require('webpack')

// Webpack conifg
const config = require('../config/webpack.config.build.js')

// Empty 'dist' keeping the directory
fs.emptyDirSync(paths.outputRoot)

// Build
const compiler = webpack(config)
compiler.run((err, stats) => {
  let messages;

  if (err) {
    return console.log(err)
  }

  console.log(chalk.green('Compiled successfully.\n'))
})