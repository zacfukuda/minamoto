/**
 * @file Vite configuration
 * @link https://vite.dev/config/
 */
import fs from 'node:fs'
import path from 'node:path'
import autoprefixer from 'autoprefixer'
import postcssNesting from 'postcss-nesting'
import { defineConfig, type Plugin } from 'vite'
import fullReload from 'vite-plugin-full-reload'

const origin = 'http://localhost:5173'
const hotFile = '.vite-hot'

/** One entry per file in `src/css/page`, named `page-<file>`. */
const pageEntries = Object.fromEntries(
	fs
		.readdirSync('src/css/page', { withFileTypes: true })
		.filter((f) => f.isFile() && f.name.endsWith('.css'))
		.map((f) => [
			`page-${path.basename(f.name, '.css')}`,
			`src/css/page/${f.name}`,
		])
)

/**
 * Writes the dev server origin to `.vite-hot` while the server is running.
 * The theme reads it to load assets from the dev server instead of `build`.
 */
function hotFilePlugin(): Plugin {
	const remove = () => fs.rmSync(hotFile, { force: true })

	return {
		name: 'minamoto-hot-file',
		apply: 'serve',
		configureServer(server) {
			server.httpServer?.once('listening', () => {
				fs.writeFileSync(hotFile, origin)
			})
			process.on('exit', remove)

			for (const signal of ['SIGINT', 'SIGTERM'] as const) {
				process.on(signal, () => process.exit())
			}
		},
	}
}

export default defineConfig({
	build: {
		outDir: 'build',
		emptyOutDir: true,
		manifest: true,
		sourcemap: true,
		rollupOptions: {
			input: {
				app: 'src/ts/index.ts',
				style: 'src/css/style.css',
				medium: 'src/css/medium.css',
				large: 'src/css/large.css',
				...pageEntries,
			},
		},
	},
	css: {
		postcss: { plugins: [postcssNesting(), autoprefixer()] },
	},
	server: {
		port: 5173,
		strictPort: true,
		cors: true,
		origin,
	},
	plugins: [
		hotFilePlugin(),
		fullReload([
			'*.php',
			'classes/**/*.php',
			'config/**/*.php',
			'inc/**/*.php',
			'views/**/*.twig',
		]),
	],
})
