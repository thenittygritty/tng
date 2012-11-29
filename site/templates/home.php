<?php snippet('header') ?>

<?php

	// Do categories if requested
	if (param('category')) {

		$articles = $page->children()->visible()->flip()->filterBy('categories', urldecode(param('category')), ',')->paginate(5);
		?>
		<h1>Category: <?php echo urldecode(param('category')); ?></h1>
		<?php

	} else {

		// Do blog elsewise
		$articles = $page->children()->visible()->flip()->paginate(5);
	}
?>

<?php if ($articles && $articles->count()) { ?>

	<?php foreach ($articles as $article) { ?>
		<?php snippet('article', array('article' => $article)); ?>
	<?php } ?>

	<?php snippet('paginate', array('articles' => $articles)); ?>

<?php } else { ?>
	<article class="article">
		<p>Wooops. We couldn't find any articles. *sadpanda*</h1>
	</article>
<?php } ?>

<?php snippet('footer') ?>
