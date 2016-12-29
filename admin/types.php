<?php 	
//--------------------------  P RO D U C T    P O S T   ------------------------------
	function product_post_type() {

		$labels = array(
			'name'                  => _x( 'Product', 'Post Type General Name', 'theme'),
			'singular_name'         => _x( 'Product', 'Post Type General Name', 'theme'),
			'menu_name'             => __( 'Product', 'Post Type General Name', 'theme'),
			'name_admin_bar'        => __( 'Post Type', 'theme' ),
			'parent_item_colon'     => __( 'Parent Item:', 'theme' ),
			'all_items'             => __( 'All Product', 'theme' ),
			'add_new_item'          => __( 'New Product', 'theme' ),
			'add_new'               => __( 'New Product', 'theme' ),
			'new_item'              => __( 'New Item', 'theme' ),
			'edit_item'             => __( 'Edit Item', 'theme' ),
			'update_item'           => __( 'Update Item', 'theme' ),
			'view_item'             => __( 'View Item', 'theme' ),
			'search_items'          => __( 'Search Item', 'theme' ),
			'not_found'             => __( 'Not found', 'theme' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'theme' ),
			'items_list'            => __( 'Items list', 'theme' ),
			'items_list_navigation' => __( 'Items list navigation', 'theme' ),
			'filter_items_list'     => __( 'Filter items list', 'theme' ),
		);
		$args = array(
			'label'                 => __( 'Product', 'theme' ),
			'description'           => __( 'Post Type Description', 'theme' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes'),
			'taxonomies'            => array('product_cat'),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'product ', $args );

	}
	add_action( 'init', 'product_post_type', 0 );


//----------------------  N E W  T A X O N O M Y   ---------------------------

	function product_taxonomies() {

		$labels = array(
			'name'                       => _x( 'Product Categories', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Product Categories', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Product Categories', 'text_domain' ),
			'all_items'                  => __( 'Product Categories', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'product_cat', array( 'product' ), $args );

	}
	add_action( 'init', 'product_taxonomies', 0 );	



