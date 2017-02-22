<?php
/**
 * Search form
 *
 * @package speculor
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'speculor' ); ?></span>
		<button type="submit" class="search-form__submit"><i class="fa  fa-search"></i></button>
		<input type="search" class="form-control  search-form__field" placeholder="<?php esc_html_e( 'Search', 'speculor' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	</label>
</form>
