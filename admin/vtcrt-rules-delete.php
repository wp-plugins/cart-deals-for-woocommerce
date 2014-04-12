<?php
class VTCRT_Rule_delete {
	
	public function __construct(){
     
    }
    
  public  function vtcrt_delete_rule () {
    global $post, $vtcrt_info, $vtcrt_rules_set, $vtcrt_rule;
    $post_id = $post->ID;    
    $vtcrt_temp_rules_set = array();
    $vtcrt_rules_set = get_option( 'vtcrt_rules_set' ) ;
    for($i=0; $i < sizeof($vtcrt_rules_set); $i++) { 
       //load up temp_rule_set with every rule *except* the one to be deleted
       if ($vtcrt_rules_set[$i]->post_id != $post_id) {
          $vtcrt_temp_rules_set[] = $vtcrt_rules_set[$i];
       }
    }
    $vtcrt_rules_set = $vtcrt_temp_rules_set;
   
    if (count($vtcrt_rules_set) == 0) {
      delete_option( 'vtcrt_rules_set' );
    } else {
      update_option( 'vtcrt_rules_set', $vtcrt_rules_set );
    }
 }  
 
  /* Change rule status to 'pending'
        if status is 'pending', the rule will not be executed during cart processing 
  */ 
  public  function vtcrt_trash_rule () {
    global $post, $vtcrt_info, $vtcrt_rules_set, $vtcrt_rule;
    $post_id = $post->ID;    
    $vtcrt_rules_set = get_option( 'vtcrt_rules_set' ) ;
    for($i=0; $i < sizeof($vtcrt_rules_set); $i++) { 
       if ($vtcrt_rules_set[$i]->post_id == $post_id) {
          if ( $vtcrt_rules_set[$i]->rule_status =  'publish' ) {    //only update if necessary, may already be pending
            $vtcrt_rules_set[$i]->rule_status =  'pending';
            update_option( 'vtcrt_rules_set', $vtcrt_rules_set ); 
          }
          $i =  sizeof($vtcrt_rules_set); //set to done
       }
    }
 
    if (count($vtcrt_rules_set) == 0) {
      delete_option( 'vtcrt_rules_set' );
    } else {
      update_option( 'vtcrt_rules_set', $vtcrt_rules_set );
    }    
    
 }  

  /*  Change rule status to 'publish' 
        if status is 'pending', the rule will not be executed during cart processing  
  */
  public  function vtcrt_untrash_rule () {
    global $post, $vtcrt_info, $vtcrt_rules_set, $vtcrt_rule;
    $post_id = $post->ID;     
    $vtcrt_rules_set = get_option( 'vtcrt_rules_set' ) ;
    for($i=0; $i < sizeof($vtcrt_rules_set); $i++) { 
       if ($vtcrt_rules_set[$i]->post_id == $post_id) {
          if  ( sizeof($vtcrt_rules_set[$i]->rule_error_message) > 0 ) {   //if there are error message, the status remains at pending
            //$vtcrt_rules_set[$i]->rule_status =  'pending';   status already pending
            global $wpdb;
            $wpdb->update( $wpdb->posts, array( 'post_status' => 'pending' ), array( 'ID' => $post_id ) );    //match the post status to pending, as errors exist.
          }  else {
            $vtcrt_rules_set[$i]->rule_status =  'publish';
            update_option( 'vtcrt_rules_set', $vtcrt_rules_set );  
          }
          $i =  sizeof($vtcrt_rules_set);   //set to done
       }
    }
 }  
 
     
  public  function vtcrt_nuke_all_rules() {
    global $post, $vtcrt_info;
    
   //DELETE all posts from CPT
   $myPosts = get_posts( array( 'post_type' => 'vtcrt-rule', 'number' => 500, 'post_status' => array ('draft', 'publish', 'pending', 'future', 'private', 'trash' ) ) );
   //$mycustomposts = get_pages( array( 'post_type' => 'vtcrt-rule', 'number' => 500) );
   foreach( $myPosts as $mypost ) {
     // Delete's each post.
     wp_delete_post( $mypost->ID, true);
    // Set to False if you want to send them to Trash.
   }
    
   //DELETE matching option array
   delete_option( 'vtcrt_rules_set' );
 }  
     
  public  function vtcrt_nuke_all_rule_cats() {
    global $vtcrt_info;
    
   //DELETE all rule category entries
   $terms = get_terms($vtcrt_info['rulecat_taxonomy'], 'hide_empty=0&parent=0' );
   $count = count($terms);
   if ( $count > 0 ){  
       foreach ( $terms as $term ) {
          wp_delete_term( $term->term_id, $vtcrt_info['rulecat_taxonomy'] );
       }
   } 
 }  
      
  public  function vtcrt_repair_all_rules() {
    global $wpdb, $post, $vtcrt_info, $vtcrt_rules_set, $vtcrt_rule;    
    $vtcrt_temp_rules_set = array();
    $vtcrt_rules_set = get_option( 'vtcrt_rules_set' ) ;
    for($i=0; $i < sizeof($vtcrt_rules_set); $i++) { 
       //$test_post = get_post($vtcrt_rules_set[$i]->post_id );
       //load up temp_rule_set with every rule *except* the one to be deleted
       if ( get_post($vtcrt_rules_set[$i]->post_id ) ) {
          $vtcrt_temp_rules_set[] = $vtcrt_rules_set[$i];
       }
    }
    $vtcrt_rules_set = $vtcrt_temp_rules_set;
   

    
    if (count($vtcrt_rules_set) == 0) {
      delete_option( 'vtcrt_rules_set' );
    } else {
      update_option( 'vtcrt_rules_set', $vtcrt_rules_set );
    }
 }
     
  public  function vtcrt_nuke_lifetime_purchase_history() {
    global $wpdb;      
    $wpdb->query("DROP TABLE IF EXISTS `".VTCRT_LIFETIME_LIMITS_PURCHASER."` ");  
    $wpdb->query("DROP TABLE IF EXISTS `".VTCRT_LIFETIME_LIMITS_PURCHASER_RULE."` " );
    $wpdb->query("DROP TABLE IF EXISTS `".VTCRT_LIFETIME_LIMITS_PURCHASER_LOGID_RULE."` " );
  }
       
  public  function vtcrt_nuke_audit_trail_logs() {
    global $wpdb;    
    $wpdb->query("DROP TABLE IF EXISTS `".VTCRT_PURCHASE_LOG."` ");
    $wpdb->query("DROP TABLE IF EXISTS `".VTCRT_PURCHASE_LOG_PRODUCT."` ");
    $wpdb->query("DROP TABLE IF EXISTS `".VTCRT_PURCHASE_LOG_PRODUCT_RULE."` " );
  }
} //end class
