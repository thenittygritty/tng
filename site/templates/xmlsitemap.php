<?php

$ignore = array('sitemap', 'error', 'home/feed', 'search');

// send the right header
header('Content-type: text/xml; charset="utf-8"');

// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';

?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<?php foreach($pages->index() as $p): ?>
	<?php
		if (in_array($p->uri(), $ignore) or !$p->visible()) {
			continue;
		}
	?>
	<url>
		<loc><?php echo html($p->url()) ?></loc>
		<lastmod><?php echo $p->modified('c') ?></lastmod>
		<changefreq>monthly</changefreq>
		<priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5, 1) ?></priority>
	</url>
	<?php endforeach ?>
</urlset>
