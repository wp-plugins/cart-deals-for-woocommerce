<?php
/*
Plugin Name: VarkTech Cart Deals for WooCommerce
Plugin URI: http://varktech.com
Description: An e-commerce add-on for WooCommerce, supplying Cart Deals functionality.
Version: 1.0.1
Author: Vark
Author URI: http://varktech.com
*/

/*  ******************* *******************
=====================
ASK YOUR HOST TO TURN OFF magic_quotes_gpc !!!!!
=====================
******************* ******************* */


/*
** define Globals 
*/
   $vtcrt_info;  //initialized in VTCRT_Parent_Definitions
   $vtcrt_rules_set;
   $vtcrt_rule;
   $vtcrt_cart;
   $vtcrt_cart_item;
   $vtcrt_setup_options;
   
   $vtcrt_rule_display_framework;
   $vtcrt_rule_type_framework; 
   $vtcrt_deal_structure_framework;
   $vtcrt_deal_screen_framework;
   $vtcrt_deal_edits_framework;
   $vtcrt_template_structures_framework;

     
class VTCRT_Controller{
	
	public function __construct(){    
 
    if(!isset($_SESSION)){
      session_start();
      header("Cache-Control: no-cache");
      header("Pragma: no-cache");
    } 
    
		define('VTCRT_VERSION',                               '1.0.1');
    define('VTCRT_MINIMUM_PRO_VERSION',                   '1.0.1');
    define('VTCRT_LAST_UPDATE_DATE',                      '2014-04-14');
    define('VTCRT_DIRNAME',                               ( dirname( __FILE__ ) ));
    define('VTCRT_URL',                                   plugins_url( '', __FILE__ ) );
    define('VTCRT_EARLIEST_ALLOWED_WP_VERSION',           '3.3');   //To pick up wp_get_object_terms fix, which is required for vtcrt-parent-functions.php
    define('VTCRT_EARLIEST_ALLOWED_PHP_VERSION',          '5');
    define('VTCRT_PLUGIN_SLUG',                           plugin_basename(__FILE__));
   
    require_once ( VTCRT_DIRNAME . '/woo-integration/vtcrt-parent-definitions.php');
            
    // overhead stuff
    add_action('init', array( &$this, 'vtcrt_controller_init' ));
        
    /*  =============+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    //  these control the rules ui, add/save/trash/modify/delete
    /*  =============+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    
    /*  =============+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    //  One of these will pick up the NEW post, both the Rule custom post, and the PRODUCT
    //    picks up ONLY the 1st publish, save_post works thereafter...   
    //      (could possibly conflate all the publish/save actions (4) into the publish_post action...)
    /*  =============+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */    
    add_action( 'draft_to_publish',       array( &$this, 'vtcrt_admin_update_rule_cntl' )); 
    add_action( 'auto-draft_to_publish',  array( &$this, 'vtcrt_admin_update_rule_cntl' ));
    add_action( 'new_to_publish',         array( &$this, 'vtcrt_admin_update_rule_cntl' )); 			
    add_action( 'pending_to_publish',     array( &$this, 'vtcrt_admin_update_rule_cntl' ));
    
    //standard mod/del/trash/untrash
    add_action('save_post',     array( &$this, 'vtcrt_admin_update_rule_cntl' ));
    add_action('delete_post',   array( &$this, 'vtcrt_admin_delete_rule' ));    
    add_action('trash_post',    array( &$this, 'vtcrt_admin_trash_rule' ));
    add_action('untrash_post',  array( &$this, 'vtcrt_admin_untrash_rule' ));
    /*  =============+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    
    //get rid of bulk actions on the edit list screen, which aren't compatible with this plugin's actions...
    add_action('bulk_actions-edit-vtcrt-rule', array($this, 'vtcrt_custom_bulk_actions') ); 

	}   //end constructor

  	                                                             
 /* ************************************************
 **   Overhead and Init
 *************************************************** */
	public function vtcrt_controller_init(){
    global $vtcrt_setup_options;

    //$product->get_rating_count() odd error at checkout... woocommerce/templates/single-product-reviews.php on line 20  
    //  (Fatal error: Call to a member function get_rating_count() on a non-object)
    global $product;

    //Split off for AJAX add-to-cart, etc for Class resources.  Loads for is_Admin and true INIT loads are kept here.
    //require_once ( VTCRT_DIRNAME . '/core/vtcrt-load-execution-resources.php' );
    
    load_plugin_textdomain( 'vtcrt', null, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 

    require_once  ( VTCRT_DIRNAME . '/core/vtcrt-backbone.php' );    
    require_once  ( VTCRT_DIRNAME . '/core/vtcrt-rules-classes.php');
    require_once  ( VTCRT_DIRNAME . '/admin/vtcrt-rules-ui-framework.php' );
    require_once  ( VTCRT_DIRNAME . '/woo-integration/vtcrt-parent-functions.php');
    require_once  ( VTCRT_DIRNAME . '/woo-integration/vtcrt-parent-theme-functions.php');
    require_once  ( VTCRT_DIRNAME . '/woo-integration/vtcrt-parent-cart-validation.php');   
    require_once  ( VTCRT_DIRNAME . '/woo-integration/vtcrt-parent-definitions.php');
    require_once  ( VTCRT_DIRNAME . '/core/vtcrt-cart-classes.php');
    
    //************
    //changed for AJAX add-to-cart, removed the is_admin around these resources => didn't work, for whatever reason...
    if(defined('VTCRT_PRO_DIRNAME')) {
      require_once  ( VTCRT_PRO_DIRNAME . '/core/vtcrt-apply-rules.php' );
      require_once  ( VTCRT_PRO_DIRNAME . '/woo-integration/vtcrt-lifetime-functions.php' );          
    } else {
      require_once  ( VTCRT_DIRNAME .     '/core/vtcrt-apply-rules.php' );
    }

    $vtcrt_setup_options = get_option( 'vtcrt_setup_options' );  //put the setup_options into the global namespace 
 
    //************
            
    /*  **********************************
        Set GMT time zone for Store 
    Since Web Host can be on a different
    continent, with a different *Day* and Time,
    than the actual store.  Needed for Begin/end date processing
    **********************************  */
    vtcrt_set_selected_timezone();
        
    if (is_admin()){ 
        add_filter( 'plugin_action_links_' . VTCRT_PLUGIN_SLUG , array( $this, 'vtcrt_custom_action_links' ) );
        require_once ( VTCRT_DIRNAME . '/admin/vtcrt-setup-options.php');
        require_once ( VTCRT_DIRNAME . '/admin/vtcrt-rules-ui.php' );
           
        if(defined('VTCRT_PRO_DIRNAME')) {         
          require_once ( VTCRT_PRO_DIRNAME . '/admin/vtcrt-rules-update.php'); 
          require_once ( VTCRT_PRO_DIRNAME . '/woo-integration/vtcrt-lifetime-functions.php' );           
        } else {
          require_once ( VTCRT_DIRNAME .     '/admin/vtcrt-rules-update.php');
        }
        
        require_once ( VTCRT_DIRNAME . '/admin/vtcrt-show-help-functions.php');
        require_once ( VTCRT_DIRNAME . '/admin/vtcrt-checkbox-classes.php');
        require_once ( VTCRT_DIRNAME . '/admin/vtcrt-rules-delete.php');
        
        $this->vtcrt_admin_init();
            
        //always check if the manually created coupon codes are there - if not create them.
        vtcrt_woo_maybe_create_coupon_types();   
 
     
    } else {

        add_action( "wp_enqueue_scripts", array(&$this, 'vtcrt_enqueue_frontend_scripts'), 1 );    //priority 1 to run 1st, so front-end-css can be overridden by another file with a dependancy

    }

    if (is_admin()){ 
      /*
      //LIFETIME logid cleanup...
      //  LogID logic from wpsc-admin/init.php
      if(defined('VTCRT_PRO_DIRNAME')) {
        switch( true ) {
          case ( isset( $_REQUEST['wpsc_admin_action2'] ) && ($_REQUEST['wpsc_admin_action2'] == 'purchlog_bulk_modify') )  :
                 vtcrt_maybe_lifetime_log_bulk_modify();
             break; 
          case ( isset( $_REQUEST['wpsc_admin_action'] ) && ($_REQUEST['wpsc_admin_action'] == 'delete_purchlog') ) :
                 vtcrt_maybe_lifetime_log_roll_out_cntl();
             break;                                             
        } 
          
        if (version_compare(VTCRT_PRO_VERSION, VTCRT_MINIMUM_PRO_VERSION) < 0) {    //'<0' = 1st value is lower  
          add_action( 'admin_notices',array(&$this, 'vtcrt_admin_notice_version_mismatch') );            
        }          
      }
      
      //****************************************
      //INSIST that coupons be enabled in woo, in order for this plugin to work!!
      //****************************************
      $coupons_enabled = get_option( 'woocommerce_enable_coupons' ) == 'no' ? false : true;
      if (!$coupons_enabled) {  
        add_action( 'admin_notices',array(&$this, 'vtcrt_admin_notice_coupon_enable_required') );            
      }  
      */   
         
    }

    return; 
  }

  public function vtcrt_enqueue_frontend_scripts(){
    global $vtcrt_setup_options;
        
    wp_enqueue_script('jquery'); //needed universally
    
    if ( $vtcrt_setup_options['use_plugin_front_end_css'] == 'yes' ){
      wp_register_style( 'vtcrt-front-end-style', VTCRT_URL.'/core/css/vtcrt-front-end-min.css'  );   //every theme MUST have a style.css...  
      //wp_register_style( 'vtcrt-front-end-style', VTCRT_URL.'/core/css/vtcrt-front-end-min.css', array('style.css')  );   //every theme MUST have a style.css...      
      wp_enqueue_style('vtcrt-front-end-style');
    }
    
    return;
  
  }  

         
  /* ************************************************
  **   Admin - Remove bulk actions on edit list screen, actions don't work the same way as onesies...
  ***************************************************/ 
  function vtcrt_custom_bulk_actions($actions){
    
    ?> 
    <style type="text/css"> #delete_all {display:none;} /*kill the 'empty trash' buttons, for the same reason*/ </style>
    <?php
    
    unset( $actions['edit'] );
    unset( $actions['trash'] );
    unset( $actions['untrash'] );
    unset( $actions['delete'] );
    return $actions;
  }
    
  /* ************************************************
  **   Admin - Show Rule UI Screen
  *************************************************** 
  *  This function is executed whenever the add/modify screen is presented
  *  WP also executes it ++right after the update function, prior to the screen being sent back to the user.   
  */  
	public function vtcrt_admin_init(){
     if ( !current_user_can( 'edit_posts', 'vtcrt-rule' ) )
          return;

     $vtcrt_rules_ui = new VTCRT_Rules_UI;      
  }

  /* ************************************************
  **   Admin - Publish/Update Rule or Parent Plugin CPT 
  *************************************************** */
	public function vtcrt_admin_update_rule_cntl(){
      global $post, $vtcrt_info;    
      switch( $post->post_type ) {
        case 'vtcrt-rule':
            $this->vtcrt_admin_update_rule();  
          break; 
        case $vtcrt_info['parent_plugin_cpt']: //this is the update from the PRODUCT screen, and updates the include/exclude lists
            $this->vtcrt_admin_update_product_meta_info();
          break;
      }  
      return;
  }
  
  
  /* ************************************************
  **   Admin - Publish/Update Rule 
  *************************************************** */
	public function vtcrt_admin_update_rule(){
    /* *****************************************************************
         The delete/trash/untrash actions *will sometimes fire save_post*
         and there is a case structure in the save_post function to handle this.
    
          the delete/trash actions are sometimes fired twice, 
               so this can be handled by checking 'did_action'
               
          'publish' action flows through to the bottom     
     ***************************************************************** */
      
      global $post, $vtcrt_rules_set;
      if ( !( 'vtcrt-rule' == $post->post_type )) {
        return;
      }  
      if (( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
            return; 
      }
     if (isset($_REQUEST['vtcrt_nonce']) ) {     //nonce created in vtcrt-rules-ui.php  
          $nonce = $_REQUEST['vtcrt_nonce'];
          if(!wp_verify_nonce($nonce, 'vtcrt-rule-nonce')) { 
            return;
          }
      } 
      if ( !current_user_can( 'edit_posts', 'vtcrt-rule' ) ) {
          return;
      }

      
      /* ******************************************
       The 'SAVE_POST' action is fired at odd times during updating.
       When it's fired early, there's no post data available.
       So checking for a blank post id is an effective solution.
      *************************************************** */      
      if ( !( $post->ID > ' ' ) ) { //a blank post id means no data to proces....
        return;
      } 
      //AND if we're here via an action other than a true save, do the action and exit stage left
      $action_type = $_REQUEST['action'];
      if ( in_array($action_type, array('trash', 'untrash', 'delete') ) ) {
        switch( $action_type ) {
            case 'trash':
                $this->vtcrt_admin_trash_rule();  
              break; 
            case 'untrash':
                $this->vtcrt_admin_untrash_rule();
              break;
            case 'delete':
                $this->vtcrt_admin_delete_rule();  
              break;
        }
        return;
      }
      // lets through  $action_type == editpost                
      $vtcrt_rule_update = new VTCRT_Rule_update;
  }
   
  
 /* ************************************************
 **   Admin - Delete Rule
 *************************************************** */
	public function vtcrt_admin_delete_rule(){
     global $post, $vtcrt_rules_set; 
     if ( !( 'vtcrt-rule' == $post->post_type ) ) {
      return;
     }        

     if ( !current_user_can( 'delete_posts', 'vtcrt-rule' ) )  {
          return;
     }
    
    $vtcrt_rule_delete = new VTCRT_Rule_delete;            
    $vtcrt_rule_delete->vtcrt_delete_rule();
        
    /* NO!! - the purchase history STAYS!
    if(defined('VTCRT_PRO_DIRNAME')) {
      vtcrt_delete_lifetime_rule_info();
    }   
     */
  }
  
  
  /* ************************************************
  **   Admin - Trash Rule
  *************************************************** */   
	public function vtcrt_admin_trash_rule(){
     global $post, $vtcrt_rules_set; 
     if ( !( 'vtcrt-rule' == $post->post_type ) ) {
      return;
     }        
  
     if ( !current_user_can( 'delete_posts', 'vtcrt-rule' ) )  {
          return;
     }  
     
     if(did_action('trash_post')) {    
         return;
    }
    
    $vtcrt_rule_delete = new VTCRT_Rule_delete;            
    $vtcrt_rule_delete->vtcrt_trash_rule();

  }
  
  
 /* ************************************************
 **   Admin - Untrash Rule
 *************************************************** */   
	public function vtcrt_admin_untrash_rule(){
     global $post, $vtcrt_rules_set; 
     if ( !( 'vtcrt-rule' == $post->post_type ) ) {
      return;
     }        

     if ( !current_user_can( 'delete_posts', 'vtcrt-rule' ) )  {
          return;
     }       
    $vtcrt_rule_delete = new VTCRT_Rule_delete;            
    $vtcrt_rule_delete->vtcrt_untrash_rule();
  }
  
  
  /* ************************************************
  **   Admin - Update PRODUCT Meta - include/exclude info
  *      from Meta box added to PRODUCT in rules-ui.php  
  *************************************************** */
	public function vtcrt_admin_update_product_meta_info(){
      global $post, $vtcrt_rules_set, $vtcrt_info;
      if ( !( $vtcrt_info['parent_plugin_cpt'] == $post->post_type )) {
        return;
      }  
      if (( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
            return; 
      }

      if ( !current_user_can( 'edit_posts', $vtcrt_info['parent_plugin_cpt'] ) ) {
          return;
      }
       //AND if we're here via an action other than a true save, exit stage left
      $action_type = $_REQUEST['action'];
      if ( in_array($action_type, array('trash', 'untrash', 'delete') ) ) {
        return;
      }
      
      /* ******************************************
       The 'SAVE_POST' action is fired at odd times during updating.
       When it's fired early, there's no post data available.
       So checking for a blank post id is an effective solution.
      *************************************************** */      
      if ( !( $post->ID > ' ' ) ) { //a blank post id means no data to proces....
        return;
      } 

      $includeOrExclude_option = $_REQUEST['includeOrExclude'];
      switch( $includeOrExclude_option ) {
        case 'includeAll':
        case 'excludeAll':   
            $includeOrExclude_checked_list = null; //initialize to null, as it's used later...
          break;
        case 'includeList':                  
        case 'excludeList':  
            $includeOrExclude_checked_list = $_REQUEST['includeOrExclude-checked_list']; //contains list of checked rule post-id"s                           
          break;
      }
      
      $vtcrt_includeOrExclude = array (
            'includeOrExclude_option'         => $includeOrExclude_option,
            'includeOrExclude_checked_list'   => $includeOrExclude_checked_list
             );
     
      //keep the add meta to retain the unique parameter...
      $vtcrt_includeOrExclude_meta  = get_post_meta($post->ID, $vtcrt_info['product_meta_key_includeOrExclude'], true);
      if ( $vtcrt_includeOrExclude_meta  ) {
        update_post_meta($post->ID, $vtcrt_info['product_meta_key_includeOrExclude'], $vtcrt_includeOrExclude);
      } else {
        add_post_meta($post->ID, $vtcrt_info['product_meta_key_includeOrExclude'], $vtcrt_includeOrExclude, true);
      }

  }
 

  /* ************************************************
  **   Admin - Activation Hook
  *************************************************** */  
	public function vtcrt_activation_hook() {
    global $wp_version, $vtcrt_setup_options;
    //the options are added at admin_init time by the setup_options.php as soon as plugin is activated!!!
        
    $this->vtcrt_create_discount_log_tables();
   

		$earliest_allowed_wp_version = 3.3;
    if( (version_compare(strval($earliest_allowed_wp_version), strval($wp_version), '>') == 1) ) {   //'==1' = 2nd value is lower  
        $message  =  '<strong>' . __('Looks like you\'re running an older version of WordPress, you need to be running at least WordPress 3.3 to use the Varktech Cart Deals plugin.' , 'vtcrt') . '</strong>' ;
        $message .=  '<br>' . __('Current Wordpress Version = ' , 'vtcrt')  . $wp_version ;
        $admin_notices = '<div id="message" class="error fade" style="background-color: #FFEBE8 !important;"><p>' . $message . ' </p></div>';
        add_action( 'admin_notices', create_function( '', "echo '$admin_notices';" ) );
        return;
		}
   
            
   if (version_compare(PHP_VERSION, VTCRT_EARLIEST_ALLOWED_PHP_VERSION) < 0) {    //'<0' = 1st value is lower  
        $message  =  '<strong>' . __('Looks like you\'re running an older version of PHP.   - your PHP version = ' , 'vtcrt') .PHP_VERSION. '</strong>' ;
        $message .=  '<br>' . __('You need to be running **at least PHP version 5** to use this plugin. Please contact your host and request an upgrade to PHP 5+ .  Once that has been installed, you can activate this plugin.' , 'vtcrt');
        $admin_notices = '<div id="message" class="error fade" style="background-color: #FFEBE8 !important;"><p>' . $message . ' </p></div>';
        add_action( 'admin_notices', create_function( '', "echo '$admin_notices';" ) );
        return;      
      
		}

    
    if(defined('WOOCOMMERCE_VERSION') && (VTCRT_PARENT_PLUGIN_NAME == 'WooCommerce')) { 
      $new_version =      VTCRT_EARLIEST_ALLOWED_PARENT_VERSION;
      $current_version =  WOOCOMMERCE_VERSION;
      if( (version_compare(strval($new_version), strval($current_version), '>') == 1) ) {   //'==1' = 2nd value is lower 
        $message  =  '<strong>' . __('Looks like you\'re running an older version of WooCommerce. You need to be running at least ** WooCommerce 2.0 **, to use the Varktech Cart Deals plugin' , 'vtcrt') . '</strong>' ;
        $message .=  '<br>' . __('Your current WooCommerce version = ' , 'vtcrt') .WOOCOMMERCE_VERSION;
        $admin_notices = '<div id="message" class="error fade" style="background-color: #FFEBE8 !important;"><p>' . $message . ' </p></div>';
        add_action( 'admin_notices', create_function( '', "echo '$admin_notices';" ) );
        return;         
  		}
    }   else 
    if (VTCRT_PARENT_PLUGIN_NAME == 'WooCommerce') {
        $message  =  '<strong>' . __('Varktech Cart Deals for WooCommerce requires that WooCommerce be installed and activated. ' , 'vtcrt') . '</strong>' ;
        $message .=  '<br>' . __('It looks like WooCommerce is either not installed, or not activated. ' , 'vtcrt');
        $admin_notices = '<div id="message" class="error fade" style="background-color: #FFEBE8 !important;"><p>' . $message . ' </p></div>';
        add_action( 'admin_notices', create_function( '', "echo '$admin_notices';" ) );
        return;         
    }

     
  }
 
  
   public function vtcrt_admin_notice_version_mismatch() {
      $message  =  '<strong>' . __('Looks like you\'re running an older version of Cart Deals Pro.' , 'vtcrt') .'<br><br>' . __('Your Pro Version = ' , 'vtcrt') .VTCRT_PRO_VERSION.  __(' and the minimum required pro version = ' , 'vtcrt') .VTCRT_MINIMUM_PRO_VERSION. '</strong>' ;
      $message .=  '<br><br>' . __('Please delete the old Cart Deals Pro plugin from your installation via ftp, go to http://www.varktech.com/download-pro-plugins/ , download and install the newest Cart Deals Pro version.'  , 'vtcrt');
      $admin_notices = '<div id="message" class="error fade" style="background-color: #FFEBE8 !important;"><p>' . $message . ' </p></div>';
      echo $admin_notices;
      return;    
  }   
  

   public function vtcrt_admin_notice_coupon_enable_required() {
      $message  =  '<strong>' . __('In order for the Cart Deals plugin to function successfully, the Woo Coupons Setting must be on, and it is currently off.' , 'vtcrt') . '</strong>' ;
      $message .=  '<br><br>' . __('Please go to the Woocommerce/Settings page.  Under the "General" tab, check the box next to "Enable the use of coupons" and click on the "Save Changes" button.'  , 'vtcrt');
      $admin_notices = '<div id="message" class="error fade" style="background-color: #FFEBE8 !important;"><p>' . $message . ' </p></div>';
      echo $admin_notices;
      return;    
  } 
    
    
  /* ************************************************
  **   Admin - **Uninstall** Hook and cleanup
  *************************************************** */ 
	public function vtcrt_uninstall_hook() {
      
      if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
      	return;
        //exit ();
      }
  
      delete_option('vtcrt_setup_options');
      $vtcrt_nuke = new VTCRT_Rule_delete;            
      $vtcrt_nuke->vtcrt_nuke_all_rules();
      $vtcrt_nuke->vtcrt_nuke_all_rule_cats();
      
  }
  
   
    //Add Custom Links to PLUGIN page action links                     ///wp-admin/edit.php?post_type=vtmam-rule&page=vtmam_setup_options_page
  public function vtcrt_custom_action_links( $links ) {                 
		$plugin_links = array(
			'<a href="' . admin_url( 'edit.php?post_type=vtcrt-rule&page=vtcrt_setup_options_page' ) . '">' . __( 'Settings', 'vtcrt' ) . '</a>',
			'<a href="http://www.varktech.com">' . __( 'Docs', 'vtcrt' ) . '</a>'
		);
		return array_merge( $plugin_links, $links );
	}



	public function vtcrt_create_discount_log_tables() {
    global $wpdb;
    //Cart Audit Trail Tables
  	
    $wpdb->hide_errors();    
  	$collate = '';
    if ( $wpdb->has_cap( 'collation' ) ) {  //mwn04142014
  		if( ! empty($wpdb->charset ) ) $collate .= "DEFAULT CHARACTER SET $wpdb->charset";
  		if( ! empty($wpdb->collate ) ) $collate .= " COLLATE $wpdb->collate";
    }
     
      
  //  $is_this_purchLog = $wpdb->get_var("SHOW TABLES LIKE `".VTCRT_PURCHASE_LOG."` ");
    $table_name =  VTCRT_PURCHASE_LOG;
    $is_this_purchLog = $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" );
    if ( $is_this_purchLog  == VTCRT_PURCHASE_LOG) {
      return;
    }

     
    $sql = "
        CREATE TABLE  `".VTCRT_PURCHASE_LOG."` (
              id bigint NOT NULL AUTO_INCREMENT,
              cart_parent_purchase_log_id bigint,
              purchaser_name VARCHAR(50), 
              purchaser_ip_address VARCHAR(50),                
              purchase_date DATE NULL,
              cart_total_discount_currency DECIMAL(11,2),      
              ruleset_object TEXT,
              cart_object TEXT,
          KEY id (id, cart_parent_purchase_log_id)
        ) $collate ;      
        ";
 
     $this->vtcrt_create_table( $sql );
     
    $sql = "
        CREATE TABLE  `".VTCRT_PURCHASE_LOG_PRODUCT."` (
              id bigint NOT NULL AUTO_INCREMENT,
              purchase_log_row_id bigint,
              product_id bigint,
              product_title VARCHAR(100),
              cart_parent_purchase_log_id bigint,
              product_orig_unit_price   DECIMAL(11,2),     
              product_total_discount_units   DECIMAL(11,2),
              product_total_discount_currency DECIMAL(11,2),
              product_total_discount_percent DECIMAL(11,2),
          KEY id (id, purchase_log_row_id, product_id)
        ) $collate ;      
        ";
 
     $this->vtcrt_create_table( $sql );
     
    $sql = "
        CREATE TABLE  `".VTCRT_PURCHASE_LOG_PRODUCT_RULE."` (
              id bigint NOT NULL AUTO_INCREMENT,
              purchase_log_product_row_id bigint,
              product_id bigint,
			  rule_id bigint,
              cart_parent_purchase_log_id bigint,
              product_rule_discount_units   DECIMAL(11,2),
              product_rule_discount_dollars DECIMAL(11,2),
              product_rule_discount_percent DECIMAL(11,2),
          KEY id (id, purchase_log_product_row_id, rule_id)
        ) $collate ;      
        ";
 
     $this->vtcrt_create_table( $sql );



  }
  
	public function vtcrt_create_table( $sql ) {   
      global $wpdb;
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');	        
      dbDelta($sql);
      return; 
   } 
                            

  
} //end class
$vtcrt_controller = new VTCRT_Controller;
     
//has to be out here, accessing the plugin instance
if (is_admin()){
  register_activation_hook(__FILE__, array($vtcrt_controller, 'vtcrt_activation_hook'));
//mwn0405
//  register_uninstall_hook (__FILE__, array($vtcrt_controller, 'vtcrt_uninstall_hook'));
}

  