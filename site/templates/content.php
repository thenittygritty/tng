<?php snippet('header') ?>

<article class="article">
	<header class="article-header">
		<h1><?php echo html($page->title()) ?></h1>
	</header>

	<?php echo kirbytext($page->text()); ?>
</article>

<?php snippet('footer') ?>
