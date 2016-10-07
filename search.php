<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
			<main class="col-xs-12<?php echo 'left' === $speculor_layout ? '  col-lg-8  col-lg-push-4' : ''; ?><?php echo 'right' === $speculor_layout ? '  col-lg-8' : ''; ?><?php echo 'narrow' === $speculor_layout ? '  col-lg-8  offset-lg-2' : ''; ?>">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_pagination( array(
						'prev_text' => 'previous',
						'next_text' => 'next',
					) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</main>

			<?php
			if ( ( 'wide' !== $speculor_layout && 'narrow' !== $speculor_layout ) && is_active_sidebar( 'blog-sidebar' ) ) : ?>
				<!-- Sidebar -->
				<div class="col-xs-12  col-lg-4<?php echo 'left' === $speculor_layout ? '  col-lg-pull-8' : ''; ?>">
					<div class="sidebar  sidebar--blog">
						<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
