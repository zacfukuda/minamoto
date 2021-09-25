/**
 * https://developer.mozilla.org/en-US/docs/Glossary/Base64
 */
function emailObfuscator({b64, selector}) {

	if (!b64) return

	var link = decodeURIComponent(escape(atob(b64))),
			anchors = document.querySelectorAll(selector || '.email')
	
	anchors.forEach(a => {
		let el = a.querySelector('.email-str')
		a.setAttribute('href', `mailto:${link}`)
		if (!a.innerHTML) a.innerHTML = link
		if (el) el.innerHTML = link
	})
}

export default emailObfuscator
