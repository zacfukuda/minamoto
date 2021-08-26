module.exports = {
	addStylus: [{
		type: 'list',
		name: 'type',
		message: 'Type of style:',
		choices: ['Component', 'Page'],
		filter: (val) => new Promise((resolve, reject) => {
			resolve(val.toLowerCase())
		})
	}, {
		type: 'input',
		name: 'name',
		message: 'Name of new style: '
	}]
}
