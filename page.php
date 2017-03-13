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

get_header();

get_template_part( 'template-parts/page-header' );

?>

	<div class="content-area  container">
		<div class="row">
			<!-- Main Content -->
			<main class="col-xs-12  col-lg-8">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
					?>
					<a class="btn  btn-secondary  btn-block  btn-rounded  comments__button" data-toggle="collapse" href="#collapseComments" aria-expanded="false" aria-controls="collapseComments">
						<?php
							printf( // WPCS: XSS OK.
								esc_html( _nx( 'Show %1$s comment', 'Show %1$s comments', get_comments_number(), 'comments title', 'speculor' ) ),
								number_format_i18n( get_comments_number() )
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
			<!-- Sidebar -->
			<div class="col-xs-12  col-lg-4">
				<div class="sidebar  sidebar--page">
					<?php dynamic_sidebar( 'regular-page-sidebar' ); ?>
				</div>
			</div>
		</div><!-- .row -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
