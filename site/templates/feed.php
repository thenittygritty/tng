<?php

$articles = $pages->find('home')->children()->visible()->flip()->limit(10);

snippet('feed', array(
  'link'  => url('home'),
  'items' => $articles,
  'descriptionField'  => 'text',
  'descriptionLength' => 300
));

?>
