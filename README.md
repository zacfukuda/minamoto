# **Minamoto** – Worpdress Starter Theme with Gulp + Stylus + Browsersync

![alt Minamoto Logo](./img/common/logo.svg)

**Last Update: April 24, 2018**

A new Wordpress starter theme with [Gulp](https://github.com/gulpjs/gulp) + [Stylus](http://stylus-lang.com/) + [Browsersync](https://browsersync.io/docs/gulp).

Good option to develop Wordpress theme rapidly on a local computer, with the support of [MAMP](https://www.mamp.info/en/) or [Varying Vagrant Vagrants](https://github.com/Varying-Vagrant-Vagrants/VVV).

> To use this theme requires advanced knowledge in developing Wordpress theme. If you are new to theme development, you may want to check out [Getting Started guide](https://developer.wordpress.org/themes/getting-started/) from Wordpess.org.

## Configuration
In order to make this theme work, you must configure following files.

### `package.json`
- `version`: this value will be appended after assets files like CSS and Javacript used in `header.php` or `footer.php`. This value is used to enable cache busting. 
- `proxy`: this value will be passed to `gulpfile.js` and used as one of Browsersync options. The default value is `http://wordpress.localhost`. 

### `functions.php`
Change the value of `$theme_textdomain` to the name of your theme.
And remove (or comment out) the function files that you do not need.

### `style.css`
You need to edit the information at the top of the file so that the proper information will show up in admin themes page. This file exists just for being recognized as a theme by Wordpress core. There is no styling code in here. All style will be compiled from `src/stylus/*` by gulp task.

## Scripts
> The themes is developed with `yarn` over `npm`. The `npm` might do the job, but I have not yet tested.

### `yarn`
Do not forget to install dependencies before you run scripts.

### `yarn start`
Runs Broswersync server.<br>
By default, the gulp will not open the browser window. So please navigate yourself to [http://localhost:3000/](http://localhost:3000/).

The Broswersync server proxies all traffic to the host you register in `package.json`.

The page will also be automatically updated if you make changes to the files under 'src' directory.

### `yarn watch`
Keep watching file changes.<br>
Contrast to `yarn start`, thie command do not run Browsersync server. It just keeps watching file changes and outputs new files. This command is very useful when you finalize your project.

### `yarn build`
Build unminified files in addition to minified ones that have `.min` suffix. It is recommeded to run this command before you upload files to production server.

## Folder Structure
```
.
├── css
├── functions
│   ├── cron
│   ├── media
│   ├── nav_menu
│   ├── option
│   ├── other
│   ├── post
│   └── widget
├── html
├── js
├── parts
├── scripts
├── src
│   ├── js
│   └── stylus
└── txt
```

- **css**<br>
   Stores CSS files built by Gulp.
- **functions**<br>
   Stores PHP function files loaded to `functions.php`.
- **html**<br>
   Stores HTML files to develop the Wordpress Page. This is experimental. `parts/page.php` read the content of HTML file that matches the current page slug. The purpose of this experiment is to eradicate the task of copy, paste, and save every time you modify the HTML content.
- **js**<br>
   Stores JS files built by Gulp and jQuery, jQuery migrate, Modernizr, and Pace.js.
- **parts**<br>
   The template PHP files that will be loaded to main theme file. This corresponds to `template-parts` in Wordpress’ default theme.
- **src**<br>
   Stores source files that will be compiled by Gulp.
- **txt**<br>
   Stores `.txt` files that might help your web development. Now there are `htaccess.txt`, copied from HTML 5 Boilerplate, and `robots.txt`.

## Feature

## CSS (Stylus)

### Preprocessor - Stylus
The developer of this theme prefers [Stylus](http://stylus-lang.com/) for CSS preprocessor. The gulp configuration is capable to implement Sass or Less. But you have to do so with your own knowledge and responsibility.

### Media Query
By default, the theme contains three media queries:
1. **all** for all medias
2. **"(min-width:768px)"** for tablet or higher
3. **"(min-width:1024px)"** for PC or higher

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
The grid of this theme is mostly based on [Bootstrap](https://getbootstrap.com/docs/4.0/layout/grid/).

- **32px Gutter**<br>
The biggest difference is gutter width: 32px not 30px, giving 16px padding to each side of column.

- **Wider Padding on Container**<br>
The developer want the outer margin to be wider than the gutter. Hence, `padding: 0 40px` is set on `.container`, retaining the 1120px of content area at max. (In other words, the max width of `.container` is 1200px.)

- **Flexbox Over Float**<br>
It seems to me that creating layout with float is no longer valid—although there might be plenty of poeple who still use old Internet Explorer. Since Bootstrap 4 has fully adapted to flexbox, this is not a difference anymore.

### Prewritten CSS
The developer has written CSS that is commonly used in Wordpress wordpress such as `.menu-list` or `.pagination`, and broadly used in any website such as `.clearfix` or `.flex`.

Many developers might find these CSS unreasonable—strange. If you are one of them who feels that way, please feel free to remove entire `src/stylus` files before get your hands.

```
$ rm -r src/stylus
```

## Expected Updates in Future

### Timber Ready
[Timber](https://github.com/timber/timber) is a Wordpress plugin to write theme template with Twig Template Engine, and the developer is planning to adapt this plugin for the development of theme template.

### ES6 Syntax Ready
With Babel, the developer is planning to adapt a better way to organize Javascript files and its modules.

### Custom Field to *Page*
Assuming that some of *Pages* will be written in HTML format, this themes designed to load a content of HTML file from `html` folder that matches the slug of the current page. The code responsible for functionality is written in `parts/page.php`, and the developer is planning to add a custom field to *page* admin page to turn on/off this feature for per page.

For now there is no way to switch the feature, except that you modify the code in `parts/page.php` manually.

## Issues

### Wordpress Version
The theme is tested only with the latest version of Wordpress. 
There is no guarantee that the theme works with non-latest versions.

If you want to know other development environment, please check out [Tested Environment](#test-environment)

### Javascript Testing
For now there is no tes for JS file. The developer is not a huge fan of JS testing, and has no attempt to write testing code any time soon.

### Not for Child Theme
The developer has an only intention to use the theme as a parent theme. It might work as a child theme, but this is no guarantee.

## Popular Plugins

### General
- [Akismet Anti-Spam](https://wordpress.org/plugins/akismet/)
- [Jetpack by WordPress.com](https://wordpress.org/plugins/jetpack/)
- [WP Multibyte Patch](https://wordpress.org/plugins/wp-multibyte-patch/)

### Post & Page
- [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/)
- [Category Order and Taxonomy Terms Order](https://wordpress.org/plugins/taxonomy-terms-order/)
- [Yet Another Related Posts Plugin](https://wordpress.org/plugins/yet-another-related-posts-plugin/)
- [AddToAny Share Buttons](https://wordpress.org/plugins/add-to-any/) ([Official](https://www.addtoany.com/))

### Editor
- [TinyMCE Advanced](https://wordpress.org/plugins/tinymce-advanced/)
- [Beaver Builder](https://wordpress.org/plugins/beaver-builder-lite-version/) ([Official](https://www.wpbeaverbuilder.com/))
- [Elementor](https://wordpress.org/plugins/elementor/) ([Official](https://elementor.com/))

### Wigdet
- [WordPress Popular Posts](https://wordpress.org/plugins/wordpress-popular-posts/)

### Custom Fields
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) ([Official](https://www.advancedcustomfields.com/
))

### E-Commerce
- [WooCommerce](https://wordpress.org/plugins/woocommerce/) ([Official](https://woocommerce.com/))

### Event
- [The Events Calendar](https://wordpress.org/plugins/the-events-calendar/)

### Form
- [Contact Form 7](https://wordpress.org/plugins/contact-form-7/) ([Official](https://contactform7.com/))
- [Contact Form 7 add confirm](https://wordpress.org/plugins/contact-form-7-add-confirm/)
- [MailChimp for WordPress](https://wordpress.org/plugins/mailchimp-for-wp/)

### Multi-Language
- WPML ([Official](https://wpml.org/))

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

### Migration
- [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/)
- [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)
- [UpdraftPlus](https://wordpress.org/plugins/updraftplus/)
- [Velvet Blues Update URLs](https://wordpress.org/plugins/velvet-blues-update-urls/)

## Test Environment
- Node & NPM: 8.11.1 & 5.6.0
- Yarn: 1.6.0
- Wordpress: 4.9
- PHP: 7.1.1
- MySQL: 5.6.35
- Web Server: Apache 2.2.31

## Feedback
If you have any request or find a bug, please bring it up to [Issues](https://github.com/zacfukuda/minamoto/issues) of this repository.