/**
 * Decode base64 string and insert mailto: to the 'href' attribute of <a> tags.
 *
 * @param {string} base64
 * @param {string} [selector]
 * @see {@link https://developer.mozilla.org/en-US/docs/Glossary/Base64}
 */
export default function insertBase64Mailto(
	base64: string,
	selector?: string
): void {
	const address = decodeURIComponent(atob(base64))
	const anchors = document.querySelectorAll(selector || '.mailto')

	anchors.forEach((a) => {
		const appendTo = a.querySelector('.email-str')
		a.setAttribute('href', `mailto:${address}`)

		if (appendTo) appendTo.innerHTML = address
		else if (!a.innerHTML) a.innerHTML = address
	})
}
