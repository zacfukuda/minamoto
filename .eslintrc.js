/* eslint-env node */
module.exports = {
	env: {
		browser: true,
		es2021: true,
	},
	extends: [
		'eslint:recommended',
		'plugin:@typescript-eslint/recommended',
		'prettier',
	],
	globals: {
		axios: 'readonly',
		jQuery: 'readonly',
	},
	overrides: [],
	parser: '@typescript-eslint/parser',
	parserOptions: {
		ecmaVersion: 'latest',
		sourceType: 'module',
	},
	plugins: ['@typescript-eslint'],
	rules: {
		'no-unused-vars': 'off', // Required by @typescript-eslint/no-unused-vars
		'padding-line-between-statements': [
			'error',
			{ blankLine: 'always', prev: ['class', 'function'], next: '*' },
			{
				blankLine: 'always',
				prev: '*',
				next: ['class', 'function', 'return', 'try'],
			},
			{
				blankLine: 'always',
				prev: ['import', 'for', 'if', 'switch', 'while'],
				next: ['const', 'expression', 'let'],
			},
			{
				blankLine: 'always',
				prev: ['const', 'expression', 'let'],
				next: ['for', 'if', 'switch', 'try', 'while'],
			},
			{
				blankLine: 'always',
				prev: ['const', 'expression', 'import', 'let'],
				next: 'export',
			},
			{ blankLine: 'always', prev: ['for', 'switch', 'while'], next: 'if' },
			{ blankLine: 'always', prev: ['if', 'switch', 'while'], next: 'for' },
			{ blankLine: 'always', prev: ['if', 'for', 'while'], next: 'switch' },
			{ blankLine: 'always', prev: ['if', 'for', 'switch'], next: 'while' },
		],
		/* @typescript-eslint */
		'@typescript-eslint/consistent-type-imports': [
			'error',
			{
				prefer: 'type-imports',
				disallowTypeAnnotations: true,
				fixStyle: 'separate-type-imports',
			},
		],
		'@typescript-eslint/no-unused-vars': [
			'error',
			{ vars: 'all', args: 'all' },
		],
		// '@typescript-eslint/padding-line-between-statements': [
		// 	'error',
		// 	{ blankLine: 'always', prev: '*', next: 'interface' },
		// 	{ blankLine: 'always', prev: 'interface', next: '*' },
		// ],
	},
	root: true,
}
