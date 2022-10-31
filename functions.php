<?php
/**
 * TravelBlog functions and definitions
 *
 * @package TravelBlog
 */

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );


/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Show New Layout
 */
add_filter( 'ot_show_new_layout', '__return_false' );


/**
 * Custom Theme Option page
 */
add_filter( 'ot_use_theme_options', '__return_true' );

/**
 * Meta Boxes
 */
add_filter( 'ot_meta_boxes', '__return_true' );

/**
 * Loads the meta boxes for post formats
 */
add_filter( 'ot_post_formats', '__return_true' );

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
load_template( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

/**
 * Meta Boxes
 */
load_template( trailingslashit( get_template_directory() ) . 'inc/meta-boxes.php' );



if ( ! function_exists( 'travelblog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function travelblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TravelBlog, use a find and replace
	 * to change 'travelblog' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'travelblog', get_template_directory() . '/languages' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(420, 400, true); //size of thumbs
	add_image_size('full-blog', 1260, 600, true);     
	add_image_size('full-content', 1260, 0, true); 
	add_image_size('grid-size', 760, 0, true);   
	add_image_size('sb-blog', 860, 420, true);    
	add_image_size('widget', 300, 200, true);     
	add_image_size('carousel', 720, 460, true);     
	add_image_size('widget', 80, 80, true); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'travelblog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'video',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'travelblog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // travelblog_setup
add_action( 'after_setup_theme', 'travelblog_setup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function travelblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'travelblog' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'id' => 'footer1',
		'name' => esc_html__('Footer 1st Column', 'travelblog' ),
		'description' => esc_html__('1st column for widgets in Footer', 'travelblog' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		));
	register_sidebar(array(
		'id' => 'footer2',
		'name' => esc_html__('Footer 2nd Column', 'travelblog' ),
		'description' => esc_html__('2nd column for widgets in Footer', 'travelblog' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		));
	register_sidebar(array(
		'id' => 'footer3',
		'name' => esc_html__('Footer 3rd Column', 'travelblog' ),
		'description' => esc_html__('3rd column for widgets in Footer', 'travelblog' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		));
	register_sidebar(array(
		'id' => 'footer4',
		'name' => esc_html__('Footer 4th Column', 'travelblog' ),
		'description' => esc_html__('4th column for widgets in Footer', 'travelblog' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		));
	if (ot_get_option('incr_sidebars')):
		$pp_sidebars = ot_get_option('incr_sidebars');
		foreach ($pp_sidebars as $pp_sidebar) {
			register_sidebar(array(
				'name' => $pp_sidebar["title"],
				'id' => $pp_sidebar["id"],
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
				));
		}
	endif;
}
add_action( 'widgets_init', 'travelblog_widgets_init' );




// Define our current version number using the stylesheet version
function my_wp_default_styles($styles) {
  $my_theme = wp_get_theme();
  $my_version = $my_theme->get('Version');
  $styles->default_version = $my_version;
}
add_action('wp_default_styles', 'my_wp_default_styles');




/**
 * Enqueue scripts and styles.
 */
function travelblog_scripts() {
	//wp_enqueue_style( 'travelblog-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css');
	wp_enqueue_style( 'travelblog-styles', get_template_directory_uri() . '/styles.css' );

	wp_enqueue_script( 'travelblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );
	wp_enqueue_script( 'travelblog-jpanelmenu', get_template_directory_uri() . '/js/jquery.jpanelmenu.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-easing', get_template_directory_uri() . '/js/jquery.easing-1.3.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-royalslider', get_template_directory_uri() . '/js/jquery.royalslider.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-photogrid', get_template_directory_uri() . '/js/jquery.photogrid.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-view', get_template_directory_uri() . '/js/view.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-tooltips', get_template_directory_uri() . '/js/jquery.tooltips.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'travelblog-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$mapoptions = get_option( 'travellerpress_globalMapSettings' );
	$map_el_style = (isset($mapoptions['map_el_style'])) ? $mapoptions['map_el_style'] : 'default' ;
	$styles = get_option( 'travellerpress_settings' );
	if( $map_el_style != "default" ) {
		$mapstyle = $styles[$map_el_style]; } else { $mapstyle = '';
	}
	//$maptype = (isset($mapoptions['map_el_type'])) ? $mapoptions['map_el_type'] : 'ROADMAP' ;

	wp_localize_script( 'travelblog-custom', 'wpv',
    array(
      'logo'=> ot_get_option('pp_logo_upload'),
      'mobilelogo'=> ot_get_option('pp_mobilelogo_upload'),
      'maptype'=> (isset($mapoptions['map_el_type'])) ? $mapoptions['map_el_type'] : 'ROADMAP' ,
      'mapzoom'=> (isset($mapoptions['map_el_zoom'])) ? $mapoptions['map_el_zoom'] : 'auto' ,
      'mapstyle'=> $mapstyle,
    )
  );

}
add_action( 'wp_enqueue_scripts', 'travelblog_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load shortcodes.
 */
require get_template_directory() . '/inc/ptshortcodes.php';

/**
 * Load TGMPA.
 */
require get_template_directory() . '/inc/tgmpa.php';

/**
 * Load slider.
 */
require_once( 'inc/cpslider/init.php'); // WPV slider
$cpslider = new CP_Slider();


add_filter( 'widget_text', 'do_shortcode' );