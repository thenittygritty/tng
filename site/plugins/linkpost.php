<?php

function linkpost() {

  global $site;

  $link   = get('link');
  $title  = get('title');
  $author = get('author');
  $text   = get('text');

  $path = 'content/home/';

  $files   = dir::read($path);
  $dirInfo = dir::inspect($path);
  $newDir  = $path . count($files) . '-' . str::urlify($title);
  $create  = dir::make($newDir);

  if ( $create ) {
  	  $newFile = $newDir . '/article.link.txt';

  	  $template = "Title: $title\n----\nLink: $link\n----\nDate: "
  	  						. date('Y-m-d') . "\n----\nAuthor: $author\n----\nText: kirbytext($text)";

  	  f::write($newFile, $template);

  	  echo 'OK';
  	  exit;
  }
  else {
  	echo 'Error';
  	exit;
  }

}
