<?php snippet('header') ?>

<?php

	// Do categories if requested
	if (param('category')) {

		$articles = $page->children()->visible()->flip()->filterBy('categories', param('category'), ',')->paginate(5);
		?>
		<h1>Category: <?php echo param('category'); ?></h1>
		<?php
	} else {

		// Do blog elsewise
		$articles = $page->children()->visible()->flip()->paginate(5);
	}
?>
<?php if ($articles && $articles->count()): ?>
	<?php foreach ($articles AS $article): ?>
		<?php snippet('article', array('article' => $article)) ?>
	<?php endforeach; ?>

	<!-- Pagination -->
	<?php if($articles->pagination()->hasPages()): ?>
	<nav class="pagination">
		<?php if($articles->pagination()->hasNextPage()): ?>
		<a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">&lsaquo; newer posts</a>
		<?php endif ?>

		<?php if($articles->pagination()->hasPrevPage()): ?>
		<a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">older posts &rsaquo;</a>
		<?php endif ?>
	</nav>

	<?php endif ?>
<?php else: ?>
	<article class="article">
		<p>Wooops. We couldn't find any articles. *sadpanda*</h1>
	</article>
<?php endif; ?>

<?php snippet('footer') ?>
