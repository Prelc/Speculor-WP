<?php

/**
 * Customizer
**/

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function speculor_customizer( $wp_customize ) {
	/**
	 * Panel
	 */
	$wp_customize->add_panel(
		'panel_theme-options',
		array(
			'priority' => 10,
			'title' => __( 'Theme Options', 'speculor' ),
		)
	);

	$wp_customize->add_section(
		'panel_theme-info',
		array(
			'priority' => 15,
			'title' => __( 'Theme Info', 'speculor' ),
		)
	);

	/**
	 * Sections
	 */
	$wp_customize->add_section(
		'section_theme-colors',
		array(
			'title' => __( 'Theme Colors', 'speculor' ),
			'description' => __( 'Change theme colors.', 'speculor' ),
			'priority' => 20,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_header',
		array(
			'title' => __( 'Header', 'speculor' ),
			'description' => __( 'Change header colors.', 'speculor' ),
			'priority' => 30,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_header_widgets',
		array(
			'title' => __( 'Header Widgets', 'speculor' ),
			'description' => __( 'Change colors for header widgets.', 'speculor' ),
			'priority' => 40,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_page_header',
		array(
			'title' => __( 'Page Header', 'speculor' ),
			'description' => __( 'Change page header options.', 'speculor' ),
			'priority' => 50,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_navigation',
		array(
			'title' => __( 'Navigation', 'speculor' ),
			'description' => __( 'Change colors and settings for navigation.', 'speculor' ),
			'priority' => 60,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_post',
		array(
			'title' => __( 'Post', 'speculor' ),
			'description' => __( 'Everything related to posts.', 'speculor' ),
			'priority' => 70,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_featured_pages',
		array(
			'title' => __( 'Featured Pages', 'speculor' ),
			'description' => __( 'Select which pages you want to show as featured in Front Page with Hero Image page template.', 'speculor' ),
			'priority' => 80,
			'panel'  => 'panel_theme-options',
	) );

	$wp_customize->add_section(
		'section_footer',
		array(
			'title' => __( 'Footer', 'speculor' ),
			'description' => __( 'Settings for the footer.', 'speculor' ),
			'priority' => 80,
			'panel'  => 'panel_theme-options',
		)
	);

	/**
	 * Settings
	 */

	// Theme Colors Settings
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default' => '#fed766',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'headings_color',
		array(
			'default' => '#272727',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'text_color',
		array(
			'default' => '#696773',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'link_color',
		array(
			'default' => '#009fb7',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'logo_color',
		array(
			'default' => '#272727',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Header Settings
	$wp_customize->add_setting(
		'header_background_color',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Header Widgets Settings
	$wp_customize->add_setting(
		'header_widgets_mobile',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'header_widgets_text_color',
		array(
			'default' => '#696773',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'header_widgets_link_color',
		array(
			'default' => '#696773',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'header_widgets_background_color',
		array(
			'default' => '#e6e9ec',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Page Header Settings
	$wp_customize->add_setting(
		'page_header_blog_title',
		array(
			'default' => esc_html__( 'blog', 'speculor' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Navigation Settings
	$wp_customize->add_setting(
		'navigation_link_color',
		array(
			'default' => '#696773',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_link_hover_color',
		array(
			'default' => '#272727',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_submenu_link_color',
		array(
			'default' => '#272727',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_submenu_link_hover_color',
		array(
			'default' => '#272727',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_mobile_link_color',
		array(
			'default' => '#696773',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_mobile_link_hover_color',
		array(
			'default' => '#272727',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_mobile_background_color',
		array(
			'default' => '#eff1f3',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Hero Image settings
	$wp_customize->add_setting( 'hero_image_title', array(
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_setting( 'hero_image_text', array(
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_setting( 'hero_image_button_text', array(
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_setting( 'hero_image_button_link', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	// Post settings
	$wp_customize->add_setting(
		'post_author',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'post_navigation',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);

	// Featured Pages
	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting(
			'featured_pages' . $count,
			array(
				'default' => '',
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'featured_pages' . $count,
			array(
				'type' => 'dropdown-pages',
				'label' => __( 'Select Page', 'speculor' ),
				'section'  => 'section_featured_pages',
			)
		);
	}

	// Footer Settings
	$wp_customize->add_setting(
		'footer_left',
		array(
			'default' => sprintf( esc_html__( 'Speculor - WordPress theme made by %1$sPrelc%2$s.', 'speculor' ), '<a href="http://www.prelc.si">', '</a>' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_setting(
		'footer_right',
		array(
			'default' => esc_html__( 'Copyright 2016. All rights reserved.', 'speculor' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_setting(
		'footer_text_color',
		array(
			'default' => '#696773',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'footer_link_color',
		array(
			'default' => '#009fb7',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'footer_background_color',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Theme Info
	$wp_customize->add_setting(
		'theme_info_text',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control( 'theme_info_text', array(
		'type'        => 'hidden',
		'priority'    => 5,
		'description' => sprintf( esc_html__( '%1$sView demo%2$s %3$s %4$sSpeculor on GitHub%2$s %3$s %5$sBuy me a beer%2$s' , 'speculor' ),
		'<b><a style="display: block; font-style: normal; height: 45px; line-height: 45px;" class="button" href="http://www.prelc.si/speculor/" target="_blank">',
		'</a></b>',
		'<hr>',
		'<b><a style="display: block; font-style: normal; height: 45px; line-height: 45px;" class="button" href="https://github.com/Prelc/Speculor-WP" target="_blank">',
		'<b><a style="display: block; font-style: normal; height: 45px; line-height: 45px;" class="button" href="https://paypal.me/prelc" target="_blank">'
		),
		'section'     => 'panel_theme-info',
	) );


	/**
	 * Controls
	 */

	// Theme Colors Controls
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color',
			array(
				'label' => __( 'Primary Color', 'speculor' ),
				'settings' => 'primary_color',
				'section' => 'section_theme-colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'headings_color',
			array(
				'label' => __( 'Headings Color', 'speculor' ),
				'settings' => 'headings_color',
				'section' => 'section_theme-colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_color',
			array(
				'label' => __( 'Text Color', 'speculor' ),
				'settings' => 'text_color',
				'section' => 'section_theme-colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label' => __( 'Link Color', 'speculor' ),
				'settings' => 'link_color',
				'section' => 'section_theme-colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'logo_color',
			array(
				'label' => __( 'Logo Color', 'speculor' ),
				'description' => __( 'Works only if there is no Logo Image.', 'speculor' ),
				'settings' => 'logo_color',
				'section' => 'section_theme-colors',
			)
		)
	);

	// Header Controls
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background_color',
			array(
				'label' => __( 'Background Color', 'speculor' ),
				'settings' => 'header_background_color',
				'section' => 'section_header',
			)
		)
	);

	// Header Widgets Controls
	$wp_customize->add_control(
		'header_widgets_mobile',
		array(
			'type' => 'select',
			'label' => __( 'Header Widgets on Mobile', 'speculor' ),
			'description' => __( 'Show or hide header widgets area for screens smaller than 992px.', 'speculor' ),
			'section' => 'section_header_widgets',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_widgets_text_color',
			array(
				'label' => __( 'Text Color', 'speculor' ),
				'settings' => 'header_widgets_text_color',
				'section' => 'section_header_widgets',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_widgets_link_color',
			array(
				'label' => __( 'Link Color', 'speculor' ),
				'settings' => 'header_widgets_link_color',
				'section' => 'section_header_widgets',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_widgets_background_color',
			array(
				'label' => __( 'Background Color', 'speculor' ),
				'settings' => 'header_widgets_background_color',
				'section' => 'section_header_widgets',
			)
		)
	);

	// Page Header Controls
	$wp_customize->add_control(
		'page_header_blog_title',
		array(
			'type' => 'text',
			'label' => __( 'Page header blog title', 'speculor' ),
			'description' => __( 'Works only if "Front page displays" is set on "Your latest posts".', 'speculor' ),
			'priority' => 20,
			'section' => 'section_page_header',
		)
	);

	// Navigation Controls
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'navigation_link_color',
			array(
				'label' => __( 'Link Color', 'speculor' ),
				'settings' => 'navigation_link_color',
				'section' => 'section_navigation',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'navigation_link_hover_color',
			array(
				'label' => __( 'Link Hover Color', 'speculor' ),
				'settings' => 'navigation_link_hover_color',
				'section' => 'section_navigation',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'navigation_submenu_link_color',
			array(
				'label' => __( 'Submenu Link Color', 'speculor' ),
				'settings' => 'navigation_submenu_link_color',
				'section' => 'section_navigation',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'navigation_submenu_link_hover_color',
			array(
				'label' => __( 'Submenu Link Hover Color', 'speculor' ),
				'settings' => 'navigation_submenu_link_hover_color',
				'section' => 'section_navigation',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'navigation_mobile_link_color',
			array(
				'label' => __( 'Mobile Link Color', 'speculor' ),
				'settings' => 'navigation_mobile_link_color',
				'section' => 'section_navigation',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'navigation_mobile_link_hover_color',
			array(
				'label' => __( 'Mobile Link Hover Color', 'speculor' ),
				'settings' => 'navigation_mobile_link_hover_color',
				'section' => 'section_navigation',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'navigation_mobile_background_color',
			array(
				'label' => __( 'Mobile Background Color', 'speculor' ),
				'settings' => 'navigation_mobile_background_color',
				'section' => 'section_navigation',
			)
		)
	);

	// Hero Image Controls
	$wp_customize->add_control(
		'hero_image_title',
		array(
			'type' => 'text',
			'label' => __( 'Title', 'speculor' ),
			'priority' => 20,
			'section' => 'header_image',
		)
	);
	$wp_customize->add_control(
		'hero_image_text',
		array(
			'type' => 'text',
			'label'    => __( 'Text', 'speculor' ),
			'priority' => 25,
			'section'  => 'header_image',
		)
	);
	$wp_customize->add_control(
		'hero_image_button_text',
		array(
			'type' => 'text',
			'label'    => __( 'Button text', 'speculor' ),
			'priority' => 30,
			'section'  => 'header_image',
	) );
	$wp_customize->add_control(
		'hero_image_button_link',
		array(
			'label'    => __( 'Button URL', 'speculor' ),
			'section'  => 'header_image',
			'priority' => 35,
		)
	);

	// Post Controls
	$wp_customize->add_control(
		'post_author',
		array(
			'type' => 'select',
			'label' => __( 'Post Author', 'speculor' ),
			'description' => __( 'Author description can be found at the bottom of the single post.', 'speculor' ),
			'section' => 'section_post',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		'post_navigation',
		array(
			'type' => 'select',
			'label' => __( 'Post Navigation', 'speculor' ),
			'description' => __( 'Next and previous link which can be found at the bottom of the single post.', 'speculor' ),
			'section' => 'section_post',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);

	// Footer Controls
	$wp_customize->add_control(
		'footer_left',
		array(
			'type' => 'text',
			'label' => __( 'Footer text on the left', 'speculor' ),
			'priority'    => 10,
			'section' => 'section_footer',
		)
	);
	$wp_customize->add_control(
		'footer_right',
		array(
			'type' => 'text',
			'label' => __( 'Footer text on the right', 'speculor' ),
			'priority' => 20,
			'section' => 'section_footer',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
				'label' => __( 'Text Color', 'speculor' ),
				'settings' => 'footer_text_color',
				'priority' => 30,
				'section' => 'section_footer',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_link_color',
			array(
				'label' => __( 'Link Color', 'speculor' ),
				'settings' => 'footer_link_color',
				'priority' => 40,
				'section' => 'section_footer',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_background_color',
			array(
				'label' => __( 'Background Color', 'speculor' ),
				'settings' => 'footer_background_color',
				'priority' => 50,
				'section' => 'section_footer',
			)
		)
	);
}
add_action( 'customize_register', 'speculor_customizer' );


/**
 * Customizer Colors
**/

function customizer_colors() {

	// Theme Colors
	$primary_color = get_theme_mod( 'primary_color', '#fed766' );
	$headings_color = get_theme_mod( 'headings_color', '#272727' );
	$text_color = get_theme_mod( 'text_color', '#696773' );
	$link_color = get_theme_mod( 'link_color', '#009fb7' );
	$logo_color = get_theme_mod( 'logo_color', '#272727' );

	// Header Colors
	$header_background_color = get_theme_mod( 'header_background_color', '#ffffff' );

	// Header Widgets Colors
	$header_widgets_text_color = get_theme_mod( 'header_widgets_text_color', '#696773' );
	$header_widgets_link_color = get_theme_mod( 'header_widgets_link_color', '#696773' );
	$header_widgets_background_color = get_theme_mod( 'header_widgets_background_color', '#e6e9ec' );

	// Navigation Colors
	$navigation_link_color = get_theme_mod( 'navigation_link_color', '#696773' );
	$navigation_link_hover_color = get_theme_mod( 'navigation_link_hover_color', '#272727' );
	$navigation_submenu_link_color = get_theme_mod( 'navigation_submenu_link_color', '#272727' );
	$navigation_submenu_link_hover_color = get_theme_mod( 'navigation_submenu_link_hover_color', '#272727' );
	$navigation_mobile_link_color = get_theme_mod( 'navigation_mobile_link_color', '#696773' );
	$navigation_mobile_link_hover_color = get_theme_mod( 'navigation_mobile_link_hover_color', '#272727' );
	$navigation_mobile_background_color = get_theme_mod( 'navigation_mobile_background_color', '#eff1f3' );

	// Footer Colors
	$footer_text_color = get_theme_mod( 'footer_text_color', '#696773' );
	$footer_link_color = get_theme_mod( 'footer_link_color', '#009fb7' );
	$footer_background_color = get_theme_mod( 'footer_background_color', '#ffffff' );

	// Colors
	$base_primary_color = new speculor_Color( $primary_color );
	$base_link_color = new speculor_Color( $link_color );
	$base_logo_color = new speculor_Color( $logo_color );
	$base_header_widgets_link_color = new speculor_Color( $header_widgets_link_color );
	$base_footer_link_color = new speculor_Color( $footer_link_color );
	$base_navigation_mobile_background_color = new speculor_Color( $navigation_mobile_background_color );

	?>

	<style>

	/* Primary Color */
	<?php if ( $primary_color ) : ?>
		.widget_archive a:hover,
		.widget_pages a:hover,
		.widget_categories a:hover,
		.widget_meta a:hover,
		.widget_recent_comments a:hover,
		.widget_recent_entries a:hover,
		.widget_rss a:hover,
		.widget_nav_menu .menu-item a:focus,
		.widget_nav_menu .menu-item a:hover {
			color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.btn-primary,
		.pagination .current,
		.pagination .current:focus,
		.pagination .current:hover,
		.comment-respond .submit,
		.widget_calendar caption,
		.main-navigation .menu-item:focus > a::after,
		.main-navigation .menu-item:hover > a::after {
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		@media (min-width: 992px) {
			.main-navigation > .menu-item > a::before,
			.main-navigation .sub-menu a {
				background-color: <?php echo esc_attr( $primary_color ); ?>;
			}
		}

		.btn-primary:hover,
		.comment-respond .submit:focus,
		.comment-respond .submit:hover {
			background-color: <?php echo esc_attr( '#' . $base_primary_color->darken(12) ); ?>;
		}

		@media (min-width: 992px) {
			.main-navigation .sub-menu .menu-item:focus > a,
			.main-navigation .sub-menu .menu-item:hover > a {
				background-color: <?php echo esc_attr( '#' . $base_primary_color->darken(12) ); ?>;
			}
		}

		.btn-primary,
		.comment-respond .submit,
		.widget_search .search-form__field:focus,
		.main-navigation .featured a {
			border-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		@media (min-width: 992px)  {
			.main-navigation > .menu-item-has-children > a::after {
				border-bottom-color: <?php echo esc_attr( $primary_color ); ?>;
				border-right-color: <?php echo esc_attr( $primary_color ); ?>;
			}
		}

		.comment-respond .submit:focus,
		.comment-respond .submit:hover,
		.btn-primary:hover,
		.main-navigation .featured a:focus,
		.main-navigation .featured a:hover {
			border-color: <?php echo esc_attr( '#' . $base_primary_color->darken(12) ); ?>;
		}

		@media (min-width: 992px) {
			.main-navigation .sub-menu .menu-item-has-children::after {
				border-top-color: <?php echo esc_attr( '#' . $base_primary_color->darken(12) ); ?>;
			}
		}

		@media (min-width: 992px) {
			.main-navigation .sub-menu a {
				border-bottom-color: <?php echo esc_attr( '#' . $base_primary_color->darken(12) ); ?>;
			}
		}

		@media (min-width: 992px) {
			.main-navigation .sub-menu .sub-menu a {
				border-left-color: <?php echo esc_attr( '#' . $base_primary_color->darken(12) ); ?>;
			}
		}

		@media (min-width: 992px) {
			.main-navigation .sub-menu .menu-item-has-children::after {
				border-right-color: <?php echo esc_attr( '#' . $base_primary_color->darken(12) ); ?>;
			}
		}

		.btn-primary:active:hover {
			background-color: <?php echo esc_attr( '#' . $base_primary_color->darken(18) ); ?>;
		}

		.btn-primary:active:hover {
			border-color: <?php echo esc_attr( '#' . $base_primary_color->darken(18) ); ?>;
		}
	<?php endif; ?>

	/* Headings Color */
	<?php if ( $headings_color ) : ?>
		h1, h2, h3, h4, h5, h6,
		.article__title a,
		.article__title a:focus,
		.article__title a:hover,
		.page-header__title,
		.post-author__name,
		.post-navigation__title,
		.sidebar__heading,
		.featured-page__title-link,
		.featured-page__title-link:focus,
		.featured-page__title-link:hover,
		.hero-image__title {
			color: <?php echo esc_attr( $headings_color ); ?>;
		}
	<?php endif; ?>

	/* Text Color */
	<?php if ( $text_color ) : ?>
		body,
		.hero-image__text {
			color: <?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>

	/* Link Color */
	<?php if ( $link_color ) : ?>
		a,
		a:focus {
			color: <?php echo esc_attr( $link_color ); ?>;
		}

		a:hover {
			color: <?php echo esc_attr( '#' . $base_link_color->darken(6) ); ?>;
		}

		.btn-secondary,
		.btn-secondary:focus {
			background-color: <?php echo esc_attr( $link_color ); ?>;
		}

		.btn-secondary:hover,
		.btn-secondary:focus:hover {
			background-color: <?php echo esc_attr( '#' . $base_link_color->darken(6) ); ?>;
		}

		.btn-secondary,
		.btn-secondary:focus {
			border-color: <?php echo esc_attr( $link_color ); ?>;
		}

		.btn-secondary:hover,
		.btn-secondary:focus:hover {
			border-color: <?php echo esc_attr( '#' . $base_link_color->darken(6) ); ?>;
		}

		.btn-secondary:active:hover {
			background-color: <?php echo esc_attr( '#' . $base_link_color->darken(12) ); ?>;
		}

		.btn-secondary:active:hover {
			border-color: <?php echo esc_attr( '#' . $base_link_color->darken(12) ); ?>;
		}
	<?php endif; ?>

	/* Logo Color */
	<?php if ( $logo_color ) : ?>
		.header__heading-link,
		.header__heading {
			color: <?php echo esc_attr( $logo_color ); ?>;
		}

		.header__heading-link:focus .header__heading,
		.header__heading-link:hover .header__heading {
			color: <?php echo esc_attr( '#' . $base_logo_color->darken(6) ); ?>;
		}
	<?php endif; ?>

	/* Header Background Color */
	<?php if ( $header_background_color ) : ?>
		.header {
			background-color: <?php echo esc_attr( $header_background_color ); ?>;
		}

		@media (min-width: 992px) {
			.main-navigation {
				background-color: <?php echo esc_attr( $header_background_color ); ?>;
			}
		}
	<?php endif; ?>

	/* Header Widgets Text Color */
	<?php if ( $header_widgets_text_color ) : ?>
		.header-widgets {
			color: <?php echo esc_attr( $header_widgets_text_color ); ?>;
		}
	<?php endif; ?>

	/* Header Widgets Link Color */
	<?php if ( $header_widgets_link_color ) : ?>
		.header-widgets a,
		.header-widgets .textwidget a,
		.header-widgets .widget_nav_menu .menu > .menu-item a {
			color: <?php echo esc_attr( $header_widgets_link_color ); ?>;
		}

		.header-widgets a:hover,
		.header-widgets .textwidget a:focus,
		.header-widgets .textwidget a:hover,
		.header-widgets .widget_nav_menu .menu > .menu-item a:focus,
		.header-widgets .widget_nav_menu .menu > .menu-item a:hover {
			color: <?php echo esc_attr( '#' . $base_header_widgets_link_color->darken(12) ); ?>;
		}
	<?php endif; ?>

	/* Header Widgets Background Color */
	<?php if ( $header_widgets_background_color ) : ?>
		.header-widgets,
		.header-widgets .widget_nav_menu .menu .sub-menu a {
			background-color: <?php echo esc_attr( $header_widgets_background_color ); ?>;
		}
	<?php endif; ?>

	/* Navigation Link Color */
	<?php if ( $navigation_link_color ) : ?>
		@media (min-width: 992px) {
			.main-navigation a {
				color: <?php echo esc_attr( $navigation_link_color ); ?>;
			}
		}
	<?php endif; ?>

	/* Navigation Link Hover Color */
	<?php if ( $navigation_link_hover_color ) : ?>
		@media (min-width: 992px) {
			.main-navigation .menu-item:focus > a,
			.main-navigation .menu-item:hover > a,
			.main-navigation > .current-menu-item > a {
				color: <?php echo esc_attr( $navigation_link_hover_color ); ?>;
			}
		}
	<?php endif; ?>

	/* Navigation Submenu Link Color */
	<?php if ( $navigation_submenu_link_color ) : ?>
		@media (min-width: 992px) {
			.main-navigation .sub-menu a {
				color: <?php echo esc_attr( $navigation_submenu_link_color ); ?>;
			}
		}
	<?php endif; ?>

	/* Navigation Submenu Link Hover Color */
	<?php if ( $navigation_submenu_link_hover_color ) : ?>
		@media (min-width: 992px) {
			.main-navigation .sub-menu .menu-item:focus > a,
			.main-navigation .sub-menu .menu-item:hover > a {
				color: <?php echo esc_attr( $navigation_submenu_link_hover_color ); ?>;
			}
		}
	<?php endif; ?>

	/* Navigation Mobile Link Color */
	<?php if ( $navigation_mobile_link_color ) : ?>
		@media (max-width: 991px) {
			.main-navigation a {
				color: <?php echo esc_attr( $navigation_mobile_link_color ); ?>;
			}
		}
	<?php endif; ?>

	/* Navigation Mobile Link Hover Color */
	<?php if ( $navigation_mobile_link_hover_color ) : ?>
		@media (max-width: 991px) {
			.main-navigation .menu-item:focus > a,
			.main-navigation .menu-item:hover > a,
			.main-navigation .sub-menu .menu-item:focus > a,
			.main-navigation .sub-menu .menu-item:hover > a {
				color: <?php echo esc_attr( $navigation_mobile_link_hover_color ); ?>;
			}
		}
	<?php endif; ?>

	/* Navigation Mobile Background Color */
	<?php if ( $navigation_mobile_background_color ) : ?>
		@media (max-width: 991px) {
			.main-navigation {
				background-color: <?php echo esc_attr( $navigation_mobile_background_color ); ?>;
			}

			.main-navigation a,
			.main-navigation .featured {
				border-color: <?php echo esc_attr( '#' . $base_navigation_mobile_background_color->darken(6) ); ?>;
			}
		}
	<?php endif; ?>

	/* Footer Text Color */
	<?php if ( $footer_text_color ) : ?>
		.footer {
			color: <?php echo esc_attr( $footer_text_color ); ?>;
		}
	<?php endif; ?>

	/* Footer Link Color */
	<?php if ( $footer_link_color ) : ?>
		.footer a {
			color: <?php echo esc_attr( $footer_link_color ); ?>;
		}

		.footer a:hover {
			color: <?php echo esc_attr( '#' . $base_footer_link_color->darken(6) ); ?>;
		}
	<?php endif; ?>

	/* Footer Background Color */
	<?php if ( $footer_background_color ) : ?>
		.footer {
			background-color: <?php echo esc_attr( $footer_background_color ); ?>;
		}
	<?php endif; ?>

	</style>

	<?php
} // End customizer_colors()
add_action( 'wp_head', 'customizer_colors' );


/**
 * Sanitization functions
**/

/**
 * Select and radio sanitization callback.
 *
 * @source https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php#L262-L288
 */
if ( ! function_exists( 'speculor_sanitize_select' ) ) {
	function speculor_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}
