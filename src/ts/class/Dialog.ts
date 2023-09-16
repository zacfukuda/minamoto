/**
 * @version 0.0.1
 * @see {@link https://www.w3.org/TR/wai-aria-practices-1.1/examples/dialog-modal/dialog.html}
 * @see {@link https://www.w3.org/TR/wai-aria-practices-1.1/examples/dialog-modal/js/dialog.js}
 */
const DialogList: Dialog[] = []

function getCurrentDialog(): Dialog | undefined {
	if (DialogList.length) return DialogList[DialogList.length - 1]
}

/**
 * Class representing a dialog modal
 */
class Dialog {
	public element?: HTMLElement | null
	private backdrop?: HTMLElement | null
	private onClickDialog(e: MouseEvent) {
		return e.stopPropagation()
	}
	private onClickBackdrop = this.close.bind(this)

	/**
	 * @param {string} id
	 */
	constructor(id: string) {
		const element = document.getElementById(id)

		if (element === null) return
		else if (element.getAttribute('role') !== 'dialog') return

		this.element = element
		this.backdrop = this.getBackdrop()

		this.element.classList.remove('hidden')
		this.backdrop.classList.add('active')
		document.body.classList.add('has-dialog')

		this.addListeners()
		DialogList.push(this)
	}

	getBackdrop(): HTMLElement {
		const parent = this.element!.parentNode as HTMLElement

		return parent.classList.contains('dialog-backdrop')
			? parent
			: this.createBackdrop()
	}

	createBackdrop(): HTMLElement {
		const backdrop = document.createElement('div')
		backdrop.className = 'dialog-backdrop'
		this.element?.parentNode?.insertBefore(backdrop, this.element)
		backdrop.appendChild(this.element!)

		return backdrop
	}

	close(): void {
		DialogList.pop()
		this.removeListeners()
		this.element!.classList.add('hidden')
		this.backdrop!.classList.remove('active')
		document.body.classList.remove('has-dialog')
	}

	addListeners(): void {
		this.element!.addEventListener('click', this.onClickDialog)
		this.backdrop!.addEventListener('click', this.onClickBackdrop)
	}

	removeListeners(): void {
		this.element!.removeEventListener('click', this.onClickDialog)
		this.backdrop!.removeEventListener('click', this.onClickBackdrop)
	}
}

window.openDialog = function (id: string): void {
	new Dialog(id)
}

window.closeDialog = function (button: HTMLElement): void {
	const dialog = getCurrentDialog()

	if (dialog && dialog.element!.contains(button)) dialog.close()
}
