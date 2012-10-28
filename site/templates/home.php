<?php snippet('header') ?>

<?php
	// find the open/active page on the first level
	$articles = $page->children();
?>
<?php if ($articles && $articles->count()): ?>
	<?php foreach ($articles AS $article): ?>
		<?php snippet('article', array('article' => $article)) ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php snippet('footer') ?>
