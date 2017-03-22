<?php
/**
 * Template Name: Front Page with Hero Image
 *
 * @package speculor
 */

get_header(); ?>

<?php if ( get_header_image() ) : ?>
<!-- Section: Hero Image -->
	<section class="hero-image">
		<!-- Hero Image -->
		<img src="<?php header_image(); ?>" width="<?php esc_attr( get_custom_header()->width ); ?>" height="<?php esc_attr( get_custom_header()->height ); ?>" alt="<?php esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		<!-- Hero Image Content -->
		<div class="hero-image__content">
			<?php if( get_theme_mod( 'hero_image_title') !== '' ) : ?>
				<!-- Hero Image Title -->
				<h2 class="h1  hero-image__title"><?php echo wp_kses_post( get_theme_mod( 'hero_image_title', 'refine your business' ) ); ?></h2>
			<?php endif; ?>
			<!-- Hero Image Text -->
			<?php if( get_theme_mod( 'hero_image_text') !== '' ) : ?>
				<p class="hero-image__text"><?php echo wp_kses_post( get_theme_mod( 'hero_image_text', 'With WordPress theme Speculor you can take your business on another level. It is fast, clean and powerful with the semantic coding.' ) ); ?></p>
			<?php endif; ?>
			<?php if( get_theme_mod( 'hero_image_button_link') !== '' ) : ?>
				<!-- Hero Image Button -->
				<a class="btn  btn-primary  hero-image__button" href="<?php echo esc_url( get_theme_mod( 'hero_image_button_link', 'http://www.prelc.si/speculor/documentation' ) ); ?>"><?php echo wp_kses_post( get_theme_mod( 'hero_image_button_text', 'Learn More' ) ); ?></a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<!-- Section: Featured Pages -->
<section class="container  featured-pages">
	<?php
	// Get pages set in the customizer (if any)
	$pages = array();
	for ( $count = 1; $count <= 5; $count++ ) {
		$mod = get_theme_mod( 'featured_pages' . $count );
		if ( 'page-none-selected' != $mod ) {
			$pages[] = $mod;
		}
	}
	$args = array(
		'posts_per_page' => 5,
		'post_type' => 'page',
		'post__in' => $pages,
		'orderby' => 'post__in'
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		$count = 1;
		while ( $query->have_posts() ) : $query->the_post();
		?>

		<!-- Single Featured Page -->
		<div class="featured-page">
			<!-- Featured Page Image -->
			<?php if ( has_post_thumbnail() ) : ?>
				<a class="featured-page__image-link" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'featured-page__image' ) ); ?>
				</a>
			<?php endif; ?>
			<!-- Featured Page Content -->
			<div class="featured-page__content">
				<!-- Featured Page Title -->
				<?php the_title( sprintf( '<h2 class="h4  featured-page__title"><a class="featured-page__title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<!-- Featured Page Text -->
				<div class="featured-page__text">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>

		<?php
		$count++;
		endwhile;
	endif;
	wp_reset_postdata();
	?>
</section>

<?php if ( $post->post_content!=="" ) { ?>
<!-- Section: Content Area -->
<section class="content-area">
	<div class="container">
		<div class="article">
			<div class="article__content">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						the_content();
					}
				}
				?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php get_footer(); ?>
