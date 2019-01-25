<?php // header

global $theme_version;
global $paths; ?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php /* Responsive */ ?>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php /* Favicons (http://realfavicongenerator.net/) */ ?>
<link rel="shortcut icon" href="<?php echo $paths->rel_template; ?>/img/favicon/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $paths->rel_template ?>/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $paths->rel_template ?>/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $paths->rel_template ?>/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo $paths->rel_template ?>/img/favicon/manifest.json">
<link rel="mask-icon" href="<?php echo $paths->rel_template ?>/img/favicon/safari-pinned-tab.svg" color="#000">
<meta name="msapplication-TileColor" content="#000">
<meta name="msapplication-TileImage" content="<?php echo $paths->rel_template; ?>/img/favicon/mstile-150x150.png">
<meta name="theme-color" content="#000">
<?php /* Font (https://fonts.google.com/) */ ?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
<?php /* Stylesheet */ ?>
<link rel="stylesheet" href="<?php echo $paths->rel_template ?>/dist/css/style.min.css?v=<?php echo $theme_version; ?>" media="all">
<link rel="stylesheet" href="<?php echo $paths->rel_template ?>/dist/css/medium.min.css?v=<?php echo $theme_version; ?>" media="(min-width: 768px)">
<link rel="stylesheet" href="<?php echo $paths->rel_template ?>/dist/css/large.min.css?v=<?php echo $theme_version; ?>" media="(min-width: 1024px)">
<?php /* Internationalization */ ?>
<link rel="alternate" href="https://www.example.com/ja/" hreflang="ja-jp" />
<link rel="alternate" href="https://www.example.com" hreflang="en" />
<?php /* Other */ ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<!-- Root -->
<div id="root" class="root">

	<?php get_template_part('parts/header') ?>

	<!-- Main -->
	<main id="main" class="" role="main">