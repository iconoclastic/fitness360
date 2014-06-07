<?php 

// ------------------------------------ Nav Menu ------------------------------------

add_theme_support( 'menus' );
if (function_exists('register_nav_menus')) {
	$locations = array(
		'primary' => 'Primary Navigation'
	);
	register_nav_menus( $locations );
}

function nav_menu_item_parent_classing( $classes, $item )
{
    global $wpdb;
    
$has_children = $wpdb -> get_var( "SELECT COUNT(meta_id) FROM {$wpdb->prefix}postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'" );
    
    if ( $has_children > 0 )
    {
        array_push( $classes, "uk-parent" );
    }
    
    return $classes;
}

add_filter( "nav_menu_css_class", "nav_menu_item_parent_classing", 10, 2 );

class Child_Wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"uk-dropdown uk-dropdown-navbar\"><ul class=\"uk-nav uk-nav-navbar\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

// ------------------------------------ Featured Images ------------------------------------

if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails' );
}

if (function_exists('add_image_size')) {
	add_image_size( 'featured', 1200, 800, true );
	add_image_size( 'post-thumb', 222, 222, true );
}

// ------------------------------------ Custom Post Types ------------------------------------

function create_post_type() {
	$post_type_arguments_1 = array(
			'labels' => array(
					'name' => __('Testimonials'),
					'singular_name' => __('Testimonial')
				), 
			'description' => 'Custom post type for testimonials data entry',
			'public' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-groups',
			'supports' => array('title','editor', 'thumbnail'),
			'taxonomies' => array('post_tag'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'testimonials')
		);

	register_post_type( 'mwi_testimonislas', $post_type_arguments_1 );

}

add_action ('init', 'create_post_type');

// ------------------------------------ Adding Catagory Taxonomy to Page ------------------------------------

add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
    register_taxonomy( 'mwi_categories', 'page', array( 
    	'hierarchical' => true, 
    	'label' => 'Page Categories', 
    	'query_var' => true, 
    	'rewrite' => array('slug' => 'page-cat')
    	) 
    );
}

// ------------------------------------ Remove unwanted admin menu items ------------------------------------

function remove_admin_menu_items() {
  $remove_menu_items = array(__('Posts'),__('Links'), __('Comments'), __('Tools'), __('Custom Fields'));
  global $menu;
  end ($menu);
  while (prev($menu)){
    $item = explode(' ',$menu[key($menu)][0]);
    if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
      unset($menu[key($menu)]);}
    }
}

add_action('admin_menu', 'remove_admin_menu_items');

// ------------------------------------ Widgets ------------------------------------

if (function_exists(register_sidebar)) {
	register_sidebar( array(
		'name' => 'Logo Widget',
		'id' => 'the-logo',
		'description' => 'Please add the logo image markup here',
		'before_widget' => '',
		'after_widget' => ''
	));	

	register_sidebar( array(
		'name' => 'Top Menu Widgets',
		'id' => 'top-menu',
		'description' => 'Place menu widgets for top menu',
		'before_widget' => '',
		'after_widget' => ''
	));

	register_sidebar( array(
		'name' => 'Front-page Banner Widgets',
		'id' => 'front-banner',
		'description' => 'Please add the copy which will be displayed over the front page banner',
		'before_widget' => '',
		'after_widget' => ''
	));	

	register_sidebar( array(
		'name' => 'Front-page Class Widgets',
		'id' => 'front-class',
		'description' => 'Please add markup for links to classes in front page as widgets here',
		'before_widget' => '<div class="uk-width-medium-1-4"><div class="uk-panel uk-panel-box uk-panel-box-secondary">',
		'after_widget' => '</div></div>'
	));	

	register_sidebar( array(
		'name' => 'Front-page Personal Training Widgets',
		'id' => 'front-personal',
		'description' => 'Please add markup for links to personal trainings in front page as widgets here',
		'before_widget' => '<div class="uk-width-medium-1-2"><div class="uk-panel uk-panel-box uk-panel-box-secondary">',
		'after_widget' => '</div></div>'
	));		

	register_sidebar( array(
		'name' => 'Front-page Join Today  Widgets',
		'id' => 'front-ready',
		'description' => 'Please add Join Today section markup here for front page',
		'before_widget' => '',
		'after_widget' => ''
	));		

	register_sidebar( array(
		'name' => 'Footer Logo  Widget', 
		'id' => 'footer-logo',
		'description' => 'Please add Logo image here to show on footer.',
		'before_widget' => '',
		'after_widget' => ''
	));	

	register_sidebar( array(
		'name' => 'Footer Form  Widget',
		'id' => 'footer-form',
		'description' => 'Please add Form widget here to show on footer.',
		'before_widget' => '',
		'after_widget' => ''
	));		

	register_sidebar( array(
		'name' => 'Footer Widget',
		'id' => 'footer',
		'description' => 'Please add Footer widget here.',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>'
	));		

}

?>
