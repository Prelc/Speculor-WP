<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<?php	while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'single' );

					?>

					<!-- Post Author -->
					<?php $author_description = get_the_author_meta( 'description' ); ?>

					<div class="post-author">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
						<div class="post-author__content">
							<p class="h2  post-author__name">
								<?php echo get_the_author_meta( 'display_name' ) ?>
							</p>
							<div class="post-author__description">
								<?php echo $author_description ?>
							</div>
						</div>
					</div>

					<?php
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
			<!-- Sidebar -->
			<div class="col-xs-12  col-lg-4">
				<div class="sidebar  sidebar--blog">
					<?php dynamic_sidebar( 'blog-sidebar' ); ?>
				</div>
			</div>
		</div><!-- .row -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
