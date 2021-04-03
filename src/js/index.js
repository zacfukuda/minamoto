import SmoothScroll from 'smooth-scroll'

import hello from './lib/hello'
// import emailObfuscator from './lib/emailObfuscator'
import Header from './component/Header'
import Accordion from './component/Accordion'
import Tabs from './component/Tabs'
import './component/Dialog'

hello()

// https://github.com/cferdinandi/smooth-scroll
new SmoothScroll('a[href*="#"]', {
	// speed: 1000,
	// speedAsDuration: true,
	updateURL: false,
})
new Header()
document.querySelectorAll('.accordion').forEach(a => new Accordion(a))
document.querySelectorAll('.tabs').forEach(t => new Tabs(t))
