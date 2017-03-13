<?php
/**
 * The template for displaying archive pages.
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
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content' );

					endwhile;

					the_posts_pagination( array(
						'prev_text' => 'previous',
						'next_text' => 'next',
					) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
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
