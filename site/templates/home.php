<?php snippet('header');

// Show blog posts in decending order
$articles = $page->children()->visible()->flip();
// Get the latest three articles
$latestThreeArticles = $articles->filterBy('template', 'article')->limit(3);
// Take out the latest three articles out of the whole list.
$uids = array();
foreach ($latestThreeArticles as $article) {
	$uids[] = $article->uid;
}

$articles = $articles
				->not($uids[0])
				->not($uids[1])
				->not($uids[2]);

// Show posts of categories if requested
if (param('category')):
	$articles = $articles->filterBy('categories', urldecode(param('category')), ',')->paginate(5); ?>
	<h1>Category: <?php echo urldecode(param('category')); ?></h1>
<?php else:
	// Show all articles
	$articles = $articles->paginate(15);
endif;

if($articles->pagination->isFirstPage()):
	snippet('featured-articles', array('articles' => $latestThreeArticles));
endif;

if ($articles && $articles->count()):
	foreach ($articles as $article):
		// Check if it is a link post
		if($article->template() == 'article'):
			snippet('article', array('article' => $article));
		elseif($article->template() == 'article.link'):
			snippet('article.link', array('article' => $article));
		endif;
	endforeach;

	snippet('paginate', array('articles' => $articles));
else: ?>
	<article class="article">
		<p>Wooops. We couldn't find any articles. *sadpanda*</h1>
	</article>
<?php endif ?>

<?php snippet('footer') ?>
