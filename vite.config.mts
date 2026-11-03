/**
 * @file Vite configuration
 * @link https://vite.dev/config/
 */
import fs from 'node:fs'
import autoprefixer from 'autoprefixer'
import postcssNesting from 'postcss-nesting'
import { defineConfig, type Plugin } from 'vite'
import fullReload from 'vite-plugin-full-reload'

const origin = 'http://localhost:5173'
const hotFile = '.vite-hot'

/**
 * One entry per directory in `src/css/pages` that has an `index.css`,
 * named `pages/<dir>` so that it is built to `build/css/pages/<dir>-<hash>.css`.
 */
const pageEntries = Object.fromEntries(
	fs
		.readdirSync('src/css/pages', { withFileTypes: true })
		.filter((d) => d.isDirectory() && fs.existsSync(`src/css/pages/${d.name}/index.css`))
		.map((d) => [`pages/${d.name}`, `src/css/pages/${d.name}/index.css`])
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
				'globals/globals': 'src/css/globals/globals.css',
				'globals/globals@md': 'src/css/globals/globals@md.css',
				'globals/globals@lg': 'src/css/globals/globals@lg.css',
				...pageEntries,
			},
			output: {
				entryFileNames: 'js/[name]-[hash].js',
				chunkFileNames: 'js/[name]-[hash].js',
				// Global and page CSS go to `css/globals` and `css/pages`; everything else to `assets`.
				assetFileNames: (asset) =>
					asset.names.some((n) => /^(globals|pages)\//.test(n))
						? 'css/[name]-[hash][extname]'
						: 'assets/[name]-[hash][extname]',
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
