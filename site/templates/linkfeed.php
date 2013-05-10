<?php

$articles = $pages->find('home')->children()->visible()->flip();

snippet('linkfeed', array(
	'link'  => url('home'),
	'items' => $articles,
	'descriptionField'  => 'text',
	'descriptionLength' => 300
));

?>
