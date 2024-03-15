<?php
/**
 * Title: Listing
 * Slug: boilerpress/listing
 * Categories: posts
 */
?>

<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"var:preset|spacing|3-x-large","bottom":"var:preset|spacing|3-x-large"}}},"backgroundColor":"on-background","textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-color has-on-background-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--3-x-large);padding-bottom:var(--wp--preset--spacing--3-x-large)"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|x-large"}}},"fontSize":"5-x-large"} -->
<h2 class="wp-block-heading has-5-x-large-font-size" style="margin-bottom:var(--wp--preset--spacing--x-large)">Writing</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":9,"query":{"perPage":3,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-title {"level":3,"fontSize":"3-x-large"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-date {"fontSize":"large"} /-->

<!-- wp:post-excerpt {"moreText":"Read article"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->