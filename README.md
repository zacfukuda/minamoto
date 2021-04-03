# **Minamoto** – Wordpress Starter Theme

![alt Minamoto Logo](./img/logo/normal.svg)

Minamoto is a Wordpress starter theme with [Gulp](https://github.com/gulpjs/gulp) + [Stylus](http://stylus-lang.com/) + [Webpack](https://webpack.js.org/) + [Browsersync](https://browsersync.io/docs/gulp).

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
```

> The theme uses `yarn` over `npm`. The `npm` might do the tasks, but the developer has no plan to make the theme compatible with `npm` for the moment.

### Edit Config Files

| File | Property | Configuration |
| --- | --- | --- |
| `style.css` | - | Edit the information so that the proper information will appear in the admin page. |
| `package.json` | name | Recommended to match to the text domain defined in `style.css`. |
| - | version | Will be appended after the assets files like CSS and Javacript for cache busting purpose. |
| - | proxy | Will be used as Browsersync option inside `gulpfile.js`. The default is `http://wordpress.localhost`. |

> `style.css` exists only to be recognized as a theme by Wordpress system. All styles are written in `src/stylus/*`, and will be compiled to `./dist/css`.

In addition to the files above, you can configure files under `config` so that the source files will be compiled as you want it to.

## Gulp tasks

There are three main tasks that you use based on the progress of your development.

| Command | Task | Comment |
| ------------ | --- | --- |
| `yarn start` | Runs Broswersync server. | By default, the server will run at [http://localhost:3000/](http://localhost:3000/), <br>and not open the browser. |
| `yarn watch` | Keeps watching file changes. | Not run Browsersync. |
| `yarn build` | Builds optimized assets. | Also build unminified version. <br>Run this before putting into production. |

> The Broswersync proxies requests to `proxy.target` defined in `package.json`. Also, if you want to run the dev server other than `port:3000`, please edit `gulpfile.js`.

## File Structure
```
.
├── assets            # Vendor files like jQuery
├── classes           # PHP classes
├── config            # Configuration files for theme
├── (dist)            # Created by Gulp; NEVER edit
├── doc               # Documentations about theme and website
├── html              # HTML drafts before saving in database
├── img               # Images that are part of you theme
├── inc               # PHP funtions
├── (node_modules)    # NPM modules
├── src               # Source files
├── templates         # Twig template files
│   ├── js
│   └── stylus
└── (vendor)          # Composer files
```

## Expected Updates in Future

### Custom Field to *Page*
Assuming that some of *Pages* will be written in HTML format, this themes designed to load a content of HTML file from `html` folder that matches the slug of the current page. The code responsible for functionality is written in `parts/page.php`, and the developer is planning to add a custom field to *page* admin page to turn on/off this feature for per page.

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

- Stylus variable for text, border, background color
- Tab: show the panel based on the hash
- Dialog over dialog (multi-dialog hadling)
