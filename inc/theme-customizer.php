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
		'section_page_header',
		array(
			'title' => __( 'Page Header', 'speculor' ),
			'description' => __( 'Change page header options.', 'speculor' ),
			'priority' => 35,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_navigation',
		array(
			'title' => __( 'Navigation', 'speculor' ),
			'description' => __( 'Change colors and settings for navigation.', 'speculor' ),
			'priority' => 40,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_meta',
		array(
			'title' => __( 'Meta', 'speculor' ),
			'description' => __( 'Everything related to meta data.', 'speculor' ),
			'priority' => 50,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_footer',
		array(
			'title' => __( 'Footer', 'speculor' ),
			'description' => __( 'Settings for the footer.', 'speculor' ),
			'priority' => 60,
			'panel'  => 'panel_theme-options',
		)
	);

	$wp_customize->add_section(
		'section_custom_code',
		array(
			'title' => __( 'Custom Code', 'speculor' ),
			'description' => __( 'Add custom code. This code will not be affected by updates.', 'speculor' ),
			'priority' => 70,
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
			'default' => '#1bbebc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'headings_color',
		array(
			'default' => '#222222',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'text_color',
		array(
			'default' => '#555555',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'link_color',
		array(
			'default' => '#e44244',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'logo_color',
		array(
			'default' => '#222222',
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
		'navigation_search',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'navigation_link_color',
		array(
			'default' => '#555555',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_link_hover_color',
		array(
			'default' => '#1bbebc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_submenu_link_color',
		array(
			'default' => '#555555',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_submenu_link_hover_color',
		array(
			'default' => '#1bbebc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_submenu_background_color',
		array(
			'default' => '#f2f2f2',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_mobile_link_color',
		array(
			'default' => '#555555',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_mobile_link_hover_color',
		array(
			'default' => '#1bbebc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'navigation_mobile_background_color',
		array(
			'default' => '#f2f2f2',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Meta settings
	$wp_customize->add_setting(
		'meta_author_avatar',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'meta_author',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'meta_date',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'meta_comment_number',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'meta_categories',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'meta_tags',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);
	$wp_customize->add_setting(
		'meta_author_description',
		array(
			'default' => 'show',
			'sanitize_callback' => 'speculor_sanitize_select',
		)
	);

	// Footer Settings
	$wp_customize->add_setting(
		'footer_left',
		array(
			'default' => esc_html__( 'Speculor - WordPress theme made by <a href="https://twitter.com/prelc">Prelc</a>.', 'speculor' ),
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
			'default' => '#555555',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_setting(
		'footer_link_color',
		array(
			'default' => '#e44244',
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

	// Custom Code Settings
	$wp_customize->add_setting(
		'custom_css',
		array(
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);

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
		'navigation_search',
		array(
			'type' => 'select',
			'label' => __( 'Search Field', 'speculor' ),
			'section' => 'section_navigation',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
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
			'navigation_submenu_background_color',
			array(
				'label' => __( 'Submenu Background Color', 'speculor' ),
				'settings' => 'navigation_submenu_background_color',
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

	// Meta Controls
	$wp_customize->add_control(
		'meta_author_avatar',
		array(
			'type' => 'select',
			'label' => __( 'Meta Author Avatar', 'speculor' ),
			'section' => 'section_meta',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		'meta_author',
		array(
			'type' => 'select',
			'label' => __( 'Meta Author', 'speculor' ),
			'section' => 'section_meta',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		'meta_date',
		array(
			'type' => 'select',
			'label' => __( 'Meta Date', 'speculor' ),
			'section' => 'section_meta',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		'meta_comment_number',
		array(
			'type' => 'select',
			'label' => __( 'Meta Comment Number', 'speculor' ),
			'section' => 'section_meta',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		'meta_categories',
		array(
			'type' => 'select',
			'label' => __( 'Meta Categories', 'speculor' ),
			'section' => 'section_meta',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		'meta_tags',
		array(
			'type' => 'select',
			'label' => __( 'Meta Tags', 'speculor' ),
			'description' => __( 'Tags are at the bottom of the single page.', 'speculor' ),
			'section' => 'section_meta',
			'choices' => array(
				'show' => __( 'Show', 'speculor' ),
				'hide' => __( 'Hide', 'speculor' ),
			),
		)
	);
	$wp_customize->add_control(
		'meta_author_description',
		array(
			'type' => 'select',
			'label' => __( 'Meta Author Description', 'speculor' ),
			'description' => __( 'Description is at the bottom of the single page.', 'speculor' ),
			'section' => 'section_meta',
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
			'priority'    => 20,
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

	// Custom Code Controls
	$wp_customize->add_control( 'custom_css', array(
		'type'        => 'textarea',
		'label'       => __( 'Custom CSS', 'speculor' ),
		'section'     => 'section_custom_code',
	) );

}
add_action( 'customize_register', 'speculor_customizer' );


/**
 * Customizer Colors
**/

function customizer_colors() {

	?>

	<style>

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
