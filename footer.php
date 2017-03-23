<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package speculor
 */

?>

	<footer class="footer">
		<div class="footer__left">
			<?php echo wp_kses_post( get_theme_mod( 'footer_left', sprintf( esc_html__( 'Speculor - WordPress theme made by %1$sPrelc%2$s.', 'speculor' ), '<a href="http://www.prelc.si">', '</a>' ) ) ); ?>
		</div>
		<div class="footer__right">
			<?php echo wp_kses_post( get_theme_mod( 'footer_right', 'Copyright 2016. All rights reserved.' ) ); ?>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
