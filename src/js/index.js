import SmoothScroll from 'smooth-scroll'

import hello from './lib/hello'
import emailObfuscator from './lib/emailObfuscator'
import Header from './component/GHeader'
import Accordion from './component/Accordion'
import Tabs from './component/Tabs'
import './component/Dialog'

hello()

// console.log(window.btoa(unescape(encodeURIComponent('minamoto@wordpress.localhost'))))
emailObfuscator({
	b64: 'bWluYW1vdG9Ad29yZHByZXNzLmxvY2FsaG9zdA==',
	selector: '.mailto'
})

// https://github.com/cferdinandi/smooth-scroll
new SmoothScroll('a[href*="#"]', {
	// speed: 1000,
	// speedAsDuration: true,
	updateURL: false,
})
new Header()
document.querySelectorAll('.accordion').forEach(a => new Accordion(a))
document.querySelectorAll('.tabs').forEach(t => new Tabs(t))
