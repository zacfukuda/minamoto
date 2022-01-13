import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

export default class GHeader {
	constructor(el) {
		el = el || document.querySelector('#gheader')
		if (!el) return

		this.r = el
		this.n = el.querySelector('nav')
		this.t = el.querySelector('.toggle')

		if (this.t) this.t.onclick = this.toggle.bind(this)
	}

	toggle() {
		if (this.t.getAttribute('aria-expanded') === 'false') this.open()
		else this.close()
	}

	open() {
		this.t.setAttribute('aria-expanded', 'true')
		document.documentElement.style.overflow = 'hidden'
		disableBodyScroll(this.e)
	}

	close() {
		this.t.setAttribute('aria-expanded', 'false')
		document.documentElement.style.overflow = null
		enableBodyScroll(this.e)
	}
}
