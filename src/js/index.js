// import $ from 'jquery'
// import Pace from 'pace'
import SmoothScroll from 'smooth-scroll'
import helloESNext from './helloESNext'
// import emailObfuscator from './emailObfuscator'

// Example
helloESNext()

// Email obfuscator
// Go to generated a coded email at http://www.jottings.com/obfuscator/
// emailObfuscator({
// 	coded: 'foo',
// 	key: 'bar',
// 	selector: 'classname',
// })

/**
 * SmoothScroll
 * @link https://github.com/cferdinandi/smooth-scroll
 */
new SmoothScroll('a[href*="#"]', {
	// speed: 1000,
	// speedAsDuration: true,
	updateURL: false,
})

/**
 * Pace - Loading-Page UI
 * @link https://github.hubspot.com/pace/docs/welcome/
 */
// Pace.on('done', () => {
// 	const loadingPage = document.getElementById('loadingPage')
// 	loadingPage.style.opacity = 0
	
// 	// Invoke a callback at the moment 'loadingPage' opacity became 0
// 	setTimeout(() => {
// 		// Do something before showing page content
// 		// ...

// 		// Hide 'loadingPage'
// 		loadingPage.style.display = 'none'
// 		// Make <html> scrollable
// 		document.documentElement.classList.remove('overflow-hidden')
// 	}, 750)
// }, false)
