<?php
/**
 * Search form
 *
 * @package adrenaline
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'adrenaline' ); ?></span>
		<button type="submit" class="search-form__submit"><i class="fa  fa-search"></i></button>
		<input type="search" class="form-control  search-form__field" placeholder="<?php esc_html_e( 'Search', 'adrenaline' ); ?>" value="" name="s">
	</label>
</form>
