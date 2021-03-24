/**
 * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Roles/Tab_Role
 * @link https://www.w3schools.com/howto/howto_js_tabs.asp
 */
export default class Tabs {
	constructor(element) {
		element = element || document.querySelector('.tabs')
		if (!element) return

		this.focus = 0
		this.e = element
		this.l = this.e.querySelector('[role=tablist]')
		this.t = this.l.querySelectorAll('[role=tab]')
		this.p = this.e.querySelectorAll('[role=tabpanel]')

		this.t.forEach(t => t.onclick = this.changeTabs.bind(this))
	}

	changeTabs(e) {
		const target = e.currentTarget

		this.l
			.querySelectorAll('[aria-selected=true]')
			.forEach(t => t.setAttribute('aria-selected', false))
		this.p.forEach(p => p.setAttribute('hidden', true))

		target.setAttribute('aria-selected', true)
		this.e.querySelector(`#${target.getAttribute('aria-controls')}`).removeAttribute('hidden')
	}
}
