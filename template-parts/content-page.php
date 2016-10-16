<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speculor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article  h-entry  clearfix' ); ?>>
	<div class="article__content  e-content">
		<!-- Content -->
		<?php the_content(); ?>

		<!-- Multi Page in One Post -->
		<?php
			$speculor_args = array(
				'before'      => '<div class="multi-page  clearfix">' . /* translators: after that comes pagination like 1, 2, 3 ... 10 */ esc_html__( 'Pages:', 'speculor' ) . ' &nbsp; ',
				'after'       => '</div>',
				'link_before' => '<span class="btn  btn-primary">',
				'link_after'  => '</span>',
				'echo'        => 1,
			);
			wp_link_pages( $speculor_args );
		?>
	</div>
</article>
