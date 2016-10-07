<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package speculor
 */

$speculor_layout = 'right';
if ( function_exists( get_field ) ) {
	$speculor_layout = get_field( 'layout', (int) get_option( 'page_for_posts' ) ) ;
}

get_header();

get_template_part( 'template-parts/page-header' );

?>

	<div class="content-area  container">
		<div class="row">
			<!-- Main Content -->
			<main class="col-xs-12<?php echo 'left' === $speculor_layout ? '  col-lg-8  push-lg-4' : ''; ?><?php echo 'right' === $speculor_layout ? '  col-lg-8' : ''; ?><?php echo 'narrow' === $speculor_layout ? '  col-lg-8  offset-lg-2' : ''; ?>">
				<?php	while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
					?>
					<a class="btn  btn-secondary  btn-block  btn-rounded  comments__button" data-toggle="collapse" href="#collapseComments" aria-expanded="false" aria-controls="collapseComments">
						<?php
							printf( // WPCS: XSS OK.
								esc_html( _nx( 'Show 1 comment', 'Show %1$s comments', get_comments_number(), 'comments title', 'speculor' ) ),
								number_format_i18n( get_comments_number() ),
								'<span>' . get_the_title() . '</span>'
							);
						?>
					</a>
					<div class="collapse" id="collapseComments">
						<?php comments_template(); ?>
					</div>

				<?php
				endif;
					endwhile; // End of the loop.
				?>
			</main>

			<?php
			if ( ( 'wide' !== $speculor_layout && 'narrow' !== $speculor_layout ) && is_active_sidebar( 'blog-sidebar' ) ) : ?>
				<!-- Sidebar -->
				<div class="col-xs-12  col-lg-4<?php echo 'left' === $speculor_layout ? '  pull-lg-8' : ''; ?>">
					<div class="sidebar  sidebar--blog<?php echo 'left' === $speculor_layout ? '  sidebar--left' : ''; ?>">
						<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
