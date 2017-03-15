<?php
function load_post_types() { 
    register_post_type( 'slider', 
	 	// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Slider' ), /* This is the Title of the Group */
			'singular_name' => __( 'Slider' ), /* This is the individual type */
			'all_items' => __( 'Slider' ), /* the all items menu item */
			'add_new' => __( 'Add New' ), /* The add new menu item */
			'add_new_item' => __( 'Add New' ), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Slider' ), /* Edit Display Title */
			'new_item' => __( 'New Slider' ), /* New Display Title */
			'view_item' => __( 'View Slider' ), /* View Display Title */
			'search_items' => __( 'Search Slider' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Slider post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 18, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-slides', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'slider', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'slider-archive', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title',  'thumbnail')
	 	) /* end of options */
	); /* end of register post type */
	register_post_type( 'announcement', 
	 	// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Announcement' ), /* This is the Title of the Group */
			'singular_name' => __( 'Announcement' ), /* This is the individual type */
			'all_items' => __( 'Announcement' ), /* the all items menu item */
			'add_new' => __( 'Add New' ), /* The add new menu item */
			'add_new_item' => __( 'Add New' ), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Announcement' ), /* Edit Display Title */
			'new_item' => __( 'New Announcement' ), /* New Display Title */
			'view_item' => __( 'View Announcement' ), /* View Display Title */
			'search_items' => __( 'Search Announcement' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Announcement post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 19, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-megaphone', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'announcement', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'announcement-archive', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title','editor','thumbnail')
	 	) /* end of options */
	); /* end of register post type */
    	register_post_type( 'events', 
	 	// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Events' ), /* This is the Title of the Group */
			'singular_name' => __( 'Events' ), /* This is the individual type */
			'all_items' => __( 'Events' ), /* the all items menu item */
			'add_new' => __( 'Add New' ), /* The add new menu item */
			'add_new_item' => __( 'Add New' ), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Event' ), /* Edit Display Title */
			'new_item' => __( 'New Event' ), /* New Display Title */
			'view_item' => __( 'View Event' ), /* View Display Title */
			'search_items' => __( 'Search Event' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Event post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 20, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-calendar-alt', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'events', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'events-archive', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title','editor','thumbnail')
	 	) /* end of options */
	); /* end of register post type */
    register_post_type( 'cases', 
	 	// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Cases' ), /* This is the Title of the Group */
			'singular_name' => __( 'Cases' ), /* This is the individual type */
			'all_items' => __( 'Cases' ), /* the all items menu item */
			'add_new' => __( 'Add New' ), /* The add new menu item */
			'add_new_item' => __( 'Add New' ), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Case' ), /* Edit Display Title */
			'new_item' => __( 'New Case' ), /* New Display Title */
			'view_item' => __( 'View Case' ), /* View Display Title */
			'search_items' => __( 'Search Case' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Case post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 21, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-admin-post', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'cases', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'cases-archive', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title','editor','thumbnail')
	 	) /* end of options */
	); /* end of register post type */
} 
// adding the function to the Wordpress init
add_action( 'init', 'load_post_types');
?>
