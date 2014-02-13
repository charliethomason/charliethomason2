<?php
// Add CSS files
function bleachwave_add_styles() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), false, null);
	wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/inc/lightbox/css/jquery.fancybox.css', array('style'),null );
	wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Crimson+Text:400,400italic,700,700italic|Fjalla+One|Press+Start+2P', array('style'),null );
}
add_action( 'wp_enqueue_scripts', 'bleachwave_add_styles' );

// Add JavaScript files
function bleachwave_add_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '1.7.1', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'imagesLoaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'masonry' ), null, true );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/inc/lightbox/js/jquery.fancybox.pack.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/inc/lightbox/js/lightbox.js', array( 'fancybox' ), null, true );
    wp_enqueue_script( 'bleachwave', get_template_directory_uri() . '/js/bleachwave.js', array( 'jquery' ), null, true );
}
add_action( 'wp_enqueue_scripts', 'bleachwave_add_scripts' );

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(290, 200, true);

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

// ART GALLERY Custom Post Type Functions
require_once( 'functions-art.php' );

// Read more link does not jump down page on pageload 
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

// Convert p tags around images to div tags
function filter_ptags_on_images($content) {
  return preg_replace('/<p[^>]*>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<div class="post-image">$1</div>', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Remove CSS output generated by WordPress for Galleries
function bleachwave_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'bleachwave_remove_gallery_css' );

// Remove title attribute from category links
function wp_list_categories_remove_title_attributes($output) {
    $output = preg_replace('` title="(.+)"`', '', $output);
    return $output;
}
add_filter('wp_list_categories', 'wp_list_categories_remove_title_attributes');

// Add btn class to more links
function more_links_btn($more_link) {
	return str_replace('class="more-link"','class="more-link btn"',$more_link);
}
add_filter('the_content_more_link','more_links_btn');

/**
 * Remove inline styles from div.wp-caption
 * Solution found at: wordpress.org/support/topic/stripping-inline-width-style-for-wp_caption-on-images
 */
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));
	if ( 1 > (int) $width || empty($caption) )
		return $content;
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >' 
			. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

// Remove certain pages from search results
function searchFilter($query) {
	if ($query->is_search) {
		$query->set('post_type', array('post','art'));
	}
	return $query;
}
add_filter('pre_get_posts','searchFilter');

?>