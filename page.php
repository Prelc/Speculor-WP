<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speculor
 */

$speculor_layout = 'right';
if ( function_exists( get_field ) ) {
	$speculor_layout = get_field( 'layout' ) ;
}

get_header();

get_template_part( 'template-parts/page-header' );

?>

	<div class="content-area  container">
		<div class="row">
			<!-- Main Content -->
			<main class="col-xs-12<?php echo 'left' === $speculor_layout ? '  col-lg-8  col-lg-push-4' : ''; ?><?php echo 'right' === $speculor_layout ? '  col-lg-8' : ''; ?><?php echo 'narrow' === $speculor_layout ? '  col-lg-8  offset-lg-2' : ''; ?>">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</main>

			<?php
			if ( ( 'wide' !== $speculor_layout && 'narrow' !== $speculor_layout ) && is_active_sidebar( 'regular-page-sidebar' ) ) : ?>
				<!-- Sidebar -->
				<div class="col-xs-12  col-lg-4<?php echo 'left' === $speculor_layout ? '  col-lg-pull-8' : ''; ?>">
					<div class="sidebar  sidebar--page">
						<?php dynamic_sidebar( 'regular-page-sidebar' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
