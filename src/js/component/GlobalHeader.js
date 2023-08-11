import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

export default class GHeader {
	constructor(el) {
		el = el || document.querySelector('#gheader')

		if (!el) return

		this.element = el
		this.nav = el.querySelector('nav')
		this.toggler = el.querySelector('.toggle')

		if (this.toggler) this.toggler.onclick = this.toggle.bind(this)
	}

	toggle() {
		if (this.toggler.getAttribute('aria-expanded') === 'false') this.open()
		else this.close()
	}

	open() {
		this.toggler.setAttribute('aria-expanded', 'true')
		document.documentElement.style.overflow = 'hidden'
		disableBodyScroll(this.e)
	}

	close() {
		this.toggler.setAttribute('aria-expanded', 'false')
		document.documentElement.style.overflow = null
		enableBodyScroll(this.e)
	}
}
