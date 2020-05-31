/**
 * Insert href="mailto:" preventing from spam bots
 * @link http://www.jottings.com/obfuscator/
 */
function emailObfuscator({coded, key, selector}) {

	if (!coded || !key) {
		console.error('Both "coded" and "key" must be given.')
		return
	}

	let link = ltr = ''
	let shift = coded.length
	let anchors = null

	selector = selector || 'email'
	anchors = document.querySelectorAll('a.' + targetClass)

	if (anchors.length < 1) return

	for (var i = 0; i < coded.length; i++) {
		if (key.indexOf(coded.charAt(i)) == -1) {
			ltr = coded.charAt(i)
			link += (ltr)
		} else {
			ltr = (key.indexOf(coded.charAt(i)) - shift + key.length) % key.length
			link += (key.charAt(ltr))
		}
	}

	anchors.forEach(InsertHref)

	function InsertHref(a) {
		a.setAttribute('href', 'mailto:' + link)
		if (!a.innerHTML) {
			a.innerHTML = link
		}
	}
}

export default emailObfuscator
