import './class/Dialog'
import Accordion from './class/Accordion'
import GlobalHeader from './class/GlobalHeader'
import Tabs from './class/Tabs'
import insertBase64Mailto from './function/insert-base64-mailto'

new GlobalHeader()
document
	.querySelectorAll<HTMLElement>('.accordion')
	.forEach((i) => new Accordion(i))
document.querySelectorAll<HTMLElement>('.tabs').forEach((i) => new Tabs(i))
insertBase64Mailto('bWluYW1vdG9Ad29yZHByZXNzLmxvY2FsaG9zdA==', '.mailto')

const test = ''
