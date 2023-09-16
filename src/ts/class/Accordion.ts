const TRUE = 'true'
const FALSE = 'false'
const PX = 'px'
const ARIA_CONTROLS = 'aria-controls'
const ARIA_DISABLED = 'aria-disabled'
const ARIA_EXPANDED = 'aria-expanded'

/**
 * Class representing an accordion
 * @see {@link https://w3c.github.io/aria-practices/#accordion}
 */
export default class Accordion {
	private element: HTMLElement
	private target?: HTMLElement | null

	/**
	 * @param {HTMLElement} element
	 */
	constructor(element: HTMLElement) {
		const controls = element.getAttribute(ARIA_CONTROLS)
		this.element = element
		this.target = controls
			? document.getElementById(controls)
			: <HTMLElement>element.nextElementSibling
		this.element.onclick = this.toggle.bind(this)
	}

	private toggle(): void {
		if (this.element.getAttribute(ARIA_DISABLED) === TRUE) return

		if (this.element.getAttribute(ARIA_EXPANDED) === FALSE) this.open()
		else this.close()
	}

	private open(): void {
		this.element.setAttribute(ARIA_EXPANDED, TRUE)
		this.target!.style.maxHeight = this.target!.scrollHeight + PX
	}

	private close(): void {
		this.element.setAttribute(ARIA_EXPANDED, FALSE)
		this.target!.style.maxHeight = ''
	}
}
