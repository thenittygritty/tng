<?php snippet('header');

// Show blog posts in decending order
$articles = $page->children()->visible()->flip();
// Show posts of categories if requested
if (param('category')):
	$articles = $articles->filterBy('categories', urldecode(param('category')), ',')->paginate(5); ?>
	<h1>Category: <?php echo urldecode(param('category')); ?></h1>
<?php else:
	// Show all articles
	$articles = $articles->paginate(5);
elseif ?>

<?php if ($articles && $articles->count()): ?>

	<?php foreach ($articles as $article): ?>
		<?php snippet('article', array('article' => $article)); ?>
	<?php endforeach ?>

	<?php snippet('paginate', array('articles' => $articles)); ?>

<?php else: ?>
	<article class="article">
		<p>Wooops. We couldn't find any articles. *sadpanda*</h1>
	</article>
<?php endif ?>

<?php snippet('footer') ?>
