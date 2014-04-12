<?php

class VTCRT_Backbone{   
	
	public function __construct(){
		  $this->vtcrt_register_post_types();
      $this->vtcrt_add_dummy_rule_category();
   //   add_filter( 'post_row_actions', array(&$this, 'vtcrt_remove_row_actions'), 10, 2 );
	}
  
  public function vtcrt_register_post_types() {
   global $vtcrt_info;
  
  $tax_labels = array(
		'name' => _x( 'Cart Deals Categories', 'taxonomy general name', 'vtcrt' ),
		'singular_name' => _x( 'Cart Deals Category', 'taxonomy singular name', 'vtcrt' ),
		'search_items' => __( 'Search Cart Deals Category', 'vtcrt' ),
		'all_items' => __( 'All Cart Deals Categories', 'vtcrt' ),
		'parent_item' => __( 'Cart Deals Category', 'vtcrt' ),
		'parent_item_colon' => __( 'Cart Deals Category:', 'vtcrt' ),
		'edit_item' => __( 'Edit Cart Deals Category', 'vtcrt' ),
		'update_item' => __( 'Update Cart Deals Category', 'vtcrt' ),
		'add_new_item' => __( 'Add New Cart Deals Category', 'vtcrt' ),
		'new_item_name' => __( 'New Cart Deals Category', 'vtcrt' )
  ); 	

  
  $tax_args = array(
    'hierarchical' => true,
		'labels' => $tax_labels,
		'show_ui' => true,
		'query_var' => false,
		'rewrite' => array( 'slug' => 'vtcrt_rule_category' )
  ) ;            

  $taxonomy_name =  'vtcrt_rule_category';
 
  
   //REGISTER TAXONOMY 
  	register_taxonomy($taxonomy_name, $vtcrt_info['applies_to_post_types'], $tax_args); 

  //this only works after the setup has been updated, and after a refresh...
  global $vtcrt_setup_options;
  $vtcrt_setup_options = get_option( 'vtcrt_setup_options' );
  if ( (isset( $vtcrt_setup_options['register_under_tools_menu'] ))  && 
       ($vtcrt_setup_options['register_under_tools_menu'] == 'yes') ) {       
      $this->vtcrt_register_under_tools_menu();
  } else {
      $this->vtcrt_register_in_main_menu();
  }  
 
	$role = get_role( 'administrator' );
	$role->add_cap( 'read_vtcrt-rule' );
}

  public function vtcrt_add_dummy_rule_category() {
      $category_list = get_terms( 'vtcrt_rule_category', 'hide_empty=0&parent=0' );
    	if ( count( $category_list ) == 0 ) {
    		wp_insert_term( __( 'Cart Deals Category', 'vtcrt' ), 'vtcrt_rule_category', "parent=0" );
      }
  }


  public function vtcrt_register_in_main_menu() {
      $post_labels = array(
				'name' => _x( 'Cart Deals Rules', 'post type name', 'vtcrt' ),
        'singular_name' => _x( 'Cart Deals Rule', 'post type singular name', 'vtcrt' ),
        'add_new' => _x( 'Add New', 'admin menu: add new Cart Deals Rule', 'vtcrt' ),
        'add_new_item' => __('Add New Cart Deals Rule', 'vtcrt' ),
        'edit_item' => __('Edit Cart Deals Rule', 'vtcrt' ),
        'new_item' => __('New Cart Deals Rule', 'vtcrt' ),
        'view_item' => __('View Cart Deals Rule', 'vtcrt' ),
        'search_items' => __('Search Cart Deals Rules', 'vtcrt' ),
        'not_found' =>  __('No Cart Deals Rules found', 'vtcrt' ),
        'not_found_in_trash' => __( 'No Cart Deals Rules found in Trash', 'vtcrt' ),
        'parent_item_colon' => '',
        'menu_name' => __( 'Cart Deals Rules', 'vtcrt' )
			);
    	register_post_type( 'vtcrt-rule', array(
    		  'capability_type' => 'post',
          'hierarchical' => true,
    		  'exclude_from_search' => true,
          'labels' => $post_labels,
    			'public' => true,
    			'show_ui' => true,
         // 'show_in_menu' => true,
          'query_var' => true,
          'rewrite' => false,     
          'supports' => array('title' )	 //remove 'revisions','editor' = no content/revisions boxes 
    		)
    	);
  }

  public function vtcrt_register_under_tools_menu() {
      $post_labels = array(
				'name' => _x( 'Cart Deals Rules', 'post type name', 'vtcrt' ),
        'singular_name' => _x( 'Cart Deals Rule', 'post type singular name', 'vtcrt' ),
        'add_new' => _x( 'Add New', 'vtcrt' ),
        'add_new_item' => __('Add New Cart Deals Rule', 'vtcrt' ),
        'edit' => __('Edit', 'vtcrt' ),
        'edit_item' => __('Edit Cart Deals Rule', 'vtcrt' ),
        'new_item' => __('New Cart Deals Rule', 'vtcrt' ),
        'view_item' => __('View Cart Deals Rule', 'vtcrt' ),
        'search_items' => __('Search Cart Deals Rules', 'vtcrt' ),
        'not_found' =>  __('No Cart Deals Rules found', 'vtcrt' ),
        'not_found_in_trash' => __( 'No Cart Deals Rules found in Trash', 'vtcrt' ),
        'parent_item_colon' => '',
        'menu_name' => __( 'Cart Deals Rules', 'vtcrt' )
			);
    	register_post_type( 'vtcrt-rule', array(
    		  'capability_type' => 'post',
          'hierarchical' => true,
    		  'exclude_from_search' => true,
          'labels' => $post_labels,
    			'public' => true,
    			'show_ui' => true,
	        "show_in_menu" => 'tools.php',
          'query_var' => true,
          'rewrite' => false,     
          'supports' => array('title' )	 //remove 'revisions','editor' = no content/revisions boxes 
    		)
    	);
  }  


function vtcrt_register_settings() {
    register_setting( 'vtcrt_options', 'vtcrt_rules' );
} 



} //end class
$vtcrt_backbone = new VTCRT_Backbone;
  
  
  
  class VTCRT_Functions {   
	
	public function __construct(){

	}
    
  function vtcrt_getSystemMemInfo() 
  {       
      /*  Throws errors...
      $data = explode("\n", file_get_contents("/proc/meminfo"));
      $meminfo = array();
      foreach ($data as $line) {
          list($key, $val) = explode(":", $line);
          $meminfo[$key] = trim($val);
      }
      */
      $meminfo = array();
      return $meminfo;
  }
  
  } //end class