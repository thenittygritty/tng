<?php snippet('header') ?>

<section class="article">
	<header class="article-header">
		<h1><?php echo html($page->title()) ?></h1>
	</header>

	<?php echo markdown($page->text()); ?>
</section>

<?php snippet('footer') ?>
