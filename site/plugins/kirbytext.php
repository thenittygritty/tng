<?php

class kirbytextExtended extends kirbytext {

  function __construct($text, $markdown=true) {

    parent::__construct($text, $markdown);

    // define custom tags
    $this->addTags('tngimg');
    $this->addAttributes('caption');
    $this->addAttributes('position');

  }

  function tngimg($params) {

    // define default values for attributes
    $defaults = array(
      'caption'  => '',
      'alt'		 => '',
      'position' => 'image-full'
    );

    // Merge the given parameters with the default values.
    $options = array_merge($defaults, $params);

    $image = $this->image(Array('image' => $options['tngimg'], 'alt' => $options['alt']));

    if (isset($options['link'])) {
		$openLink  = '<a href="' . $options['link'] . '">';
		$closeLink = '</a>';
    }
    else {
    	$openLink = '';
    	$closeLink = '';
    }

    $tag = '<figure class="' . $options['position'] . '">' . $openLink . $image . $closeLink . '<figcaption>'  . $openLink . kirbytext($options['caption']) . $closeLink . '</ficaption></figure>';

    // build the link tag
    return $tag;

  }

}
