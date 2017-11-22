# **Minamoto** – Worpdress Starter Theme with Webpack

**Last Update: November 21, 2017**

A new Wordpress starter theme inspired by [Create React App](https://github.com/facebookincubator/create-react-app), namely taking the advantage of [Hot Module Replacement](https://webpack.js.org/concepts/hot-module-replacement/)(HMR).

Good option to develop Wordpress theme rapidly on a local computer, with the support of [MAMP](https://www.mamp.info/en/) or [Varying Vagrant Vagrants](https://github.com/Varying-Vagrant-Vagrants/VVV).

> To use this theme requires advanced knowledge in developing Wordpress theme. If you are new to theme development, you may want to check out [Getting Started guide](https://developer.wordpress.org/themes/getting-started/) from Wordpess.org.

## Configuration
In order to make this theme work, you must configure following files.

### `functions.php`
Change the value of `$theme_textdomain` to the name of your theme.
And remove the code of functions you don’t need.
(I’m planning to list the functions inside this README.md. Until then, please be patient.)

### `style.css`
You need to edit the commented information so that the proper information will show up as you wish in admin pages. This file exists just for being recognized as a theme by Wordpress. So there is no styling code in here. All style will be compiled from `src/stylus/*` by Webpack.

### `config/webpackDevServer.config.js`
Update to value of `proxy` to the host you want to proxy to.
By default, this is `http://wordpress.dev`.

> [The document of Create React App](https://github.com/facebookincubator/create-react-app/blob/master/packages/react-scripts/template/README.md#proxying-api-requests-in-development) says that the `proxy` field of `package.json` will be affected, but when I try this it didn’t proxy at all. So I decided to modify `webpackDevServer.config.js` directory.

### `config/webpack.config.dev.js`
- `entry`<br>
   Please update the field of `module.entry` based on your entry files.
- `output.filename` & `output.chunkFilename`<br>
   Change `minamoto` to the name of you theme.
- outputPath of loader for `.styl`

> To enable HMR, each of entry files must be accompanied with `react-dev-utils/webpackHotDevClient` module. So please do not eliminate the line.

### `config/webpack.config.prod.js`
- `entry`<br>
   Please update the field of `module.entry` based on your entry files.

> Sorry for the inconvenience of configuration being separated to many files. For the Webpack config, I try to create a centralized config file in future.

## Scripts
> The scripts might work with `npm` instead of `yarn`, but I haven’t yet fully tested.

### `yarn`
Do not forget to install dependencies before run scripts.

### `yarn start`
Runs Webpack Dev Server.<br>
This will automatically open your default browser window, navigating to [http://localhost:3000/](http://localhost:3000/).

The Webpack Dev Server proxies all traffic to the host you register in `config/webpackDevServer.config.js`.

The page will also automatically reload if you make changes to the code. This is what the HMR is all about.

### `yarn build`
Builds the hashed assets for production to the `build` folder.
The `asset-manifest.json` will be loaded to Wordpress to display the proper name of files.

The PHP code responsible for displaying hashed assets is currently written in `functions/other.php`.

## Folder Structure
```
.
├── build
│   ├── css
│   └── js
├── config
├── functions
├── html
├── js
├── parts
├── scripts
├── src
│   ├── js
│   └── stylus
└── txt
```

- **build**<br>
   Stores assets output from Webpack.
- **config**<br>
   Stores config files for Webpack.
- **functions**<br>
   Stores PHP function files loaded to `functions.php`.
- **html**<br>
   Stores HTML files to develop the Wordpress Page. This is experimental. `parts/page.php` read the content of HTML file that matches the current page slug. The purpose of this experiment is to eradicate the copy&paste task every time you modify HTML content of page.
- **js**<br>
   Stores JS files that are not compiled from Webpack. Now there are jQuery, jQuery migrate, and Modernizr.
- **parts**<br>
   The template PHP files that will be loaded to main theme file. This corresponds to `template-parts` in Wordpress’ default theme.
- **scripts**<br>
   Stores NPM script files for Webpack.
- **src**<br>
   Stores source files that will be compiled by Webpack.
- **txt**<br>
   Stores `.txt` files that might help your web development. Now there are `htaccess.txt`, copied from HTML 5 Boilerplate, and `robots.txt`.

## What’s Different from Create React App.
Webpack scripts of this theme is mostly based on Create React App. The developer has done sligh modification to make it work with Wordpress.

### Proxying
Since we want to run wordpress website, not JS application, the Webpack Dev Server will proxy all traffic to the host your Wordpress is running.

### Stylus
The developer of this starter theme prefers [Stylus](http://stylus-lang.com/) for a CSS preprocessor. The Webpack setting of this theme is compatible with Sass or Less, but you have to replace the loader with the one you prefer.

### Multiple Entries
Since this project is for Wordpress, JS and CSS are completely separeted into different entries. Plus, the CSS files are separeted acconding to their target medias.

### No `public` Folder
We don’t need a public folder that servers static files because all traffic will be proxied. For this reason, neither it requires **InterpolateHtmlPlugin**.

### Empty `build` Folder at `yarn start`
This theme define development/production based on whether `build/asset-manifest.json` exist or not.

The `yarn start` empties all files inside `build` folder before comiling source files so that the Wordpress application load non-hashed assets virtually generated by Webpack.

The application automatically assumes that it’s in production mode after you run `yarn build` and generate `asset-manifest.json`.

### Output to `build` even in Dev Mode.
By default in Create React App, Webpack outputs all assets to `static/~`. But this is unnecessary when working with Wordpress. So the developer decided to output assets always to `build` folder, eliminating `static` folder level because all output files will be `static` asset in this case.

In development mode, i.e. when using `yarn start`, you must configure output path properly so that your theme path and Webpack output path match. This configuration can be done in `config/webpack.config.dev.js`.

### jQuery as an External Module
Most of Worpdress websites rely on jQuery for DOM manipulation or such. So the theme load jQuery as an external module.

For the usage of external modules, check out [Webpack Externals Documentation](https://webpack.js.org/configuration/externals/).

## CSS (Stylus)
The developer wrote CSS that is commonly used in Wordpress, e.g. `.menu-list` or `.pagination`, or broadly used in any website, e.g. `.clearfix` or `.flex`.

Many developers might find the way of contructing CSS unreasonable or strange. If you are one of them who feels that way, please feel free to remove entire `src/stylus` files before get your hands on work.

```
$ rm -r src/stylus
```

### Media Query
By default, the theme contains three media queries:
1. **all** for all medias
2. **"(min-width:720px)"** for tablet or higher (tablet)
3. **"(min-width:1024px)"** for PC or higher

These media queries are defined in `functions/other.php`.

**This theme avoids using inline media query**. You can, however, easily write [Bootstrap-based media queries](https://getbootstrap.com/docs/4.0/layout/overview/) as follows.

```stylus
@media $xs
or
@media $sm
or
@media $md
or
@media $lg
or
@media $xl
  // your style here
```

The variables of media queries are defined in `src/stylus/config/variable.styl`.

### Grid
The grid of this themes is mostly based on [Bootstrap](https://getbootstrap.com/docs/4.0/layout/grid/).

- **32px Gutter**<br>
The biggest difference is gutter width: 32px not 30px, giving 16px padding to each side of column.

- **Wider Padding on Container**<br>
The developer want the outer margin to be wider than the gutter. Hence, `padding: 0 40px` is set on `.container`, retaining the 1120px of content area at max. (In other words, the max width of `.container` is 1200px.)

- **Flexbox Over Float**<br>
It seems to me that creating layout with float is no longer valid—although there might be plenty of poeple who still use old Internet Explorer. Since Bootstrap 4 has fully adapted to flexbox, this is not difference anymore.

## Expected Updates in Future
### Centralized Config File for Webpack
As mentioned above, now developers have to configure Webpack environment across a few files.

### Individual File for each function
Separates functions into each file so that developers can easily configure not to require unnecessary function for their case by commenting lines in `functions.php`.

### Timber Ready
[Timber](https://github.com/timber/timber) is a Wordpress plugin to write theme template with Twig Template Engine, and the developer is planning to adapt this plugin for the development of theme template.

### Webpack Script for Admin Pages
After login, Wordpress redirects you to its original host that is stored in MySQL. So there is no way you can log in to admin pages through Webpack Dev Server. Because of this, the standard asset files generated `yarn start` cannot be served, and neither can you take the advantage of HMR. There requires another script to create files with Webpack in `watch` mode.

### Gulp Option
Makes it compatible with Gulp in order to give more options to developers. (The developer has worked with only Gulp, but not Graunt. Please do not expect the theme to be compatible with Grunt.)

### File Size Reduction
The total file size of all dependencies is roughly **100MB!**. So huge. Since generally speaking developers don’t have to create a React app for Wordpress, some dependencies can be excluded from the development. Hopefully the performance would be also improved as the file size diminishes.

### Custom Field to *Page*
Assuming that some of *Pages* will be written in HTML format, this themes designed to load a content of HTML file that matches the slug of the current page from `html` folder. The code responsible for functionality is written in `parts/page.php`, and the developer is planning to add a custom field to *page* admin page to turn on/off this feature for per page.

For now there is no way to switch the feature, except that you modify the code in `parts/page.php`.

## Issues
### Freeze during HMR
I beleive the having multiple entries makes compiling heavier. And when the first time the developer was building theme with the beta version of this theme, the browser freezed sometimes.

### Wordpress Version
The theme is tested only with the latest version of Wordpress. 
There is no guarantee that the theme works with non-latest versions.

If you want to know other development environment, please check out [Tested Environment](#tested-environment)

### Javascript Testing
Although there is `yarn test` script register, there is no JS file for tesing. The developer is not a huge fan of JS testing, and has no attempt to write testing code any time soon.

### Not for Child Theme
The developer has intention only to use the theme as a parent theme. It might work as a child theme, this is not tested.

## Popular Plugins

### General
- [Akismet Anti-Spam](https://wordpress.org/plugins/akismet/)
- [Jetpack by WordPress.com](https://wordpress.org/plugins/jetpack/)
- [WP Multibyte Patch](https://wordpress.org/plugins/wp-multibyte-patch/)

### SEO
- [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/) ([Official](https://yoast.com/))
- [All in One SEO Pack](https://wordpress.org/plugins/all-in-one-seo-pack/)

### Performance
- [WP Super Cache](https://wordpress.org/plugins/wp-super-cache/)
- [Autoptimize](https://wordpress.org/plugins/autoptimize/)
- [WP-Optimize](https://wordpress.org/plugins/wp-optimize/)

### Security
- [Wordfence Security](https://wordpress.org/plugins/wordfence/)
- [All In One WP Security & Firewall](https://wordpress.org/plugins/all-in-one-wp-security-and-firewall/)
- [Shield Security](https://wordpress.org/plugins/wp-simple-firewall/)

### Editor
- [TinyMCE Advanced](https://wordpress.org/plugins/tinymce-advanced/)
- [Beaver Builder](https://wordpress.org/plugins/beaver-builder-lite-version/) ([Official](https://www.wpbeaverbuilder.com/))
- [Elementor](https://wordpress.org/plugins/elementor/) ([Official](https://elementor.com/))

### Custom Fields
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) ([Official](https://www.advancedcustomfields.com/
))

### Custom Post Type UI
- [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/)

### EC
- [WooCommerce](https://wordpress.org/plugins/woocommerce/) ([Official](https://woocommerce.com/))

### Event
- [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/)

### Form
- [Contact Form 7](https://wordpress.org/plugins/contact-form-7/) ([Official](https://contactform7.com/))
- [Contact Form 7 add confirm](https://wordpress.org/plugins/contact-form-7-add-confirm/)
- [MailChimp for WordPress](https://wordpress.org/plugins/mailchimp-for-wp/)

### Multi-Language
- WPML ([Official](https://wpml.org/))

### Migration
- [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/)
- [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)
- [UpdraftPlus](https://wordpress.org/plugins/updraftplus/)
- [Velvet Blues Update URLs](https://wordpress.org/plugins/velvet-blues-update-urls/)

## Wordpress Official Documentation
The following links are a list of links to Wordpress Official Documentation. No more searching. Just directly open the link.

*coming soon*

## Tested Environment
- Node & NPM: 6.11.0 & 3.10.10
- Wordpress: 4.9
- PHP: 7.1.1
- MySQL: 5.6.35
- Web Server: Apache 2.2.31

> As of November 20, the latest LTS Node version is 8.9.1. You cand download it from [here](https://nodejs.org/en/).