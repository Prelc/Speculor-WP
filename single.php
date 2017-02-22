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

					<?php if ( 'hide' !== get_theme_mod( 'post_author', 'show' ) ) : ?>
						<!-- Post Author -->
						<?php $author_description = get_the_author_meta( 'description' ); ?>

						<div class="post-author  h-card">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
							<div class="post-author__content">
								<p class="h2  post-author__name  p-name">
									<?php echo get_the_author_meta( 'display_name' ) ?>
								</p>
								<div class="post-author__description  p-note">
									<?php echo $author_description ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- Comments -->
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
					<?php endif; ?>

					<?php if ( 'hide' !== get_theme_mod( 'post_navigation', 'show' ) ) : ?>
						<!-- Post Navigation -->
						<?php
						$prev_post = get_adjacent_post( false, '', false );
						$next_post = get_adjacent_post( false, '', true );
						?>

						<div class="post-navigation__container">
							<a class="post-navigation  post-navigation--previous" href="<?php the_permalink( $prev_post ); ?>">
								<div class="h5  post-navigation__title  post-navigation__title--previous">
									<?php echo get_the_title( $prev_post ); ?>
								</div>
								<div class="h6  post-navigation__text  post-navigation__text--previous">
									<?php esc_html_e( 'Previous post' , 'speculor' ); ?>
								</div>
							</a>
							<a class="post-navigation  post-navigation--next" href="<?php the_permalink( $next_post ); ?>">
								<div class="h5  post-navigation__title  post-navigation__title--next">
									<?php echo get_the_title( $next_post ); ?>
								</div>
								<div class="h6  post-navigation__text  post-navigation__text--next">
									<?php esc_html_e( 'Next post' , 'speculor' ); ?>
								</div>
							</a>
						</div>
					<?php endif; ?>
				<?php endwhile; // End of the loop. ?>
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
