/* eslint-env node */
module.exports = {
	env: {
		browser: true,
		es2021: true,
	},
	extends: ['eslint:recommended', 'prettier'],
	globals: {
		jQuery: 'readonly',
	},
	parserOptions: {
		ecmaVersion: 'latest',
		sourceType: 'module',
	},
	rules: {
		'no-console': 'off',
		'padding-line-between-statements': [
			'error',
			/* prev based */
			{ blankLine: 'always', prev: 'if', next: ['expression', 'for', 'while'] },
			{
				blankLine: 'always',
				prev: ['const', 'expression', 'let'],
				next: ['for', 'if', 'switch', 'try', 'while'],
			},
			{ blankLine: 'always', prev: 'import', next: 'expression' },
			{ blankLine: 'always', prev: ['class', 'function'], next: '*' },
			/* next based */
			{ blankLine: 'always', prev: ['const', 'import', 'let'], next: 'export' },
			{
				blankLine: 'always',
				prev: '*',
				next: ['class', 'function', 'return', 'try'],
			},
		],
	},
	root: true,
}
