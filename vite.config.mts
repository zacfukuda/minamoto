/**
 * @file Vite configuration
 * @link https://vite.dev/config/
 */
import fs from 'node:fs'
import autoprefixer from 'autoprefixer'
import { defineConfig, type Plugin } from 'vite'
import fullReload from 'vite-plugin-full-reload'

const origin = 'http://localhost:5173'
const hotFile = '.vite-hot'

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
				style: 'src/stylus/style.styl',
				medium: 'src/stylus/medium.styl',
				large: 'src/stylus/large.styl',
			},
		},
	},
	css: {
		postcss: { plugins: [autoprefixer()] },
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
