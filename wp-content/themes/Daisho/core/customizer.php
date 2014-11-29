<?php
/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Override the default customizer styles.
 */
function flow_replace_customizer_styles() {

	global $wp_styles, $_wp_admin_css_colors;
	
	//$wp_styles->registered[ 'customize-controls' ]->src = get_template_directory_uri() . '/js/customizer.css';
	//$wp_styles->registered[ 'customize-controls' ]->ver = filemtime( get_template_directory_uri() . '/js/customizer.css' );
}
add_action( 'admin_init', 'flow_replace_customizer_styles' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'flow-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

function flowthemes_customize_register($wp_customize){
    
    $wp_customize->add_section('flowthemes_color_scheme', array(
        'title'    => __('Color Scheme', 'flowthemes'),
        'priority' => 120,
    ));
 
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('flowthemes_theme_options[text_test]', array(
        'default'        => 'Arse!',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('flowthemes_text_test', array(
        'label'      => __('Text Test', 'flowthemes'),
        'section'    => 'flowthemes_color_scheme',
        'settings'   => 'flowthemes_theme_options[text_test]',
    ));
 
    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('flowthemes_theme_options[color_scheme]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
 
    $wp_customize->add_control('flowthemes_color_scheme', array(
        'label'      => __('Color Scheme', 'flowthemes'),
        'section'    => 'flowthemes_color_scheme',
        'settings'   => 'flowthemes_theme_options[color_scheme]',
        'type'       => 'radio',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));
 
    //  =============================
    //  = Checkbox                  =
    //  =============================
    $wp_customize->add_setting('flowthemes_theme_options[checkbox_test]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('display_header_text', array(
        'settings' => 'flowthemes_theme_options[checkbox_test]',
        'label'    => __('Display Header Text'),
        'section'  => 'flowthemes_color_scheme',
        'type'     => 'checkbox',
    ));
 
 
    //  =============================
    //  = Select Box                =
    //  =============================
     $wp_customize->add_setting('flowthemes_theme_options[header_select]', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'flowthemes_theme_options[header_select]',
        'label'   => 'Select Something:',
        'section' => 'flowthemes_color_scheme',
        'type'    => 'select',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));
 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('flowthemes_theme_options[image_upload_test]', array(
        'default'           => 'image.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Image Upload Test', 'flowthemes'),
        'section'  => 'flowthemes_color_scheme',
        'settings' => 'flowthemes_theme_options[image_upload_test]',
    )));
 
    //  =============================
    //  = File Upload               =
    //  =============================
    $wp_customize->add_setting('flowthemes_theme_options[upload_test]', array(
        'default'           => 'arse',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
        'label'    => __('Upload Test', 'flowthemes'),
        'section'  => 'flowthemes_color_scheme',
        'settings' => 'flowthemes_theme_options[upload_test]',
    )));
 
 
    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('flowthemes_theme_options[link_color]', array(
        'default'           => '000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'flowthemes'),
        'section'  => 'flowthemes_color_scheme',
        'settings' => 'flowthemes_theme_options[link_color]',
    )));
 
 
    //  =============================
    //  = Page Dropdown             =
    //  =============================
    $wp_customize->add_setting('flowthemes_theme_options[page_test]', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('flowthemes_page_test', array(
        'label'      => __('Page Test', 'flowthemes'),
        'section'    => 'flowthemes_color_scheme',
        'type'    => 'dropdown-pages',
        'settings'   => 'flowthemes_theme_options[page_test]',
    ));
 
}
 
add_action('customize_register', 'flowthemes_customize_register');
