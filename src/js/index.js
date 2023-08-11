import SmoothScroll from 'smooth-scroll'
import emailObfuscator from './lib/emailObfuscator'
import GlobalHeader from './component/GlobalHeader'
import Accordion from './component/Accordion'
import Tabs from './component/Tabs'
import './component/Dialog'

// console.log(window.btoa(unescape(encodeURIComponent('minamoto@wordpress.localhost'))))
emailObfuscator({
	b64: 'bWluYW1vdG9Ad29yZHByZXNzLmxvY2FsaG9zdA==',
	selector: '.mailto',
})

// https://github.com/cferdinandi/smooth-scroll
new SmoothScroll('a[href*="#"]', {
	// speed: 1000,
	// speedAsDuration: true,
	updateURL: false,
})
new GlobalHeader()
document.querySelectorAll('.accordion').forEach((a) => new Accordion(a))
document.querySelectorAll('.tabs').forEach((t) => new Tabs(t))
