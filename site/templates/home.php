<?php snippet('header') ?>

<?php

	// Do categories if requested
	if (param('category')) {

		$articles = $page->children()->visible()->flip()->filterBy('categories', param('category'), ',');
		?>
		<h1>Category: <?php echo param('category'); ?></h1>
		<?php
	} else {

		// Do blog elsewise
		$articles = $page->children()->visible()->flip();
	}
?>
<?php if ($articles && $articles->count()): ?>
	<?php foreach ($articles AS $article): ?>
		<?php snippet('article', array('article' => $article)) ?>
	<?php endforeach; ?>
<?php else: ?>
	<article class="article">
		<p>Wooops. We couldn't find any articles. *sadpanda*</h1>
	</article>
<?php endif; ?>

<?php snippet('footer') ?>
