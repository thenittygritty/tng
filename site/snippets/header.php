<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title><?php echo html($page->title()); ?> &ndash; <?php echo html($site->title()); ?></title>

		<meta name="description" content="<?php echo html($site->description()); ?>">
		<meta name="keywords" content="<?php echo html($site->keywords()); ?>">

		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300|Merriweather:400,700|Droid+Sans+Mono">

		<?php echo css('assets/css/main.css'); ?>
	</head>
	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">You are using an <strong>outdated</strong>
			browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>
			or <a href="http://www.google.com/chromeframe/?redirect=true">activate
			Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<header class="header">
			<h1 class="header-logo">
				<a href="<?php echo url() ?>" title="<?php echo html($site->title()) ?>" role="banner">
					<strong><span>//</span>TNG</strong>
					<span>The Nitty Gritty</span>
				</a>
				<p>The low down on web technology</p>
			</h1>

			<?php snippet('search') ?>
			<?php snippet('menu') ?>
			<?php snippet('submenu') ?>
		</header>

		<div id="content">
