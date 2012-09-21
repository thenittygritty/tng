<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">

		<title><?php echo html($site->title()) ?> - <?php echo html($page->title()) ?></title>

		<meta name="description" content="<?php echo html($site->description()); ?>">
		<meta name="keywords" content="<?php echo html($site->keywords()); ?>">

		<meta name="viewport" content="width=device-width">

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
			<div class="header-logo" role="banner">
				<a href="<?php echo url() ?>">
					<?php echo html($site->title()) ?>
				</a>
			</div>
		</header>
