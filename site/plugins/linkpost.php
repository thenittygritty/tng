<?php

// direct access protection
if(!defined('KIRBY')) die('Direct access is not allowed');

function linkpost() {

	// Will only work with a .dev or .local domain for now.
	// There is no authentication built in yet.
	$headers = apache_request_headers();
	$host    = $headers['Host'];
	$local   = (substr($host, -4) === '.dev' || substr($host, -6) === '.local') ? true : false;
	
	if ($local) {

	  global $site;

	  // Path to the blog content.
		$path         = 'content/01-home/';
		$templateName = 'article.link.txt';
	  // Get the data sent to this plugin.
	  $link   = get('link');
	  $title  = get('title');
	  $author = get('author');
	  $text   = get('text');
	  // Read all directory names.
	  $files  = dir::read($path);
	  // Construct the name of the new directory.
	  $newDir = $path . count($files) . '-' . str::urlify($title);
	  // Create the directory.
	  $create = dir::make($newDir);

	  // If creation of the directory was successful, write the new file.
	  if ($create) {

	  	// Construct the path to the file.
		  $newFile  = $newDir . '/' . $templateName;
		  // Construct the template and fill in the variables.
		  $template = "Title: $title\n" .
		  						"----\n" .
		  						"Link: $link\n" .
		  						"----\n" .
		  						"Date: " . date('Y-m-d') . "\n" .
		  						"----\n" .
		  						"Author: $author\n" .
		  						"----\n" .
		  						"Text:\n" .
		  						"\n" .
		  						$text;

		  // Write the file.
		  f::write($newFile, $template);
		  
		  return 'Ok <3';
	  }
	  else {
	  	return 'Error!';
	  }
	}
	else {
		echo 'NO!';
		exit();
	}
}
