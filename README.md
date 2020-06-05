# **Minamoto** – Wordpress Starter Theme

![alt Minamoto Logo](./img/logo/normal.svg)

Minamoto is a Wordpress starter theme with [Gulp](https://github.com/gulpjs/gulp) + [Stylus](http://stylus-lang.com/) + [Webpack](https://webpack.js.org/) + [Browsersync](https://browsersync.io/docs/gulp).

> Theme development of with this starter theme requires advanced knowledge in Wordpress theme development and modern JavaScript such as CommonJS and ES6. If you are new to theme development, you might want to check out [Getting Started guide](https://developer.wordpress.org/themes/getting-started/) from Wordpess.org.
 
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

> The theme is developed using `yarn` not `npm` nor `npx`. The `npm` or `npx `might do the tasks. However, the developer of this theme has no plan to make the theme compatible with `npm` or `npx`.

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

The theme is tested only with the latest version of Wordpress. There is no guarantee that the theme works with non-latest version of Wordpress. For the test environment, please refer to [Test Environment](#test-environment) section.

### Not for Child/Parent theme

The theme is developed to be your sole custom theme. Therefore, the theme might not work properly if you use it as the parent theme of child theme, or child theme itself. It is possible to customize the theme in accordance with your preference for parent/child theme purpose, however, doing so requires a lot of work.

## Test Environment
- Node & NPM: 10.15.0 & 6.4.1
- Yarn: 1.13.0
- Wordpress: 5.0.3
- PHP: 7.2.10
- MySQL: 5.7.23
- Web Server: Apache 2.2.34

## Other Wordpress Starter Themes
- [Sage](https://roots.io/sage/) ([Github](https://github.com/roots/sage))
- [Underscores a.k.a. \_s](https://underscores.me/) ([Github](https://github.com/automattic/_s))
- [Bones](https://themble.com/bones/) ([Github](https://github.com/squibbleFish/theme-bones))

## Feedback
If you have any request or find bugs, please bring it up to [Issues](https://github.com/zacfukuda/minamoto/issues).

## Todos
- stylus variable for text, border, background color