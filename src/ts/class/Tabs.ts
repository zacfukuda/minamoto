const TRUE = 'true'
const FALSE = 'false'
const HIDDEN = 'hidden'
const ROLE_TABLIST = '[role=tablist]'
const ROLE_TAB = '[role=tab]'
const ROLE_TABPANEL = '[role=tabpanel]'
const ARIA_CONTROLS = 'aria-controls'
const ARIA_SELECTED = 'aria-selected'

/**
 * Class representing a tab widget
 * @see {@link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Roles/Tab_Role}
 * @see {@link https://www.w3schools.com/howto/howto_js_tabs.asp}
 */
export default class Tabs {
	element: HTMLElement
	list: Element | null
	tabs: NodeListOf<HTMLElement>
	panels: NodeListOf<HTMLElement>

	/**
	 * @param {HTMLElement} element
	 */
	constructor(element: HTMLElement) {
		this.element = element
		this.list = element.querySelector(ROLE_TABLIST)
		this.tabs = element.querySelectorAll<HTMLElement>(ROLE_TAB)
		this.panels = element.querySelectorAll<HTMLElement>(ROLE_TABPANEL)

		this.tabs.forEach((i) => (i.onclick = this.update.bind(this)))
	}

	/** */
	private getSelectedTabs(): NodeListOf<HTMLElement> {
		return this.list!.querySelectorAll<HTMLElement>(`[aria-selected=true]`)
	}

	/**
	 * @param {MouseEvent} e
	 */
	private update(e: MouseEvent): void {
		this.hide()
		this.show(e)
	}

	/** */
	private hide(): void {
		this.getSelectedTabs().forEach((i) => i.setAttribute(ARIA_SELECTED, FALSE))
		this.panels.forEach((i) => i.setAttribute(HIDDEN, TRUE))
	}

	/**
	 * @param {MouseEvent} e
	 */
	private show(e: MouseEvent): void {
		const target = e.currentTarget as HTMLElement

		target!.setAttribute(ARIA_SELECTED, TRUE)
		this.element
			.querySelector(`#${target!.getAttribute(ARIA_CONTROLS)}`)
			?.removeAttribute(HIDDEN)
	}
}
