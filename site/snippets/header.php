<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title><?php echo html($page->title()); ?> &ndash; <?php echo html($site->title()); ?></title>

		<meta name="description" content="<?php echo $page->description() ?
				html($page->description()) :
				html($site->description());
		?>">
		<meta name="keywords" content="<?php
			echo $page->keywords() ?
				html($page->keywords()) :
				$page->tags() ?
					html($page->tags()) :
					html($site->keywords());
		?>">

		<meta name="viewport" content="width=device-width">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,700|Merriweather:300,400,700|Droid+Sans+Mono">

		<link rel="alternate" type="application/rss+xml" title="The Nitty Gritty" href="<?php echo url('feed'); ?>">

		<?php
			if (c::get('debug')) {
				echo css('assets/css/main.css');
			} else {
				echo css('assets/dist/main-' . c::get('package')->version . '.min.css');
			}
		?>


		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">You are using an <strong>outdated</strong>
			browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>
			or <a href="http://www.google.com/chromeframe/?redirect=true">activate
			Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<header class="header">
			<?php snippet('search'); ?>
			<?php snippet('menu'); ?>

			<h1 class="header-logo">
				<a href="<?php echo url() ?>" title="<?php echo html($site->title()) ?>" role="banner">
					<strong><span>//</span>TNG</strong>
					<span>The Nitty Gritty</span>
				</a>
				<p>The low down on web technology</p>
			</h1>

			<?php // snippet('submenu'); ?>
		</header>

		<div id="content" class="site-content">
