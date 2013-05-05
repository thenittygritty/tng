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
endif;

if ($articles && $articles->count()):
	foreach ($articles as $article):
		// Check if it is a link post
		if($article->template() == 'article.link'):
			// Output the link post
			snippet('link', array('link' => $article));
		else:
			// Output the article
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
