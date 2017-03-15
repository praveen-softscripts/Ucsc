<?php
/**
 * theme functions and definitions
 *
 * */
// we're firing all out initial functions at the start
add_action('after_setup_theme','theme_init', 16);

function theme_init() {
    // launching operation cleanup
    add_action('init', 'theme_head_cleanup');
    // remove WP version from RSS
    add_filter('the_generator', 'theme_rss_version');
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'theme_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action('wp_head', 'theme_remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter('gallery_style', 'theme_gallery_style');

    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'theme_scripts_and_styles', 999);
    // ie conditional wrapper

    // launching this stuff after theme setup
    theme_theme_support();

    // adding sidebars to Wordpress (these are created in functions.php)
    add_action( 'widgets_init', 'theme_register_sidebars' );
    // adding the theme search form (created in functions.php)
    add_filter( 'get_search_form', 'theme_wpsearch' );

    // cleaning up random code around images
    add_filter('the_content', 'theme_filter_ptags_on_images');

} /* end theme ahoy */

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function theme_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
  // remove WP version from css
  add_filter( 'style_loader_src', 'theme_remove_wp_ver_css_js', 9999 );
  // remove Wp version from scripts
  add_filter( 'script_loader_src', 'theme_remove_wp_ver_css_js', 9999 );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

} /* end theme head cleanup */

// remove WP version from RSS
function theme_rss_version() { return ''; }

// remove WP version from scripts
function theme_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function theme_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function theme_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function theme_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function theme_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  if (!is_admin()) {

    // modernizr (without media query polyfill)
    wp_register_style( 'theme-slickcss', get_stylesheet_directory_uri() . '/css/slick-theme.css', array(), '', 'all' );  
    wp_register_style( 'theme-fancybox-css', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css', array(), '', 'all' ); 
    wp_register_style( 'theme-slick-themecss', get_stylesheet_directory_uri() . '/css/slick.css', array(), '', 'all' ); 
    wp_register_style( 'theme-custom-css', get_stylesheet_directory_uri() . '/custom.css', array(), '', 'all' );  
    wp_register_style( 'theme-main-css', get_stylesheet_directory_uri() . '/main.css', array(), '', 'all' );    
    wp_register_style( 'theme-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
      //custom css
	// comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    //adding scripts file in the footer
	  wp_register_script( 'theme-matchHeight-js', get_stylesheet_directory_uri() . '/js/jquery.matchHeight.js', array( 'jquery' ), '', true );
       wp_register_script( 'theme-slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '', true );
      wp_register_script( 'theme-fancyboxjs', get_stylesheet_directory_uri() . '/js/jquery.fancybox.js', array( 'jquery' ), '', true ); 
	  wp_register_script( 'theme-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );
      $theme_array = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'path' => get_template_directory_uri() );
	   wp_localize_script( 'theme-js', 'Theme', $theme_array );
      
    // enqueue styles and scripts
    wp_enqueue_style( 'theme-slickcss' );
    wp_enqueue_style( 'theme-slick-themecss' );  
    wp_enqueue_style( 'theme-fancybox-css' );      
	wp_enqueue_style( 'theme-stylesheet' );
    wp_enqueue_style( 'theme-custom-css' );    
    wp_enqueue_style( 'theme-main-css' );      
//	
	/*
    I recommend using a plugin to call jQuery
    using the google cdn. That way it stays cached
    and your site will load faster.
    */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'theme-matchHeight-js' );      
    wp_enqueue_script( 'theme-slickjs' ); 
    wp_enqueue_script( 'theme-fancyboxjs' );   
	wp_enqueue_script( 'theme-js' );
	$theme_array = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'path' => get_template_directory_uri() );
	wp_localize_script( 'theme-js', 'Theme', $theme_array );

  }
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function theme_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support('post-thumbnails');

	// default thumb size
	set_post_thumbnail_size(150, 150, true);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// wp menus
	add_theme_support( 'menus' );

	
} /* end theme theme support */


/*********************
MENUS & NAVIGATION
*********************/
// registering wp3+ menus
	register_nav_menus(
		array(
            'main-nav' => __( 'The Menu Menu' ),   
            'about-nav' => __( 'The About page Menu' ),   
            'ethic-nav' => __( 'The Ethic Menu' ), 
            'responsive-nav' => __( 'The responsive Menu' )
		)
	);
function theme_main_nav() {
	// display the wp3 menu if available
     wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'ucsc' ),  // nav name
    	'menu_class' => 'panel header-menu',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'depth' => 0,
         'walker' => new WPDocs_Walker_Nav_Menu()
	));
} /* end theme main nav */

function theme_about_nav() {
	// display the wp3 menu if available
     wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu',           // class of container (should you choose to use it)
    	'menu' => __( 'The ABout Menu', 'ucsc' ),  // nav name
    	'menu_class' => 'panel about-menu',         // adding custom nav class
    	'theme_location' => 'about-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'depth' => 0,
	));
} /* end theme About nav */

function theme_ethic_nav() {
	// display the wp3 menu if available
     wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu',           // class of container (should you choose to use it)
    	'menu' => __( 'The Ethic Menu', 'ucsc' ),  // nav name
    	'menu_class' => 'panel ethic-menu',         // adding custom nav class
    	'theme_location' => 'ethic-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'depth' => 0,
	));
} /* end theme Ethic nav */

function theme_responsive_nav() {
	// display the wp3 menu if available
     wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => 'res-menu',           // class of container (should you choose to use it)
    	'menu' => __( 'The Ethic Menu', 'ucsc' ),  // nav name
    	'menu_class' => 'panel responsive-menu',         // adding custom nav class
    	'theme_location' => 'responsive-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'depth' => 0,
	));
} /* end theme main nav */


/**
 * Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    
    function start_lvl( &$output, $depth = 0, $args = array() ) {
 
        // Build HTML for output.
        if( 0 == $depth ){
           $output .= "\n" . $indent . '<div class="mega-menu-block"><div class="large container"><ul class="main-sub-menu">' . "\n"; 
        }
        else{
           $output .= "\n" . $indent . '<ul class="sub-menu"><div class="sub-menu-inner">' . "\n";  
        }
        
    }
 
    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
 
        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
 
        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
 
        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
 
        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s<span>%4$s</span>%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/************* THUMBNAIL SIZE OPTIONS *************/
add_image_size( 'img180x180', 180, 180, true );
add_image_size( 'img160x160', 160, 160, true );
add_image_size( 'img248x218', 248, 218, true );
add_image_size( 'img384x226', 384, 226, true );
add_image_size( 'img52x31', 52, 31, true );
add_image_size( 'img178x112', 178, 112, true );
add_image_size( 'img279x279', 279, 279, true );

/************* HIDE ADMIN BAR *************/
show_admin_bar(false);

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function theme_register_sidebars() {	

	register_sidebar(array(
	'id' => 'general-footer',
	'name' => __('General Footer'),
		'description' => __('The general footer.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
    
   

} // don't remove this bracket!

// Search Form
				
function theme_wpsearch() {
	$form = '<form role="search" method="get" id="searchform" class="site-search-form" action="' . home_url( '/' ) . '" >
	          <input id="search" class="search-input" type="text" name="s" value="' . get_search_query() . '" >
              <input type="submit" name="submit" value="submit" />
          </form>';                                                                                                                      return $form;
} // don't remove this bracket!

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function theme_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
/***** Admin Login Page *****/
function theme_login_css() {
	wp_enqueue_style( 'theme_login_css', get_template_directory_uri() . '/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function theme_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function theme_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action('login_enqueue_scripts', 'theme_login_css', 10 );
add_filter('login_headerurl', 'theme_login_url');
add_filter('login_headertitle', 'theme_login_title');

/************* INCLUDE NEEDED FILES ***************/
//Theme Options
require_once('theme-options.php' ); // you can disable this if you like

//Custom Post Types
require_once('post-types.php' ); // you can disable this if you like

/********* Theme Options ********/
function themeOptions($key) {
	$options = get_option( 'ucsc_theme_options' ); 
	return $options[$key];
}

function the_logo() {
	$logo = esc_url( themeOptions( 'logo' ) );
	if(empty($logo)) {
		$logo = get_bloginfo('template_url').'/images/logo.png';
	}
	echo '<img src="'.$logo.'" border="0" alt="logo" />';
}

add_action( 'wp_ajax_force_download', 'force_download' );
add_action( 'wp_ajax_nopriv_force_download', 'force_download' );
function force_download(){
    $files = $_REQUEST['file'];
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($files).'"'); 
    header('Content-Length: ' . filesize($files));
    readfile($files);
}
?>