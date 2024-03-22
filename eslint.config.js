import js from '@eslint/js'
import ts from '@typescript-eslint/eslint-plugin'
import prettierConfig from 'eslint-config-prettier'
import tsParser from '@typescript-eslint/parser'

export default [
	js.configs.recommended,
	ts.configs.recommended,
	prettierConfig,
	{
		files: ['src/ts/**/*.{ts,tsx}'],
		languageOptions: {
			ecmaVersion: 'latest',
			sourceType: 'module',
			globals: {
				axios: 'readonly',
				jQuery: 'readonly',
			},
			parser: tsParser,
			parserOptions: {},
		},
		plugins: { ts },
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
			'ts/consistent-type-imports': [
				'error',
				{
					prefer: 'type-imports',
					disallowTypeAnnotations: true,
					fixStyle: 'separate-type-imports',
				},
			],
			'ts/no-unused-vars': ['error', { vars: 'all', args: 'all' }],
			// 'ts/padding-line-between-statements': [
			// 	'error',
			// 	{ blankLine: 'always', prev: '*', next: 'interface' },
			// 	{ blankLine: 'always', prev: 'interface', next: '*' },
			// ],
		},
	},
]
