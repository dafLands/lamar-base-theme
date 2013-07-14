<?php
/**
* Loop Shortcode
*
* @link: http://www.wprecipes.com/wordpress-shortcode-display-the-loop
*
* Usage: loop category="news" query="" pagination="false"
*
* Query Parameters: http://codex.wordpress.org/Class_Reference/WP_Query
*
*/

function myLoop($atts, $content = null) {
	extract(shortcode_atts(array(
		"pagination" => 'true',
		"query" => '',
		"category" => '',
	), $atts));
	global $wp_query,$paged,$post;
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	if($pagination == 'true'){
		$query .= '&paged='.$paged;
	}
	if(!empty($category)){
		$query .= '&category_name='.$category;
	}
	if(!empty($query)){
		$query .= $query;
	}

	$wp_query->query($query);
	ob_start();

	while ($wp_query->have_posts()) : $wp_query->the_post();
	$title = get_the_title();
	$title_class = strtolower($title);


	// Check to see if loop item is a page.
	if ( strpos($query, 'page_id') !== false || strpos($query, 'post_per_page=1') !== false ) : ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2><?=$title?></h2>
				<?php the_content(); ?>
		</div>

	<?php else: ?>

		<ul class="loop">
			<?php $thumbnail_image = get_the_post_thumbnail(); ?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo $thumbnail_image; the_title(); ?></a></li>
		</ul>

	<?php endif; // end page if/else ?>

	<?php endwhile; ?>

	<?php if($pagination == 'true') : ?>

		<div class="navigation">
		  <div class="alignleft"><?php previous_posts_link('« Previous') ?></div>
		  <div class="alignright"><?php next_posts_link('More »') ?></div>
		</div>

	<?php endif; // end pagination

	$wp_query = null; $wp_query = $temp;
	$content = ob_get_contents();
	ob_end_clean();
	wp_reset_query();
	return $content;
}
add_shortcode("loop", "myLoop");



