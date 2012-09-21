<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title><?php echo html($page->title()); ?> &ndash; <?php echo html($site->title()); ?></title>

		<meta name="description" content="<?php echo html($site->description()); ?>">
		<meta name="keywords" content="<?php echo html($site->keywords()); ?>">

		<meta name="viewport" content="width=device-width">

		<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300|Merriweather:700" rel="stylesheet">-->

		<?php echo css('assets/css/main.css'); ?>
	</head>
	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">You are using an <strong>outdated</strong>
			browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>
			or <a href="http://www.google.com/chromeframe/?redirect=true">activate
			Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<header class="header" role="banner">
			<h1 class="header-logo">
				<a href="<?php echo url() ?>" title="<?php echo html($site->title()) ?>">
					<strong>TNG</strong> The Nitty Gritty
				</a>
			</h1>
		</header>

		<?php snippet('menu') ?>
		<?php snippet('submenu') ?>

		<div id="content">
