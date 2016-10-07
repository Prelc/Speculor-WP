<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package speculor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article  clearfix' ); ?>>
	<!-- Post Thumbnail -->
	<div class="article__featured-image-container">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'article__featured-image  img-fluid' ) ); ?>
		<?php endif; ?>
	</div>
	<!-- Meta -->
	<div class="article__meta  meta">
		<!-- Date -->
		<a href="<?php the_permalink(); ?>"><time class="meta__item  meta__item--date" datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></a>
		<!-- Categories -->
		<?php if ( has_category() ) : ?>
			<!-- Separator -->
			<span class="meta__separator">/</span>
			<span class="meta__item  meta__item--categories"><?php the_category( ', ' ); ?></span>
		<?php endif; ?>
	</div>
	<!-- Title -->
	<?php
		the_title( '<h1 class="article__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		if ( 'post' === get_post_type() ) : ?>
	<?php
	endif; ?>
	<!-- Content & Multi Page -->
	<div class="article__content">
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
	<!-- Tags -->
	<?php if ( has_tag() ) { ?>
		<div class="article__tags  tags">
			<?php the_tags( '', '' ); ?>
		</div>
	<?php } ?>
</article>
