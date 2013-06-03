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

  	$image = $this->image(Array('image' => $params['tngimg'], 'alt' => $params['alt']));

    // define default values for attributes
    $defaults = array(
      'caption'  => '',
      'position' => 'image-full'
    );

    // merge the given parameters with the default values
    $options = array_merge($defaults, $params);

    $tag = '<figure class="' . $options['position'] . '">' . $image . '<figcaption>' . $options['caption'] . '</ficaption></figure>';

    // build the link tag
    return $tag;

  }

}
