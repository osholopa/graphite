<?php
/**
 * Graphite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Graphite
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'graphite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function graphite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Graphite, use a find and replace
		 * to change 'graphite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'graphite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Mobile', 'graphite' ),
				'menu-2' => esc_html__( 'Desktop', 'graphite' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'graphite_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'graphite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function graphite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'graphite_content_width', 640 );
}
add_action( 'after_setup_theme', 'graphite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function graphite_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'graphite' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'graphite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'graphite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function graphite_scripts() {
	wp_enqueue_style( 'graphite-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'graphite-style', 'rtl', 'replace' );

	wp_enqueue_script( 'graphite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'graphite_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Customize appearance Options

function customSettings_customize_register( $wp_customize ) {
	//Custom settings
	$wp_customize->add_setting('header_color_1', array(
		'default' => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('header_color_2', array(
		'default' => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('text_color', array(
		'default' => '#333333',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('header_gradient_endpoint', array(
		'default' => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('navigation_link_color', array(
		'default' => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('mobile_nav_bg_color', array(
		'default' => '',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('link_color', array(
		'default' => '',
		'transport' => 'refresh',
	));


	//Custom controls

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color_control', array(
		'label' => __('Text Color', 'Graphite'),
		'section' => 'colors',
		'settings' => 'text_color'
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color_control1', array(
		'label' => __('Header Background Gradient Color 1', 'Graphite'),
		'section' => 'colors',
		'settings' => 'header_color_1'
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color_control2', array(
		'label' => __('Header Background Gradient Color 2', 'Graphite'),
		'section' => 'colors',
		'settings' => 'header_color_2'
	) ) );
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_gradient_control', array(
		'label' => __('Header Gradient Ending Point (%)', 'Graphite'),
		'section' => 'colors',
		'settings' => 'header_gradient_endpoint',
		'type' => 'number'
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_link_color_control', array(
		'label' => __('Navigation Link Color', 'Graphite'),
		'section' => 'colors',
		'settings' => 'navigation_link_color'
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_nav_bg_color_control', array(
		'label' => __('Mobile Navigation Background Color', 'Graphite'),
		'section' => 'colors',
		'settings' => 'mobile_nav_bg_color'
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_control', array(
		'label' => __('Link Color', 'Graphite'),
		'section' => 'colors',
		'settings' => 'link_color'
	) ) );
}

add_action('customize_register', 'customSettings_customize_register');

//Output Customized CSS
function customize_css() { ?>

<style type="text/css">

	body,
	button,
	input,
	select,
	optgroup,
	textarea {
		color: <?php echo get_theme_mod('text_color'); ?>;
	}

	/*Nav Bar Gradient*/
	:root {
		--main-nav-bg: linear-gradient(to bottom, <?php echo get_theme_mod('header_color_1'); ?> 0%,<?php echo get_theme_mod('header_color_2'); ?> <?php echo get_theme_mod('header_gradient_endpoint'); ?>%);
	}

	.trigger-menu-wrapper {
		background: var(--main-nav-bg);
	}

	.main-navigation ul ul {
		background: <?php echo get_theme_mod('header_color_2'); ?>;
		opacity: 90%;
	}

	/*Navigation Link Color*/
	.main-navigation a {
		color: <?php echo get_theme_mod('navigation_link_color'); ?>
	}
	/*Mobile navigation background color*/
	.page-header .menu {
		background-color: <?php echo get_theme_mod('mobile_nav_bg_color'); ?>
	}
	/*Link Color*/
	a {
		color: <?php echo get_theme_mod('link_color'); ?>
	}
</style>

<?php }

add_action('wp_head', 'customize_css');