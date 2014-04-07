<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php bloginfo('name'); ?> <?php wp_title ('|'); ?></title>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie.css">
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
<![endif]-->
</head>
<body>
 
<header id="header">
	<h1 role="banner">
		<a id="logo" href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/images/ctlogo05.png" alt="<?php bloginfo('name'); ?>">
		</a>
	</h1>
</header>
	
<nav id="nav" role="navigation">
	<div id="primary-nav">
		<a href="#" role="button" id="hamburger">Menu</a>
		<ul class="main-nav">
			<li<?php if (is_front_page()) { ?> class="active"<?php } ?>>
				<a href="<?php echo get_option('home'); ?>">Home</a>
			</li>
			<li<?php if (is_page_template('about.php')) { ?> class="active"<?php } ?>>
				<a href="/about">About</a>
			</li>
			<li<?php if (is_page_template('art.php') || is_singular('art') || is_tag() || is_page_template('art-tags.php')) { ?> class="active"<?php } ?>>
				<a href="/art">Art</a>
			</li>
			<li<?php if (is_home() || is_singular('post') || is_category()) { ?> class="active"<?php } ?>>
				<a href="/blog">Blog</a>
			</li>
			<li<?php if (is_page_template('links.php')) { ?> class="active"<?php } ?>>
				<a href="/links">Links</a>
			</li>
		</ul>
		<ul class="nav-social">
			<li class="nav-twitter">
				<a href="http://twitter.com/charliethomason" class="contact-btn" rel="nofollow" target="_blank" class="hide-text">
					<img src="<?php bloginfo('template_directory'); ?>/images/icon-twitter05.png" alt="Twitter">
				</a>
			</li>
		</ul>
		<div class="clear"></div>
	</div>
</nav>

<div id="container" role="main">