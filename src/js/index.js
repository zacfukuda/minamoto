import SmoothScroll from 'smooth-scroll'
import helloESNext from './helloESNext'
// import emailObfuscator from './emailObfuscator'

helloESNext()

// https://github.com/cferdinandi/smooth-scroll
new SmoothScroll('a[href*="#"]', {
	// speed: 1000,
	// speedAsDuration: true,
	updateURL: false,
})
