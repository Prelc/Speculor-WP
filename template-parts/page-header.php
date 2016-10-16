<?php
/**
 * The page title part of the header
 *
 * @package speculor
 */

// Regular page id.
$speculor_bg_id        = get_the_ID();
$speculor_blog_id      = absint( get_option( 'page_for_posts' ) );

// If blog or single post use the ID of the blog.
if ( is_home() || is_singular( 'post' ) ) {
	$speculor_bg_id = $speculor_blog_id;
}

?>

<div class="page-header">

	<?php
	$speculor_main_tag = 'h1';
	// Index and single title.
	if ( is_home() || ( is_single() && 'post' === get_post_type() ) ) {
		$speculor_title    = 0 === $speculor_blog_id ? get_theme_mod( 'page_header_blog_title', esc_html__( 'Blog', 'speculor' ) ) : get_the_title( $speculor_blog_id );

		if ( is_single() ) {
			$speculor_main_tag = 'p';
		}
	}
	// Archive title.
	elseif ( is_category() || is_tag() || is_author() || is_post_type_archive() || is_tax() || is_day() || is_month() || is_year() ) {
		$speculor_title = get_the_archive_title();
	}
	// Search title.
	elseif ( is_search() ) {
		$speculor_title = esc_html__( 'Search Results For' , 'speculor' ) . ' &quot;' . get_search_query() . '&quot;';
	}
	// Error 404 title
	elseif ( is_404() ) {
		$speculor_title = esc_html__( 'Error 404' , 'speculor' );
	}
	// Main title.
	else {
		$speculor_title    = get_the_title();
	}
	?>

	<!-- HTML output. -->
	<?php printf( '<%1$s class="h1  page-header__title">%2$s</%1$s>', tag_escape( $speculor_main_tag ), esc_html( $speculor_title ) ); ?>

</div>
