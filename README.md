# **Minamoto** – Wordpress Starter Theme with Gulp + Stylus + Webpack(Babel) + Browsersync

![alt Minamoto Logo](./img/logo/normal.svg)

Wordpress starter theme with [Gulp](https://github.com/gulpjs/gulp) + [Stylus](http://stylus-lang.com/) + [Webpack](https://webpack.js.org/) + [Browsersync](https://browsersync.io/docs/gulp).

Good option to develop Wordpress theme rapidly on a local computer, with the support of [MAMP](https://www.mamp.info/en/) or [Varying Vagrant Vagrants](https://github.com/Varying-Vagrant-Vagrants/VVV).

> To use this theme requires advanced knowledge in Wordpress theme development. If you are new to theme development, you might want to check out [Getting Started guide](https://developer.wordpress.org/themes/getting-started/) from Wordpess.org.
 
## Installation & Configuration

Download the theme from Github:

```bash
$ cd path/to/your/wp-content/themes
$ git clone https://github.com/zacfukuda/minamoto.git your-theme
$ cd your-theme
```

After dowloading the theme, install NPM modules:

```bash
$ yarn
```

| File | Property | Configuration |
| --- | --- | --- |
| `style.css` | | Edit the information so that the proper information will appear in the admin page. |
| `package.json` | name | Recommended to match to the text domain defined in `style.css`. |
| | version | Will be appended after the assets files like CSS and Javacript for cache busting purpose. |
| | proxy | Will be used as Browsersync option inside `gulpfile.js`. The default target is set to `http://wordpress.localhost`. |

> `style.css` exists only to be recognized as a theme by Wordpress system. All styles are written in `src/stylus/*`, and will be compiled to `./dist/css`.

In addition to the file above, you can configure files under `config` so that the source files will be built as you want it to.

## Scripts
> This theme is developed using `yarn` over `npm` or `npx`. The `npm` or `npx `might do the intended tasks. however, the developer of this theme, has no plan to make the theme compatible with `npm` or `npx`.

| Command | Task |
| --- | --- |
| `yarn start` | Runs Broswersync server.<br>By default, the gulp will not open the browser window. So please navigate yourself to [http://localhost:3000/](http://localhost:3000/). |
| `yarn watch` | Keep watching file changes.<br>Contrary to `yarn start`, this command do not run Browsersync server, instead keeps watching file changes and outputs new files. |
| `yarn build` | Build optimized asset files along with unminified version. Run this command before you put the site into production. |

> The Broswersync proxies to `proxy.target` defined in `package.json`. Also, if you want to run the dev server other than `port:3000`, please edit `gulpfile.js`.

## File Structure
```
.
├── assets						# Vendor files like bootstrap, jQuery
├── config						# Configuration files for theme
├── (dist) 						# Built files. Created by Gulp, never edit
├── doc 							# Documentations about theme and website
├── functions 				# PHP funtions
│   ├── cron/
│   ├── media/
│   ├── nav_menu/
│   ├── option/
│   ├── other/
│   ├── post/
│   ├── shortcode/
│   ├── widget/
│   ├── paths.php
│   └── setup.php
├── html/							# HTMLs before saving DB.
├── img/ 							# Images that are part of you theme
├── (node_modules) 		# NPM modules
├── parts/						# Wordpresss template parts
├── src 							# Source files
│   ├── js/
│   └── stylus/
└── vendor/
```

## Expected Updates in Future

### Timber Ready
[Timber](https://github.com/timber/timber) is a Wordpress plugin to write theme template with Twig Template Engine, and the developer is planning to adapt this plugin for the development of theme template.

### Custom Field to *Page*
Assuming that some of *Pages* will be written in HTML format, this themes designed to load a content of HTML file from `html` folder that matches the slug of the current page. The code responsible for functionality is written in `parts/page.php`, and the developer is planning to add a custom field to *page* admin page to turn on/off this feature for per page.

For now there is no way to switch the feature, except that you modify the code in `parts/page.php` manually.

## Issues

### Wordpress Version

The theme is tested only with the latest version of Wordpress. There is no guarantee that the theme works with non-latest version of Wordpress. For the test environment, please refer to [Test Environment](#test-environment) section.

### No Liting & JS Testing

For now there is linting for CSS & JS and no test program for JS files. At the time of this writting, the developer has no intention to implement these feature any time soon.

### Not for Child Theme or Parent theme

The theme is being developed to be used as your sole custom theme. Therefore, the theme might not work properly if you use it as the parent theme of child or child theme itself.

It is possible to customize the theme in accordance with your preference for those purpose, however, it requires much work.

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

## Feedback
If you have any request or find bugs, please bring it up to [Issues](https://github.com/zacfukuda/minamoto/issues) of this repository.