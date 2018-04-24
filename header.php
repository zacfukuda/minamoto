<?php global $relative_template_directory; ?>
<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js no-svg overflow-hidden" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"><!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- Responsive -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--
	Favicons
	http://realfavicongenerator.net/
-->
<link rel="shortcut icon" href="<?php echo $relative_template_directory; ?>/img/favicon/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $relative_template_directory ?>/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $relative_template_directory ?>/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $relative_template_directory ?>/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo $relative_template_directory ?>/img/favicon/manifest.json">
<link rel="mask-icon" href="<?php echo $relative_template_directory ?>/img/favicon/safari-pinned-tab.svg" color="#000">
<meta name="msapplication-TileColor" content="#000">
<meta name="msapplication-TileImage" content="<?php echo $relative_template_directory; ?>/img/favicon/mstile-150x150.png">
<meta name="theme-color" content="#000">
<!--
	Font Family
	https://fonts.google.com/
-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
<!-- Stylesheet -->
<link rel="stylesheet" href="<?php echo $relative_template_directory ?>/css/style.min.css" media="all">
<link rel="stylesheet" href="<?php echo $relative_template_directory ?>/css/tablet.min.css" media="screen and (min-width: 768px)">
<link rel="stylesheet" href="<?php echo $relative_template_directory ?>/css/desktop.min.css" media="screen and (min-width: 1024px)">
<!-- Language -->
<link rel="alternate" href="https://www.example.com/ja/" hreflang="ja-jp" />
<link rel="alternate" href="https://www.example.com" hreflang="en" />
<!-- Other -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!--
	jQuery
	Get the latest version at…
	File: https://jquery.com/download/
	CDN: https://code.jquery.com/
	All versions: https://code.jquery.com/jquery/
-->
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-migrate-3.0.1.min.js"
  integrity="sha256-F0O1TmEa4I8N24nY0bya59eP6svWcshqX1uzwaWC4F4="
  crossorigin="anonymous"></script>
 <!-- jQuery CDN Fallback -->
<script>window.jQuery || document.write('<script src="<?php echo $relative_template_directory; ?>/js/jquery.min.js"><\/script>')</script>
<script> if (typeof jQuery.migrateWarnings == 'undefined') document.write('<script src="<?php echo $relative_template_directory; ?>/js/jquery-migrate.min.js"><\/script>')</script>
<!-- Multi jQuery version handling -->
<script>var jQuery3 = jQuery.noConflict(true);</script>
<!-- Modernizr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script>window.Modernizr || document.write('<script src="<?php echo $relative_template_directory; ?>/js/modernizr.min.js"><\/script>')</script>
<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--
	Progress Bar (Pace)
	URL: http://github.hubspot.com/pace/docs/welcome/
-->
<div id="progressUI" class="progressUI flex justify-center align-center">
	<!-- Put some html here -->
</div><!-- .progressUI -->

<!-- Root -->
<div id="root" class="root">

	<?php get_template_part('parts/header') ?>

	<!-- Main -->
	<main id="main" class="" role="main">