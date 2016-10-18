<?php
/**
 * The header for our theme.
 *
 * @package speculor
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<?php
			// Display the Custom Logo
			the_custom_logo();

			if ( ! has_custom_logo()) { ?>
				<?php
					if ( is_front_page() ) : ?>
						<a class="header__heading-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<h1 class="header__heading"><?php bloginfo( 'name' ); ?></h1>
						</a>
					<?php else : ?>
						<a class="header__heading-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<p class="header__heading"><?php bloginfo( 'name' ); ?></p>
						</a>
					<?php endif; ?>
				<?php
			}
		?>

		<!-- Toggle button for Main Navigation on mobile -->
		<button class="btn  btn-dark  header__navbar-toggler  hidden-lg-up" type="button" data-toggle="collapse" data-target="#speculor-main-navigation"><span><?php esc_html_e( 'menu' , 'speculor' ); ?></span></button>

		<!-- Navigation -->
		<nav class="header__navigation  collapse  navbar-toggleable-md" id="speculor-main-navigation">
			<?php
				if ( has_nav_menu( 'main-menu' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'main-menu',
						'container'      => false,
						'menu_class'     => 'main-navigation'
					) );
				}
			?>
		</nav>
	</header>

	<?php
	// Hide header widgets, if both header sidebars are not in use.
	if ( is_active_sidebar( 'header-widgets-left' ) || is_active_sidebar( 'header-widgets-right' ) ) {
	?>
		<div class="header-widgets<?php if ( 'show' !== get_theme_mod( 'header_widgets_mobile', 'hide' ) ) : ?>  hidden-md-down<?php endif; ?>">
			<!-- Header widget left area -->
			<?php if ( is_active_sidebar( 'header-widgets-left' ) ) : ?>
				<div class="header-widgets__left">
					<?php dynamic_sidebar( 'header-widgets-left' ); ?>
				</div>
			<?php endif; ?>
			<!-- Header widget right area -->
			<?php if ( is_active_sidebar( 'header-widgets-right' ) ) : ?>
				<div class="header-widgets__right">
					<?php dynamic_sidebar( 'header-widgets-right' ); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php } ?>
