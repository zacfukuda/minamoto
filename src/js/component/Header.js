import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

export default class Header {
	constructor(element) {
		element = element || document.querySelector('#header')
		if (!element) return

		this.e = element
		this.b = {
			t: this.e.querySelector('.toggle')
		}

		if (this.b.t) this.b.t.onclick = this.toggle.bind(this)
	}

	toggle() {
		this.e.classList.toggle('opened')
		if (this.e.classList.contains('opened')) this.open()
		else this.close()
	}

	open() {
		disableBodyScroll(this.e)
		//document.documentElement.style.overflow = 'hidden'
	}

	close() {
		enableBodyScroll(this.e)
		//document.documentElement.style.overflow = null
	}
}
