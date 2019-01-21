// import '../css/style.css'
// import '../stylus/style.styl'
import consoleLog from './consoleLog.js'

// Log message on console
consoleLog()

// Append HTML element
const h1 = document.createElement('h1')
const textNode = document.createTextNode('Hello, webpack!')

h1.appendChild(textNode)
document.body.appendChild(h1)