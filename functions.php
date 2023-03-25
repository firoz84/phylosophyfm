<?php
/**
 * filosophy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package filosophy
 */

 require_once(get_theme_file_path('/inc/tgm.php'));
 require_once(get_theme_file_path('/inc/attachments.php'));

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function filosophy_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on filosophy, use a find and replace
		* to change 'filosophy' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'filosophy', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'filosophy' ),
			'footer-left' => esc_html__( 'Footer Left', 'filosophy' ),
			'footer-middle' => esc_html__( 'Footer Middle', 'filosophy' ),
			'footer-right' => esc_html__( 'Footer Right', 'filosophy' ),
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
			'filosophy_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_image_size('phylosiphy_thumbnail', 400, 400, true);
	add_theme_support( "post-formats", array( "image", "gallery", "quote", "audio", "video", "link" ) );
    add_editor_style( "/assets/css/editor-style.css" );

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
			'height'      => 350,
			'width'       => 350,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'filosophy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function filosophy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'filosophy_content_width', 640 );
}
add_action( 'after_setup_theme', 'filosophy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function filosophy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'filosophy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'filosophy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'filosophy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function filosophy_scripts() {
	wp_enqueue_style( 'filosophy-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'filosophy-style', 'rtl', 'replace' );

	wp_enqueue_style( 'base', get_template_directory_uri() . '/assets/css/base.css', array(), _S_VERSION );
	wp_enqueue_style( 'vendor', get_template_directory_uri() . '/assets/css/vendor.css', array(), _S_VERSION );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array('jquery'),  _S_VERSION, true );
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/assets/js/pace.min.js',  array('jquery'),  _S_VERSION, true );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js',  array('jquery'),  _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js',  array('jquery'),  _S_VERSION, true );

	wp_enqueue_script( 'filosophy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'filosophy_scripts' );

/**
 * Implement the Custom Header feature.
 * 
 * 
 *    ================================================== -->
  

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function phylosophy_category(){
	echo '<P>Amer mon valo nai</P>' ;
}

add_action('phylosophy_cat_title', 'phylosophy_category');



// pagenation functions same design 
function the_phylosophy_pagination(){
	global $wp_query;
	$links= paginate_links(array(

		'current' => max(1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' =>'list'
		
	));
	$links=str_replace('page-numbers','pgn__num', $links);
	$links=str_replace("<ul class='pgn__num'>","<ul>", $links);
	$links=str_replace("next pgn__num","pgn__next", $links);
	$links=str_replace("prev pgn__num","pgn__prev", $links);

	  
	echo $links;
}

//register widget functions
function phylosophy_widgets(){
	register_sidebar( array(
        'name'          => __( 'About widgets', 'wpb' ),
        'id'            => 'about-widget',
        'before_widget' => '<div class="col-block">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Before footer widgets', 'phylosophy' ),
        'id'            => 'footer-widget',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 >',
        'after_title'   => '</h3>',
    ) );
	register_sidebar( array(
        'name'          => __( ' footer bottom widgets', 'phylosophy' ),
        'id'            => 'footer-bottom-widget',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 >',
        'after_title'   => '</h4>',
    ) );
	register_sidebar( array(
        'name'          => __( ' footer right bottom widgets', 'phylosophy' ),
        'id'            => 'footer-bottom-right-widget',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 >',
        'after_title'   => '</h4>',
    ) );
}

add_action('widgets_init', 'phylosophy_widgets');

//add p tag 

remove_action('term_description', 'wpautop');


// get the real design  for Search form
function physolophy_search($form){
	$homedir=home_url('/');
	$label=__('Search for : ', 'phylosophy');
	$bottom_value=__('Search : ', 'phylosophy');

	$newform = <<< FORM
		<form role="search" method="get" class="header__search-form" action="{$homedir}">
			<label>
				<span class="hide-content">{$label}</span>
				<input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
			</label>
			<input type="submit" class="search-submit" value="{$bottom_value}">
		</form>

	FORM;

	return $newform;

}
add_filter('get_search_form', 'physolophy_search');

