import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

/**
 * Class representing a global header
 */
export default class GlobalHeader {
	private element?: HTMLElement
	private nav?: HTMLElement | null
	private toggler?: HTMLElement | null

	/**
	 * @param {HTMLElement | null} [element]
	 */
	constructor(element?: HTMLElement | null) {
		element = element || document.querySelector<HTMLElement>('#gheader')

		if (!element) return

		this.element = element
		this.nav = element.querySelector<HTMLElement>('nav')
		this.toggler = element.querySelector<HTMLElement>('.toggle')

		if (this.toggler) this.toggler.onclick = this.toggle.bind(this)
	}

	private toggle(): void {
		if (this.toggler?.getAttribute('aria-expanded') === 'false') this.open()
		else this.close()
	}

	private open(): void {
		this.toggler!.setAttribute('aria-expanded', 'true')
		this.nav!.style.maxHeight = this.nav?.clientHeight + 'px'
		document.documentElement.style.overflow = 'hidden'
		disableBodyScroll(this.element!)
	}

	private close(): void {
		this.toggler!.setAttribute('aria-expanded', 'false')
		document.documentElement.style.overflow = ''
		enableBodyScroll(this.element!)
	}
}
