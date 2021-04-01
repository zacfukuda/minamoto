/* https://w3c.github.io/aria-practices/#accordion */
export default class Accordion {
	constructor(element) {
		element = element || document.querySelector('.accordion')
		if (!element) return

		let t = element.getAttribute('aria-controls')
		this.e = element
		this.t = t ? document.getElementById(t) : element.nextElementSibling

		this.e.onclick = this.toggle.bind(this)

		if (this.e.dataset.defaultopen === 'true') this.open()
	}

	toggle() {
		if (this.e.getAttribute('aria-disabled') === 'true') return
		
		if (this.t.style.maxHeight) this.close()
		else this.open()
	}

	open() {
		this.e.setAttribute('aria-expanded', true)
		this.t.style.maxHeight = this.t.scrollHeight + 'px'
	}

	close() {
		this.e.setAttribute('aria-expanded', false)
		this.t.style.maxHeight = null
	}
}
