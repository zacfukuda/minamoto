import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

export default class Header {
	constructor(el) {
		el = el || document.querySelector('#header')
		if (!el) return

		this.e = el
		this.t = el.querySelector('.toggle')

		if (this.t) this.t.onclick = this.toggle.bind(this)
	}

	toggle() {
		this.e.classList.toggle('open')
		if (this.e.classList.contains('open')) this.open()
		else this.close()
	}

	open() {
		disableBodyScroll(this.e)
	}

	close() {
		enableBodyScroll(this.e)
	}
}
