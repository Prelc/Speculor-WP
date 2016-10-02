<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speculor
 */

?>

<div class="article">
	<h1 class="h2  article__title"><?php esc_html_e( 'Nothing Found', 'speculor' ); ?></h1>

	<div class="article__content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'speculor' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'speculor' ); ?></p>

			<div class="widget_search">
				<?php get_search_form(); ?>
			</div>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'speculor' ); ?></p>

			<div class="widget_search">
				<?php get_search_form(); ?>
			</div>

		<?php endif; ?>
	</div><!-- .article__content -->
</div><!-- .article -->
