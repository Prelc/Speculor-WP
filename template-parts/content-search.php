<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speculor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article  h-entry  clearfix' ); ?>>
	<!-- Post Thumbnail -->
	<div class="article__featured-image-container">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'article__featured-image  img-fluid  u-photo' ) ); ?>
			</a>
		<?php endif; ?>
	</div>
	<!-- Meta -->
	<div class="article__meta  meta">
		<!-- Date -->
		<a href="<?php the_permalink(); ?>"><time class="meta__item  meta__item--date  dt-published" datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a>
		<!-- Categories -->
		<?php if ( has_category() ) : ?>
			<!-- Separator -->
			<span class="meta__separator">/</span>
			<span class="meta__item  meta__item--categories"><?php the_category( ', ' ); ?></span>
		<?php endif; ?>
	</div>
	<!-- Title -->
	<?php
		the_title( '<h2 class="article__title  p-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		if ( 'post' === get_post_type() ) : ?>
	<?php
	endif; ?>
	<!-- Content & Read more text -->
	<div class="article__content  e-content">
		<?php the_excerpt(); ?>
	</div>
</article><!-- #post-## -->
