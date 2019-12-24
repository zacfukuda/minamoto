/**
 * Insert href="mailto:" preventing from spam bots
 * @param object param
 * @link http://www.jottings.com/obfuscator/
 */
function emailObfuscator({coded, key, selector}) {

	// Parameter check
	if (!coded || !key) {
		console.error('Both "coded" and "key" valuses must be given to invoke emailObfuscator.')
		return
	}

	let link = ltr = ''
	let shift = coded.length
	let anchors = null

	selector = selector || 'email'
	anchors = document.querySelectorAll('a.' + targetClass)

	// Do nothing if no anchor to insert
	if (anchors.length < 1) return

	// Decrypt email from "coded"
	for (var i = 0; i < coded.length; i++) {
		if (key.indexOf(coded.charAt(i)) == -1) {
			ltr = coded.charAt(i)
			link += (ltr)
		} else {
			ltr = (key.indexOf(coded.charAt(i)) - shift + key.length) % key.length
			link += (key.charAt(ltr))
		}
	}

	// Insert href
	anchors.forEach(a => {
		a.setAttribute('href', 'mailto:' + link)
		
		// Stop inserting email text
		if (a.getAttribute('data-text') === '0') return
		
		a.innerHTML = link
	})
}

export default emailObfuscator
