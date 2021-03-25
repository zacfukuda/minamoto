/**
 * @link  https://www.w3.org/TR/wai-aria-practices-1.1/examples/dialog-modal/dialog.html
 * @link https://www.w3.org/TR/wai-aria-practices-1.1/examples/dialog-modal/js/dialog.js
 */
var OpenDialogList = []

function getCurrentDialog() {
	if (OpenDialogList.length) return OpenDialogList[OpenDialogList.length - 1]
}

class Dialog {
	constructor(id) {
		let element = document.getElementById(id)
		if (element === null) return
		else if (element.getAttribute('role') !== 'dialog') return

		this.d = element
		this.b = this.getBackdrop()
		this.dialogOnClick = (e) => e.stopPropagation()
		this.backdropOnClick = this.close.bind(this)

		this.d.classList.remove('hidden')
		this.b.classList.add('active')
		document.body.classList.add('has-dialog')

		this.addListeners()
		OpenDialogList.push(this)
	}

	getBackdrop() {
		let parent = this.d.parentNode
		return parent.classList.contains('dialog-backdrop') ? parent : this.createBackdrop()
	}

	createBackdrop() {
		let backdrop = document.createElement('div')
		backdrop.className = 'dialog-backdrop'
		this.d.parentNode.insertBefore(backdrop, this.d)
		backdrop.appendChild(this.d)
		return backdrop
	}

	close() {
		OpenDialogList.pop()
		this.removeListeners()
		this.d.classList.add('hidden')
		this.b.classList.remove('active')
		document.body.classList.remove('has-dialog')
	}

	addListeners() {
		this.d.addEventListener('click', this.dialogOnClick)
		this.b.addEventListener('click', this.backdropOnClick)
	}

	removeListeners() {
		this.d.removeEventListener('click', this.dialogOnClick)
		this.b.removeEventListener('click', this.backdropOnClick)
	}
}

window.openDialog = function(id) {
	new Dialog(id)
}

window.closeDialog = function (button) {
	let dialog = getCurrentDialog()
	if (dialog && dialog.d.contains(button)) dialog.close()
}

// export default Dialog
