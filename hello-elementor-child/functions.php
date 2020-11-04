<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $hello_child_theme_version;
$hello_child_theme_version = '0.'.rand(1,999);
// $hello_child_theme_version = wp_get_theme()->get('Version');

// Theme Scripts & Styles

function hello_child_enqueue_styles() {
  global $hello_child_theme_version;
  wp_enqueue_style( 'elementor-hello-theme-style', get_template_directory_uri() . '/style.css' , array() , $hello_child_theme_version );   
  wp_enqueue_style( 'hello-child',
      get_stylesheet_directory_uri() . '/style.css',
      array( 'elementor-hello-theme-style' ),
      $hello_child_theme_version
  );
}
add_action( 'wp_enqueue_scripts', 'hello_child_enqueue_styles' );

function hello_child_scripts_styles() {
  global $hello_child_theme_version;
  wp_enqueue_script( 'hello-child',  get_stylesheet_directory_uri() . '/hello-child.js', array( 'jquery' ), $hello_child_theme_version);
}
add_action( 'wp_enqueue_scripts', 'hello_child_scripts_styles');

function bz_theme_setup() {

  // require_once(get_template_directory() . '/inc/acf.php');
  load_theme_textdomain( 'liat', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'bz_theme_setup' );

//////////////////////////////////
///////  Custom Post Type  ///////
//////////////////////////////////

// if ( ! function_exists('bzb_event') ) {

// function bzb_event() {

// 	$labels = array(
// 		'name'                => _x( 'אירוע', 'אירועים', 'bzb' ),
// 		'singular_name'       => _x( 'אירוע', 'אירוע', 'bzb' ),
// 		'menu_name'           => __( 'אירועים', 'bzb' ),
// 		'name_admin_bar'      => __( 'אירועים', 'bzb' ),
// 		'parent_item_colon'   => __( 'Parent Item:', 'bzb' ),
// 		'all_items'           => __( 'כל האירועים', 'bzb' ),
// 		'add_new_item'        => __( 'הוסף אירוע חדש', 'bzb' ),
// 		'add_new'             => __( 'הוסף חדש', 'bzb' ),
// 		'new_item'            => __( 'אירוע חדש', 'bzb' ),
// 		'edit_item'           => __( 'ערוך אירוע', 'bzb' ),
// 		'update_item'         => __( 'עדכן אירוע', 'bzb' ),
// 		'view_item'           => __( 'צפה באירוע', 'bzb' ),
// 		'search_items'        => __( 'חפש אירוע', 'bzb' ),
// 		'not_found'           => __( 'לא נמצא', 'bzb' ),
// 		'not_found_in_trash'  => __( 'לא נמצא באשפה', 'bzb' ),
// 	);
// 	$args = array(
// 		'label'               => __( 'bzb_event', 'bzb' ),
// 		'description'         => __( 'Events for posts and home-page', 'bzb' ),
// 		'labels'              => $labels,
// 		'supports'            => array( 'title', 'editor', 'thumbnail'),
// 		'taxonomies'          => array( 'category', 'post_tag' ),
// 		'hierarchical'        => false,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'menu_position'       => 5,
// 		'show_in_admin_bar'   => true,
// 		'show_in_nav_menus'   => false,
// 		'can_export'          => true,
// 		'has_archive'         => 'bzb_event',
// 		'exclude_from_search' => false,
// 		'publicly_queryable'  => true,
// 		'map_meta_cap'    => true,		
// 		'capability_type'    => 'event',
// 	);
// 	register_post_type( 'bzb_event', $args );

// }
// add_action( 'init', 'bzb_event', 0 );

// }

///////////////////////////////////////////////
///////          custom taxonomy         //////
///////////////////////////////////////////////

// function place() {

// 	$labels = array(
// 		'name'                       => _x( 'ישובים', 'Taxonomy General Name', 'liat' ),
// 		'singular_name'              => _x( 'ישוב', 'Taxonomy Singular Name', 'liat' ),
// 		'menu_name'                  => __( 'ישובים', 'liat' ),
// 		'all_items'                  => __( 'כל הישובים', 'liat' ),
// 		'parent_item'                => __( 'Parent Item', 'liat' ),
// 		'parent_item_colon'          => __( 'Parent Item:', 'liat' ),
// 		'new_item_name'              => __( 'ישוב חדש', 'liat' ),
// 		'add_new_item'               => __( 'הוסף ישוב', 'liat' ),
// 		'edit_item'                  => __( 'ערוך ישוב', 'liat' ),
// 		'update_item'                => __( 'עדכן ישוב', 'liat' ),
// 		'view_item'                  => __( 'צפה בישוב', 'liat' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'liat' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'liat' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'liat' ),
// 		'popular_items'              => __( 'Popular Items', 'liat' ),
// 		'search_items'               => __( 'חפש ישובים', 'liat' ),
// 		'not_found'                  => __( 'לא נמצא', 'liat' ),
// 	);
// 	$capabilities = array(
// 		'manage_terms'               => 'manage_categories',
// 		'edit_terms'                 => 'manage_categories',
// 		'delete_terms'               => 'manage_categories',
// 		'assign_terms'               => 'edit_posts',
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => false,
// 		'show_tagcloud'              => true,
// 		'capabilities'               => $capabilities,
// 	);
// 	register_taxonomy( 'ישוב', array( 'bzb_event', 'business','promotion'), $args );

// }
// add_action( 'init', 'place', 0 );


///////////////////////////////////
///       ACF options page      ///
///////////////////////////////////

function bz_register_acf_options_pages() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;    

    acf_add_options_page(array(
        'page_title'  => __('עריכת אתר' , 'liat'),
        'menu_title'  => __('עריכת אתר' , 'liat'),
        'menu_slug'  => 'page-settings',
        'capability'    => 'manage_options',
        'position'      => 4
    ));    
}
add_action('acf/init', 'bz_register_acf_options_pages',1);

///////////////////////////////////////////////
///////               Tweaks             //////
///////////////////////////////////////////////


// Add page slug to body class

function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

add_filter('body_class', 'add_slug_to_body_class');


// disable guttenberg

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// set preview for links

function bz_link_img() {
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'medium' );
  if (!is_array($image)) return false;
  $logo_url = $image[0];
  if (!$logo_url && function_exists('get_field')) $logo_url = get_field('bz_logo' , 'option');
  ?>
  <meta property="og:site_name" content="<?php echo get_bloginfo( 'name' ); ?>">
  <meta property="og:title" content="<?php echo get_bloginfo( 'name' ); ?>" />
  <meta property="og:description" content="-- לקביעת תור --" />
  <meta property="og:image" itemprop="image" content="<?php echo $logo_url ?>">
  <meta property="og:type" content="website" />
  <?php

}
// add_action( 'wp_head', 'bz_link_img' ); 


// menu shortcodes


function bz_hamburger() {
    ob_start();
    get_template_part( 'template-parts/hamburger' , 'hamburder');
    return ob_get_clean();
}
add_shortcode( 'bz_hamburger', 'bz_hamburger' );

function bz_acf_init() {
    
    acf_update_setting('google_api_key', 'AIzaSyDpI7y7cjMb76rZCvmKcG_HghgESQVoj_s');
}

add_action('acf/init', 'bz_acf_init');


add_filter('use_block_editor_for_post', '__return_false');
