<?php snippet('header');

// Show blog posts in decending order.
$articles = $pages->find('home')->children()->visible()->filterBy('template', 'article')->flip();

// Show posts of categories if requested
if (param('category')):
	$articles = $articles->filterBy('categories', urldecode(param('category')), ',')->paginate(5); ?>
	<h1>Category: <?php echo urldecode(param('category')); ?></h1>
<?php else:
	// Show all articles
	$articles = $articles->paginate(15);
endif;

if ($articles && $articles->count()):
	foreach ($articles as $article):
		// Check if it is an article post.
		if($article->template() == 'article'):
			snippet('article', array('article' => $article));
		endif;
	endforeach;

	snippet('paginate', array('articles' => $articles));
else: ?>
	<article class="article">
		<p>Wooops. We couldn't find any articles. *sadpanda*</h1>
	</article>
<?php endif ?>

<?php snippet('footer') ?>
