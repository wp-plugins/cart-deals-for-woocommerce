<?php
   
class VTCRT_Rule_update {
	

	public function __construct(){  
    
    $this->vtcrt_edit_rule();
     
    //apply rule scehduling
    $this->vtcrt_validate_rule_scheduling();
     
    //clear out irrelevant/conflicting data (if no errors)
    $this->vtcrt_maybe_clear_extraneous_data();
       
    //translate rule into text...
    $this->vtcrt_build_ruleInWords();
/*
    global $vtcrt_rule;
      echo '$vtcrt_rule <pre>'.print_r($vtcrt_rule, true).'</pre>' ;  
 wp_die( __('<strong>Looks like you\'re running an older version of WordPress, you need to be running at least WordPress 3.3 to use the Varktech Minimum Purchase plugin.</strong>', 'vtmin'), __('VT Minimum Purchase not compatible - WP', 'vtmin'), array('back_link' => true));
 */     
    //update rule...
    $this->vtcrt_update_rules_info();
      
  }
  
  /**************************************************************************************** 
  ERROR MESSAGES SHOULD GO ABOVE THE FIELDS IN ERROR, WHERE POSSIBLE, WITH A GENERAL ERROR MSG AT TOP.
  ****************************************************************************************/ 
            
  public  function vtcrt_edit_rule() {
      global $post, $wpdb, $vtcrt_rule, $vtcrt_info, $vtcrt_rules_set, $vtcrt_rule_template_framework, $vtcrt_deal_edits_framework, $vtcrt_deal_structure_framework; 
                                                                                                                                                         
      $vtcrt_rule_new = new VTCRT_Rule();   //  always  start with fresh copy
      $selected = 's';

      $vtcrt_rule = $vtcrt_rule_new;  //otherwise vtcrt_rule is not addressable!
      
      // NOT NEEDED now that the edits are going through successfully
      //for new rule, put in 1st iteration of deal info
      //$vtcrt_rule->rule_deal_info[] = $vtcrt_deal_structure_framework;   mwnt
       
     //*****************************************
     //  FILL / upd VTCRT_RULE...
     //*****************************************
     //   Candidate Population
     
     $vtcrt_rule->post_id = $post->ID;

     if ( ($_REQUEST['post_title'] > ' ' ) ) {
       //do nothing
     } else {     
       $vtcrt_rule->rule_error_message[] = array( 
              'insert_error_before_selector' => '#vtcrt-deal-selection',
              'error_msg'  => __('The Rule needs to have a Title, but Title is empty.', 'vtcrt')  );   
     }

/*

//specialty edits list:

**FOR THE PRICE OF**
=>for the price of within the group:
buy condition must be an amt
buy amt count must be > 1
buy amt must be = to discount amount count

action group condition must be 'applies to entire'
action group must be same as buy pool group only
discount applies to must be = 'all'

=> for the price of next
buy condition can be anything
action amt condition must be an amt
action amt count must be > 1
action amt must be = to discount amount count 

**CHEAPEST/MOST EXPENSIVE**
*=> in buy group
buy condition must be an amt
buy amt count must be > 1

*=> in action group
buy condition can be anything
action amt condition can be an amt or $$

*/
      //Upper Selects

      $vtcrt_rule->cart_or_catalog_select   = $_REQUEST['cart-or-catalog-select'];  
      $vtcrt_rule->pricing_type_select      = $_REQUEST['pricing-type-select'];  
      $vtcrt_rule->minimum_purchase_select  = $_REQUEST['minimum-purchase-select'];  
      $vtcrt_rule->buy_group_filter_select  = $_REQUEST['buy-group-filter-select'];  
      $vtcrt_rule->get_group_filter_select  = $_REQUEST['get-group-filter-select'];  
      $vtcrt_rule->rule_on_off_sw_select    = $_REQUEST['rule-on-off-sw-select'];
      $vtcrt_rule->rule_type_select         = $_REQUEST['rule-type-select'];
      $vtcrt_rule->wizard_on_off_sw_select  = $_REQUEST['wizard-on-off-sw-select']; 
        
      $upperSelectsDoneSw                   = $_REQUEST['upperSelectsDoneSw']; 
      
      if ($upperSelectsDoneSw != 'yes') {       
          $vtcrt_rule->rule_error_message[] = array( 
                'insert_error_before_selector' => '.top-box',  
                'error_msg'  => __('Blueprint choices not yet completed', 'vtcrt') );   //mwn20140414       
          $vtcrt_rule->rule_error_red_fields[] = '#blue-area-title' ;    //mwn20140414   
      } 
      
      //mwn20140414    begin   ==> added these IDs to rules_ui.php ...
      if (($vtcrt_rule->pricing_type_select == 'choose') || ($vtcrt_rule->pricing_type_select <= ' ')) {
          $vtcrt_rule->rule_error_message[] = array( 
                'insert_error_before_selector' => '.top-box',  
                'error_msg'  => __('Deal Type choice not yet made', 'vtcrt') );        
          $vtcrt_rule->rule_error_red_fields[] = '#pricing-type-select-label' ; 
      }           
      //mwn20140414    end 
       
      
      //#RULEtEMPLATE IS NOW A HIDDEN FIELD which carries the rule template SET WITHIN THE JS
      //   in response to the inital dropdowns being selected. 
     $vtcrt_rule->rule_template = $_REQUEST['rule_template_framework']; 
    
     if ($vtcrt_rule->rule_template <= '0') {   //mwn20140414
          /*  mwn20140414 
          $vtcrt_rule->rule_error_message[] = array( 
                'insert_error_before_selector' => '.template-area',  
                'error_msg'  => __('Pricing Deal Template choice is required.', 'vtcrt') );
          $vtcrt_rule->rule_error_red_fields[] = '#deal-type-title' ; 
          */
          $this->vtcrt_dump_deal_lines_to_rule();
        //  $this->vtcrt_update_rules_info();   mwn20140414           
          return; //fatal exit....          
      } else {    
        for($i=0; $i < sizeof($vtcrt_rule_template_framework['option']); $i++) {
          //get template title to make that name available on the Rule
          if ( $vtcrt_rule_template_framework['option'][$i]['value'] == $vtcrt_rule->rule_template )  {
            $vtcrt_rule->rule_template_name = $vtcrt_rule_template_framework['option'][$i]['title'];
            $i = sizeof($vtcrt_rule_template_framework['option']);
          } 
        }
      }

     //DISCOUNT TEMPLATE
     $display_or_cart = substr($vtcrt_rule->rule_template ,0 , 1);
     if ($display_or_cart == 'D') {
       $vtcrt_rule->rule_execution_type = 'display';
     } else {
       $vtcrt_rule->rule_execution_type = 'cart';
     }

     //using the selected Template, build the $vtcrt_deal_edits_framework, used for all DEAL edits following
     $this->vtcrt_build_deal_edits_framework();
  
     //********************************************************************************
     //EDIT DEAL LINES
     //***LOOP*** through all of the deal line iterations, edit lines 
     //********************************************************************************        
     $deal_iterations_done = 'no'; //initialize variable
     $active_line_count = 0; //initialize variable
     $active_field_count = 0;     

     for($k=0; $deal_iterations_done == 'no'; $k++) {      
       if ( (isset( $_REQUEST['buy_repeat_condition_' . $k] )) && (!empty( $_REQUEST['buy_repeat_condition_' . $k] )) ) {    //is a deal line there? always 1 at least...
         foreach( $vtcrt_deal_structure_framework as $key => $value ) {   //spin through all of the screen fields=>  $key = field name, so has multiple uses...  
            //load up the deal structure with incoming fields
            $vtcrt_deal_structure_framework[$key] = $_REQUEST[$key . '_' .$k];
         }   
          
            //Edit deal line
         $this->vtcrt_edit_deal_info_line($active_field_count, $active_line_count, $k);
            //add deal line to rule
         $vtcrt_rule->rule_deal_info[] = $vtcrt_deal_structure_framework;   //add each line to rule, regardless if empty              
       } else {     
         $deal_iterations_done = 'yes';
       }
     }

    //if max_amt_type is active, may have a max_amt_msg
    $vtcrt_rule->discount_rule_max_amt_msg = $_REQUEST['discount_rule_max_amt_msg'];
  
    //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
    // + ADDED => pro-only option chosen                                                                             
    if ($vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_type'] != 'none') { 
         $vtcrt_rule->rule_error_message[] = array(                                                                              
                'insert_error_before_selector' => '.top-box',  
                'error_msg'  => __('The "Maximum Rule Discount for the Cart" option chosen is only available in the Pro Version. ', 'vtcrt') .'<em><strong>'. __(' * Option restored to default value, * Please Update to Confirm!', 'vtcrt') .'</strong></em>');
          $vtcrt_rule->rule_error_red_fields[] = '#discount_rule_max_amt_type_label_0' ; 
          $vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_type'] = 'none'; //overwrite ERROR choice with DEFAULT  
    } 
    //EDITED end   * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
    
    //if max_lifetime_amt_type is active, may have a max_amt_msg
    $vtcrt_rule->discount_lifetime_max_amt_msg = $_REQUEST['discount_lifetime_max_amt_msg'];

    //if max_cum_amt_type is active, may have a max_amt_msg
    $vtcrt_rule->discount_rule_cum_max_amt_msg = $_REQUEST['discount_rule_cum_max_amt_msg'];
    
               
    $vtcrt_rule->discount_product_short_msg = $_REQUEST['discount_product_short_msg'];
    if ( ($vtcrt_rule->discount_product_short_msg <= ' ') || 
         ($vtcrt_rule->discount_product_short_msg == $_REQUEST['shortMsg']) ) {
        $vtcrt_rule->rule_error_message[] = array( 
              'insert_error_before_selector' => '#messages-box',            
              'error_msg'  => __('Checkout Short Message is required.', 'vtcrt') );
        $vtcrt_rule->rule_error_red_fields[] = '#discount_product_short_msg_label' ;
        $vtcrt_rule->rule_error_box_fields[] = '#discount_product_short_msg';       
    }    

    $vtcrt_rule->discount_product_full_msg = $_REQUEST['discount_product_full_msg']; 
    //if default msg, get rid of it!!!!!!!!!!!!!!
    if ( $vtcrt_rule->discount_product_full_msg == $vtcrt_info['default_full_msg'] ) {
       $vtcrt_rule->discount_product_full_msg == ' ';
    }          
    /* full msg now OPTIONAL
    if ( ($vtcrt_rule->discount_product_full_msg <= ' ') || 
         ($vtcrt_rule->discount_product_full_msg == $_REQUEST['fullMsg'] )){
        $vtcrt_rule->rule_error_message[] = array( 
              'insert_error_before_selector' => '#messages-box',  
              'error_msg'  => __('Theme Full Message is required.', 'vtcrt') );
        $vtcrt_rule->rule_error_red_fields[] = '#discount_product_full_msg_label' ;       
    }    
*/
              
    $vtcrt_rule->cumulativeRulePricing = $_REQUEST['cumulativeRulePricing']; 
    if ($vtcrt_rule->cumulativeRulePricing == 'yes') {
       if ($vtcrt_rule->cumulativeRulePricingAllowed == 'yes') {
         $vtcrt_rule->ruleApplicationPriority_num = $_REQUEST['ruleApplicationPriority_num'];
         $vtcrt_rule->ruleApplicationPriority_num = preg_replace('/[^0-9.]+/', '', $vtcrt_rule->ruleApplicationPriority_num); //remove leading/trailing spaces, percent sign, dollar sign
         if ( is_numeric($vtcrt_rule->ruleApplicationPriority_num) === false ) { 
            $vtcrt_rule->ruleApplicationPriority_num = '10'; //init variable 
            /*
            $vtcrt_rule->rule_error_message[] = array( 
                  'insert_error_before_selector' => '#cumulativePricing_box',  
                  'error_msg'  => __('"Apply this Rule Discount in Addition to Other Rule Discounts" = Yes.  Rule Priority Sort Number is required, and must be numeric. "10" inserted if blank.', 'vtcrt') );
            $vtcrt_rule->rule_error_red_fields[] = '#ruleApplicationPriority_num_label' ;        
            */
         }
       } else {
            $vtcrt_rule->rule_error_message[] = array( 
                  'insert_error_before_selector' => '#cumulativePricing_box',  
                  'error_msg'  => __('With this Rule Template chosen, "Apply this Rule Discount in Addition to Other Rule Discounts" must = "No".', 'vtcrt') );
            $vtcrt_rule->rule_error_red_fields[] = '#ruleApplicationPriority_num_label' ;
            $vtcrt_rule->rule_error_box_fields[] = '#ruleApplicationPriority_num'; 
            $vtcrt_rule->ruleApplicationPriority_num = '10'; //init variable     
       }
    } else {
      $vtcrt_rule->ruleApplicationPriority_num = '10'; //init variable  
    }
                 
    $vtcrt_rule->cumulativeSalePricing   = $_REQUEST['cumulativeSalePricing'];
    if ( ($vtcrt_rule->cumulativeSalePricing != 'no') && ($vtcrt_rule->cumulativeSalePricingAllowed == 'no') ) {
      $vtcrt_rule->rule_error_message[] = array( 
            'insert_error_before_selector' => '#cumulativePricing_box',  
            'error_msg'  => __('With this Rule Template chosen, "Rule Discount in addition to Product Sale Pricing" must = "Does not apply when Product Sale Priced".', 'vtcrt') );
      $vtcrt_rule->rule_error_red_fields[] = '#cumulativePricing_box';
      $vtcrt_rule->rule_error_box_fields[] = '#cumulativePricing';  
    }
               
    $vtcrt_rule->cumulativeCouponPricing = $_REQUEST['cumulativeCouponPricing'];            
    if ( ($vtcrt_rule->cumulativeCouponPricing == 'yes') && ($vtcrt_rule->cumulativeCouponPricingAllowed == 'no') ) {
      $vtcrt_rule->rule_error_message[] = array( 
            'insert_error_before_selector' => '#cumulativePricing_box',  
            'error_msg'  => __('With this Rule Template chosen, " Apply Rule Discount in addition to Coupon Discount?" must = "No".', 'vtcrt') );
      $vtcrt_rule->rule_error_red_fields[] = '#cumulativePricing_box' ;
      $vtcrt_rule->rule_error_box_fields[] = '#cumulativePricing'; 
    } 
 
 
         
     //inPop        
     $vtcrt_rule->role_and_or_in = 'or'; //initialize so it's always there.  overwritten by logic as needed.
     $vtcrt_rule->inPop = $_REQUEST['popChoiceIn'];
     switch( $vtcrt_rule->inPop ) {
        case 'wholeStore':
          break;
        
        //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
        default: // +ADDED => pro-only option chosen                                                                             
            $vtcrt_rule->rule_error_message[] = array( 
                  'insert_error_before_selector' => '.top-box',  
                  'error_msg'  => __('The "Buy Group Selection" option chosen is only available in the Pro Version. ', 'vtcrt') .'<em><strong>'. __(' * Option restored to default value, * Please Update to Confirm!', 'vtcrt') .'</strong></em>');
            $vtcrt_rule->rule_error_red_fields[] = '#buy_group_label' ; 
             $vtcrt_rule->inPop = 'wholeStore'; //overwrite ERROR choice with DEFAULT 
             $vtcrt_rule->buy_group_filter_select = 'wholeStore'; //overwrite ERROR choice with DEFAULT     
          break; 
        //Edited end  * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
        
      }

      //********************************************************************************************************************
      //The WPSC Realtime Catalog repricing action does not pass variation-level info, so these options are disallowed
      //********************************************************************************************************************
      if (($vtcrt_rule->rule_execution_type == 'display') && 
          (VTCRT_PARENT_PLUGIN_NAME == 'WP E-Commerce') ) {
          
            if ($vtcrt_rule->inPop == 'vargroup')  { 
               $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => '#inPop-varProdID-cntl', 
                              'error_msg'  => __('"Buy" Group Selection - Single with Variations may not be chosen when "Apply Price Reduction to Products in the Catalog" Pricing Deal Type is chosen.', 'vtcrt') );
               $vtcrt_rule->rule_error_red_fields[] = '#inPopChoiceIn_label';
            }
    
            if ($vtcrt_rule->cumulativeSalePricingAllowed == 'no' )  { 
               $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => '#cumulativePricing_box',  
                              'error_msg'  => __('"Apply this Rule Discount in addition to Product Sale Pricing" must not be "No" when "Apply Price Reduction to Products in the Catalog" Pricing Deal Type is chosen.', 'vtcrt') );
               $vtcrt_rule->rule_error_red_fields[] = '#cumulativeSalePricing_label';
               $vtcrt_rule->rule_error_box_fields[] = '#cumulativeSalePricing';
            }        
      }                                                                                     

      //********************************************************************************************************************  
      //  ruleApplicationPriority_num must ALWAYS be numeric, to allow for sorting
      //********************************************************************************************************************
 /*     $vtcrt_rule->ruleApplicationPriority_num = preg_replace('/[^0-9.]+/', '', $vtcrt_rule->ruleApplicationPriority_num); //remove leading/trailing spaces, percent sign, dollar sign
      if ( is_numeric($vtcrt_rule->ruleApplicationPriority_num) === false ) { 
        $vtcrt_rule->ruleApplicationPriority_num = '10';
      }  */
      /* not necessary any more!
      if ($vtcrt_rule->rule_execution_type == 'display') {
        //display rules must ALWAYS sort first, so we reset it here
        $vtcrt_rule->ruleApplicationPriority_num = '0';  
      }
      */      
     //actionPop        
     $vtcrt_rule->role_and_or_out = 'or'; //initialize so it's always there.  overwritten by logic as needed.
     $vtcrt_rule->actionPop = $_REQUEST['popChoiceOut'];
     switch( $vtcrt_rule->actionPop ) {
        case 'sameAsInPop':
		    case 'wholeStore':
            //  $vtcrt_rule->actionPop[0]['user_input'] = $selected;
            //  $this->vtcrt_set_default_or_values_out();
          break;
        
        //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
        default: //  +ADDED => pro-only option chosen                                                                             
            $vtcrt_rule->rule_error_message[] = array( 
                  'insert_error_before_selector' => '.top-box',  
                  'error_msg'  => __('The "Get Group Selection" option chosen is only available in the Pro Version. ', 'vtcrt') .'<em><strong>'. __(' * Option restored to default value, * Please Update to Confirm!', 'vtcrt') .'</strong></em>');
            $vtcrt_rule->rule_error_red_fields[] = '#action_group_label' ;
            $vtcrt_rule->actionPop = 'sameAsInPop'; //overwrite ERROR choice with DEFAULT 
            $vtcrt_rule->get_group_filter_select = 'sameAsInPop'; //overwrite ERROR choice with DEFAULT    
          break; 
        //EDIT end   * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
      
      }


      //********************************************************************************************************************
      //Specialty Complex edits... 
      //********************************************************************************************************************
                                                  
       //FOR THE PRICE OF requirements...
       if ($vtcrt_rule->rule_deal_info[0]['discount_amt_type'] =='forThePriceOf_Units') {
          switch ($vtcrt_rule->rule_template) {
           case 'C-forThePriceOf-inCart':  //buy-x-action-forThePriceOf-same-group-discount
                 if ($vtcrt_rule->rule_deal_info[0]['buy_amt_type'] != 'quantity') {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#buy_amt_box_0',  
                          'error_msg'  => __('"Buy Unit Quantity" required for Discount Type "For the Price of (Units) Discount"', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#buy_amt_type_label_0';
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';                
                 } 
                 elseif ( (is_numeric( $vtcrt_rule->rule_deal_info[0]['buy_amt_count'])) && ($vtcrt_rule->rule_deal_info[0]['buy_amt_count'] < '2' )) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#buy_amt_box_0',  
                          'error_msg'  => __('"Buy Unit Quantity" must be > 1 for Discount Type "For the Price of (Units) Discount".', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';
                    $vtcrt_rule->rule_error_box_fields[] = '#buy_amt_count_0';                    
                 }
                 elseif ( (is_numeric( $vtcrt_rule->rule_deal_info[0]['buy_amt_count'])) && 
                          ($vtcrt_rule->rule_deal_info[0]['buy_amt_count'] <= $vtcrt_rule->rule_deal_info[0]['discount_amt_count'])  ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#buy_amt_box_0',  
                          'error_msg'  => __('"Buy Unit Quantity" must be greater than Discount Type "Discount For the Price of Units", when "For the Price of (Units) Discount" chosen.', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_count_literal_forThePriceOf_0';
                    $vtcrt_rule->rule_error_box_fields[] = '#buy_amt_count_0';                    
                 }      
              break;
           case 'C-forThePriceOf-Next':  //buy-x-action-forThePriceOf-other-group-discount
                 if ($vtcrt_rule->rule_deal_info[0]['action_amt_type'] != 'quantity') {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#action_amt_box_0',  
                          'error_msg'  => __('"Get Unit Quantity" required for Discount Type "For the Price of (Units) Discount"', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';
                    $vtcrt_rule->rule_error_box_fields[] = '#action_amt_count_0';                
                 } 
                 elseif ( (is_numeric($vtcrt_rule->rule_deal_info[0]['action_amt_count'])) && ($vtcrt_rule->rule_deal_info[0]['action_amt_count'] < '2') ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#action_amt_box_0',  
                          'error_msg'  => __('"Get Unit Quantity" must be > 1 for Discount Type "For the Price of (Units) Discount".', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';
                    $vtcrt_rule->rule_error_box_fields[] = '#action_amt_count_0';                    
                 }
                 elseif ( (is_numeric($vtcrt_rule->rule_deal_info[0]['action_amt_count'])) &&
                        ($vtcrt_rule->rule_deal_info[0]['action_amt_count'] <= $vtcrt_rule->rule_deal_info[0]['discount_amt_count']) ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#action_amt_box_0',  
                          'error_msg'  => __('"Get Unit Quantity" must be greater than Discount Type "Discount For the Price of Units", when "For the Price of (Units) Discount" chosen.', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_count_literal_forThePriceOf_0';
                    $vtcrt_rule->rule_error_box_fields[] = '#action_amt_count_0';                    
                 }     
              break;
           default:
                $vtcrt_rule->rule_error_message[] = array( 
                      'insert_error_before_selector' => '#discount_amt_box_0',  
                      'error_msg'  => __('To use Discount Type "For the Price of (Units) Discount", choose a "For the Price Of" template type.', 'vtcrt') );
                $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0'; 
                $vtcrt_rule->rule_error_red_fields[] = '#deal-type-title';                   
              break;
         } //end switch   
       } //end if forThePriceOf_Units

       if ($vtcrt_rule->rule_deal_info[0]['discount_amt_type'] =='forThePriceOf_Currency') {
          switch ($vtcrt_rule->rule_template) {
           case 'C-forThePriceOf-inCart':  //buy-x-action-forThePriceOf-same-group-discount
                 if ($vtcrt_rule->rule_deal_info[0]['buy_amt_type'] != 'quantity') {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#buy_amt_box_0',  
                          'error_msg'  => __('"Buy Unit Quantity" required for Discount Type "For the Price of (Currency) Discount"', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#buy_amt_type_label_0';
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';                
                 } 
                 elseif ($vtcrt_rule->rule_deal_info[0]['buy_amt_count'] < '2' ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#buy_amt_box_0',  
                          'error_msg'  => __('"Buy Unit Quantity" must be > 1 for Discount Type "For the Price of (Currency) Discount".', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';
                    $vtcrt_rule->rule_error_box_fields[] = '#buy_amt_count_0';                    
                 }     
              break;
           case 'C-forThePriceOf-Next':  //buy-x-action-forThePriceOf-other-group-discount
                 if ($vtcrt_rule->rule_deal_info[0]['action_amt_type'] != 'quantity') {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#action_amt_box_0',  
                          'error_msg'  => __('"Get Unit Quantity" required for Discount Type "For the Price of (Currency) Discount"', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#action_amt_type_label_0';
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';                
                 } 
                 elseif ($vtcrt_rule->rule_deal_info[0]['action_amt_count'] < '2' ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#action_amt_box_0',  
                          'error_msg'  => __('"Get Unit Quantity" must be > 1 for Discount Type "For the Price of (Currency) Discount".', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0';
                    $vtcrt_rule->rule_error_box_fields[] = '#action_amt_count_0';                    
                 }     
              break;
           default:
                $vtcrt_rule->rule_error_message[] = array( 
                      'insert_error_before_selector' => '#discount_amt_box_0',  
                      'error_msg'  => __('To use Discount Type "For the Price of (Currency) Discount", choose a "For the Price Of" template type.', 'vtcrt') );
                $vtcrt_rule->rule_error_red_fields[] = '#discount_amt_type_label_0'; 
                $vtcrt_rule->rule_error_red_fields[] = '#deal-type-title';                   
              break;
         } //end switch   
       } //end if forThePriceOf_Currency
                                                    
       //DISCOUNT APPLIES TO requirements...
       if ( ($vtcrt_rule->rule_deal_info[0]['discount_applies_to'] == 'cheapest') || 
            ($vtcrt_rule->rule_deal_info[0]['discount_applies_to'] == 'most_expensive') ){
          switch ($vtcrt_rule->rule_template) {
           case 'C-cheapest-inCart':  //buy-x-action-most-expensive-same-group-discount
                 if ( ($vtcrt_rule->rule_deal_info[0]['buy_amt_type'] != 'quantity') && 
                      ($vtcrt_rule->rule_deal_info[0]['buy_amt_type'] != 'currency') ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#buy_amt_box_0',  
                          'error_msg'  => __('Buy Amount type must be Quantity or Currency, when Discount "Applies To Cheapest/Most Expensive" chosen.', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#buy_amt_type_label_0';
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_applies_to_label_0';                 
                 }                     
                 elseif ( (is_numeric($vtcrt_rule->rule_deal_info[0]['buy_amt_count'])) && ($vtcrt_rule->rule_deal_info[0]['buy_amt_count'] < '2') ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#buy_amt_box_0',  
                          'error_msg'  => __('Buy Amount Count must be greater than 1, when Discount "Applies To Cheapest/Most Expensive" chosen.', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#buy_amt_type_label_0';
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_applies_to_label_0';                 
                 }                                                
              break;           
           case 'C-cheapest-Next':  //buy-x-action-most-expensive-other-group-discount
                 if ( ($vtcrt_rule->rule_deal_info[0]['action_amt_type'] != 'quantity') && 
                      ($vtcrt_rule->rule_deal_info[0]['action_amt_type'] != 'currency') ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#action_amt_box_0',  
                          'error_msg'  => __('Get Amount type must be Quantity or Currency, when Discount "Applies To Cheapest/Most Expensive" chosen.', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#action_amt_type_label_0';
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_applies_to_label_0';                 
                 }                     
                 elseif ( (is_numeric($vtcrt_rule->rule_deal_info[0]['action_amt_count'])) && ($vtcrt_rule->rule_deal_info[0]['action_amt_count'] < '2') ) {
                    $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => '#action_amt_box_0',  
                          'error_msg'  => __('Get Amount Count must be greater than 1, when Discount "Applies To Cheapest/Most Expensive" chosen.', 'vtcrt') );
                    $vtcrt_rule->rule_error_red_fields[] = '#action_amt_type_label_0';
                    $vtcrt_rule->rule_error_red_fields[] = '#discount_applies_to_label_0';                 
                 }
              break;
           default:
                $vtcrt_rule->rule_error_message[] = array( 
                      'insert_error_before_selector' => '#discount_applies_to_box_0',  
                      'error_msg'  => __('Please choose a "Cheapest/Most Expensive" template type, when Discount "Applies To Cheapest/Most Expensive" chosen.', 'vtcrt') );
                $vtcrt_rule->rule_error_red_fields[] = '#discount_applies_to_label_0';
                $vtcrt_rule->rule_error_red_fields[] = '#deal-type-title';
              break;           
         } //end switch        
       } //end if discountAppliesTo


    
      //********************************************************************************************************************
      //The WPSC Realtime Catalog repricing action does not pass variation-level info, so these options are disallowed
      //********************************************************************************************************************
      if (($vtcrt_rule->rule_execution_type == 'display') && 
          (VTCRT_PARENT_PLUGIN_NAME == 'WP E-Commerce') ) {
          
            if ($vtcrt_rule->actionPop == 'vargroup')  { 
               $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => '#actionPop-varProdID-cntl',  
                              'error_msg'  => __('"Action" Group Selection - Single with Variations may not be chosen when "Apply Price Reduction to Products in the Catalog" Pricing Deal Type is chosen, due to a WPEC limitation.', 'vtcrt') );
               $vtcrt_rule->rule_error_red_fields[] = '#actionPopChoiceOut_label';
            }
    
            if ($vtcrt_rule->cumulativeSalePricingAllowed == 'no' )  { 
               $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => '#cumulativeSalePricing_areaID',  
                              'error_msg'  => __('"Apply this Rule Discount in addition to Product Sale Pricing" must not be "No" when "Apply Price Reduction to Products in the Catalog" Pricing Deal Type is chosen, due to a WPEC limitation.', 'vtcrt') );
               $vtcrt_rule->rule_error_red_fields[] = '#cumulativeSalePricing_label';
            }        
      }                                                                                     

      //********************************************************************************************************************      
      //********************************************************************************************************************
       
      //EDITED BEGIN * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
        // +ADDED =>    BEGIN
        // pro-only option chosen                                                                             
      if ($vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_type'] != 'none') { 
           $vtcrt_rule->rule_error_message[] = array( 
                  'insert_error_before_selector' => '.top-box',  
                  'error_msg'  => __('The "Maximum Discounts per Customer (for Lifetime of the rule)" option chosen is only available in the Pro Version ', 'vtcrt') .'<em><strong>'. __(' * Option restored to default value, * Please Update to Confirm!', 'vtcrt') .'</strong></em>');
            $vtcrt_rule->rule_error_red_fields[] = '#discount_lifetime_max_amt_type_label_0' ; 
            $vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_type'] = 'none'; //overwrite ERROR choice with DEFAULT   
      }    
      if ($vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_type'] != 'none') { 
           $vtcrt_rule->rule_error_message[] = array( 
                  'insert_error_before_selector' => '.top-box',  
                  'error_msg'  => __('The "Cart Maximum for all Discounts Per Product" option chosen is only available in the Pro Version. ', 'vtcrt') .'<em><strong>'. __(' * Option restored to default value, * Please Update to Confirm!', 'vtcrt') .'</strong></em>');
            $vtcrt_rule->rule_error_red_fields[] = '#discount_rule_cum_max_amt_type_label_0' ; 
            $vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_type'] = 'none'; //overwrite ERROR choice with DEFAULT  
      }      
      // +ADDED   End
      //EDITED END  * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +   
 

      //*************************
      //AUTO ADD switching (+ sort field switching as well)
      //*************************
      $vtcrt_rule->rule_contains_auto_add_free_product = 'no';
      $vtcrt_rule->rule_contains_free_product = 'no'; //used for sort in apply-rules.php
      $vtcrt_rule->var_out_product_variations_parameter = array(); 
      $sizeof_rule_deal_info = sizeof($vtcrt_rule->rule_deal_info);
      for($d=0; $d < $sizeof_rule_deal_info; $d++) {                  
         if ($vtcrt_rule->rule_deal_info[$d]['discount_auto_add_free_product'] == 'yes') {
                                 
             //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
            // + ADDED => pro-only option chosen                                                                             

                 $vtcrt_rule->rule_error_message[] = array(                                                                              
                        'insert_error_before_selector' => '#discount_amt_box_' .$d ,  
                        'error_msg'  => __('The " Automatically Add Free Product to Cart" option chosen is only available in the Pro Version. ', 'vtcrt') .'<em><strong>'. __(' * Option restored to default value, * Please Update to Confirm!', 'vtcrt') .'</strong></em>'
                        );
                  $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_' .$d ;
                  
                  $vtcrt_rule->rule_deal_info[$d]['discount_auto_add_free_product'] = ''; 

            //EDITED end  * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
           
         }
         if ($vtcrt_rule->rule_deal_info[$d]['discount_amt_type'] == 'free') {
            $vtcrt_rule->rule_contains_free_product = 'yes'; 
         }                   
      }

      //*************************
      //Pop Filter Agreement Check (switch used in apply...)
      //*************************
      $this->vtcrt_maybe_pop_filter_agreement();

            
      //*************************
      //check against all other rules acting on the free product
      //*************************
      if ($vtcrt_rule->rule_contains_auto_add_free_product == 'yes') {

        $vtcrt_rules_set = get_option( 'vtcrt_rules_set' );

        $sizeof_rules_set = sizeof($vtcrt_rules_set);
       
        for($i=0; $i < $sizeof_rules_set; $i++) { 
                     
          if ( ($vtcrt_rules_set[$i]->rule_status != 'publish') ||
               ($vtcrt_rules_set[$i]->rule_on_off_sw_select == 'off') ) {             
             continue;
          }

            
          if ($vtcrt_rules_set[$i]->post_id == $vtcrt_rule->post_id) {                   
             continue;
          } 
                        
          //if another rule has the exact same FREE product, that's an ERROR
          if ($vtcrt_rules_set[$i]->rule_contains_auto_add_free_product == 'yes') {  
              
               //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
               //   Leave the following here...
               //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
              switch( true ) {    
                
                // compare to vtcrt_rule  actionpop vargroup
                case  ($vtcrt_rule->actionPop == 'vargroup' ) :
                     
                      //current rule vs other rule actionPop vs actionPop
                      if (($vtcrt_rules_set[$i]->actionPop           == 'vargroup') &&
                         ($vtcrt_rules_set[$i]->actionPop_varProdID  == $vtcrt_rule->actionPop_varProdID) &&
                         ($vtcrt_rules_set[$i]->var_out_checked[0]   == $vtcrt_rule->var_out_checked[0] )) {
                        $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                        $vtcrt_rule->rule_error_message[] = array( 
                            'insert_error_before_selector' => '#discount_amt_box_0',  
                            'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') .$conflictPost->post_title 
                            );
                        $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0'; 
                        break 2; 
                      }   
                      
                      //current rule actionPop vs other rule inPop
                      if ($vtcrt_rules_set[$i]->actionPop  == 'sameAsInPop' ) { 
                          if (($vtcrt_rules_set[$i]->inPop              == 'vargroup') &&
                              ($vtcrt_rules_set[$i]->inPop_varProdID    == $vtcrt_rule->actionPop_varProdID) &&
                              ($vtcrt_rules_set[$i]->var_in_checked[0]  == $vtcrt_rule->var_out_checked[0] )) {
                            $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                            $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => '#discount_amt_box_0',  
                                'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') .$conflictPost->post_title 
                                );
                            $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0';
                            break 2; 
                          }                      
                      }             

                   break;

                // compare to vtcrt_rule  actionpop single
                case  ($vtcrt_rule->actionPop == 'single' ) : 
                            
                      if (($vtcrt_rules_set[$i]->actionPop              == 'single') &&
                          ($vtcrt_rules_set[$i]->actionPop_singleProdID == $vtcrt_rule->actionPop_singleProdID) ) { 
                        $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                        $vtcrt_rule->rule_error_message[] = array( 
                            'insert_error_before_selector' => '#discount_amt_box_0',  
                            'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') . $conflictPost->post_title 
                            );
                        $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0';
                        break 2;              
                      }                   

                      
                      //current rule actionPop vs other rule inPop
                      if ($vtcrt_rules_set[$i]->actionPop  == 'sameAsInPop' ) { 
                          if (($vtcrt_rules_set[$i]->inPop                == 'single') &&
                              ($vtcrt_rules_set[$i]->inPop_singleProdID   == $vtcrt_rule->actionPop_singleProdID) ) { 
                            $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                            $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => '#discount_amt_box_0',  
                                'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') . $conflictPost->post_title 
                                );
                            $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0';
                            break 2;              
                          }                 
                      }

                   break;

                // compare to vtcrt_rule  inpop vargroup
                case  ( ($vtcrt_rule->actionPop == 'sameAsInPop' ) &&
                        ($vtcrt_rule->inPop     == 'vargroup' ) ) : 
                      
                      //current rule vs other rule actionPop vs actionPop
                      if (($vtcrt_rules_set[$i]->actionPop            == 'vargroup') &&
                          ($vtcrt_rules_set[$i]->actionPop_varProdID  == $vtcrt_rule->inPop_varProdID) &&
                          ($vtcrt_rules_set[$i]->var_out_checked[0]   == $vtcrt_rule->var_in_checked[0] ) ) {
                        $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                        $vtcrt_rule->rule_error_message[] = array( 
                            'insert_error_before_selector' => '#discount_amt_box_0',  
                            'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') . $conflictPost->post_title 
                            );
                        $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0';
                        break 2; 
                      }   
                      
                      //current rule actionPop vs other rule inPop
                      if ($vtcrt_rules_set[$i]->actionPop  == 'sameAsInPop' ) { 
                          if (($vtcrt_rules_set[$i]->inPop             == 'vargroup') &&
                              ($vtcrt_rules_set[$i]->inPop_varProdID   == $vtcrt_rule->inPop_varProdID) &&
                              ($vtcrt_rules_set[$i]->var_in_checked[0] == $vtcrt_rule->var_in_checked[0] )) {
                            $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                            $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => '#discount_amt_box_0',  
                                'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') . $conflictPost->post_title 
                                );
                            $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0';
                            break 2; 
                          }                      
                      }             

                   break;

                // compare to vtcrt_rule  inpop single
                case  ( ($vtcrt_rule->actionPop == 'sameAsInPop' ) &&
                        ($vtcrt_rule->inPop     == 'single' ) ) : 
                                                              
                      if ( ($vtcrt_rules_set[$i]->actionPop               == 'single') && 
                           ($vtcrt_rules_set[$i]->actionPop_singleProdID  == $vtcrt_rule->inPop_singleProdID) ) { 
                        $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                        $vtcrt_rule->rule_error_message[] = array( 
                            'insert_error_before_selector' => '#discount_amt_box_0',  
                            'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') . $conflictPost->post_title 
                            );
                        $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0';
                        break 2;              
                      }                   

                      
                      //current rule actionPop vs other rule inPop
                      if ($vtcrt_rules_set[$i]->actionPop  == 'sameAsInPop' ) { 
                          if ( ($vtcrt_rules_set[$i]->inPop               == 'single') && 
                               ($vtcrt_rules_set[$i]->inPop_singleProdID  == $vtcrt_rule->inPop_singleProdID) ) { 
                            $conflictPost = get_post($vtcrt_rules_set[$i]->post_id);
                            $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => '#discount_amt_box_0',  
                                'error_msg'  => __('When "Automatically Add Free Product to Cart" is Selected, no other Auto Add Rule may have the same product as the Discount Group.  CONFLICTING RULE NAME is: ', 'vtcrt') . $conflictPost->post_title 
                                );
                            $vtcrt_rule->rule_error_red_fields[] = '#discount_auto_add_free_product_label_0';
                            break 2;              
                          }                 
                      }

                   break;                   
                   
            }  //end switch
          } //end if
          
        } //end 'for' loop
      } //end if auto product 
      //*************************



  } //end vtcrt_edit_rule
  
  
  public function vtcrt_update_rules_info() {
    global $post, $vtcrt_rule, $vtcrt_rules_set; 

/*      
    //set the switch used on the screen for JS data check
    switch( true ) {
      case (!$vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_type'] == 'none'):
      case ( $vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_count'] > 0) :
      case (!$vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_type'] == 'none'):
      case ( $vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_count'] > 0) :
      case (!$vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_type'] == 'none'):
      case ( $vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_count'] > 0) :
          $vtcrt_rule->advancedSettingsDiscountLimits = 'yes';
        break;
    }
  */
    //*****************************************
    //  If errors were found, the error message array will be displayed by the UI on next screen send.
    //*****************************************
    if  ( sizeof($vtcrt_rule->rule_error_message) > 0 ) {
      $vtcrt_rule->rule_status = 'pending';
    } else {
      $vtcrt_rule->rule_status = 'publish';
    }

    $rules_set_found = false;
    $vtcrt_rules_set = get_option( 'vtcrt_rules_set' ); 
    if ($vtcrt_rules_set) {
      $rules_set_found = true;
    }
          
    if ($rules_set_found) {
      $rule_found = false;
      $sizeof_rules_set = sizeof($vtcrt_rules_set);
      for($i=0; $i < $sizeof_rules_set; $i++) {       
         if ($vtcrt_rules_set[$i]->post_id == $post->ID) {
            $vtcrt_rules_set[$i] = $vtcrt_rule;
            $i =  $sizeof_rules_set;
            $rule_found = true;
         }
      }
      if (!$rule_found) {
         $vtcrt_rules_set[] = $vtcrt_rule;        
      } 
    } else {
      $vtcrt_rules_set = array();
      $vtcrt_rules_set[] = $vtcrt_rule;
    }

    if ($rules_set_found) {
      update_option( 'vtcrt_rules_set',$vtcrt_rules_set );
    } else {
      add_option( 'vtcrt_rules_set',$vtcrt_rules_set );
    }
                                                 
    //**************
    //keep a running track of $vtcrt_display_type_in_rules_set   ==> used in apply-rules processing
    //*************
    if ($vtcrt_rule->rule_execution_type  == 'display') {
      $ruleset_has_a_display_rule = 'yes';
    } else { 
      $ruleset_has_a_display_rule = 'no';
      $sizeof_rules_set = sizeof($vtcrt_rules_set);
      for($i=0; $i < $sizeof_rules_set; $i++) { 
         if ($vtcrt_rules_set[$i]->rule_execution_type == 'display') {
            $i =  $sizeof_rules_set;
            $ruleset_has_a_display_rule = 'yes'; 
         }
      }
    } 

   
    if (get_option('vtcrt_ruleset_has_a_display_rule') == true) {
      update_option( 'vtcrt_ruleset_has_a_display_rule',$ruleset_has_a_display_rule );
    } else {
      add_option( 'vtcrt_ruleset_has_a_display_rule',$ruleset_has_a_display_rule );
    }
    //**************        
    
    //nuke the browser session variables in this case - allows clean retest ...
/*  mwn20140414 =>code shifted to top of file...
    if(!isset($_SESSION['session_started'])){
      session_start();    
      header("Cache-Control: no-cache");
      header("Pragma: no-cache");      
    }          
*/
    // mwn20140414 begin => added inline session_start().  allow potential dup session start, as it's only a Notice, not a warning....
    //session_start();
        
    if (session_id() == "") {
      session_start();    
    } 
    $_SESSION = array();
    $_SESSION['session_started'] = 'Yes!';  // need to initialize the session prior to destroy 
    session_destroy();   
    session_write_close();
    // mwn20140414 end
    
    
    return;
  } 
  
  public function vtcrt_validate_rule_scheduling() {
    global $vtcrt_rule, $vtcrt_setup_options;  
    
    $date_valid = true;     
    $loop_ended = 'no';
    $today = date("Y-m-d");

    if ( $vtcrt_setup_options['use_this_timeZone'] == 'none') {
        $vtcrt_rule->rule_error_message[] = array( 
          'insert_error_before_selector' => '#date-line-0',  
          'error_msg'  => __('Scheduling requires setup', 'vtcrt') );
        $date_valid = false; 
    }

    for($t=0; $loop_ended  == 'no'; $t++) {

      if ( (isset($_REQUEST['date-begin-' .$t])) ||
           (isset($_REQUEST['date-end-' .$t])) ) {  
       
        $date = $_REQUEST['date-begin-' .$t];
        
        $vtcrt_rule->periodicByDateRange[$t]['rangeBeginDate'] = $date;

        if (!vtcrt_checkDateTime($date)) {
           $vtcrt_rule->rule_error_red_fields[] = '#date-begin-' .$t. '-error';
           $date_valid = false;
        }

        $date = $_REQUEST['date-end-' .$t];
        $vtcrt_rule->periodicByDateRange[$t]['rangeEndDate'] = $date;
        if (!vtcrt_checkDateTime($date)) {
           $vtcrt_rule->rule_error_red_fields[] = '#date-end-' .$t. '-error';
           $date_valid = false;
        }
      
      } else {
        $loop_ended = true;
        break;        
      }

      if ($vtcrt_rule->periodicByDateRange[$t]['rangeBeginDate'] >  $vtcrt_rule->periodicByDateRange[$t]['rangeEndDate']) {
          $vtcrt_rule->rule_error_message[] = array( 
            'insert_error_before_selector' => '#date-line-0',  
            'error_msg'  => __('End Date must be Greater than or equal to Begin Date.', 'vtcrt') );
          $vtcrt_rule->rule_error_red_fields[] = '#end-date-label-' .$t;
          $date_valid = false;
      }    
      //emergency exit
      if ($t > 9) {
        break; //exit the for loop
      }
    } 
    
    if (!$date_valid) {
      $vtcrt_rule->rule_error_message[] = array( 
            'insert_error_before_selector' => '#vtcrt-rule-scheduling',  
            'error_msg'  => __('Please repair date error.', 'vtcrt') );                   
    }
    
  } 

  public function vtcrt_build_ruleInWords() {
    global $vtcrt_rule;
    
    //Don't process if errors present
  /*  if  ( sizeof($vtcrt_rule->rule_error_message) > 0 ) {
      $vtcrt_rule->ruleInWords = '';
      return;
    }    */
    
    $vtcrt_rule->ruleInWords = ''; 
    
    switch( $vtcrt_rule->rule_template   ) {
      //display templates
      case 'D-storeWideSale':  //Store-Wide Sale with a Percentage or $$ Value Off, at Catalog Display Time - Realtime
      case 'C-storeWideSale':  //Store-Wide Sale with a Percentage or $$ Value Off all Products in the Cart          vtcrt_buy_info(
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_buy_info();
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_action_info();
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_discount_amt();
        break;
      case 'D-simpleDiscount':  //Membership Discount in the Buy Pool Group, at Catalog Display Time - Realtime
      case 'C-simpleDiscount':  //Sale Price by any Buy Pool Group Criteria [Product / Category / Custom Taxonomy Category / Membership / Wholesale] - Cart
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_buy_info();
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_action_info();
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_discount_amt();          
        //  $vtcrt_rule->ruleInWords .= $this->vtcrt_show_pop();
        break;
      default:    
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_buy_info();
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_action_info();
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_discount_amt();          
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_repeats();
        //  $vtcrt_rule->ruleInWords .= $this->vtcrt_show_pop();
          $vtcrt_rule->ruleInWords .= $this->vtcrt_show_limits();   
        break;
    }
    
    //replace $ with the currency symbol set up on the Parent Plugin!!
    $currency_symbol = vtcrt_get_currency_symbol();
    $vtcrt_rule->ruleInWords = str_replace('$', $currency_symbol, $vtcrt_rule->ruleInWords);
    
  } 
  
  public function vtcrt_show_buy_info() {
    global $vtcrt_rule;  
    $output;    
    switch( $vtcrt_rule->rule_template   ) {
      case 'D-storeWideSale':
          $output .= '<span class="words-line"><span class="words-line-buy">' . __('* For</span><!-- 001 --> any item,', 'vtcrt') . '</span><!-- 001a --><!-- /words-line-->';
          return $output;
        break;      
      case 'D-simpleDiscount': 
          $output .= '<span class="words-line"><span class="words-line-buy">' . __('* For</span><!-- 002 --> any item within the defined Buy group,', 'vtcrt') . '</span><!-- 002a --><!-- /words-line-->';
          return $output;
        break;
      case 'C-storeWideSale':
          $output .= '<span class="words-line"><span class="words-line-buy">' . __('* Buy</span><!-- 003 --> any item,', 'vtcrt') . '</span><!-- 003a --><!-- /words-line-->';
          return $output;
        break;      
      case 'C-simpleDiscount': 
          $output .= '<span class="words-line"><span class="words-line-buy">' . __('* Buy</span><!-- 005 --> any item within the Buy defined group,', 'vtcrt') . '</span><!-- 005a --><!-- /words-line-->';
          return $output;
        break;
      default:
          $output .= '<span class="words-line"><span class="words-line-buy">' . __('* Buy</span><!-- 007 --> ', 'vtcrt') ;
        break;
    }
     
    switch( $vtcrt_rule->rule_deal_info[0]['buy_amt_type']  ) {    
      case 'none':
          $output .= __('any item within the defined Buy group,', 'vtcrt') . '</span><!-- 008 -->';
          return $output;
        break;
      case 'one':
          $output .= __('one item within the defined Buy group,', 'vtcrt') . '</span><!-- 009 -->';
          return $output;
        break; 
      case 'quantity':
          $output .= $vtcrt_rule->rule_deal_info[0]['buy_amt_count'];
          $output .= __(' units', 'vtcrt'); 
        break; 
      case 'currency':
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['buy_amt_count'];                    
        break;
      case 'nthQuantity':
          $output .= __('every', 'vtcrt'); 
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['buy_amt_count'];
          $output .= __('th unit ', 'vtcrt');                    
        break;
    }    
 
 
    switch( $vtcrt_rule->rule_deal_info[0]['buy_amt_mod']  ) {
      case 'none':
        break;
      case 'minCurrency':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' for a mininimum of ', 'vtcrt');
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['buy_amt_mod_count'];
        break; 
      case 'maxCurrency':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' for a maxinimum of ', 'vtcrt');
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['buy_amt_mod_count'];
        break;               
    }   
    
    switch( $vtcrt_rule->rule_deal_info[0]['buy_amt_applies_to']  ) {
      case 'all':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' within the Buy group', 'vtcrt');
        break;
      case 'each':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' of each product quantity of the defined Buy group', 'vtcrt');
        break;        
    }
    $output .=  '</span><!-- 010 -->';
   
    return $output;   
  } 


    
  public function vtcrt_show_action_info() {
    global $vtcrt_rule;  
    $output;    
    switch( $vtcrt_rule->rule_template   ) {                      
      case 'D-storeWideSale':    
      case 'D-simpleDiscount': 
          $output .= '<span class="words-line"><span class="words-line-get">' .  __('* Get ', 'vtcrt') . '</span><!-- 012 -->';
        break;
      case 'C-storeWideSale':    
      case 'C-simpleDiscount':
      case 'C-discount-inCart':
      case 'C-cheapest-inCart': 
          $output .= '<span class="words-line"><span class="words-line-get">' .  __('* Get ', 'vtcrt') . '</span><!-- 014 -->';
        break;
      case 'C-forThePriceOf-inCart':    //Buy 5, get them for the price of 4/$400
          $output .= '<span class="words-line"><span class="words-line-get">' .  __('* Get ', 'vtcrt') . '</span><!-- 014 -->' .  __('the Buy Group ', 'vtcrt') . '</span>';
          return $output;
        break;  
      case 'C-discount-Next':
      case 'C-forThePriceOf-Next':     // Buy 5/$500, get next 3 for the price of 2/$200 - Cart
      case 'C-cheapest-Next':
      case 'C-nth-Next':
          $output .= '<span class="words-line"><span class="words-line-get">' .  __('* Get ', 'vtcrt') . '</span><!-- 014 -->' .  __('the Next - ', 'vtcrt');
        break;               
      default:
          $output .= '<span class="words-line"><span class="words-line-get">' .  __('* Get ', 'vtcrt') . '</span><!-- 015 -->';
        break;
    }
     
    switch( $vtcrt_rule->rule_deal_info[0]['action_amt_type']  ) {    
      case 'none':
          $output .= __('any item', 'vtcrt');
          $output .= '<br> &nbsp;&nbsp;&nbsp; -';  
          $output .= __('within the defined Get group,', 'vtcrt'); 
          return $output;
        break;
      case 'one':
          $output .= __('one item', 'vtcrt');
          $output .= '<br> &nbsp;&nbsp;&nbsp; -';  
          $output .= __('within the defined Get group,', 'vtcrt');
          return $output;
        break; 
      case 'quantity':
          $output .= $vtcrt_rule->rule_deal_info[0]['action_amt_count'];
          $output .= __(' units', 'vtcrt'); 
        break; 
      case 'currency':
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['action_amt_count'];                    
        break;
      case 'nthQuantity':
          $output .= __('every', 'vtcrt'); 
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['action_amt_count'];
          $output .= __('th unit ', 'vtcrt');                    
        break;
    }    
 
    switch( $vtcrt_rule->rule_deal_info[0]['action_amt_mod']  ) {
      case 'none':
        break;
      case 'minCurrency':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' for a mininimum of ', 'vtcrt');
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['action_amt_mod_count'];
        break; 
      case 'maxCurrency':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' for a maxinimum of ', 'vtcrt');
          $output .= '$' . $vtcrt_rule->rule_deal_info[0]['action_amt_mod_count'];
        break;               
    }   
    
    switch( $vtcrt_rule->rule_deal_info[0]['action_amt_applies_to']  ) {
      case 'all':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' within the Get group', 'vtcrt');
        break;
      case 'each':
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .= __(' of each product quantity of the defined Get group', 'vtcrt');
        break;        
    }
    $output .=  '</span><!-- 018 --><!-- /words-line-->';
    
    return $output;   
  }   
 
     
  public function vtcrt_show_discount_amt() {
    global $vtcrt_rule;  
    $output;    
    
    switch( $vtcrt_rule->rule_deal_info[0]['discount_applies_to'] ) {
      case 'each':
          $output .= '<span class="words-line"> &nbsp;&nbsp;&nbsp; -';
          $output .=  __('each product ', 'vtcrt');
        break;
      case 'all': 
          if ( $vtcrt_rule->rule_template != 'C-forThePriceOf-inCart' ) { //Don't show for  "Buy 5, get them for the price of 4/$400"
            $output .= '<span class="words-line"> &nbsp;&nbsp;&nbsp; -';
            $output .=  __('all products', 'vtcrt');
          }
        break;      
      case 'cheapest':
          $output .= '<span class="words-line"> &nbsp;&nbsp;&nbsp; -';
          $output .=  __('cheapest product in the group ', 'vtcrt');
        break;       
      case 'most_expensive':
          $output .= '<span class="words-line"> &nbsp;&nbsp;&nbsp; -';
          $output .=  __('most expensive product in the group ', 'vtcrt');
        break;
      default:
        break; 
    /*  default:
          $output .=  __(' discount_applies_to= ', 'vtcrt');
          $output .=  $vtcrt_rule->rule_deal_info[0]['discount_applies_to'];
          $output .=  __('end ', 'vtcrt');
        break;   */
    }
    
    $output .= '</span><!-- 018b --><span class="words-line"><span class="words-line-get">';
    $output .= __('* For ', 'vtcrt') . '</span><!-- 018c -->';  
    
    switch( $vtcrt_rule->rule_deal_info[0]['discount_amt_type'] ) {
      case 'percent':
          $output .=  $vtcrt_rule->rule_deal_info[0]['discount_amt_count'] . __('% off', 'vtcrt');
        break;
      case 'currency': 
          $amt = vtcrt_format_money_element( $vtcrt_rule->rule_deal_info[0]['discount_amt_count'] );
          $output .= $amt . __(' off', 'vtcrt');
        break;      
      case 'fixedPrice':
          $amt = vtcrt_format_money_element( $vtcrt_rule->rule_deal_info[0]['discount_amt_count'] );
          $output .= $amt;
        break;       
      case 'free':
          $output .=  __('Free', 'vtcrt');
        break;
      case 'forThePriceOf_Units': 
      case 'forThePriceOf_Currency':
         $output .=  __('the Group Price of $', 'vtcrt');
         $output .=  $vtcrt_rule->rule_deal_info[0]['discount_amt_count']; 
        break;      
    }  
        
    switch( $vtcrt_rule->rule_template   ) {
      case 'D-storeWideSale':
      case 'D-simpleDiscount': 
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .=  __(' when catalog displays.', 'vtcrt')  . '</span><!-- 019 -->'; //'</span><!-- 019 --> </span><!-- 019a -->';
        break;
      default:
          $output .= '<br> &nbsp;&nbsp;&nbsp; -'; 
          $output .=  __(' when added to cart.', 'vtcrt') . '</span><!-- 020 -->'; //'</span><!-- 020 --> </span><!-- 020a -->';
        break;
    }       
    
    return $output;
  }
 
  
  public function vtcrt_show_pop() {  
    global $vtcrt_rule;  
   
    $output = '<span class="words-line extra-top-margin">';  
    
    $output .= '&nbsp;&nbsp;&nbsp; -';
    switch( $vtcrt_rule->inPop ) {
      case 'wholeStore':                                                                                      
          if ( ($vtcrt_rule->actionPop == 'sameAsInPop') ||              //in these cases, inpop/actionpop treated as 'sameAsInPop'
               ($vtcrt_rule->actionPop == 'wholeStore') ||
               ($vtcrt_rule->actionPop == 'cart') ) {
            $output .=  __(' Acts on the Whole Store ', 'vtcrt'); 
          }  else {
            $output .=  __(' The Buy Group is the Whole Store ', 'vtcrt');
          }         
        break;
      case 'cart':                                                                                      
          if ( ($vtcrt_rule->actionPop == 'sameAsInPop') ||              //in these cases, inpop/actionpop treated as 'sameAsInPop'
               ($vtcrt_rule->actionPop == 'wholeStore') ||
               ($vtcrt_rule->actionPop == 'cart') ) {
            $output .=  __(' Acts on the any Product in the Cart ', 'vtcrt'); 
          }  else {
            $output .=  __(' Buy Group is any Product in the Cart ', 'vtcrt');
          }                              
        break;
  
      //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * + 
             
    }

   switch( $vtcrt_rule->actionPop ) { 
      case 'sameAsInPop':
      case 'wholeStore':;           
      case 'cart':
        //all done, all processing completed while handling inpop above                                                                                     
        break;
  
    //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
    
    }      
/*   
     //**********************************************************
     If inpop = ('wholeStore' or 'cart') and actionpop = ('sameAsInPop' or 'wholeStore' or 'cart')
        inpop and actionpop are treated as a single group ('sameAsInPop'), and the 'ball' bounces between them.
     //**********************************************************
        //logic from apply-rules.php:
        switch( $vtcrt_rules_set[$i]->inPop ) {
          case 'wholeStore':
          case 'cart':        //in these cases, inpop/actionpop treated as 'sameAsInPop'                                                                               
              if ( ($vtcrt_rules_set[$i]->actionPop == 'sameAsInPop') ||              
                   ($vtcrt_rules_set[$i]->actionPop == 'wholeStore') ||
                   ($vtcrt_rules_set[$i]->actionPop == 'cart') ) {
                $vtcrt_rules_set[$i]->actionPop = 'sameAsInPop';
                $vtcrt_rules_set[$i]->discountAppliesWhere =  'nextInInPop' ;
              }   
            break; 
        }  

*/   

     $output .= '</span><!-- 021 -->';
     
    return $output; 
  } 
  
 
  public function vtcrt_show_repeats() {
    global $vtcrt_rule;  
    $output;
     
    
    switch( $vtcrt_rule->rule_deal_info[0]['action_repeat_condition'] ) {
      case 'none':
        break;
      case 'unlimited': 
          $output .= '<span class="words-line extra-top-margin"><em>'; //here due to 'none'
          $output .=  __('Once the Buy group threshhold has been reached, the action group repeats an unlimited number of times. ', 'vtcrt');
          $output .=  '</em></span><!-- 023 -->';
        break;      
      case 'count':
          $output .= '<span class="words-line extra-top-margin"><em>';
          $output .=  __('Once the Buy group threshhold has been reached, the action group repeats ', 'vtcrt'); 
          $output .=  $vtcrt_rule->rule_deal_info[0]['action_repeat_count'];
          $output .=  __(' times. ', 'vtcrt');
          $output .=  '</em></span><!-- 024 -->';
        break;       
    }
    
        
    switch( $vtcrt_rule->rule_deal_info[0]['buy_repeat_condition'] ) {
      case 'none':
        break;
      case 'unlimited': 
          $output .= '<span class="words-line extra-top-margin"><em>';
          $output .=  __('The entire rule repeats an unlimited number of times. ', 'vtcrt');
          $output .=  '</em></span><!-- 024 -->';
        break;      
      case 'count':
          $output .= '<span class="words-line extra-top-margin"><em>';
          $output .=  __('The entire rule repeats ', 'vtcrt');  
          $output .=  $vtcrt_rule->rule_deal_info[0]['buy_repeat_count'];
          $output .=  __(' times. ', 'vtcrt');
          $output .=  '</em></span><!-- 024 -->';
        break;       
    }
    
    return $output;
  }  
  
 
  public function vtcrt_show_limits() {
    global $vtcrt_rule;  
    $output;
        
    switch( $vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_type']) {
      case 'none':
        break;
      case 'percent':
          $output .=  __(' Discount Cart Maximum set at ', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_count'];
          $output .=  __('% ', 'vtcrt');
        break;
      case 'quantity':
          $output .=  __(' Discount Cart Maximum set at ', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_count'];
          $output .=  __(' times it can be applied. ', 'vtcrt');
        break;
      case 'currency':
          $output .=  __(' Discount Cart Maximum set at $$', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_count'];      
        break; 
    }
        
    switch( $vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_type']) {
      case 'none':
        break;
      case 'percent':
          $output .=  __(' Discount Lifetime Maximum set at ', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_count'];
          $output .=  __('% ', 'vtcrt');
        break;
      case 'quantity':
          $output .=  __(' Discount Lifetime Maximum set at ', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_count'];
          $output .=  __(' times it can be applied. ', 'vtcrt');
        break;
      case 'currency':
          $output .=  __(' Discount Lifetime Maximum set at $$', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_count'];      
        break; 
    }    
        
    switch( $vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_type']) {
      case 'none':
        break;
      case 'percent':
          $output .=  __(' Discount Cumulative Maximum set at ', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_count'];
          $output .=  __('% ', 'vtcrt');
        break;
      case 'quantity':
          $output .=  __(' Discount Cumulative_cum Maximum set at ', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_count'];
          $output .=  __(' times it can be applied. ', 'vtcrt');
        break;
      case 'currency':
          $output .=  __(' Discount Cumulative Maximum set at $$', 'vtcrt');
          $output .= $vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_count'];      
        break; 
    }   
      
             
    return $output;
  }    
  
/*  
 //default to 'OR', as the default value goes away and may be needed if the user switches back to 'groups'...
  public function vtcrt_set_default_or_values_in() {
    global $vtcrt_rule;  
   // $vtcrt_rule->role_and_or_in[1]['user_input'] = 's'; //'s' = 'selected'
    $vtcrt_rule->role_and_or_in = 'or';
  } */
 /*
 //default to 'OR', as the default value goes away and may be needed if the user switches back to 'groups'...
  public function vtcrt_set_default_or_values_out() {
    global $vtcrt_rule;  
   // $vtcrt_rule->role_and_or_out[1]['user_input'] = 's'; //'s' = 'selected'
    $vtcrt_rule->role_and_or_out = 'or';
  }   */

  public function vtcrt_initialize_deal_structure_framework() {
    global $vtcrt_deal_structure_framework;
    foreach( $vtcrt_deal_structure_framework as $key => $value ) { 
    //for($i=0; $i < sizeof($vtcrt_deal_field_name_array); $i++) {
       $vtcrt_deal_structure_framework[$value] = '';
       //FIX THIS -> BUG where the foreach goes beyond the end of the $vtcrt_deal_structure_framework - emergency eXIT
       if ($key == 'discount_rule_cum_max_amt_count') {
         break; //emergency end of the foreach...
       }            
    }     
  }
  
  //**********************
  // DEAL Line Edits
  //**********************
  public function vtcrt_edit_deal_info_line($active_field_count, $active_line_count, $k ) {
    global $vtcrt_rule, $vtcrt_deal_structure_framework, $vtcrt_deal_edits_framework;
   
    $skip_amt_edit_dropdown_values  =  array('once', 'none' , 'zero', 'one' , 'unlimited', 'each', 'all', 'cheapest', 'most_expensive');
   
   //FIX THIS LATER!!!!!!!!!!!!!!!
   /* if ($active_field_count == 0) { 
      if ( !isset( $_REQUEST['dealInfoLine_' . ($k + 1) ] ) ) {  //if we're on the last line onscreen
         if ($k == 0) { //if the 1st line is the only line 
            $vtcrt_rule->rule_error_message[] = array( 'insert_error_before_selector' => '#rule_deal_info_line.0',  //errmsg goes before the 1st line onscreen
                                                        'error_msg'  => __('Deal Info Line must be filled in, for the rule to be valid.', 'vtcrt')  );
          }  else {
            $vtcrt_rule->rule_error_message[] = array( 'insert_error_before_selector' => '#rule_deal_info_line.' .$k,  //errmsg goes before current onscreen line
                                                        'error_msg'  => __('At least one Deal Info Line must be filled in, for the rule to be valid.', 'vtcrt')  );        
          }
        
      } else {    //this empty line is not the last...
            $vtcrt_rule->rule_error_message[] = array( 'insert_error_before_selector' => '#rule_deal_info_line.' .$k,  //errmsg goes before current onscreen line
                                                       'error_msg'  => __('Deal Info Line is not filled in.  Please delete the line.', 'vtcrt')  );      
      }
      return;
    }    */

  
    //Go through all of the possible deal structure fields            
    foreach( $vtcrt_deal_edits_framework as $fieldName => $fieldAttributes ) {      
       /* ***********************
       special handling for  discount_rule_max_amt_type, discount_lifetime_max_amt_type.  Even though they appear iteratively in deal info,
       they are only active on the '0' occurrence line.  further, they are displayed only AFTER all of the deal lines are displayed
       onscreen... This is actually a kluge, done to utilize the complete editing already available here for a  dropdown and an associated amt field.
       The ui-php points to the '0' iteration of the deal data, when displaying these fields.
       *********************** */
       if ( ($fieldName == 'discount_rule_max_amt_type' )     || ($fieldName == 'discount_rule_max_amt_count' ) ||
            ($fieldName == 'discount_rule_cum_max_amt_type' ) || ($fieldName == 'discount_rule_cum_max_amt_count' ) ||
            ($fieldName == 'discount_lifetime_max_amt_type' ) || ($fieldName == 'discount_lifetime_max_amt_count' ) ) {
          //only process these combos on the 1st iteration only!!
          if ($k > 0) {
             break;
          }
       }

      $field_has_an_error = 'no'; 
      //if the DEAL STRUCTURE KEY field name is in the RULE EDITS array
      if ( $fieldAttributes['edit_is_active'] ) {   //if field active for this template selection
        $dropdown_status; //init variable
        $dropdown_value;  //init variable  
        switch( $fieldAttributes['field_type'] ) {
          case 'dropdown':                   
                if ( ( $vtcrt_deal_structure_framework[$fieldName] == '0' ) || ($vtcrt_deal_structure_framework[$fieldName] == ' ' ) || ($vtcrt_deal_structure_framework[$fieldName] == ''  ) ) {   //dropdown value not selected
                    if ( $fieldAttributes['required_or_optional'] == 'required' ) {                          
                      $vtcrt_rule->rule_error_message[] = array( 
                        'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector']. '_' . $k,  //errmsg goes before current onscreen line
                        'error_msg'  => $fieldAttributes['field_label'] . __(' is required. Please select an option.', 'vtcrt') );
                      $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ; 
                      $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ;        
                      $dropdown_status = 'error';
                      $field_has_an_error = 'yes';
                    }  else {
                       $dropdown_status = 'notSelected'; //optional, still at title, Nothing selected
                    }
                } else {  //something selected
                  //standard 'selected' path              
                  $dropdown_status = 'selected';
                  $dropdown_value  =  $vtcrt_deal_structure_framework[$fieldName];
                } 
             break;

          case 'amt':   //amt is ALWAYS preceeded by a dropdown of some sort...
              //clear the amt field if the matching dropdown is not selected
              if ($dropdown_status == 'notSelected') {
                 $vtcrt_deal_structure_framework[$fieldName] = ''; //initialize the amt field
                 break;
              }
              //clear the amt field if the matching dropdown is selected, but has a value of  'none', etc.. [values not requiring matching amt]
              $dropdown_values_with_no_amt = array('none', 'unlimited', 'zero', 'one', 'no', 'free', 'each', 'all', 'cheapest', 'most_expensive');
              if ( ($dropdown_status == 'selected') && (in_array($dropdown_value, $dropdown_values_with_no_amt)) ) {
                 $vtcrt_deal_structure_framework[$fieldName] = ''; //initialize the amt field
                 break;              
              }                           
             
              // if 'once', 'none' , 'unlimited' on dropdown , then amt field not relevant.
              if ( ($dropdown_status == 'selected') &&  ( in_array($dropdown_value, $skip_amt_edit_dropdown_values) )  ) {                                      
                break;
              }                         
              
              $vtcrt_deal_structure_framework[$fieldName] =  preg_replace('/[^0-9.]+/', '', $vtcrt_deal_structure_framework[$fieldName]); //remove leading/trailing spaces, percent sign, dollar sign
              if ( !is_numeric($vtcrt_deal_structure_framework[$fieldName]) ) {  // not numeric covers it all....
                 if ($dropdown_status == 'selected') { //only produce err msg if previous dropdown status=selected [otherwise amt field cannot be entered]              
                    if  ($vtcrt_deal_structure_framework[$fieldName] <= ' ') {  //if blank, use 'required' msg
                        if ( $fieldAttributes['required_or_optional'] == 'required' ) {
                           $error_msg = $fieldAttributes['field_label'] . 
                                        __(' is required. Please enter a value.', 'vtcrt'); 
                        } else {
                           $error_msg = $fieldAttributes['field_label'] . 
                                        __(' must have a value when a count option chosen in ', 'vtcrt') .
                                        $fieldAttributes['matching_dropdown_label'];
                                                       
                        }
                     } else { //something entered but not numeric...
                        if ( $fieldAttributes['required_or_optional'] == 'required' ) {
                           $error_msg = $fieldAttributes['field_label'] . 
                                        __(' is required and not numeric. Please enter a numeric value <em>only</em>.', 'vtcrt');
                        } else {
                           $error_msg = $fieldAttributes['field_label'] . 
                                        __(' is not numeric, and must have a value value when a count option chosen in ', 'vtcrt') .
                                        $fieldAttributes['matching_dropdown_label'];                             
                        }                         
                     }
                     
                     $vtcrt_rule->rule_error_message[] = array( 
                        'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector'] . '_' . $k,  //errmsg goes before current onscreen line
                        'error_msg'  => $error_msg ); 
                     //$vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                     $vtcrt_rule->rule_error_red_fields[] = $fieldAttributes['matching_dropdown_label_id'] . '_' .$k ;
                     $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ;   
                     $field_has_an_error = 'yes';                            
                 } //end  if 'selected' 
                 //THIS path exits here  
              } else {  
                //SPECIAL NUMERIC EDITS, PRN                  
                 switch( $dropdown_value ) {
                    case 'quantity':
                    case 'forThePriceOf_Units':                                           //only allow whole numbers
                        if ($vtcrt_deal_structure_framework[$fieldName] <= 0) {
                           $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector']. '_' . $k,  //errmsg goes before current onscreen line
                              'error_msg'  => $fieldAttributes['field_label'] .  __(' - when Units are selected, the number must be greater than zero. ', 'vtcrt') );
                           $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                           $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ;                         
                           $field_has_an_error = 'yes';
                        } else {
                          $number_of_decimal_places = vtcrt_numberOfDecimals( $vtcrt_deal_structure_framework[$fieldName] ) ;
                          if ( $number_of_decimal_places > 0 ) {           
                             $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector']. '_' . $k,  //errmsg goes before current onscreen line
                                'error_msg'  => $fieldAttributes['field_label'] .  __(' - when Units are selected, no decimals are allowed. ', 'vtcrt') );
                             $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                             $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                             $field_has_an_error = 'yes';
                          }                        
                        }                            
                      break;
                    case 'forThePriceOf_Currency':  // (only on discount_amt_type)
                        if ( $vtcrt_deal_structure_framework[$fieldName] <= 0 ) {           
                           $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector'] . '_' . $k,  //errmsg goes before current onscreen line
                              'error_msg'  => $fieldAttributes['field_label'] .  __(' - when For the Price of (Currency) is selected, the amount must be greater than zero. ', 'vtcrt') );
                           $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                           $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                        } else {
                          $number_of_decimal_places = vtcrt_numberOfDecimals( $vtcrt_deal_structure_framework[$fieldName] ) ;
                          if ( $number_of_decimal_places > 2 ) {           
                             $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector']. '_' . $k,  //errmsg goes before current onscreen line
                                'error_msg'  => $fieldAttributes['field_label'] .  __(' - when For the Price of (Currency) is selected, up to 2 decimal places <em>only</em>  are allowed. ', 'vtcrt') );
                             $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                             $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                          }
                        }                           
                      break;  
                    case 'currency':
                        if ( $vtcrt_deal_structure_framework[$fieldName] <= 0 ) {           
                           $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector'] . '_' . $k,  //errmsg goes before current onscreen line
                              'error_msg'  => $fieldAttributes['field_label'] .  __(' - when Currency is selected, the amount must be greater than zero. ', 'vtcrt') );
                           $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                           $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                           $field_has_an_error = 'yes';
                        } else {
                          $number_of_decimal_places = vtcrt_numberOfDecimals( $vtcrt_deal_structure_framework[$fieldName] ) ;
                          if ( $number_of_decimal_places > 2 ) {           
                             $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector']. '_' . $k,  //errmsg goes before current onscreen line
                                'error_msg'  => $fieldAttributes['field_label'] .  __(' - when Currency is selected, up to 2 decimal places <em>only</em>  are allowed. ', 'vtcrt') );
                             $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                             $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                             $field_has_an_error = 'yes';
                          }
                        }                             
                      break;
                    case 'fixedPrice':   // (only on discount_amt_type)
                        if ( $vtcrt_deal_structure_framework[$fieldName] <= 0 ) {           
                           $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector'] . '_' . $k,  //errmsg goes before current onscreen line
                              'error_msg'  => $fieldAttributes['field_label'] .  __(' - when Fixed Price is selected, the amount must be greater than zero. ', 'vtcrt') );
                           $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                           $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                           $field_has_an_error = 'yes';
                        } else {
                          $number_of_decimal_places = vtcrt_numberOfDecimals( $vtcrt_deal_structure_framework[$fieldName] ) ;
                          if ( $number_of_decimal_places > 2 ) {           
                             $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector']. '_' . $k,  //errmsg goes before current onscreen line
                                'error_msg'  => $fieldAttributes['field_label'] .  __(' - when Fixed Price is selected, up to 2 decimal places <em>only</em>  are allowed. ', 'vtcrt') );
                             $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                             $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                             $field_has_an_error = 'yes';
                          }                        
                        }                             
                      break;
                    case 'percent':
                        if ( $vtcrt_deal_structure_framework[$fieldName] <= 0 ) {           
                           $vtcrt_rule->rule_error_message[] = array( 
                              'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector'] . '_' . $k,  //errmsg goes before current onscreen line
                              'error_msg'  => $fieldAttributes['field_label'] .  __(' - when Percent is selected, the amount must be greater than zero. ', 'vtcrt') );
                           $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                           $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                           $field_has_an_error = 'yes';
                        } else {
                          if ( $vtcrt_deal_structure_framework[$fieldName] < 1 ) {           
                             $vtcrt_rule->rule_error_message[] = array( 
                                'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector'] . '_' . $k,  //errmsg goes before current onscreen line
                                'error_msg'  => $fieldAttributes['field_label'] .  __(' - the Percent value must be greater than 1.  For example 10% would be "10", not ".10" . ', 'vtcrt') );
                             $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                             $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ; 
                             $field_has_an_error = 'yes';
                          } 
                         }                                  
                      break;
                    case '':
                      break;
                } //end switch
              } //end amount numeric testing       
            break;
         
         case 'text':
              if ( ($vtcrt_deal_structure_framework[$fieldName] <= ' ') && ( $fieldAttributes['required_or_optional'] == 'required' ) ) {  //error possible only if blank                        
                        $vtcrt_rule->rule_error_message[] = array( 
                          'insert_error_before_selector' => $fieldAttributes['insert_error_before_selector'] . '_' . $k,  //errmsg goes before current onscreen line
                          'error_msg'  => $fieldAttributes['field_label'] . __(' is required. Please enter a description.', 'vtcrt') );
                        $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;
                        $vtcrt_rule->rule_error_box_fields[] = '#' . $fieldName . '_' .$k ;  
                        $field_has_an_error = 'yes';
              }
            break;
        } //end switch
      }  else {
        //if this field doesn't have an active edit and hence is not allowed, clear it out in the DEAL STRUCTURE.
        $vtcrt_deal_structure_framework[$fieldName] = '';
      }

      //*******************************
      //Template-Level and Cross-field edits
      //*******************************      
      //This picks up the template_profile_error_msg if appropriate, 
      //  and if no other error messages already created
      if ($field_has_an_error == 'no') {
        switch( $fieldAttributes['allowed_values'] ) {
            case 'all':    //all values are allowed
              break;
            case '':       //no values are allowed
                if ( ($vtcrt_deal_structure_framework[$fieldName] > ' ') && ($fieldAttributes['template_profile_error_msg'] > ' ' ) ) {
                  $field_has_an_error = 'yes';
                  $display_this_msg = $fieldAttributes['template_profile_error_msg'];
                  $insertBefore = $fieldAttributes['insert_error_before_selector'];
                  $this->vtcrt_add_cross_field_error_message($insertBefore, $k, $display_this_msg, $fieldName);
                }                      
              break;              
            default:  //$fieldAttributes['allowed_values'] is an array!
                //check for valid values
                if ( !in_array($vtcrt_deal_structure_framework[$fieldName], $fieldAttributes['allowed_values']) ) {  
                  $field_has_an_error = 'yes';
                  $display_this_msg = $fieldAttributes['template_profile_error_msg'];
                  $insertBefore = $fieldAttributes['insert_error_before_selector'];
                  $this->vtcrt_add_cross_field_error_message($insertBefore, $k, $display_this_msg, $fieldName);
                }
              break;
        }

        //Cross-field edits
        $sizeof_cross_field_edits = sizeof($fieldAttributes['cross_field_edits']);
        if ( ($field_has_an_error == 'no') && ($sizeof_cross_field_edits > 0) ) {
          for ( $c=0; $c < $sizeof_cross_field_edits; $c++) {
              //if current field values fall within value array that the cross-edit applies to
              if ( in_array($vtcrt_deal_structure_framework[$fieldName], $fieldAttributes['cross_field_edits'][$c]['applies_to_this_field_values']) ) {               
                 $cross_field_name = $fieldAttributes['cross_field_edits'][$c]['cross_field_name'];
                 if ( !in_array($vtcrt_deal_structure_framework[$cross_field_name], $fieldAttributes['cross_field_edits'][$c]['cross_allowed_values']) ) {  
                    //special handling for these 2, as they're not in the standard edit framwork, and we don't have the values yet
                    if ( ($fieldName = 'discount_auto_add_free_product') &&
                        (($cross_field_name == 'popChoiceOut') ||
                         ($cross_field_name == 'cumulativeCouponPricing')) ) {
                        
                        if ($cross_field_name == 'popChoiceOut') {
                          $field_value_temp = $_REQUEST['popChoiceOut'];
                        } else {
                          $field_value_temp = $_REQUEST['cumulativeCouponPricing'];
                        }
                        
                        if ( !in_array($field_value_temp, $fieldAttributes['cross_field_edits'][$c]['cross_allowed_values']) ) { 
                          $field_has_an_error = 'yes';
                          $display_this_msg = $fieldAttributes['cross_field_edits'][$c]['cross_error_msg'];
                          $insertBefore = $fieldAttributes['cross_field_edits'][$c]['cross_field_insertBefore'];
                          $vtcrt_rule->rule_error_red_fields[] = '#' . $cross_field_name . '_label_' .$k ;
                          //custom error name
                          //this cross-edit name wasn't being picked up correctly...                    
                          $this->vtcrt_add_cross_field_error_message($insertBefore, $k, $display_this_msg, $fieldName);	 
                        } else {
                          
                          if ($cross_field_name == 'popChoiceOut') {
                          
                                
                                //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +             
                                                                                
                          
                          }
                          
                        }
                        
                    } else {
                      //Normal error processing
                      $field_has_an_error = 'yes';
                      $display_this_msg = $fieldAttributes['cross_field_edits'][$c]['cross_error_msg'];
                      $insertBefore = $fieldAttributes['cross_field_edits'][$c]['cross_field_insertBefore'];
                      $vtcrt_rule->rule_error_red_fields[] = '#' . $cross_field_name . '_label_' .$k ;
                      //custom error name
                      //this cross-edit name wasn't being picked up correctly...                    
                      $this->vtcrt_add_cross_field_error_message($insertBefore, $k, $display_this_msg, $fieldName);	 
                      
                    }

              }
            }
          } //end for cross-edit loop       
        } //END Template-Level and Cross-field edits

      } //end if no-error 
      
       
    }  //end foreach

    return;
  }

  public function vtcrt_add_cross_field_error_message($insertBefore, $k, $display_this_msg, $fieldName) { 
    global $vtcrt_rule, $vtcrt_deal_structure_framework;
    $vtcrt_rule->rule_error_message[] = array( 
      'insert_error_before_selector' =>  $insertBefore . '_' . $k,  //errmsg goes before current onscreen line
      'error_msg'  => $display_this_msg 
      );
    //  'error_msg'  => $fieldAttributes['field_label'] . ' ' .$display_this_msg );
    $vtcrt_rule->rule_error_red_fields[] = '#' . $fieldName . '_label_' .$k ;  
  }
  
    
  public function vtcrt_dump_deal_lines_to_rule() {  
     global $vtcrt_rule, $vtcrt_deal_structure_framework;
     $deal_iterations_done = 'no'; //initialize variable

     for($k=0; $deal_iterations_done == 'no'; $k++) {      
       if ( (isset( $_REQUEST['buy_repeat_condition_' . $k] )) && (!empty( $_REQUEST['buy_repeat_condition_' . $k] )) ) {    //is a deal line there? always 1 at least...
         //INITIALIZE was introducing an iteration error!!!!!!!!          
         //$this->vtcrt_initialize_deal_structure_framework();       
         foreach( $vtcrt_deal_structure_framework as $key => $value ) {   //spin through all of the screen fields  
            $vtcrt_deal_structure_framework[$key] = $_REQUEST[$key . '_' .$k];        
         }                 
         $vtcrt_rule->rule_deal_info[] = $vtcrt_deal_structure_framework;   //add each line to rule, regardless if empty              
       } else {     
         $deal_iterations_done = 'yes';
       }
     }		  
  }
  
  public function vtcrt_build_deal_edits_framework() {
    global $vtcrt_rule, $vtcrt_template_structures_framework, $vtcrt_deal_edits_framework;
    
    //mwn20140414
    if ($vtcrt_rule->rule_template <= '0') {
        return; 
    }
        
    // previously determined template key
    $templateKey = $vtcrt_rule->rule_template; 
    $additional_template_rule_switches = array ( 'discountAppliesWhere' ,  'inPopAllowed' , 'actionPopAllowed'  , 'cumulativeRulePricingAllowed', 'cumulativeSalePricingAllowed', 'replaceSalePricingAllowed', 'cumulativeCouponPricingAllowed') ;
    $nextInActionPop_templates = array ( 'C-discount-Next', 'C-forThePriceOf-Next', 'C-cheapest-Next', 'C-nth-Next' );
 
    foreach( $vtcrt_template_structures_framework[$templateKey] as $key => $value ) {            
      //check for addtional template switches first ==> they are stored in this framework for convenience only.
      if ( in_array($key, $additional_template_rule_switches) ) {
        switch( $key ) {
            case 'discountAppliesWhere':               // 'allActionPop' / 'inCurrentInPopOnly'  / 'nextInInPop' / 'nextInActionPop' / 'inActionPop' /
              // if template set to nextInActionPop, check if it should be overwritten...
              //this is a duplicate field load, done here in advance PRN 
              //OVERWRITE discountAppliesWhere TO GUIDE THE APPLY LOGIC AS TO WHICH GROUP WILL BE ACTED UPON 
              $vtcrt_rule->actionPop = $_REQUEST['popChoiceOut'];
              if ( (in_array($templateKey, $nextInActionPop_templates))  &&
                   ($vtcrt_rule->actionPop == 'sameAsInPop') ) {
                $vtcrt_rule->discountAppliesWhere =  'nextInInPop';
              } else {
                $vtcrt_rule->discountAppliesWhere = $value;
              }             
            break;
          case 'inPopAllowed':
              $vtcrt_rule->inPopAllowed = $value;
            break; 
          case 'actionPopAllowed':
              $vtcrt_rule->actionPopAllowed = $value;
            break;            
          case 'cumulativeRulePricingAllowed':
              $vtcrt_rule->cumulativeRulePricingAllowed = $value; 
            break;
          case 'cumulativeSalePricingAllowed':
              $vtcrt_rule->cumulativeSalePricingAllowed = $value; 
            break;
          case 'replaceSalePricingAllowed':
              $vtcrt_rule->replaceSalePricingAllowed = $value; 
            break;            
          case 'cumulativeCouponPricingAllowed':
              $vtcrt_rule->cumulativeCouponPricingAllowed = $value; 
            break;
        }
      } else {      
        if ( ($value['required_or_optional'] == 'required') || ($value['required_or_optional'] == 'optional') ) {
          //update required/optional, $key = field name, same relative value across both frameworks...
          $vtcrt_deal_edits_framework[$key]['edit_is_active']       = 'yes';
          $vtcrt_deal_edits_framework[$key]['required_or_optional'] = $value['required_or_optional'];         
        } else {
          $vtcrt_deal_edits_framework[$key]['edit_is_active']       = '';
        }
        
        $vtcrt_deal_edits_framework[$key]['allowed_values']  =  $value['allowed_values'];
        $vtcrt_deal_edits_framework[$key]['template_profile_error_msg']  =  $value['template_profile_error_msg'];
        
        //cross_field_edits is an array which ***will only exist where required ****
        if ($value['cross_field_edits']) {
           $vtcrt_deal_edits_framework[$key]['cross_field_edits']  =  $value['cross_field_edits'];
        }
      }            
    } 
   
    return;
  }  

  /* **********************************
   If no edit errors are present,
      clear out irrelevant/conflicting data 
      left over from setting up the rule
        where conditions were changed
      *************************************** */
  public function vtcrt_maybe_clear_extraneous_data() { 
    global $post, $vtcrt_rule, $vtcrt_rule_template_framework, $vtcrt_deal_edits_framework, $vtcrt_deal_structure_framework;     
    
    //IF there are edit errors, leave everything as is, exit stage left...
    if ( sizeof($vtcrt_rule->rule_error_message ) > 0 ) {  
      return;
    }

    //*************
    //Clear BUY area
    //*************
    if (($vtcrt_rule->rule_deal_info[0]['buy_amt_type'] == 'none') ||
        ($vtcrt_rule->rule_deal_info[0]['buy_amt_type'] == 'one')) {
       $vtcrt_rule->rule_deal_info[0]['buy_amt_count'] = null; 
    }
    
    if ($vtcrt_rule->rule_deal_info[0]['buy_amt_mod'] == 'none') {
       $vtcrt_rule->rule_deal_info[0]['buy_amt_mod_count'] = null; 
    }  
  
    switch( $vtcrt_rule->inPop ) {
      case 'wholeStore':
          //clear vargroup
          $vtcrt_rule->inPop_varProdID = null;
          $vtcrt_rule->inPop_varProdID_name = null; 
          $vtcrt_rule->var_in_checked = array(); 
          $vtcrt_rule->inPop_varProdID_parentLit = null; 
          //clear single
          $vtcrt_rule->inPop_singleProdID = null; 
          $vtcrt_rule->inPop_singleProdID_name = null;
          //clear groups
          $vtcrt_rule->prodcat_in_checked = array();
          $vtcrt_rule->rulecat_in_checked = array();
          $vtcrt_rule->role_in_checked = array();
          $vtcrt_rule->role_and_or_in = null;          
        break;
      
       //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
      
    }  
    
    if ($vtcrt_rule->rule_deal_info[0]['buy_repeat_condition'] == 'none') {
       $vtcrt_rule->rule_deal_info[0]['buy_repeat_count'] = null; 
    }      
    //End BUY area clear

    //*************
    //Clear GET area
    //*************
    if (($vtcrt_rule->rule_deal_info[0]['action_amt_type'] == 'none') ||
        ($vtcrt_rule->rule_deal_info[0]['action_amt_type'] == 'zero') ||
        ($vtcrt_rule->rule_deal_info[0]['action_amt_type'] == 'one')) {
       $vtcrt_rule->rule_deal_info[0]['action_amt_count'] = null; 
    }
    
    if ($vtcrt_rule->rule_deal_info[0]['action_amt_mod'] == 'none') {
       $vtcrt_rule->rule_deal_info[0]['action_amt_mod_count'] = null; 
    }  
  
    switch( $vtcrt_rule->actionPop ) {
      case 'sameAsInPop':
      case 'wholeStore':
          //clear vargroup
          $vtcrt_rule->actionPop_varProdID = null;
          $vtcrt_rule->actionPop_varProdID_name = null; 
          $vtcrt_rule->var_out_checked = array(); 
          $vtcrt_rule->actionPop_varProdID_parentLit = null;
         // $vtcrt_rule->var_out_product_variations_parameter = array(); 
          //clear single
          $vtcrt_rule->actionPop_singleProdID = null; 
          $vtcrt_rule->actionPop_singleProdID_name = null;
          //clear groups
          $vtcrt_rule->prodcat_out_checked = array();
          $vtcrt_rule->rulecat_out_checked = array();
          $vtcrt_rule->role_out_checked = array();
          $vtcrt_rule->role_and_or_out = null;          
        break;
      
       //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
       
    }  
    
    if ($vtcrt_rule->rule_deal_info[0]['action_repeat_condition'] == 'none') {
       $vtcrt_rule->rule_deal_info[0]['action_repeat_count'] = null; 
    }      
    //End GET area clear


    //*************
    //Clear DISCOUNT area        
    //*************
    switch( $vtcrt_rule->rule_deal_info[0]['discount_amt_type'] ) {
      case 'percent':
          $vtcrt_rule->rule_deal_info[0]['discount_auto_add_free_product'] = null;  
        break;
      case 'currency':
          $vtcrt_rule->rule_deal_info[0]['discount_auto_add_free_product'] = null; 
        break;
      case 'fixedPrice':
          $vtcrt_rule->rule_deal_info[0]['discount_auto_add_free_product'] = null; 
        break;
      case 'free':
          $vtcrt_rule->rule_deal_info[0]['discount_amt_count'] = null;
        break;
      case 'forThePriceOf_Units':
          $vtcrt_rule->rule_deal_info[0]['discount_auto_add_free_product'] = null; 
        break;
      case 'forThePriceOf_Currency':
          $vtcrt_rule->rule_deal_info[0]['discount_auto_add_free_product'] = null; 
        break;
    }
    //End Discount clear


    //*************
    //Clear MAXIMUM LIMITS area        
    //*************    
    
    if ($vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_type'] == 'none') {
       $vtcrt_rule->rule_deal_info[0]['discount_rule_max_amt_count'] = null; 
    } 
    if ($vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_type'] == 'none') {
       $vtcrt_rule->rule_deal_info[0]['discount_lifetime_max_amt_count'] = null; 
    }     
    if ($vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_type'] == 'none') {
       $vtcrt_rule->rule_deal_info[0]['discount_rule_cum_max_amt_count'] = null; 
    } 
    //End Maximum Limits clear        

    return;  
  }


  //*************************
  //Pop Filter Agreement Check (switch used in apply...)
  //*************************
  public function vtcrt_maybe_pop_filter_agreement() { 
    global $vtcrt_rule;     
  
    if ($vtcrt_rule->actionPop  ==  'sameAsInPop' ) {
      $vtcrt_rule->set_actionPop_same_as_inPop = 'yes';
      return;
    }
    
    
    if (($vtcrt_rule->inPop      ==  'wholeStore') &&
        ($vtcrt_rule->actionPop  ==  'wholeStore') ) {
      $vtcrt_rule->set_actionPop_same_as_inPop = 'yes';
      return;
    }


    //EDITED * + * +  * + * +  * + * +  * + * + * + * +  * + * +  * + * +  * + * +
     
      
    $vtcrt_rule->set_actionPop_same_as_inPop = 'no';
    return;
  }
  


  /* ************************************************
  **   Get single variation data to support discount_auto_add_free_product, Pro Only
  *************************************************** */
  public function vtcrt_get_variations_parameter($which_vargroup) {

    global $wpdb, $post, $vtcrt_rule, $woocommerce;

    if ($which_vargroup == 'inPop') {
       $product_id    =  $vtcrt_rule->inPop_varProdID;
       $variation_id  =  $vtcrt_rule->var_in_checked[0];    
    } else {
       $product_id    =  $vtcrt_rule->actionPop_varProdID;
       $variation_id  =  $vtcrt_rule->var_out_checked[0];     
    }
 
    //************************
    //FROM woocommerce/woocommerce-functions.php  function woocommerce_add_to_cart_action
    //************************
    
	  $adding_to_cart      = get_product( $product_id );

  	$all_variations_set = true;
  	$variations         = array();

		$attributes = $adding_to_cart->get_attributes();
		$variation  = get_product( $variation_id );

		// Verify all attributes
		foreach ( $attributes as $attribute ) {
      if ( ! $attribute['is_variation'] )
      	continue;

      $taxonomy = 'attribute_' . sanitize_title( $attribute['name'] );


          // Get value from post data
          // Don't use woocommerce_clean as it destroys sanitized characters
         // $value = sanitize_title( trim( stripslashes( $_REQUEST[ $taxonomy ] ) ) );
          $value = $variation->variation_data[ $taxonomy ];

          // Get valid value from variation
          $valid_value = $variation->variation_data[ $taxonomy ];
          // Allow if valid
          if ( $valid_value == '' || $valid_value == $value ) {
            if ( $attribute['is_taxonomy'] )
            	$variations[ esc_html( $attribute['name'] ) ] = $value;
            else {
              // For custom attributes, get the name from the slug
              $options = array_map( 'trim', explode( '|', $attribute['value'] ) );
              foreach ( $options as $option ) {
              	if ( sanitize_title( $option ) == $value ) {
              		$value = $option;
              		break;
              	}
              }
               $variations[ esc_html( $attribute['name'] ) ] = $value;
            }
            continue;
        }

    }


    $product_variations_array = array(
       'parent_product_id'    => $product_id,
       'variation_product_id' => $variation_id,
       'variations_array'     => $variations
      );   
    

    return ($product_variations_array);
  } 
  
       
  
} //end class