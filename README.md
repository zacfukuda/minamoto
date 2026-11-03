# **Minamoto** – Wordpress Starter Theme

![alt Minamoto Logo](./img/logo/normal.svg)

Minamoto is a Wordpress starter theme with [Vite](https://vite.dev/) + [PostCSS](https://postcss.org/) (plain CSS with nesting) + [TypeScript](https://www.typescriptlang.org/).

> To use this theme requires advanced knowledge in Wordpress theme development and JavaScript(CommonJS, ES6). If you are new to theme development, you might want to check out [Getting Started guide](https://developer.wordpress.org/themes/getting-started/) from Wordpess.org.

## Installation & Configuration

### Download Themes & Install Dependancies:

```bash
# Download theme
$ cd path/to/your/wp-content/themes
$ git clone https://github.com/zacfukuda/minamoto.git themename
$ cd themename

# Install NPM packages
$ yarn

# Install Composer packages
$ composer install
```

### Edit Config Files

| File | Property | Configuration |
| --- | --- | --- |
| `style.css` | - | Edit the information so that the proper information will appear in the admin page. |
| `package.json` | name | Recommended to match to the text domain defined in `style.css`. |
| - | version | The theme version. |

> `style.css` exists only to be recognized as a theme by WordPress core. All styles are written in `src/css/*`, and will be compiled to `./build`.

In addition to the files above, you can edit `vite.config.mts` so that the source files will be compiled as you want it to.

## Vite tasks

| Command | Task | Comment |
| --- | --- | --- |
| `yarn dev` | Runs the Vite dev server. | Serves at [http://localhost:5173/](http://localhost:5173/). <br>Keep browsing your WordPress site as usual; the theme loads assets from the dev server while it is running. |
| `yarn watch` | Rebuilds `build` on file changes. | Does not run the dev server. |
| `yarn build` | Builds optimized assets to `build`. | Run this before putting into production. <br>File names carry a content hash for cache busting; `inc/vite.php` looks them up in `build/.vite/manifest.json`. |
| `yarn typecheck` | Type-checks TypeScript. | Vite does not type-check. |

> While `yarn dev` is running, the dev server writes its origin to `.vite-hot`, and `inc/vite.php` reads it to switch asset URLs. If the server is killed abnormally, delete `.vite-hot` by hand. To change the port, edit `origin` and `server.port` in `vite.config.mts`.
>
> In dev, stylesheets are imported from `src/ts/dev.ts` so that Vite hot-updates them without reloading the page. Production serves `globals`, `globals@md` and `globals@lg` (built to `build/css/globals/`) as separate files with `<link media>`. Because dev has no `<link media>`, `globals@md.css` and `globals@lg.css` import their partials with a media query, e.g. `@import "./base/md.css" (min-width: 768px);`, which Vite turns into an `@media` block.
>
> CSS is plain CSS processed by PostCSS: `@import` is resolved by Vite, nesting is flattened by `postcss-nesting`, and vendor prefixes are added by Autoprefixer (see `vite.config.mts`).

## Global and Per-page CSS

- **Global CSS** (`src/css/globals/globals.css`, `globals@md.css`, `globals@lg.css`) is loaded on every page. Put tokens, base, typography, components and anything shared by several pages under `src/css/globals/`.
- **Page CSS** is one directory per page in `src/css/pages/`, e.g. `src/css/pages/home/`:

  ```
  pages/home/
  ├── index.css   # entry point; imports the others
  ├── all.css
  ├── md.css      # (min-width: 768px)
  └── lg.css      # (min-width: 1024px)
  ```

  `index.css` imports `all.css`, `md.css` and `lg.css` (the latter two with a media query), and is built to a single file, `build/css/pages/home-<hash>.css`, with the breakpoints as `@media` blocks inside it. `vite.config.mts` globs `src/css/pages/*/index.css`, so a new page needs no change in `vite.config.mts` or `inc/vite.php`; restart `yarn dev` or `yarn watch` to pick up a new directory.
- To load a page's CSS, set `page_styles` to the directory names in the page template, outside any block:

  ```twig
  {% extends 'layouts/main.twig' %}
  {% set page_styles = ['home'] %}
  ```

  `head.twig` prints the tags with `vite_page_css()`, after the global CSS. In dev the same call loads the stylesheet through the dev server, so it hot-updates, and only that page's CSS is loaded.
- Pages whose CSS files are all empty build to one shared empty file, so delete the directory (and its `page_styles` line) if a page does not need CSS.

## File Structure

```
.
├── assets            # Vendor files like jQuery
├── classes           # PHP classes
├── config            # Configuration files for theme
├── (build)           # Created by Vite; NEVER edit
├── doc               # Documentations about theme and website
├── html              # HTML drafts before saving in database
├── img               # Images that are part of you theme
├── inc               # PHP funtions
├── (node_modules)    # NPM modules
├── src               # Source files
├── templates         # Twig template files
│   ├── js
│   └── css
└── (vendor)          # Composer files
```

## Expected Updates in Future

### Custom Field to _Page_

Assuming that some of _Pages_ will be written in HTML format, this themes designed to load a content of HTML file from `html` folder that matches the slug of the current page. The code responsible for functionality is written in `parts/page.php`, and the developer is planning to add a custom field to _page_ admin page to turn on/off this feature for per page.

For now there is no way to switch the feature, except that you modify the code in `parts/page.php` manually.

## SEO

### robots.txt Example

```
User-Agent: *
Allow: /?display=wide
Allow: /wp-content/uploads/
Disallow: /wp-content/plugins/
Disallow: /readme.html
Disallow: /refer/
Disallow: /xmlrpc.php
```

## Notes

### Wordpress Version

Only tested with the latest version of Wordpress. There is no guarantee that the theme works with non-latest version of Wordpress. For the test environment, please refer to [Test Environment](#test-environment) section.

### Not for Child/Parent theme

The theme is to be a custom theme. The theme might not work properly if you use it as a parent or child theme. It is possible to customize the theme for parent/child theme purpose—although doing so requires a lot of work.

## Other Wordpress Starter Themes

- [Sage](https://roots.io/sage/) ([Github](https://github.com/roots/sage))
- [Underscores a.k.a. \_s](https://underscores.me/) ([Github](https://github.com/automattic/_s))
- [Bones](https://themble.com/bones/) ([Github](https://github.com/squibbleFish/theme-bones))

## Feedback

If you have any request or find bugs, please bring it up to [Issues](https://github.com/zacfukuda/minamoto/issues).

## Todos

- Tab: show the panel based on the hash
- Dialog over dialog (multi-dialog hadling)
