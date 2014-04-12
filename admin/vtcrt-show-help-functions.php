<?php
 /*

 */
            
  //************************************************
  // Help panel for Pricing Deal Screen
  //************************************************ 
  function vtcrt_show_help_selection_panel_0() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  ?>           
    <div class="selection-panel selection-panel-0" id="selection-panel-0" >                                
      <span class="selection-panel-label label"><strong><?php _e('Tell me about Cart Deals', 'vtcrt');?></strong></span>  
      <a id="open-help-in-new-window"  href="<?php bloginfo('url');?>/wp-admin/edit.php?post_type=vtcrt-rule&page=vtcrt_show_help_page" onclick="javascript:void window.open('<?php bloginfo('url');?>/wp-admin/edit.php?post_type=vtcrt-rule&page=vtcrt_show_help_page','1375122357919','width=1200,height=500,toolbar=0,menubar=0,location=1,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Open "Help" in a Separate Window</a> 
      <a class="selection-panel-close selection-panel-close-0" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                      
  		<span class="selection-panel-text" >
        <span class="selection-panel-text-info">
        
        <?php
          vtcrt_show_help_panel_0_text();
        ?>
       
        </span>
      </span> 
      <a class="selection-panel-close  clear-left selection-panel-close-0" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
    </div>       
<?php 
   return;  
  }   
  //************************************************
  // General Introduction and outline, in clickable FAQ format
  //************************************************  
  function vtcrt_show_help_panel_0_text() {               
      ?>      
      <span class="textarea vtcrt-intro-info">         
          <h4 id="vtcrt-test-warning"><?php _e('**Always Test the Heck out of a Rule** before Releasing it into the Wild!', 'vtcrt');?>
              <a id="pricing-deal-examples-more2" class="more-anchor" href="javascript:void(0);"><?php _e(' Pricing Deal Examples ', 'vtcrt'); ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a>            
              <a id="pricing-deal-examples-less2" class="more-anchor less-anchor" href="javascript:void(0);"><?php _e('   Less Examples ...', 'vtcrt'); ?><img class="minus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>              
          </h4> 
             <?php vtcrt_show_help_selection_panel_5(); ?>
          <h4 id="vtcrt-discount-out-of-the-box"><?php _e('Plugin Works Out of the Box!', 'vtcrt');?> 
             <a id="vtcrt-info1-help6" class="info-doc-anchor" href="javascript:void(0);" ><?php _e('More Info', 'vtcrt');?></a>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <a id="vtcrt-info1-help-all" class="info-help-anchor" href="javascript:void(0);" ><span><?php esc_attr_e('Show All', 'vtcrt'); ?></span></a>              
             <a id="discount-shortcodes-more2" class="more-anchor" href="javascript:void(0);"><?php _e('Add Pricing Deal Messages to your Theme using Shortcodes! ', 'vtcrt'); ?>&nbsp;<img class="plus-button" alt="help" height="10px" width="10px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a>            
             <a id="discount-shortcodes-less2" class="more-anchor less-anchor" href="javascript:void(0);"><?php _e('  Less Shortcodes Help ... ', 'vtcrt'); ?>&nbsp;<img class="minus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>          
          </h4>
              <?php vtcrt_show_help_selection_panel_4(); ?>
          <ul id="vtcrt-info1-help6-text" class="vtcrt-info1-help-text">
            <li><?php _e('- Just Create a Rule, of either Realtime or Cart type', 'vtcrt');?> </li>
            <li><?php _e('- Realtime pricing discounts will be applied to the product automatically when the product is displayed, in response to a Realtime rule', 'vtcrt');?> </li>
            <li><?php _e('- Cart Rule discounts will be automatically shown in detail at checkout, and all Cart discounts applied ', 'vtcrt'); echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; _e('(lots of checkout settings ', 'vtcrt');?>  
              <?php echo '<a href="' . admin_url( 'edit.php?post_type=vtcrt-rule&page=vtcrt_setup_options_page#vtcrt-checkout-reporting-anchor' ) . '">' . __( 'options', 'vtcrt' ) . '</a>';?>
              <?php echo ')'; ?>
            </li>
          </ul>

                
          <h4 id="vtcrt-discount-type"><?php _e('When are Discounts Applied?', 'vtcrt'); echo '&nbsp;=>&nbsp;'; _e(' Realtime or in the Cart', 'vtcrt');?>
            <a id="vtcrt-info1-help0" class="info-doc-anchor" href="javascript:void(0);" ><?php _e('More Info', 'vtcrt');?></a>
            <a id="discount-amt-info-more2" class="more-anchor" href="javascript:void(0);"><?php _e('Checkout How-to', 'vtcrt'); echo '&nbsp;-&nbsp;'; _e('Discounts Work out of the Box ', 'vtcrt'); ?>&nbsp;<img class="plus-button" alt="help" height="10px" width="10px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a>            
            <a id="discount-amt-info-less2" class="more-anchor less-anchor" href="javascript:void(0);"><?php _e('  Less Checkout Discount Display Help ... ', 'vtcrt'); ?>&nbsp;<img class="minus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <?php vtcrt_show_help_selection_panel_1(); ?>
          <ul id="vtcrt-info1-help0-text" class="vtcrt-info1-help-text">
            <li><?php _e('Realtime Type - acts when the catalog displays, and the product price is automatically reduced => often used for Membership or Wholesaler discounts / Discount prices for logged in users', 'vtcrt');?> </li>
            <li><?php _e('Add-to-Cart Type - acts when the product is added to cart', 'vtcrt');?> </li>
          </ul>

          <h4 id="vtcrt-discount-rules"><?php _e('Discount Rule Info', 'vtcrt');?>
            <a id="vtcrt-info1-help1" class="info-doc-anchor" href="javascript:void(0);" ><?php _e('More Info', 'vtcrt');?></a>
            <a id="discount-msgs-install-more2" class="more-anchor" href="javascript:void(0);"><?php _e('Cart Widget How-to', 'vtcrt'); echo '&nbsp;-&nbsp;'; _e('Add All Pricing Deal Discounts ', 'vtcrt'); ?>&nbsp;<img class="plus-button" alt="help" height="10px" width="10px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a>            
            <a id="discount-msgs-install-less2" class="more-anchor less-anchor" href="javascript:void(0);"><?php _e('  Less Cart Widget Install Help ... ', 'vtcrt'); ?>&nbsp;<img class="minus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                                    
          </h4>
          <?php vtcrt_show_help_selection_panel_3(); ?>           
          <ul id="vtcrt-info1-help1-text" class="vtcrt-info1-help-text">
            <li><?php _e('Rule Types [Realtime and Cart]', 'vtcrt');?> </li>
            <li><?php _e('Rule Templates - Refine the capability used by each Rule by Deal Type chosen', 'vtcrt');?> 
              <ul>
                <li><?php _e('Basic Rule Structure - "Buy 1 Get 1"', 'vtcrt');?> </li>
                <li><?php _e('Define the basics', 'vtcrt');?>
                  <ul>
                    <li><?php _e('"Buy" group and "Get" Group', 'vtcrt');?> 
                      <ul>
                        <li><?php _e('By Product Category ,  Pricing Deal Custom Taxonomy Category, Wholesaler / Membership / Discount Levels for logged in users, Product ID, Variation', 'vtcrt');?></li> 
                      </ul>
                    </li>
                    <li><?php _e('Discount type and amount', 'vtcrt');?> </li>
                    <li><?php _e('Enter a Theme Deal description message and Checkout (short) Deal Message', 'vtcrt');?> </li>
                    <li><?php _e('Enter begin/end dates', 'vtcrt');?> </li>
                  </ul>
                </li>
                <li><?php _e('Rule exclusion - Available at the product level, on the product page', 'vtcrt');?></li>
              </ul>
            </li>
          </ul>

          <h4 id="vtcrt-discount-rules"><?php _e('Display Theme Messages and Info', 'vtcrt');?>
            <a id="vtcrt-info1-help2" class="info-doc-anchor" href="javascript:void(0);" ><?php _e('More Info', 'vtcrt');?></a>
            <a id="discount-msgs-info-more2" class="more-anchor" href="javascript:void(0);"><?php _e('Add "You Save" and "Old Price" Realtime Rule Info to your Theme ', 'vtcrt'); ?>&nbsp;<img class="plus-button" alt="help" height="10px" width="10px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a>            
            <a id="discount-msgs-info-less2" class="more-anchor less-anchor" href="javascript:void(0);"><?php _e('  Less Realtime Messages Use Help ... ', 'vtcrt'); ?>&nbsp;<img class="minus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>
          </h4>
          <?php vtcrt_show_help_selection_panel_2(); ?> 
          <ul id="vtcrt-info1-help2-text" class="vtcrt-info1-help-text">
            <li><?php _e('Discount Deal Rule Messages displayed in Theme', 'vtcrt');?>
               <ul>
                <li><?php _e('Via Shortcode', 'vtcrt');?> 
                  <ul>
                    <li><?php _e('3 different kinds of shortcode, with parameters for whole store, deals by category, product etc', 'vtcrt');?></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><?php _e('Product-specific info, such as "You Save" or "Old Price" (available ', 'vtcrt'); echo '<em>'; _e('only', 'vtcrt'); echo '</em>'; _e(' for Realtime Rules)', 'vtcrt');?> 
              <ul>
                <li><em><?php _e('Look in ', 'vtcrt'); 
                        echo 'vt-cart-deals-for-' . VTCRT_PARENT_PLUGIN_TEXTNAME . '/' . VTCRT_PARENT_PLUGIN_ABBREV . '-integration ';    
                        _e('folders for how-to info', 'vtcrt');?></em> 
                  <ul>
                    <li><?php _e('"Sample Cart Widget" folder', 'vtcrt');?></li>
                    <li><?php _e('Theme product-level info', 'vtcrt');?>  
                    <?php if (VTCRT_PARENT_PLUGIN_NAME == 'WP E-Commerce') { ?>
                      <ul>
                        <li><?php _e('Two folders - before release 3.8.9, and after', 'vtcrt');?> 
                          <ul>
                            <li><?php _e('"Sample wpsc-theme before 3.8.9" folder', 'vtcrt');?></li>
                            <li><?php _e('"Sample wpsc-theme 3.8.9+" folder', 'vtcrt');?></li>  
                          </ul>
                        </li>
                        <li><?php _e('Each folder contains samples on how to integrate Pricing Deal messages into your Theme for grid-view, list-view, single-product, and products-page.', 'vtcrt');?></li> 
                      </ul>
                    <?php } ?>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>

          <h4 id="vtcrt-discount-rules"><?php _e('Products Discount display', 'vtcrt');?>
            <a id="vtcrt-info1-help3" class="info-doc-anchor" href="javascript:void(0);" ><?php _e('More Info', 'vtcrt');?></a>
          </h4>       
          <ul id="vtcrt-info1-help3-text" class="vtcrt-info1-help-text">
            <li><?php _e('Display types', 'vtcrt');?>
               <ul>
                <li><?php _e('Realtime Display discount directly in the product Catalog', 'vtcrt');?> 
                  <ul>
                    <li><?php _e('Catalog Price Reduction ', 'vtcrt');?>
                      <ul>
                        <li><?php _e('Price is automatically reduced when shown to the customer ', 'vtcrt');?></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><?php _e('Products discounted in the cart, based on add-to-cart rules', 'vtcrt');?> 
                  <ul>
                    <li><?php _e('Display discounts in the Cart', 'vtcrt');?> 
                      <ul>
                        <li><?php _e('In the Cart Widget', 'vtcrt');?>  
                          <ul>
                            <li><?php _e('With the addition of three lines to your Theme cart widget, rule discounts will be shown in mini-cart', 'vtcrt');?></li>                        
                          </ul>
                        </li>
                        <li><?php _e('At Checkout', 'vtcrt');?>  
                          <ul>
                            <li><?php _e('Discounts can be shown at various levels and places in the checkout', 'vtcrt');?>                        
                              <ul>
                                <li><?php _e('By product and rule short description', 'vtcrt');?></li>
                                <li><?php _e('By product discount total', 'vtcrt');?></li>
                                <li><?php _e('By discount total for Cart only', 'vtcrt');?></li>                        
                              </ul>
                            </li>                      
                          </ul>
                        </li>                    
                      </ul>
                    </li>
                  </ul>
                </li>                
              </ul>
            </li>
            <li><?php _e('Many display options are available in the product settings, for both the Cart Widget and Checkout.', 'vtcrt');?></li>
          </ul>

          <h4 id="vtcrt-discount-rules"><?php _e('Discounts Working Together', 'vtcrt');?>
            <a id="vtcrt-info1-help4" class="info-doc-anchor" href="javascript:void(0);" ><?php _e('More Info', 'vtcrt');?></a>
          </h4>
          <ul id="vtcrt-info1-help4-text" class="vtcrt-info1-help-text">
            <li><?php _e('Each Discount Deal has settings for interaction with', 'vtcrt');?> 
              <ul>
                <li><?php _e('Other Discount Deals', 'vtcrt');?> </li>
                <li><?php _e('Sale Pricing', 'vtcrt');?></li>
                <li><?php _e('Coupon Use', 'vtcrt');?></li>
              </ul>
            </li>
            <li><?php _e('A variety of maximum settings are available by Rule', 'vtcrt');?> 
              <ul>
                <li><?php _e('Rule maximum for cart', 'vtcrt');?> </li>
                <li><?php _e('Lifetime rule usage for Customer', 'vtcrt');?> </li>
                <li><?php _e('Rule discount limit for all discounts applied to cart', 'vtcrt');?> </li>
              </ul>
            </li>
            <li><?php _e('A maximum discount percentage can be set in the options to apply to the Whole Store', 'vtcrt');?> 
              <ul>
                <li><?php _e('Sets a floor percentage for all discounts By product', 'vtcrt');?> </li>
              </ul>
            </li>                       
          </ul>
 
          <h4 id="vtcrt-discount-rules"><?php _e('Audit Trail', 'vtcrt');?>
            <a id="vtcrt-info1-help5" class="info-doc-anchor" href="javascript:void(0);" ><?php _e('More Info', 'vtcrt');?></a>
          </h4>
          <ul id="vtcrt-info1-help5-text" class="vtcrt-info1-help-text">
            <li><?php _e('Discount Log Tables saved', 'vtcrt');?> 
              <ul>
                <li><?php _e('By Cart and Customer', 'vtcrt');?> </li>
                <li><?php _e('Showing Cart discount totals', 'vtcrt');?></li>
                <li><?php _e('Showing Each discount by product and rule', 'vtcrt');?></li>
              </ul>
            </li>                      
          </ul>
                                
      </span> <?php //end  .textarea span ?> 
     <?php   
  }

            
  //************************************************
  // Help panel for Discount Amt Info
  //************************************************ 
  function vtcrt_show_help_selection_panel_1() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  ?>           
    <div class="selection-panel selection-panel-1" id="selection-panel-1" >                                
      <span class="selection-panel-label label"><strong><?php _e('How Does the Discount display at Checkout?', 'vtcrt');?></strong></span>                         
      <a class="selection-panel-close selection-panel-close-1" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                     
  		<span class="selection-panel-text" >
        <span class="selection-panel-text-info">
        
        <?php
          vtcrt_show_help_panel_1_text();
        ?>
       
        </span>
      </span> 
      <a class="selection-panel-close selection-panel-close-1" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
    </div>       
<?php 
   return;  
  }   
  //************************************************ 
  //Discount Display INFO for both Checkout and Cart Widget
  //************************************************ 
  function vtcrt_show_help_panel_1_text() {               
      ?>
          <span class="infoSection">
            <span class="textarea">
              
              <h4 class="discount-help-title"><?php _e('Cart Deals Discounts show Automatically at Checkout', 'vtcrt');?></h4>
             
              <ol class="directions-list">
                <li><?php _e('Realtime Discounts display automatically when the product price is first displayed to the customer.', 'vtcrt');?> </li>
                <li><?php _e('Add to Cart discounts are displayed to the customer at Checkout and in the Cart Widget', 'vtcrt');?></li>
              </ol>               
             </span>
              
              <span class="textarea">
              <strong><?php _e('There are ', 'vtcrt'); echo '<em>'; _e('no code changes required', 'vtcrt'); echo '</em>'; _e(' to display discounts at checkout.', 'vtcrt');?></strong>
              </span>
      
              <span class="textarea"><br><?php _e('The Discount Totals for the cart are loaded in to the Cart"s coupon
                  amount field for processing.', 'vtcrt');?></span>
   
            
              
            <ol class="directions-list">
              <li><?php _e('Discount totals are combined into a single discount bucket, along with any coupon discounts..', 'vtcrt');?> </li>
              <li><?php _e('If there are no coupons presented, the Pricing Deal plugin will create its own Discount Totals line for the cart.', 'vtcrt');?> </li>
              <li><?php _e('If an active coupon amount is present, and the Pricing Deal discount applies in addition to the Coupon discount,
                            the total will be displayed by default as part of the Coupon Discount total.', 'vtcrt');?></li>
            </ol>
            <span class="textarea"> 
              <?php _e('Discounts at checkout are controlled by the group of settings in the ', 'vtcrt');?>
              <?php echo '<a href="' . admin_url( 'edit.php?post_type=vtcrt-rule&page=vtcrt_setup_options_page#vtcrt-checkout-reporting-anchor' ) . '">' . __( 'Settings Page - Checkout Discount Options', 'vtcrt' ) . '</a>';?>
            </span> 
                                   
          </span>
      
    <?php 
  }

            
  //************************************************
  // Help panel for Discount Msgs Info
  //************************************************ 
  function vtcrt_show_help_selection_panel_2() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  ?>           
    <div class="selection-panel selection-panel-2" id="selection-panel-2" >                                
      <span class="selection-panel-label label"><strong><?php _e('How to Use Discount Messages in your Theme?', 'vtcrt');?></strong></span>                         
      <a class="selection-panel-close selection-panel-close-2" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                      
  		<span class="selection-panel-text" >
        <span class="selection-panel-text-info">
        
        <?php
          vtcrt_show_help_panel_2_text();
        ?>
       
        </span>
      </span> 
      <a class="selection-panel-close selection-panel-close-2" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
    </div>       
<?php 
   return;  
  }   
  //************************************************
  // Help panel for Discount Msgs Info
  //************************************************  
  function vtcrt_show_help_panel_2_text() {               
   ?> 
      <span class="infoSection">
        <span class="textarea"> 
          
          <h4 class="discount-help-title"><?php _e('Installing "You Save" and "Old Price" messages in your Theme (available ', 'vtcrt'); echo '<em>'; _e('only', 'vtcrt'); echo '</em>'; _e(' for Realtime Rules)', 'vtcrt');?></h4>
        </span>  
        
        <span class="textarea"><?php _e('Your theme contains the following four files, which all require changes, in order to display Pricing Deal "Yousave" and "Old Price" messages.  
                Please note that the  "You Save" and "Old Price" functionality for ', 'vtcrt'); echo '<em>'; _e('regular', 'vtcrt'); echo '</em>'; _e(' sale pricing will remain in effect.', 'vtcrt');?>
        </span>
        
        <ol class="directions-list">
          <li><?php echo '"wpsc-grid_view.php"';?> </li>
          <li><?php echo '"wpsc-list_view.php"';?> </li>
          <li><?php echo '"wpsc-products_page"';?> </li>
          <li><?php echo '"wpsc-single_product.php"';?> </li>
        </ol>
        <span class="textarea"> 
          <?php _e('Find the sample version of these same files.  Look in ', 'vtcrt');?>
          <em>
          <?php  echo 'vt-cart-deals-for-' . VTCRT_PARENT_PLUGIN_TEXTNAME . '/' . VTCRT_PARENT_PLUGIN_ABBREV . '-integration'; ?> 
          </em>  
          <?php  _e(' folders for step-by-step instructions.', 'vtcrt');?>  
          <br><em>
          <?php  _e('Apply the changes you find in the appropriate sample folder, to your matching theme files.', 'vtcrt');?>
          </em> 
        </span>
        
        <ol class="directions-list">
          <li><?php _e('"Sample wpsc-theme before 3.8.9" folder', 'vtcrt');?>
              <br>&nbsp;&nbsp;&nbsp;
              <span class="subLine"><?php _e('Within Each of the files, "You Save" and "Old Price" generation are controlled by individual code areas: ', 'vtcrt');?></span>
                <ul class="directions-list">
                  <li><?php _e('If Pricing Deal "You Save" message should be turned off, simply do not make the "You Save" code changes listed.', 'vtcrt');?></li>
                  <li><?php _e('If Pricing Deal "Old Price" message should be turned off, simply do not make the "Old Price" code changes listed.', 'vtcrt');?></li>  
                </ul> 
          </li>
          <li><?php _e('"Sample wpsc-theme 3.8.9+" folder', 'vtcrt');?>
              <br>&nbsp;&nbsp;&nbsp;
              <span class="subLine"><?php _e('Within Each of the files, there are options noted for "You Save" and "Old Price" generation: ', 'vtcrt');?></span>
                <ul class="directions-list">
                  <li><?php _e('vtcrt_the_product_price_display(); => Shows both the Old Price and You Save  messages', 'vtcrt');?></li>
                  <li><?php _e('vtcrt_the_product_price_display( array( "output_old_price" => false ) ); => Turns off the Old Price message', 'vtcrt');?></li>
                  <li><?php _e('vtcrt_the_product_price_display( array( "output_you_save" => false ) );  => Turns off the You Save message', 'vtcrt');?></li>
                  <li><?php _e('vtcrt_the_product_price_display( array( "output_old_price" => false, "output_you_save" => false ) ); => Turns off both messages', 'vtcrt');?></li>  
                </ul>   
          </li>
        </ol>
        
        <span class="textarea">  
           <?php  _e('Choose the folder which matches your WP E-Commerce release, and find the file name within the folder matching each file in your theme.', 'vtcrt');?> 
        </span>
        
        <ol class="directions-list">
          <li><?php _e('Apply the changes from the each sample file to your ', 'vtcrt'); echo '<em>'; _e('active theme', 'vtcrt'); echo '</em>'; _e(' version of the file.', 'vtcrt');?> </li>
          <li><?php _e('If your Active Theme has child-theme capability, place the changed file into the child-theme folder, and you are done.', 'vtcrt'); 
                    echo '<br><em>'; _e('And', 'vtcrt'); echo '</em>'; _e(' you will never have to update this file again, unless your custom theme changes this file on update.', 'vtcrt');?> </li>
          <li><?php _e('If your Active Theme does not have child-theme capability, replace "wpsc-cart_widget.php" where you found it in your theme area.  ', 'vtcrt');?></li>
          <li><?php _e('In this case, <em>Each</em> time your theme updates, you will want to check the "wpsc-cart_widget.php", and re-apply the changes as necessary.', 'vtcrt');?> </li>
        </ol>             
      </span>

      <span class="infoSection">
        <span class="textarea"> 
          
          <h4 class="discount-help-title"><?php _e('Discounts in Cart Widget and Checkout', 'vtcrt');?></h4>
        </span>  
        
        <span class="textarea marginBottom"> 
          <?php _e('- Short Discount Rule Messages are displayed when messaging is selected, and that rule has generated a discount in the Cart', 'vtcrt');?>
        </span> 
                        
        <span class="textarea marginBottom"> 
          <?php _e('- Cart Widget and Checkout each have their own Settings Options - ', 'vtcrt');?>
          <?php echo '<a href="' . admin_url( 'edit.php?post_type=vtcrt-rule&page=vtcrt_setup_options_page' ) . '">' . __( 'Settings Page', 'vtcrt' ) . '</a>';?>
        </span> 
     
        <span class="textarea marginBottom"> 
          <?php _e('- Each option controls how or whether Discount data is presented.', 'vtcrt');?>
        </span> 
        
        <span class="textarea"> 
          <?php _e('- Please experiment with these options settings, to arrive at the Discount display best for your online store.', 'vtcrt');?>
        </span> 
      </span>
      
      
      <span class="infoSection">
        <span class="textarea"> 
          
          <h4 class="discount-help-title"><?php _e('Discounts and Messages at Product Display Time (in the Catalog)', 'vtcrt');?></h4>
        </span>  
        
        <span class="textarea marginBottom"> 
          <?php _e('- When a Realtime Type Rule is in force for a product, at catalog display, the product price is automatically reduced.', 'vtcrt');?>
        </span> 
                        
        <span class="textarea marginBottom"> 
          <?php _e('- if the "echo do_action" code to be found in the sample file is employed, the Realtime Type Rule(s) Message in force for this product will be produced (for example, "Membership Discount of 10%" .', 'vtcrt');?>
        </span> 
     
        <span class="textarea marginBottom"> 
          <?php _e('- In addition to, or in place of the "echo do_action" code, you can also use the sample "echo do_shortcode" to produce a variety of Rule messages (see above).', 'vtcrt');?>
        </span> 
 
      </span>

  <?php    
  }

 
            
  //************************************************
  // How to Install Discount Messages in your Theme
  //************************************************ 
  function vtcrt_show_help_selection_panel_3() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  ?>           
    <div class="selection-panel selection-panel-3" id="selection-panel-3" >                                
      <span class="selection-panel-label label"><strong><?php _e('How to Show Cart Deals in Cart Widget?', 'vtcrt');?></strong></span>                         
      <a class="selection-panel-close selection-panel-close-3" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                    
  		<span class="selection-panel-text" >
        <span class="selection-panel-text-info">
        
        <?php
          vtcrt_show_help_panel_3_text();
        ?>
       
        </span>
      </span> 
      <a class="selection-panel-close selection-panel-close-3" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
    </div>       
<?php 
   return;  
  }   
  //************************************************
  // How to Install Discount Messages in your Theme
  //************************************************  
  function vtcrt_show_help_panel_3_text() {               
     switch( VTCRT_PARENT_PLUGIN_NAME ) {
      case 'WP E-Commerce':  
      ?>         
          <span class="infoSection">
            <span class="textarea"> 
              
              <h4 class="discount-help-title"><?php _e('How to Show ALL Discounts in the Cart Widget, both Realtime and add-to-cart Types', 'vtcrt');?></h4>
            </span>  
            
            <span class="textarea"><?php _e('The Cart Widget is part of your ', 'vtcrt'); echo '<em>'; _e('theme', 'vtcrt'); echo '</em>'; _e(' files.  If you use the Cart Widget in your theme,
                a bit of manual effort is needed, to activate Cart Deals discounts in your theme Cart Widget. ', 'vtcrt');?>
            </span>
            
            <ol class="directions-list">
              <li><?php _e('Changes must be made in the file "wpsc-cart_widget.php".', 'vtcrt');?> </li>
              <li><?php _e('Find "wpsc-cart_widget.php" in your active theme.', 'vtcrt');?> </li>
              <li><?php _e('Look at the sample file included with the Pricing Deal plugin, ', 'vtcrt');?> 
                  <?php echo '<em>... /' . VTCRT_PARENT_PLUGIN_ABBREV . '-integration/Sample Cart Widget/wpsc-cart_widget.php</em> ';    
                        _e('for step-by-step instructions.', 'vtcrt');?></li>
              <li><?php _e('Apply the changes from the sample to your ', 'vtcrt'); echo '<em>'; _e('active theme', 'vtcrt'); echo '</em>'; _e(' version of the file.', 'vtcrt');?> 
                        <a id="vtcrt-cartWidget-details1-help" class="vtcrt-cartWidget-details1-help info-doc-anchor" href="javascript:void(0);" ><?php _e('Details', 'vtcrt');?></a> 
                        <span id="vtcrt-cartWidget-details1" class="vtcrt-info1-help-text shortcode-details vtcrt-cartWidget-details1">
                           <br /><br />
                           <?php _e('THIS IS EXAMPLE SYNTAX ONLY.  Please refer to the SAMPLE FILE for the actual syntax.', 'vtcrt');?> 
                           <br /><br />
                           *********** <br />
                           <?php _e('BEGIN Chgs:', 'vtcrt');?><br />
                           ***********<br />
                           <br />
                           ************** <br />
                           <?php _e('ADD THIS Line: ', 'vtcrt');?><br />
                           ************** <br />
                           ?php vtcrt_cart_widget_discount_details(); // <?php _e(' add in just before', 'vtcrt');?> 'tr class=&quot;cart-widget-total&quot;'?<br />
                           <br />
                           tr class=&quot;cart-widget-total&quot;<br />
                           td class=&quot;cart-widget-count&quot;<br />
                           ?php printf( _n('%d item', '%d items', wpsc_cart_item_count(), 'wpsc'), wpsc_cart_item_count() ); ?<br />
                           /td<br />
                           td class=&quot;pricedisplay checkout-total&quot; colspan='4'<br />
                           <br />
                           ******************* <br />
                           <?php _e(' REPLACE THIS Line:', 'vtcrt');?><br />
                           ******************* <br />
                           ?php _e('Subtotal:', 'wpsc'); ? ?php echo wpsc_cart_total_widget( false, false ,false ); 
                           <br />
                           *****<br />
                           <?php _e(' WITH:', 'vtcrt');?> <br />
                           ***** <br />
                           ?php _e('Subtotal:', 'wpsc'); ? ?php echo vtcrt_cart_total_widget( false, false ,false ); ?<br />
                           <br />
                           *****************************<br />
                           <?php _e('REPLACE THIS Line if desired: ', 'vtcrt');?><br />
                           ***************************** <br />
                           small?php _e( 'excluding discount, shipping and tax', 'wpsc' ); ?/small<br />
                           *****<br />
                           <?php _e('WITH: ', 'vtcrt');?> <br />
                           ***** <br />
                           small?php _e( 'excluding shipping and tax', 'wpsc' ); ?/small<br />
                           <br />
                           ***********<br />
                           <?php _e('END CHGS... ', 'vtcrt');?><br />
                           ***********<br />
                        </span>              
              </li>
              <li><?php _e('If your Active Theme has child-theme capability, place the changed file into the child-theme folder, and you are done.', 'vtcrt');  
                         echo '<br><em>'; _e('And', 'vtcrt'); echo '</em>'; _e(' you will never have to update this file again, unless your custom theme changes this file on update.', 'vtcrt');?> </li>
              <li><?php _e('If your Active Theme does not have child-theme capability, replace "wpsc-cart_widget.php" where you found it in your theme area.  ', 'vtcrt');?></li>
              <li><?php _e('In this case, ', 'vtcrt'); echo '<em>'; _e('Each', 'vtcrt'); echo '</em>'; _e(' time your theme updates, you will want to check the "wpsc-cart_widget.php", and re-apply the changes as necessary.', 'vtcrt');?> </li>
            </ol> 
            <span class="textarea"> 
              <?php _e('Discounts in the Cart Widget are controlled by the group of settings in the ', 'vtcrt');?>
              <?php echo '<a href="' . admin_url( 'edit.php?post_type=vtcrt-rule&page=vtcrt_setup_options_page#vtcrt-cartWidget-options-anchor' ) . '">' . __( 'Settings Page - Cart Widget Discount Options', 'vtcrt' ) . '</a>';?>
            </span>            
                       
          </span> 
      
    <?php      
      break;  //end wpec              

      
    } //end Swtich 
  }


            
  //************************************************
  // Help panel for Shortcodes
  //************************************************ 
  function vtcrt_show_help_selection_panel_4() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  ?>           
    <div class="selection-panel selection-panel-4" id="selection-panel-4" >                                
      <span class="selection-panel-label label"><strong><?php _e('Marketing! - Add Pricing Deal Message Shortcodes!', 'vtcrt');?></strong></span>                         
      <a class="selection-panel-close selection-panel-close-4" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                     
  		<span class="selection-panel-text" >
        <span class="selection-panel-text-info">
        
        <?php
          vtcrt_show_help_panel_4_text();
        ?>
       
        </span>
      </span> 
      <a class="selection-panel-close selection-panel-close-4" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
    </div>       
<?php 
   return;  
  }   
  //************************************************
  // Help panel for Shortcodes
  //************************************************  
  function vtcrt_show_help_panel_4_text() {               
   ?> 
      <span class="infoSection">
        <span class="textarea"> 
          
          <h4 class="discount-help-title"><?php _e('Add Your Deal Messages to your Theme', 'vtcrt'); echo '&nbsp;-&nbsp;'; _e('Use Shortcodes!', 'vtcrt');?></h4>
        </span>  
         
        <span class="textarea"> 
          <?php _e('- Your deal messages can be introduced anywhere on your Website!', 'vtcrt'); echo '&nbsp;&nbsp;'; _e('"24-Hour Store-Wide Sale, 10% off of Everything!"', 'vtcrt');?>
        </span>
         <ol class="directions-list">
          <li><?php _e('Standard Shortcode', 'vtcrt'); echo '&nbsp;=>&nbsp;';  _e('example: [pricing_deal_store_msgs]', 'vtcrt');?> </li>
          <li><?php _e('Anywhere in your Theme', 'vtcrt'); echo '&nbsp;=>&nbsp;';  _e('example: < ?php echo do_shortcode(\'[pricing_deal_store_msgs  rule_id_list="10,15,30"]\' ? > &nbsp;&nbsp;&nbsp;&nbsp; (remove space between "<>" and "?")', 'vtcrt');?> </li>
          <li><?php _e('At the Product Level, show all RealTime messages:', 'vtcrt');?>
            <ul class="directions-list">
              <li><?php _e('At Product display time, *any* Pricing Deal message which relates to the product can be displayed', 'vtcrt');?> 
                  <br>&nbsp;&nbsp;&nbsp;
                  <?php _e('"Buy 2 of this product, get one of those products free"', 'vtcrt');?>
                  <br>&nbsp;&nbsp;&nbsp;
                  <?php _e('"Buy 2 of those products, get this product free"', 'vtcrt');?> 
              </li>
              <li><?php _e('Look in ', 'vtcrt'); 
                        echo 'vt-cart-deals-for-' . VTCRT_PARENT_PLUGIN_TEXTNAME . '/' . VTCRT_PARENT_PLUGIN_ABBREV . '-integration ';    
                        _e('folders for how-to info, using the do_shortchode or do_action syntax listed.', 'vtcrt');?>   
              </li>
            </ul>         
          </li>
        </ol>
    
      </span>

       <span class="infoSection">
        <span class="textarea"> 
          
          <h4 class="discount-help-title"><?php _e('Theme Shortcodes Usage', 'vtcrt');?></h4>
        </span>  
         
        <span class="textarea"> 
          <?php _e('These Shortcodes can be used on their own, or with a variety of parameters', 'vtcrt');?>
        </span>
         <ol class="directions-list">
          <li><?php _e('Standard - [pricing_deal_store_msgs]', 'vtcrt');?><a id="vtcrt-shortcode-details1-help" class="vtcrt-shortcode-details1-help info-doc-anchor" href="javascript:void(0);" ><?php _e('Details', 'vtcrt');?></a> 
            <span id="vtcrt-shortcode-details1" class="vtcrt-info1-help-text shortcode-details vtcrt-shortcode-details1">
               <br /><br />
               <?php _e('THIS IS EXAMPLE SYNTAX ONLY.  Please refer to the SAMPLE FILE for the actual syntax.', 'vtcrt');?>                
               <br /><br />
               //====================================<br />
               //SHORTCODE: pricing_deal_store_msgs<br />
               //====================================<br />
               <br />
               //shortcode documentation here - wholestore<br />
               //WHOLESTORE MESSAGES SHORTCODE 'vtcrt_pricing_deal_store_msgs'<br />
               /* ================================================================================= <br />
               => rule_id_list is OPTIONAL - Show msgs only for these rules => if not supplied, all msgs will be produced<br />
               <br />
               A list can be a single code [ example: rule_id_list => '123' }, or a group of codes [ example: rule_id_list => '123,456,789' } with no spaces in the list<br />
               A switch can be sent to just display the whole store messages<br />
               <br />
               As a shortcode:<br />
               [pricing_deal_whole_store_msgs rule_id_list=&quot;10,15,30&quot;]<br />
               <br />
               As a template code with a passed variable containing the list:<br />
               $rule_id_list=&quot;10,15,30&quot;; //or it is a generated list <br />
               echo do_shortcode('[pricing_deal_store_msgs rule_id_list=' .$rule_id_list. ']');<br />
               OR<br />
               echo do_shortcode('[pricing_deal_store_msgs rule_id_list=&quot;10,15,30&quot;]');<br />
               echo do_shortcode('[pricing_deal_store_msgs wholestore_msgs_only=&quot;yes&quot; rule_id_list=&quot;10,15,30&quot; ]'); <br />
              <br />
               ====================================<br />
               PARAMETER DEFAULTS and VALID VALUES<br />
               ==================================== <br />
               msg_type => 'cart', //'cart' (default) / 'catalog' / 'all' ==> &quot;cart&quot; msgs = cart rules type, &quot;catalog&quot; msgs = realtime catalog rules type <br />
               // AND (implicit)<br />
               wholestore_msgs_only => 'no', //'yes' / 'no' (default) <br />
               // AND [implicit]<br />
               // ( <br />
               // OR [implicit]<br />
               role_name_list => '', //'Administrator,Customer,Not logged in (just visiting),Member' <br />
               // OR [implicit]<br />
               rule_id_list => '', //'123,456,789' <br />
               // OR [implicit]<br />
               product_id_list => '' //'123,456,789' (ONLY WORKS in the LOOP, or if the Post is available )<br />
               // ) 
               <br /><br />
               // in vtcrt-parent-theme-functions.php 
               <br /><br />             
            </span>          
          </li>
          
          <li><?php _e('By Category - [pricing_deal_category_msgs]', 'vtcrt');?><a id="vtcrt-shortcode-details2-help" class="vtcrt-shortcode-details2-help info-doc-anchor" href="javascript:void(0);" ><?php _e('Details', 'vtcrt');?></a> 
            <span id="vtcrt-shortcode-details2" class="vtcrt-info1-help-text shortcode-details vtcrt-shortcode-details2">
               <br /><br />
               <?php _e('THIS IS EXAMPLE SYNTAX ONLY.  Please refer to the SAMPLE FILE for the actual syntax.', 'vtcrt');?> 
               <br /> <br />
                  //====================================<br />
                   //SHORTCODE: pricing_deal_category_msgs<br />
                   //==================================== <br />
                   <br />
                   //shortcode documentation here - category<br />
                   //STORE CATEGORY MESSAGES SHORTCODE vtcrt_pricing_deal_category_msgs<br />
                   /* ================================================================================= <br />
                   => either prodcat_id_list or rulecat_id_list or rule_id_list is REQUIRED<br />
                   => if both lists supplied, the shortcode will find rule msgs in EITHER prodcat_id_list OR rulecat_id_list OR rule_id_list.<br />
                   <br />
                   A list can be a single code [ example: rule_id_list => '123' }, or a group of codes [ example: rule_id_list => '123,456,789' } with no spaces in the list <br />
                   <br />
                   REQUIRED => Data MUST be sent in ONE of the list parameters, or nothing is returned.<br />
                   <br />
                   As a shortcode:<br />
                   [pricing_deal_category_msgs prodcat_id_list=&quot;10,15,30&quot; rulecat_id_list=&quot;12,17,32&quot;]<br />
                   <br />
                   As a template code with a passed variable containing the list:<br />
                   to show only the current category messages, for example:<br />
                   GET CURRENT CATEGORY <br />
                   <br />
                   if (is_category()) {<br />
                   $prodcat_id_list = get_query_var('cat');<br />
                   echo do_shortcode('[pricing_deal_category_msgs prodcat_id_list=' .$prodcat_id_list. ']');<br />
                   }<br />
                   OR <br />
                   USING A HARDCODED CAT LIST <br />
                   echo do_shortcode('[pricing_deal_category_msgs prodcat_id_list=&quot;10,15,30&quot; ]');<br />
                  <br />
                   ====================================<br />
                   PARAMETER DEFAULTS and VALID VALUES<br />
                   ====================================<br />
                   msg_type => 'cart', //'cart' (default) / 'catalog' / 'all' ==> &quot;cart&quot; msgs = cart rules type, &quot;catalog&quot; msgs = realtime catalog rules type <br />
                   // AND [implicit] <br />
                   // ( <br />
                   prodcat_id_list => '', //'123,456,789' only active if in this list<br />
                   // OR [implicit]<br />
                   rulecat_id_list => '' //'123,456,789' only active if in this list<br />
                   // )
               <br /><br />
               // in vtcrt-parent-theme-functions.php 
               <br /><br />            
            </span>          
          </li>
          
          <li><?php _e('Advanced - [pricing_deal_advanced_msgs]', 'vtcrt');?><a id="vtcrt-shortcode-details3-help" class="vtcrt-shortcode-details3-help info-doc-anchor" href="javascript:void(0);" ><?php _e('Details', 'vtcrt');?></a> 
            <span id="vtcrt-shortcode-details3" class="vtcrt-info1-help-text shortcode-details vtcrt-shortcode-details3">
               <br /><br />
               <?php _e('THIS IS EXAMPLE SYNTAX ONLY.  Please refer to the SAMPLE FILE for the actual syntax.', 'vtcrt');?>                
               <br /><br />
                  //====================================<br />
                   //SHORTCODE: pricing_deal_advanced_msgs<br />
                   //==================================== <br />
                   <br />
                   //shortcode documentation here - advanced<br />
                   //ADVANCED MESSAGES SHORTCODE vtcrt_pricing_deal_advanced_msgs<br />
                   /* ================================================================================= <br />

                   <br />
                   A list can be a single code [ example: rule_id_list => '123' }, or a group of codes [ example: rule_id_list => '123,456,789' } with no spaces in the list <br />
                   <br />
                   NB - please be careful to follow the comma use exactly as described!!! <br />
                   <br />
                   As a shortcode:<br />
                   [pricing_deal_advanced_msgs <br />
                   grp1_msg_type => 'cart'<br />
                   grp1_and_or_wholestore_msgs_only => 'and'<br />
                   grp1_wholestore_msgs_only => 'no'<br />
                   and_or_grp1_to_grp2 => 'and'<br />
                   grp2_rule_id_list => ''<br />
                   grp2_and_or_role_name_list => 'and'<br />
                   grp2_role_name_list => ''<br />
                   and_or_grp2_to_grp3 => 'and'<br />
                   grp3_prodcat_id_list => ''<br />
                   grp3_and_or_rulecat_id_list => 'or'<br />
                   grp3_rulecat_id_list => '' <br />
                   ]<br />
                   <br />
                   As a template code with passed variablea<br />
                   echo do_shortcode('[pricing_deal_advanced_msgs <br />
                   grp1_msg_type => 'cart'<br />
                   grp1_and_or_wholestore_msgs_only => 'and'<br />
                   grp1_wholestore_msgs_only => 'no'<br />
                   and_or_grp1_to_grp2 => 'and'<br />
                   grp2_rule_id_list => ''<br />
                   grp2_and_or_role_name_list => 'and'<br />
                   grp2_role_name_list => ''<br />
                   and_or_grp2_to_grp3 => 'and'<br />
                   grp3_prodcat_id_list => ''<br />
                   grp3_and_or_rulecat_id_list => 'or'<br />
                   grp3_rulecat_id_list => '' <br />
                   ]');<br />
                   <br />
                   ====================================<br />
                   PARAMETER DEFAULTS and VALID VALUES<br />
                   ====================================<br />
                   // ( grp 1<br />
                   grp1_msg_type => 'cart', //'cart' (default) / 'catalog' / 'all' ==> &quot;cart&quot; msgs = cart rules type, &quot;catalog&quot; msgs = realtime catalog rules type <br />
                   grp1_and_or_wholestore_msgs_only => 'and', //'and'(default) / 'or' <br />
                   grp1_wholestore_msgs_only => 'no', //'yes' / 'no' (default) only active if rule active for whole store<br />
                   // )<br />
                   and_or_grp1_to_grp2 => 'and', //'and'(default) / 'or' <br />
                   // ( grp 2<br />
                   grp2_rule_id_list => '', //'123,456,789' only active if in this list<br />
                   grp2_and_or_role_name_list => 'and', //'and'(default) / 'or' <br />
                   grp2_role_name_list => '', //'Administrator,Customer,Not logged in (just visiting),Member' Only active if in this list <br />
                   // )<br />
                   and_or_grp2_to_grp3 => 'and', //'and'(default) / 'or' <br />
                   // ( grp 3<br />
                   grp3_prodcat_id_list => '', //'123,456,789' only active if in this list<br />
                   grp3_and_or_rulecat_id_list => 'or', //'and' / 'or'(default) <br />
                   grp3_rulecat_id_list => '' //'123,456,789' only active if in this list<br />
                   // )
               <br /><br />
               // in vtcrt-parent-theme-functions.php 
               <br /><br />                
            </span>          
          </li>            
                    
        </ol>
         
      </span>

  <?php    
  }

            
  //************************************************
  // Help panel for Deals Examples
  //************************************************ 
  function vtcrt_show_help_selection_panel_5() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;    
  ?>           
    <div class="selection-panel selection-panel-5" id="selection-panel-5" >                                
      <span class="selection-panel-label label"><strong><?php _e('Pricing Deal Examples FAQ', 'vtcrt');?></strong></span>                         
      <a id="open-faq-in-new-window"  href="<?php bloginfo('url');?>/wp-admin/edit.php?post_type=vtcrt-rule&page=vtcrt_show_faq_page" onclick="javascript:void window.open('<?php bloginfo('url');?>/wp-admin/edit.php?post_type=vtcrt-rule&page=vtcrt_show_faq_page','1375122357919','width=700,height=500,toolbar=0,menubar=0,location=1,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Open "Examples FAQ" in a Separate Window</a>                       		      
      <a class="selection-panel-close selection-panel-close-5" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                      
  		<span class="selection-panel-text" >
        <span class="selection-panel-text-info">
        
        <?php
          vtcrt_show_help_panel_5_text();
        ?>
       
        </span>
      </span>
      <a class="selection-panel-close selection-panel-close-5" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
    </div>       
<?php 
   return;  
  }   
  //************************************************
  // Help panel for Discount Msgs Info
  //************************************************  
  function vtcrt_show_help_panel_5_text() {               
   ?> 
      <span class="textarea vtcrt-intro-info">         
          
          <h4 id="">
            <?php $FAQ_title = __('Cart Deals Overview ', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help1-more" class="panel-5-anchor" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help1-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' .   __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help1-text" class="vtcrt-panel-5-help-text-all">           
            <p class="faq-intro">
              <strong><?php _e("Whenever you set up a pricing deal **Test the Heck Out of It** to make sure it does what you want precisely.", 'vtcrt');?></strong>
            </p>
            <p class="faq-intro">
              <strong><?php _e("There are basically 3 kinds of Cart Deals ", 'vtcrt');?></strong>
            </p>            
            <ul id="" class="">
              <li><strong><em>
                  <?php _e('Price Reductions - Realtime', 'vtcrt');?>
                  </em></strong>
                  <?php _e(' Catalog Item Sale Pricing, by Whole Store [and by additional the Grouping Options listed below, available in the Pro Version]', 'vtcrt');?> 
                <ul id="" class="">
                  <li><?php _e('Price Reduction always shows as the product is displayed', 'vtcrt');?> </li>
                  <li><?php _e('"Buy" Group can be specified as the whole store, etc (see below)', 'vtcrt');?> </li>
                  <li><?php _e('"Get" group always the same as the "Buy" group', 'vtcrt');?> </li>
                  <li><?php _e('GROUP Options - Free Version => Whole Store; Pro Version => Wholesale or Membership (Display different prices for logged in users), Product Category and Pricing Deal custom Category, Product or Variation', 'vtcrt');?> </li>
                </ul>              
              </li>
              <li><strong><em>
                  <?php _e('Cart Purchase Pricing - BOGO', 'vtcrt');?>
                  </em></strong>
                  <?php _e(' (Buy One, Get One (Free, at a discount, etc)', 'vtcrt');?> 
                <ul id="" class="">
                  <li><?php _e('BUY - What group you have to purchase from to activate the Deal (Product)', 'vtcrt');?> </li>
                  <li><?php _e('ONE - How many you have to purchase to activate the Deal (Buy Amount)', 'vtcrt');?> </li>
                  <li><?php _e('GET - What group the Deal acts on (Get Group)', 'vtcrt');?> </li>
                  <li><?php _e('ONE - How many the Deal acts on (Get Amount)', 'vtcrt');?> </li>
                  <li><?php _e('FREE - The Discount (Discount Amount)', 'vtcrt');?> </li>
                </ul>              
              </li>
              <li><strong><em>
                  <?php _e('Cart Purchase Pricing - GROUP PRICING', 'vtcrt');?>
                  </em></strong>
                  <?php _e(' (Buy 5, get them for the a fixed price [or for the price of 4,...])', 'vtcrt');?> 
                 <ul id="" class="">
                  <li><?php _e('Give any group a different price!', 'vtcrt');?> </li>
                </ul>              
              </li>
            </ul>                       
          </span>
         

          <h4 id="">
            <?php $FAQ_title = __('Pricing Deal Theme Marketing ', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help2-more" class="panel-5-anchor" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help2-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo  $FAQ_title . '&nbsp;&nbsp;' .   __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help2-text" class="vtcrt-panel-5-help-text-all">            
            <p class="faq-intro">
              <strong><?php _e('Theme Marketing - add your Deal messages anywhere on your Website via Shortcode!', 'vtcrt');?></strong>
              <br>&nbsp;&nbsp;
              <strong><?php _e(' for example => "24-Hour Store-Wide Sale, 10% off of Everything!"', 'vtcrt');?></strong>
            </p>
            <ul id="" class="">
              <li><?php _e('On the Pricing Deal Rule and Settings screen, look in the upper right corner', 'vtcrt');?></li>
              <li><em><?php _e('Click on "Help! Tell me about Cart Deals"', 'vtcrt');?></em></li>
              <li><em><?php _e('Click on "Add Pricing Deal Messages to your Theme using Shortcodes!"', 'vtcrt');?></em></li>
            </ul>            
          </span>
          

          <h4 id="">
            <?php $FAQ_title = __('Group Selection Power! ', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help3-more" class="panel-5-anchor" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help3-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' .   __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help3-text" class="vtcrt-panel-5-help-text-all">            
            <p class="faq-intro">
              <?php _e('Group Selection for discrete groups is a ', 'vtcrt');?>
              <em><?php _e('Pro Option', 'vtcrt');?></em>
            </p>
            <ul id="" class="">
              <li><?php _e('Selection by Product Category', 'vtcrt');?> </li>
              <li><?php _e('Selection by Pricing Deal custom Category', 'vtcrt');?> </li>
              <li><?php _e('Selection by Wholesaler, Membership or Role (Display different prices for logged in users)', 'vtcrt');?> </li>
              <li><?php _e('Selection by Product or Variation', 'vtcrt');?> </li>
            </ul>
            
            <p class="faq-intro">
              <strong><?php _e('Group pricing is made much more powerful ', 'vtcrt');?></strong>
              <em><?php _e('using Cart Deals Custom Categories.  ', 'vtcrt');?></em>
            </p>
            <p class="faq-intro">
              <?php _e('Creating a Cart Deals Custom Category in place of a store Product Category allows you to:', 'vtcrt');?>
            </p>            
            <ul id="" class="">
              <li><?php _e('Group together any products you elect', 'vtcrt');?><em><?php _e(' outside of the product categories', 'vtcrt');?></em> </li>
              <li><?php _e('Cart Deals Custom Categories does not affect Product Category store organization and presentation', 'vtcrt');?><em><?php _e(' in any way', 'vtcrt');?></em> </li>
              <li><?php _e('You can cherry pick products across the Store, to assemble your desired grouping', 'vtcrt');?> </li>
            </ul>            
          </span>


          <h4 id="">
            <?php $FAQ_title = __('Example - REALTIME Cart Deals', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help4-more" class="panel-5-anchor vtcrt-panel-5-example" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help4-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' .   __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help4-text" class="vtcrt-panel-5-help-text-all">            
            <ul id="" class="">              
              <li><?php _e('Catalog Item Sale Pricing => in Template Type -Under "Immediate Price Reduction", Choose:', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Store-wide Sale', 'vtcrt');?>
                        <ul id="" class="">
                          <li><?php _e('Buy Amount - fixed at "Any" [Each in Product]', 'vtcrt');?></li>
                          <li><?php _e('Product -	fixed at Whole Store', 'vtcrt');?></li>
                          <li><?php _e('Get Amount - fixed at "Any" [Each in Get Group]', 'vtcrt');?></li>
                          <li><?php _e('Get Group -	fixed at "Same as Product"', 'vtcrt');?></li>
                          <li><?php _e('Discount Amount -	* Choose type and enter amount *', 'vtcrt');?></li>
                          <li><?php _e('Discount Applies To -	fixed at "Each product in the Get Group"', 'vtcrt');?></li>                          
                        </ul>                                        
                    </li>
                     <li><?php _e('Simple Discount by wholesaler, membership category etc - a Pro Option', 'vtcrt');?>
                        <ul id="" class="">
                          <li><?php _e('Buy Amount - fixed at "Any" [Each in Product]', 'vtcrt');?></li>
                          <li><?php _e('Product -	* Choose any Group Configuration *', 'vtcrt');?></li>
                          <li><?php _e('Get Amount - fixed at "Any" [Each in Get Group]', 'vtcrt');?></li>
                          <li><?php _e('Get Group -	fixed at "Same as Product"', 'vtcrt');?></li>
                          <li><?php _e('Discount Amount -	* Choose type and enter amount *', 'vtcrt');?></li>
                          <li><?php _e('Discount Applies To -	fixed at "Each product in the Get Group"', 'vtcrt');?></li>                          
                        </ul>                                        
                    </li> 
                  </ul>
              </li>
            </ul>            
          </span>


          <h4 id="">
            <?php $FAQ_title = __('Example - BOGO Deals, Cart Purchase Pricing ', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help5-more" class="panel-5-anchor vtcrt-panel-5-example" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help5-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' .   __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help5-text" class="vtcrt-panel-5-help-text-all">            
            <ul id="" class="">
              <li><?php _e('"Buy a Laptop, Get a Mouse Free" (for Pro Version)', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Template Type - 	"Buy 6/$600, Get a discount on Next 4/$400 added to Cart"', 'vtcrt');?></li>
                    <li><?php _e('Buy Amount - 		Buy One (or ...)', 'vtcrt');?></li>
                    <li><?php _e('Product -		Select "Use Category", Select Product Category = "laptop"', 'vtcrt');?></li>
                    <li><?php _e('Get Amount -		Get Next One', 'vtcrt');?></li>
                    <li><?php _e('Get Group -		Select "Use Category", Select Product Category = "mouse"', 'vtcrt');?></li>
                    <li><?php _e('Discount Amount -	Free', 'vtcrt');?></li>
                    <li><?php _e('Discount Applies To	- "Each product in the Get Group"', 'vtcrt');?></li>                    
                  </ul>
              </li>
              <li><?php _e('"Buy a Mouse, Get a 2nd Mouse Free" (for Pro Version)', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Template Type - " Buy 6/$600, Get a discount on Next 4/$400 added to Cart"', 'vtcrt');?></li>
                    <li><?php _e('Buy Amount - 		Buy One (or ...)', 'vtcrt');?></li>
                    <li><?php _e('Product -		Select "Use Category", Select Product Category = "mouse"', 'vtcrt');?></li>
                    <li><?php _e('Get Amount -		Get Next One', 'vtcrt');?></li>
                    <li><?php _e('Get Group -		Get Group Same as Product ', 'vtcrt');?></li>
                    <li><?php _e('Discount Amount -	Free', 'vtcrt');?></li>
                    <li><?php _e('Discount Applies To	- "Each product in the Get Group"', 'vtcrt');?></li>                    
                  </ul>
              </li>
              <li><?php _e('With Buy (Rule) Repeats - "Buy a Mouse, Get a 2nd Mouse Free, up to 2 Mice Free" (for Pro Version)', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Same as above, +', 'vtcrt');?></li>
                    <li><?php _e('Get Group (Rule) Repeat: - Number of Times Rule is Applied = 2', 'vtcrt');?></li>                                      
                  </ul>
              </li> 
              <li><?php _e('With "Forever" limits - "Buy a Mouse, Get a 2nd Mouse Free, Limit ONE per customer" (for Pro Version)', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Same as above, +', 'vtcrt');?></li>
                    <li><?php _e('Maximum Discounts per Customer - for the Lifetime of the Rule: Maximum Number of times = 1', 'vtcrt');?></li>                                      
                  </ul>
              </li>                                           
            </ul>            
          </span>           


          <h4 id="">
            <?php $FAQ_title = __('Example - GROUP Cart Deals, Cart Purchase Pricing ', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help6-more" class="panel-5-anchor vtcrt-panel-5-example" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help6-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo $FAQ_title .  '&nbsp;&nbsp;' .  __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help6-text" class="vtcrt-panel-5-help-text-all">            
            <ul id="" class="">
              <li><?php _e('"Get 10 vegetables for $10" (for Pro Version)', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Template Type - 	"  Buy 5/$500, Get them for the price of 4/$400 - *GROUP PRICING*"', 'vtcrt');?></li>
                    <li><?php _e('Buy Amount - 		Buy Unit Quantity - 10 Units', 'vtcrt');?></li> 
                    <li><?php _e('Buy Amt Applies to- 	All (so it works with either 10 of the same Veg, or 10 different Veg)', 'vtcrt');?></li> 
                    <li><?php _e('Product -		Select "Use Category", Select Product Category = "vegetables"', 'vtcrt');?></li> 
                    <li><?php _e('Get Amount -		 "Any" [Each in Get Group]', 'vtcrt');?></li> 
                    <li><?php _e('Get Group -		 "Same as Product"', 'vtcrt');?></li> 
                    <li><?php _e('Discount Amount -	"For the Price of - Currency Discount"', 'vtcrt');?></li> 
                    <li><?php _e('For the price of: $	10', 'vtcrt');?></li> 
                    <li><?php _e('Discount Applies To	 fixed at "All products in the Get Group"', 'vtcrt');?></li>                     
                  </ul>
              </li> 
              <li><?php _e('"Buy $500 of Accessories, Get that them for $400" (for Pro Version)', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Template Type - 	"  Buy 5/$500, Get them for the price of 4/$400 - *GROUP PRICING*"', 'vtcrt');?></li>
                    <li><?php _e('Buy Amount - 		Buy $ Value - 500', 'vtcrt');?></li>
                    <li><?php _e('Buy Amt Applies to- 	All (so it works with either 10 of the same, or 10 different)', 'vtcrt');?></li>
                    <li><?php _e('Product -		Select "Use Category", Select Cart Deals Category = " Accessories"', 'vtcrt');?></li>
                    <li><?php _e('Get Amount -		 "Any" [Each in Get Group]', 'vtcrt');?></li>
                    <li><?php _e('Get Group -		 "Same as Product"', 'vtcrt');?></li>
                    <li><?php _e('Discount Amount -	"For the Price of - Currency Discount"   ', 'vtcrt');?></li>
                    <li><?php _e('For the price of: $	400', 'vtcrt');?></li>
                    <li><?php _e('Discount Applies To	 "All products in the Get Group"', 'vtcrt');?></li>                  
                  </ul>
              </li>
              <li><?php _e('"Buy $200, Get next 10 vegetables for the price of 8 vegetables" (for Pro Version)', 'vtcrt');?> 
                  <ul id="" class="">
                    <li><?php _e('Template Type - 	"  Buy 6/$600, Get Next 3 for the price of 2/$200 - *GROUP PRICING*', 'vtcrt');?></li> 
                    <li><?php _e('Buy Amount - 		Buy $ Value - 200', 'vtcrt');?></li> 
                    <li><?php _e('Product -		Select "Whole Store"', 'vtcrt');?></li> 
                    <li><?php _e('Get Amount -		Get Unit Quantity - 10 Units', 'vtcrt');?></li> 
                    <li><?php _e('Get Group -		 Select "Use Category", Select Product Category = "vegetables"', 'vtcrt');?></li> 
                    <li><?php _e('Discount Amount -	"For the Price of - Units Discount', 'vtcrt');?></li> 
                    <li><?php _e('For the price of: 	8', 'vtcrt');?></li> 
                    <li><?php _e('Discount Applies To	 fixed at "All products in the Get Group"', 'vtcrt');?></li>                  
                  </ul>
              </li>                                                                                     
            </ul>            
          </span>                      
          

          <h4 id="">
            <?php $FAQ_title = __('Group Selection - Using Cart Deals Custom Categories ', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help7-more" class="panel-5-anchor" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help7-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' .   __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help7-text" class="vtcrt-panel-5-help-text-all">            
            <p class="faq-intro">
              <?php _e('Cart Deals Custom Categories give you an independant way to organize your rule groups.
              Cart Deals Categories are a custom taxonomy, which acts exactly like Product Categories.  So the Add Category function, the category participation box
              on the product page, are all the same.  The Add Cart Deals Category page menu item hangs off of the Product menu.  The Cart Deals Category participation box
              on the product page appears just below  the Product Category box.', 'vtcrt');?>
            </p>
            <p class="faq-intro">
              <strong><?php _e('Group pricing is made much more powerful ', 'vtcrt');?></strong>
              <em><?php _e('using Cart Deals Custom Categories.  ', 'vtcrt');?></em>
            </p>
            <p class="faq-intro">
              <?php _e('Creating and Using a Cart Deals Custom Category in place of a store Product Category allows you to:', 'vtcrt');?>
            </p>            
            <ul id="" class="">
              <li><?php _e('Group together any products you elect', 'vtcrt');?><em><?php _e(' outside of the product categories', 'vtcrt');?></em> </li>
              <li><?php _e('Cart Deals Custom Categories does not affect Product Category store organization and presentation', 'vtcrt');?><em><?php _e(' in any way', 'vtcrt');?></em> </li>
              <li><?php _e('You can cherry pick products across the Store, to assemble your desired grouping', 'vtcrt');?> </li>
            </ul>            
          </span>

                    

          <h4 id="">
            <?php $FAQ_title = __('Group Selection - Selection by Wholesaler, Membership or Role (Display different prices for logged in users) ', 'vtcrt'); ?>
            <a id="vtcrt-panel-5-help8-more" class="panel-5-anchor" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="12px" width="12px" src="<?php echo VTCRT_URL;?>/admin/images/plus-toggle2.png" /></a> 
            <a id="vtcrt-panel-5-help8-less" class="panel-5-anchor hideMe" href="javascript:void(0);"><?php echo $FAQ_title . '&nbsp;&nbsp;' .   __(' ... Less ', 'vtcrt') . '&nbsp;&nbsp;' ; ?><img class="plus-button" alt="help" height="14px" width="14px" src="<?php echo VTCRT_URL;?>/admin/images/minus-toggle2.png" /></a>                        
          </h4>
          <span id="vtcrt-panel-5-help8-text" class="vtcrt-panel-5-help-text-all">            
            <p class="faq-intro">
              <?php               _e("Display different prices/pricing tiers for logged in users => Role/Membership is used within Wordpress to control access and capabilities, when a role is given to a user.  
                 Wordpress assigns certain roles by default such as Subscriber for new users or Administrator for the site's owner. Roles can also be used to associate a user 
                 with a pricing level.  Use a role management plugin like , ", 'vtcrt'); 
                 ?>
                 <a href="http://wordpress.org/extend/plugins/user-role-editor/">
                 <?php _e('User Role Editor', 'vtcrt');?></a> 
               <?php 
               _e("to establish custom roles, which you can give 
                 to a user or class of users.  Then you can associate that role with a Cart Deals Rule.  
                 So when the user logs into your site, their Role interacts with the appropriate Rule.", 'vtcrt');
                ?>
            </p>
            <p class="faq-intro">
              <?php _e('Membership / Wholesaler / Customer/ Display different prices for logged in users', 'vtcrt'); echo '&nbsp;&nbsp;';  _e('Role How-To', 'vtcrt');?>
            </p>            
            <ol class="directions-list">
              <li><?php _e('Download a Role Management Plugin (like ', 'vtcrt');?> <a href="http://wordpress.org/extend/plugins/user-role-editor/"><?php _e('User Role Editor', 'vtcrt');?></a>) </li>
              <li><?php _e('Set up unique Membership/Wholesale Roles using Role Management Plugin', 'vtcrt');?></li>
              <li><?php _e('Ensure shop website theme allows user to Log In to store', 'vtcrt');?></li>                    
              <li><?php _e('Assign signed-up users to appropriate Membership/Wholesale Role (', 'vtcrt');?><a href="/wp-admin/users.php"><?php _e('Users Screen', 'vtcrt');?></a>)</li>
              <li><?php _e('Set up Pricing Deal rule(s) which specify the appropriate Membership/Wholesale role(s) for the Buy or Get Pool', 'vtcrt');?></li>
            </ol>           
          </span>
                                 
      </span><?php //end  .textarea span ?>
       
  <?php    
  }

           
  //************************************************
  // Help panel for Discount Amt Info
  //************************************************ 
  function vtcrt_show_help_selection_panel_6() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  ?>           
    <div class="selection-panel selection-panel-6" id="selection-panel-6" >                                
      <span class="selection-panel-label label"><strong><?php _e('PLEASE READ', 'vtcrt'); //Automatically Add Free Product to Cart - PLEASE READ?></strong></span>                         
      <a class="selection-panel-close selection-panel-close-6" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                     
  		<span class="selection-panel-text" >
        <span class="selection-panel-text-info">
        
        <?php
          vtcrt_show_help_panel_6_text();
        ?>
       
        </span>
      </span> 
      <a class="selection-panel-close selection-panel-close-6" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
    </div>       
<?php 
   return;  
  }   
  //************************************************ 
  //Auto Add Info
  //************************************************ 
  function vtcrt_show_help_panel_6_text() {               
      ?>
          <span class="infoSection">
            <span class="textarea">
              
              <h4 class="discount-help-title"><?php _e('Auto Adds work differently with Coupons.', 'vtcrt');?></h4>
              <ul class="directions-list">
                <li><?php _e('- For Auto Adds, "Apply this Rule Discount in Addition to Coupon Discount" must be "Yes" .', 'vtcrt');
                          echo '<br><br> &nbsp;&nbsp;<em>';
                          _e(' The FREE Auto Add takes place and any Coupon presented is skipped for the Free Product only... ', 'vtcrt');
                          echo '</em>';
                     ?> 
                </li>
              </ul> 
              
              <h4 class="discount-help-title"><?php _e('Automatically Add Free Product to Cart WORKS BEST with the following configurations:', 'vtcrt');?></h4>
             
              <ul class="directions-list">
                <li><?php _e('- Buy and Get(Discount) Groups are COMPLETELY Different', 'vtcrt'); 
                          echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
                          _e('("Buy a Laptop, Get a FREE Mouse")', 'vtcrt');
                     ?>
                </li> 
                <li><?php  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';  _e(' (or) ');?></li>
                <li><?php _e('- Buy and Get Groups are EXACTLY the same product', 'vtcrt');
                           echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';  
                          _e('("Buy WidgetX, get the next WidgetX FREE")', 'vtcrt');
                          echo '<br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                          _e('(Both BUY and GET Groups must select the SAME individual product, as a single variation or single product)', 'vtcrt');                    
                     ?> 
                </li>
                <li><?php  echo '&nbsp;'; ?></li>
                <li><?php _e('- Please NOTE that there is a settings switch which controls BOGO Auto Add behavior:', 'vtcrt');              
                     ?> 
                </li>
                <li><?php   echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
                            _e('"BOGO Behavior for Auto Add of Same Product"', 'vtcrt');              
                     ?> 
                </li>                

              </ul>               
             </span>
                                   
          </span>
      
    <?php 
  }
           
  //************************************************
  // Help panel for Template Dropdown
  //************************************************ 
  function vtcrt_show_help_selection_panel_A($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework;
    
    $counter = 0;   
    for($i=0; $i < sizeof($vtcrt_rule_template_framework['option']); $i++) {   //run through the whole array!!
      //skip if "please enter"     
      if ( $vtcrt_rule_template_framework['option'][$i]['value'] == '')  {
         continue; //skip this iteration
      }

     switch( true ) {
        case $counter == 0:
            $subtitle = '';
          break;
        case (($counter > 0) && ($counter <= 4)):
            $subtitle = 'Discount Type - Realtime Product Display Discount';
          break;
        default:
            $subtitle = 'Discount Type - Add to Cart Discount';
            if (($counter >= 8) && 
                ($counter <= 10)) {
              $subtitle .= ', Applied within Product(s) Already in Cart';   
            } else {
              $subtitle .= ', Applied to Next Product(s) Added to Cart';
            }             
          break;  
     }   
  /*      
      if ($counter <= 4) {
        $subtitle = 'Discount Type - Realtime Product Display Discount';
      } else {
        $subtitle = 'Discount Type - Add to Cart Discount';
        if (($counter >= 8) && 
            ($counter <= 10)) {
          $subtitle .= ', Applied within Product(s) Already in Cart';   
        } else {
          $subtitle .= ', Applied to Next Product(s) Added to Cart';
        }    
      }  */
      ?>                                   
       
        <div class="selection-panel selection-panel-A  selection-panel-A-<?php echo $counter; ?>" 
              id="selection-panel-A-<?php echo $counter . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Template Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-A" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /> </a>
          <span class="selection-panel-template"><?php echo $vtcrt_rule_template_framework['option'][$i]['title']; ?></span>
          <span class="selection-panel-subtitle"><?php echo $subtitle; ?></span>                       
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_A_text($vtcrt_rule_template_framework['option'][$i]['value']);
            ?>
           
            </span>
          </span>
          <a class="selection-panel-close  clear-left  selection-panel-close-A" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /> </a>          
        </div>
       
       <?php 
       $counter++; 
    } //end of for loop 
   return;  
  }    
          
  //************************************************
  // Help panel for Template Dropdown
  //************************************************ 
  function vtcrt_show_help_panel_A_text($key_value) { 
         
    switch($key_value) {
      //display templates
      case '0':  //  Please choose
          ?>  
            <span class="textarea"> <?php                          
              _e('The Pricing Deal Plugin is driven by Template choice.  Templates fall under two main categories:', 'vtcrt'); 
          ?> 
            </span>
            <ol class="directions-list">
              <li><?php _e('Realtime product price reduction, which immediately shows the price reduction to the ', 'vtcrt'); echo '<em>'; _e('logged-in Customer', 'vtcrt'); echo '</em>'; _e('.  This gives you the ability to
                    offer pricing tiers based via Membership or for the Wholesaler.', 'vtcrt');?> </li>
              <li><?php _e('Discounts which are applied after the product has been Added to Cart.', 'vtcrt');?></li>
            </ol>
            
            <span class="textarea"> <?php                          
              _e('The Template Choices Break down as follows:', 'vtcrt'); 
          ?> 
            </span>
            
            <ol class="directions-list"><span class="ol-title"><?php _e('Simple Realtime Discounts, Limited to a percent or $$ value discount', 'vtcrt');?></span> <br>
              <li><?php _e('Store-Wide Sale with a Percentage or $$ Value Off all Products in the Cart', 'vtcrt');?> </li>
              <li><?php _e('Membership / Wholesaler Discount /Display different prices for logged in users for all Products in the Buy Pool Group', 'vtcrt');?></li>
              <li><?php _e('Simple Discount by any Buy Pool Group Criteria [Product / Category / Pricing Deal Category / Membership / Wholesale]', 'vtcrt');?></li>
            </ol>
            
            <ol class="directions-list"><span class="ol-title"><?php _e('Simple Add to Cart Discounts, Limited to simple discounts and Buy Pool options', 'vtcrt');?></span> <br>
              <li><?php _e('Store-Wide Sale with a Percentage or $$ Value Off all Products in the Cart', 'vtcrt');?> </li>
              <li><?php _e('Membership / Wholesaler Discount /Display different prices for logged in users for all Products in the Buy Pool Group', 'vtcrt');?></li>
              <li><?php _e('Simple Discount by any Buy Pool Group Criteria [Product / Category / Pricing Deal Category / Membership / Wholesale]', 'vtcrt');?></li>
            </ol>
            
            <ol class="directions-list"><span class="ol-title"><?php _e('Add to Cart Discounts, Where the discount is applied to ', 'vtcrt'); echo '<em>'; _e('items already in the Cart', 'vtcrt'); echo '</em>'; ?></span> <br>
              <li><?php _e('Buy 5/$500, get a discount for Some/All 5', 'vtcrt');?> </li>
              <li><?php _e('Buy 5, get them for the price of 4', 'vtcrt');?></li>
              <li><?php _e('Buy 5/$500, get the cheapest/most expensive at a discount', 'vtcrt');?></li>
            </ol>
            
            <ol class="directions-list"><span class="ol-title"><?php _e('Add to Cart Discounts, Where the discount is applied to the ', 'vtcrt'); echo '<em>'; _e('NEXT Items added to the Cart', 'vtcrt'); echo '</em>';?></span> <br>
              <li><?php _e('Buy 5/$500, get a discount on Next 4/$400', 'vtcrt');?> </li>
              <li><?php _e('Buy 5/$500, get next 3 for the price of 2 [Group Pricing]', 'vtcrt');?></li>
              <li><?php _e('Buy 5/$500, get a discount on the cheapest/most expensive in next 5/$500 purchased', 'vtcrt');?></li>
              <li><?php _e('Buy 5/$500, get the Next Nth at a discount', 'vtcrt');?></li>
            </ol>
                        
                             
            <span class="textarea"> <?php                          
              _e('Sale Information and Messages can be added to your Website Theme, using the "echo do_action" syntax discussed in the documentation and the readme.', 'vtcrt');    
              echo '<br>';
              _e('The plugin offers the following additonal theme-available info:', 'vtcrt'); 
          ?> 
            </span>
            <ol class="directions-list">
              <li><?php _e('Discount Full Message for participating products (where the product is either in the "Buy" or "Get" groups)');?> </li>
              <li><?php _e('"Yousave At Checkout" Amount, if the rule applies to the Cart.', 'vtcrt');?></li>
              <li><?php _e('Discount Short Message at checkout.', 'vtcrt');?></li>
              <li><?php _e('Full breakdown of the discount applied to each product for each rule, or a simple discount totals amount.', 'vtcrt');?></li>
            </ol>
          <?php      
       break;
     case 'D-storeWideSale':  //  Store-Wide Sale
              _e('Realtime price discount applied across the whole store.', 'vtcrt');
              echo '<br>';
              _e('The price reduction created by this Rule takes place as the product is displayed on the website.  Original price, yousave amount and the Long Rule Description are available to the
              theme using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display this info to the customer, informing them of the discount available to them.', 'vtcrt');    
       break;       
      case 'D-simpleDiscount':  // Simple Discount by any Buy Pool Group Criteria          
          ?>  <span class="textarea"> <?php                          
              _e('This selection allows you to create a rule for any Buy pool criteria:', 'vtcrt'); 
          ?>   
            </span
            <ol class="directions-list">
              <li><?php _e('By Category or Pricing Deal Category / and/or / Membership/Wholesale Role (Display different prices for logged in users)', 'vtcrt');?></li>
              <li><?php _e('By Product or Product Variations', 'vtcrt');?></li>
            </ol>
            <span class="textarea">                       
           <?php
           _e('The price reduction created by this Rule takes place as the product is displayed on the website.  Original price, yousave amount and the Long Rule Description are available to the
            theme using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display this info to the customer, informing them of the discount available to them.', 'vtcrt');
          ?> </span> <?php
        break; 
      case 'D00-N5':  // UpCharge by any Buy Pool Group Criteria          
          ?>  <span class="textarea"> <?php                          
              _e('UpCharge (price increase) applied across the whole store (Great for Variations UpCharge):', 'vtcrt'); 
          ?>   
            </span>
            <ol class="directions-list">
              <li><?php _e('By Category or Pricing Deal Category / and/or / Membership/Wholesale Role (Display different prices for logged in users)', 'vtcrt');?></li>
              <li><?php _e('By Product or Product Variations', 'vtcrt');?></li>
            </ol>
            <span class="textarea">                       
           <?php
           _e('The Price UpCharge created by this Rule takes place as the product is displayed on the website.', 'vtcrt');
          ?> </span> <?php
        break;         
      case 'C-storeWideSale':  // Store-Wide Sale
              _e('Realtime price discount applied across the whole store.', 'vtcrt'); 
               echo '<br><br>';
               _e('The price reduction created by this Rule takes place at Add to Cart time.  Long Rule Description, whose display indicates that the product participates in a Pricing Deal, is available to the
              theme (at all times) using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display this info to the customer, informing them of the discount available to them.', 'vtcrt');    
       break; 
      case 'C-simpleDiscount':  //  Simple Discount by any Buy Pool Group Criteria          
          ?>  <span class="textarea"> <?php                          
              _e('This selection allows you to create a rule for any Buy pool criteria:', 'vtcrt'); 
          ?>   
            </span>
            <ol class="directions-list">
              <li><?php _e('By Category or Pricing Deal Category / and/or / Membership/Wholesale Role (Display different prices for logged in users)', 'vtcrt');?></li>
              <li><?php _e('By Product or Product Variations', 'vtcrt');?></li>
            </ol>
            <span class="textarea">                      
           <?php
            _e('The price reduction created by this Rule takes place at Add to Cart time.  Long Rule Description, whose display indicates that the product participates in a Pricing Deal, is available to the
              theme (at all times) using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display this info to the customer, informing them of the discount available to them.', 'vtcrt');
          ?> </span> <?php
        break; 
      case 'C-discount-inCart':  //   Buy 5/$500, get a discount for Some/All 5         
          ?>  <span class="textarea"> <?php                          
              _e('This selection allows you to define a Product activation amount and then define how many of that group get the discount, and how it is applied.', 'vtcrt'); 
          ?>   
            </span>
            <ol class="directions-list">
              <li><?php _e('Activation amount example: 5 units or $500', 'vtcrt');?></li>
              <li><?php _e('Result example: "Buy $500 of computer items, get 10% off (all of them)" = $50 off of total bill', 'vtcrt');?></li>
              <li><?php _e('Result example: "Buy $500 of computer items, get 10% off (one of them)" = up to $50 off of total bill, depending on item purchase price - applied to 1st product in group', 'vtcrt');?></li>
            </ol>
            <span class="textarea">                      
           <?php
            _e('The price reduction created by this Rule takes place at Add to Cart time.  Long Rule Description, whose display indicates that the product participates in a Pricing Deal, is available to the
               theme (at all times) using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display this info to the customer, informing them of the discount available to them.', 'vtcrt');
          ?> </span> <?php
        break;
      case 'C-forThePriceOf-inCart':  // Buy 5, get them for the price of 4 - Cart 
          ?>  <span class="textarea"> <?php                          
              _e('5 for the price of 4 is a group purchase option, but with a difference. Here, the deal price is computed based on a percentage of the cost of the group total', 'vtcrt');
              echo '<br><br>';
              _e('For example, if 5 items of equal cost are purchased, each costing $100.  The Deal price would be 80% of the total, or $400.', 'vtcrt'); 
          ?>   
              </span>
           <?php             
        break;
      case 'C-cheapest-inCart':  //  Buy 5/$500, get a discount for Some/All 5 -Cart         
          ?>  <span class="textarea"> <?php                          
              _e('This is the most basic kind of group purchase. Here, the deal price pre-figured discount within the group purchased.', 'vtcrt');
              echo '<br><br>';
              _e('Example 1: buy 5 units, get $20 off of 2 items.', 'vtcrt');
              echo '<br><br>';
              _e('Example 2: buy 5 specific items, get them for a fixed group price - True Group Pricing.', 'vtcrt'); 
          ?>   
              </span>
           <?php         
        break;                
      case 'C-discount-Next':  // occurrence 8, matches "C-discount-Next"   Buy 5/$500, get a discount on Next 4/$400 - Cart        
          ?>  <span class="textarea"> <?php                          
              _e('Dummy Text', 'vtcrt'); 
          ?>   
              </span>
           <?php              
        break;
      case 'C-forThePriceOf-Next':  // occurrence 8, matches "C-forThePriceOf-Next"   Buy 5/$500, get next 3 for the price of 2 - Cart        
          ?>  <span class="textarea"> <?php                          
              _e('Dummy Text', 'vtcrt'); 
          ?>   
              </span>
           <?php  
        break;
      case 'C-cheapest-Next':  // occurrence 8, matches "C-cheapest-Next"   Buy 5/$500, get a discount on the cheapest/most expensive when next 5/$500 purchased - Cart        
          ?>  <span class="textarea"> <?php                          
              _e('Dummy Text', 'vtcrt'); 
          ?>   
              </span>
           <?php          
        break;
      case 'C-nth-Next':  // occurrence 8, matches "C-nth-Next"   Buy 5/$500, get the following Nth at a discount - Cart         
          ?>  <span class="textarea"> <?php                          
              _e('Dummy Text', 'vtcrt'); 
          ?>   
              </span>
           <?php          
        break;        
    }
  
  } 
 
           
  //************************************************
  // Help panel for Buy amount condition type Dropdown
  //************************************************ 
  function vtcrt_show_help_selection_panel_B($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  
    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['buy_amt_type']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-B  selection-panel-B-<?php echo $i; ?>" id="selection-panel-B-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Buy Type Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-B" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['buy_amt_type']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_B_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }   
 
  function vtcrt_show_help_panel_B_text($i) {          
    switch($i) {
      //display templates
      case '0':  // No Buy Condition (rule applies to entire Buy pool)
              _e('Rule applies against all individual product units in the Buy pool.', 'vtcrt');    
        break;
      case '1':  // Buy One
              _e('Rule applies to each single product unit in the Buy Pool. ', 'vtcrt');    
        break;
      case '2':  // Buy Unit Quantity 
              _e('Rule applies to a quantity of individual products, or a quantity across the all the products, in the Buy Pool.', 'vtcrt');    
        break;
      case '3':  // Buy $$ Value
              _e('Rule applies to a $$ value of individual products, or a quantity across the all the products, in the Buy Pool.', 'vtcrt');    
        break;
      case '4':  // Buy Each Nth Unit 
              _e('Rule applies to every Nth unit count of individual products, or a quantity across the all the products, in the Buy Pool.', 'vtcrt');
              echo '<br><br>';
              _e('Please note that the "Each Nth" option does not by definition repeat multiple times, but as in all other rule types, 
                  the repetition is controlled by the  Rule Usage Count Amt.', 'vtcrt');    
        break;           
    }
  }
       
           
  //************************************************
  // Help panel for Buy amount condition applies to Dropdown
  //************************************************ 
  function vtcrt_show_help_selection_panel_C($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  
    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['buy_amt_applies_to']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-C  selection-panel-C-<?php echo $i; ?>" id="selection-panel-C-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Buy Amount "Applies To" Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-C" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['buy_amt_applies_to']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_C_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }    
 
  function vtcrt_show_help_panel_C_text($i) {          
    switch($i) {
      //display templates
      /*  NO LONGER EXISTS!!!!!!   FIX!!!!!!!!
      case '0':  // All Buy pool products in the cart as a group
              _e('The rule Buy Amount applies to all Buy products in the cart as a group total', 'vtcrt');    
        break;  */
      case '1':  // Each Buy pool product quantity total in the cart
              _e('The rule Buy Amount applies to all Buy products in the cart as individual product quantity totals', 'vtcrt');     
        break;        
    }
  }

           
  //************************************************
  // Help panel for Get amount condition type Dropdown
  //************************************************ 
  function vtcrt_show_help_selection_panel_D($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
  
    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['action_amt_type']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-D  selection-panel-D-<?php echo $i; ?>" id="selection-panel-D-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Get Amount Type Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-D" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['action_amt_type']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_D_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }   
 
  function vtcrt_show_help_panel_D_text($i) {          
    switch($i) {
      //display templates
      case '0':  // No Get Condition (rule applies to entire Get pool)
              _e('Rule applies against all individual product units in the Get pool.
              ', 'vtcrt');    
        break;
      case '1':  // Get this one
              _e('Rule applies to the single product unit in the Buy Pool which is current.
              For example, every 5th purchase gets 10% off.  ("action pool same as buy pool" is required). ', 'vtcrt');    
        break;
      case '2':  // Get next one
              _e('Rule applies to next single product unit in the Get Pool. ', 'vtcrt');    
        break;
      case '3':  // Get next Unit Quantity 
              _e('Rule applies to a quantity of individual products, or a quantity across the all the products, in the Get Pool.', 'vtcrt');    
        break;
      case '4':  // Get next $$ Value
              _e('Rule applies to a $$ value of individual products, or a quantity across the all the products, in the Get Pool.', 'vtcrt');    
        break;
      case '5':  // Get Each Nth Unit 
              _e('Rule applies to every Nth unit count of individual products, or a quantity across the all the products, in the Get Pool.', 'vtcrt');
              echo '<br><br>';
              _e('Please note that the "Each Nth" option does not by definition repeat multiple times, but as in all other rule types, 
              the repetition is controlled by the  Get Pool Repeat Amt.', 'vtcrt');    
        break;           
    }
  }
           
  
  //************************************************
  // Help panel for action amount condition applies to Dropdown
  //************************************************ 
  function vtcrt_show_help_selection_panel_E($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;
 
    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['action_amt_applies_to']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-E  selection-panel-E-<?php echo $i; ?>" id="selection-panel-E-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Get Amount "Applies To" Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-E" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['action_amt_applies_to']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_E_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }    
 
  function vtcrt_show_help_panel_E_text($i) {          
    switch($i) {
      //display templates
      case '0':  // All action pool products in the cart as a group
              _e('The rule action Amount applies to all Get products in the cart as a group total.', 'vtcrt');    
        break;
      case '1':  // Each action pool product quantity total in the cart
              _e('The rule action Amount applies to all Get products in the cart as individual product quantity totals.', 'vtcrt');     
        break;        
    }
  }

  
  //************************************************
  // Help panel for Discount Amount
  //************************************************ 
  function vtcrt_show_help_selection_panel_F($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;

    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['discount_amt_type']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-F  selection-panel-F-<?php echo $i; ?>" id="selection-panel-F-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Discount Amount Type Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-F" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['discount_amt_type']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_F_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }    
 
  function vtcrt_show_help_panel_F_text($i) {          
    switch($i) {
      //display templates
      case '0':  // Please enter...
              _e('Please choose a discount type.', 'vtcrt');    
        break;
      case '1':  // Percentage Off Discount
              _e('Offer a Percentage Off Discount', 'vtcrt');
              echo '<br><br>';
              _e('Long Rule Description is available to the theme using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display the Pricing Deal Message to the customer, informing them of the discount available to them.', 'vtcrt');    
        break;
      case '2':  // Currency Amount Discount
              _e('Offer a fixed Currency Amount Discounted.', 'vtcrt');
              echo '<br><br>';
              _e('Long Rule Description is available to the theme using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display the Pricing Deal Message to the customer, informing them of the discount available to them.', 'vtcrt');     
        break;
      case '3':  // Set a Discounted Fixed Price
              _e('Set a Discounted Fixed Price.', 'vtcrt');
              echo '<br><br>';
              _e('Long Rule Description is available to the theme using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display the Pricing Deal Message to the customer, informing them of the discount available to them.', 'vtcrt');     
        break;        
      case '4':  // Free
              _e('Offer a product for Free in this Discount.', 'vtcrt');
              echo '<br><br>';
              _e('Long Rule Description is available to the theme using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display the Pricing Deal Message to the customer, informing them of the discount available to them.', 'vtcrt');     
        break;        
      case '5':  // For the Price of (Units) Discount ["Buy 5 for the price of 4"]
              _e('Group Pricing, "Buy 5 for the price of 4".', 'vtcrt');
              echo '<br><br>';
              _e('Long Rule Description is available to the theme using the "echo do_action" syntax discussed in the documentation and the readme,
              so that you can display the Pricing Deal Message to the customer, informing them of the discount available to them.', 'vtcrt');     
        break;                   
    }
  }
 
  
  //************************************************
  // Help panel for Discount Applies To
  //************************************************ 
  function vtcrt_show_help_selection_panel_G($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;

    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['discount_amt_type']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-G  selection-panel-G-<?php echo $i; ?>" id="selection-panel-G-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Discount "Applies To" Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-G" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['discount_applies_to']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_G_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }    
 
  function vtcrt_show_help_panel_G_text($i) {          
    switch($i) {
      case '0':  //   Each Product in the Get Pool 
              _e('Please enter a "Discount applies to" value', 'vtcrt');    
        break;
      case '1':  //   Each Product in the Get Pool 
              _e('Apply Discount to Each individual Product in the Get Pool', 'vtcrt');    
        break;
      case '2':  //   All Products in the Get Pool 
              _e('Apply Discount to All Products in the Get Pool as a Group', 'vtcrt');    
        break;
      case '3':  //   Cheapest Product in the Get Pool 
              _e('Apply Discount to the Cheapest Product in the Get Pool', 'vtcrt');   
        break;        
      case '4':  //   Most Expensive Product in the Get Pool 
              _e('Apply Discount to the Most Expensive Product in the Get Pool', 'vtcrt');     
        break;                          
    }
  }

  
  //************************************************
  // Help panel for Discount Maximum for Rule across the Cart
  //************************************************ 
  function vtcrt_show_help_selection_panel_H($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;

    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['discount_rule_max_amt_type']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-H  selection-panel-H-<?php echo $i; ?>" id="selection-panel-H-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Discount Rule Maximum Type Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-H" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['discount_rule_max_amt_type']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_H_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }    
 
  function vtcrt_show_help_panel_H_text($i) {          
    switch($i) {
      //display templates
      case '0':  //     No Discount Rule Max  
              _e('No Cart-level Discount Rule Maximum', 'vtcrt');    
        break;
      case '1':  //     Maximum Percentage Discount Value for the rule across the cart - Rule Max  
              _e('Cart-level Percentage Rule Maximum purchase', 'vtcrt');    
        break;        
      case '2':  //     Maximum Number of times the Discount may be employed for the rule across the cart - Rule Max   
              _e('Cart-level maximum Product occurrences allowed for rule.  Limits how many times the rule discount can be applied across the cart.', 'vtcrt');    
        break;
      case '3':  //     Maximum $$ Value Discount the rule may create across the cart  - Rule Max 
              _e('Cart-level $$ maximum allowed for rule.  Limits the dollar value total discount for the rule which can be applied across the cart.', 'vtcrt');   
        break;                                 
    }
  }

  
  //************************************************
  // Help panel for Lifetime Discount Maximum for Rule
  //************************************************ 
  function vtcrt_show_help_selection_panel_I($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework;

    for($i=0; $i < sizeof($vtcrt_deal_screen_framework['discount_lifetime_max_amt_type']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-I  selection-panel-I-<?php echo $i; ?>" id="selection-panel-I-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Discount Rule Maximum Amount Type Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-I" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>
          <span class="selection-panel-template"><?php echo $vtcrt_deal_screen_framework['discount_lifetime_max_amt_type']['option'][$i]['title']; ?></span>                      
      		<span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_I_text($i);
            ?>
           
            </span>
          </span> 
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }    
 
  function vtcrt_show_help_panel_I_text($i) {          
    switch($i) {
      //display templates
      case '0':  //     No Discount Rule Max  
              _e('No Lifetime Discount Rule Maximum', 'vtcrt');    
        break;
      case '1':  //     Maximum Percentage Discount Value for the rule across the cart - Rule Max  
              _e('Lifetime Percentage Rule Maximum purchase.  
                  If the Lifetime limit for a rule has been reached, the shortcode deal message for this rule will not display in the theme, 
                  as the customer will no longer have access to that deal.', 'vtcrt');    
        break;        
      case '2':  //     Maximum Number of times the Discount may be employed for the rule across the cart - Rule Max   
              _e('Lifetime maximum Product occurrences allowed for rule.  Limits how many times the rule discount can be applied across the lifetime of the rule.  
                  If the Lifetime limit for a rule has been reached, the shortcode deal message for this rule will not display in the theme, 
                  as the customer will no longer have access to that deal.', 'vtcrt');    
        break;
      case '3':  //     Maximum $$ Value Discount the rule may create across the cart  - Rule Max 
              _e('Lifetime $$ maximum allowed for rule.  Limits the dollar value total discount for the rule which can be applied across the lifetime of the rule.  
                  If the Lifetime limit for a rule has been reached, the shortcode deal message for this rule will not display in the theme, 
                  as the customer will no longer have access to that deal.', 'vtcrt');   
        break;                                 
    }
  }

  
  
  //************************************************
  // Help panel for Get Pop
  //************************************************ 
  function vtcrt_show_help_selection_panel_J($k) {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework, $vtcrt_rule_display_framework;

    for($i=0; $i < sizeof($vtcrt_rule_display_framework['actionPop']['option']); $i++)  {   //run through the whole array!!
      ?>           
        <div class="selection-panel selection-panel-J  selection-panel-J-<?php echo $i; ?>" id="selection-panel-J-<?php echo $i . '-' . $k;?>" >                                
          <span class="selection-panel-label label"><strong><?php _e('Get Group Chosen:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-J" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                     
          <span class="selection-panel-template"><?php echo $vtcrt_rule_display_framework['actionPop']['option'][$i]['title']; ?></span>
          <span class="selection-panel-text" >
            <span class="selection-panel-text-title"><?php _e('Description', 'vtcrt');?></span>
            <span class="selection-panel-text-info">
            
            <?php
              vtcrt_show_help_panel_J_text($i);
            ?>
           
            </span>
          </span> 
          <a class="selection-panel-close  clear-left  selection-panel-close-J" id="selection-panel-close-bottom" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>           						
        </div>       
       <?php 
    } //end of for loop 
   return;  
  }    
 
  function vtcrt_show_help_panel_J_text($i) {          
    switch($i) {
      //display templates
      case '0':  //     No Discount Rule Max  
              _e('Please be careful when choosing the Get Group Selection. ', 'vtcrt');
              echo '<br><br>';
              _e('If you choose "Get Pool Group same as Buy Pool Group" or
                 "Apply to all products in store", the Buy and Get groups will be processed as a single group together, alternating
                 between Buy criteria and Get criteria.  For example, in this case you have "buy 5 get 1 free", the 6th item purchased will be free.', 'vtcrt');
                 
               echo '<br><br>';
              _e('If the Get Group is separately specified, it will be counted separately, regardless whether the two groups actuall share members.
                 For example, you have "buy 5 get 1 free", but the Get group separately specifies the same categories as the Product.
                 In this case the Get Group will **Recount** the original 5, and offer the 1st free...', 'vtcrt'); 
                 
               echo '<br><br><strong>';
               _e('So please be sure that if there is overlap between the Product and the specified Get Group, you have considered
                 the overlap issue.', 'vtcrt');
               echo '</strong>';    
        break;
                                
    }
  }

    
  //************************************************
  // Help panels for Roles Info
  //************************************************ 
  function vtcrt_show_help_selection_panel_K() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework, $vtcrt_rule_display_framework;
        //there's only one of these panels...
        $k = 0;
      ?>           
        <div class="selection-panel selection-panel-K  selection-panel-K-0" id="selection-panel-K-0" >                                
          <span class="selection-panel-label label"><strong><?php _e('Selection Groups Help Info:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-K" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                     
          <span class="selection-panel-text" >
            <span class="selection-panel-text-info">
            
              <?php _e("
                 Use an existing category to identify the group of products to which you wish to apply the rule.  
                 Or if you'd rather, use a Cart Deals Category to identify products - this avoids disturbing the store categories. Just add a Cart Deals Category, go to the product screen,
                 and add the product to the correct Cart Deals category.  (On your product add/update screen, the Mininimum purchase 
                 category metabox is just below the default product category box.)  You can also apply the rule using Wholesaler / Membership / Roles (Displays different prices for logged in users)  
                 as a solo selection, or you can use any combination of all three.", 'vtcrt');
              echo '<br><br>';
              _e("Display different prices/pricing tiers for logged in users => Role/Membership is used within Wordpress to control access and capabilities, when a role is given to a user.  
                 Wordpress assigns certain roles by default such as Subscriber for new users or Administrator for the site's owner. Roles can also be used to associate a user 
                 with a pricing level.  Use a role management plugin like , ", 'vtcrt'); 
                 ?>
                 <a href="http://wordpress.org/extend/plugins/user-role-editor/">
                 <?php _e('User Role Editor', 'vtcrt');?></a> 
               <?php 
               _e("to establish custom roles, which you can give 
                 to a user or class of users.  Then you can associate that role with a Cart Deals Rule.  
                 So when the user logs into your site, their Role interacts with the appropriate Rule.", 'vtcrt');
              echo '<br><br>';
              _e("Please take note of the relationship choice 'and/or' when using roles.  The default is 'or', while choosing 'and' requires that 
                 both a role and a category be selected, before a rule can be published.", 'vtcrt');?>
                <br><br>
                <h3><?php _e('Membership / Wholesale / Customer', 'vtcrt'); echo '&nbsp;&nbsp;';  _e('Role How-To', 'vtcrt');?></h3>
                <ol class="directions-list">
                  <li><?php _e('Download a Role Management Plugin (like ', 'vtcrt');?> <a href="http://wordpress.org/extend/plugins/user-role-editor/"><?php _e('User Role Editor', 'vtcrt');?></a>) </li>
                  <li><?php _e('Set up unique Membership/Wholesale Roles using Role Management Plugin', 'vtcrt');?></li>
                  <li><?php _e('Ensure shop website theme allows user to Log In to store', 'vtcrt');?></li>                    
                  <li><?php _e('Assign signed-up users to appropriate Membership/Wholesale Role (', 'vtcrt');?><a href="/wp-admin/users.php"><?php _e('Users Screen', 'vtcrt');?></a>)</li>
                  <li><?php _e('Set up Pricing Deal rule(s) which specify the appropriate Membership/Wholesale role(s) for the Buy or Get Pool', 'vtcrt');?></li>
                </ol>          
            </span>
          </span> 
          <a class="selection-panel-close  clear-left  selection-panel-close-K" id="selection-panel-close-bottom" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>           						
        </div>       
       <?php 
   return;  
  }    
  //dup of K
  function vtcrt_show_help_selection_panel_L() {  
    global $vtcrt_setup_options, $vtcrt_rule_template_framework, $vtcrt_deal_screen_framework, $vtcrt_rule_display_framework;
        //there's only one of these panels...
        $k = 0;
      ?>           
        <div class="selection-panel selection-panel-L  selection-panel-L-0" id="selection-panel-L-0" >                                
          <span class="selection-panel-label label"><strong><?php _e('Selection Groups Help Info:', 'vtcrt');?></strong></span>                         
          <a class="selection-panel-close selection-panel-close-L" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>                     
          <span class="selection-panel-text" >
            <span class="selection-panel-text-info">
            
              <?php _e("Display different prices/pricing tiers for logged in users => Role/Membership is used within Wordpress to control access and capabilities, when a role is given to a user.  
                 Wordpress assigns certain roles by default such as Subscriber for new users or Administrator for the site's owner. Roles can also be used to associate a user 
                 with a pricing level.  Use a role management plugin like http://wordpress.org/extend/plugins/user-role-editor/ to establish custom roles, which you can give 
                 to a user or class of users.  Then you can associate that role with a Cart Deals Rule.  
                 So when the user logs into your site, their Role interacts with the appropriate Rule.", 'vtcrt');
              echo '<br><br>';
              _e("Use an existing category to identify the group of products to which you wish to apply the rule.  
                 If you'd rather, use a Cart Deals Category to identify products - this avoids disturbing the store categories. Just add a Cart Deals Category, go to the product screen,
                 and add the product to the correct Cart Deals category.  (On your product add/update screen, the Mininimum purchase 
                 category metabox is just below the default product category box.)  You can also apply the rule using Wholesaler / Membership / Roles (Displays different prices for logged in users)  
                 as a solo selection, or you can use any combination of all three.", 'vtcrt');
              echo '<br><br>';
              _e("Please take note of the relationship choice 'and/or' when using roles.  The default is 'or', while choosing 'and' requires that 
                 both a role and a category be selected, before a rule can be published.", 'vtcrt');?>
                <br><br>
                <h3><?php _e('Membership / Wholesale / Customer', 'vtcrt'); echo '&nbsp;&nbsp;';  _e('Role How-To', 'vtcrt');?></h3>
                <ol class="directions-list">
                  <li><?php _e('Download a Role Management Plugin (like ', 'vtcrt');?> <a href="http://wordpress.org/extend/plugins/user-role-editor/"><?php _e('User Role Editor', 'vtcrt');?></a>) </li>
                  <li><?php _e('Set up unique Membership/Wholesale Roles using Role Management Plugin', 'vtcrt');?></li>
                  <li><?php _e('Ensure shop website theme allows user to Log In to store', 'vtcrt');?></li>                    
                  <li><?php _e('Assign signed-up users to appropriate Membership/Wholesale Role (', 'vtcrt');?><a href="/wp-admin/users.php"><?php _e('Users Screen', 'vtcrt');?></a>)</li>
                  <li><?php _e('Set up Pricing Deal rule(s) which specify the appropriate Membership/Wholesale role(s) for the Buy or Get Pool', 'vtcrt');?></li>
                </ol>          
            </span>
          </span> 
          <a class="selection-panel-close  clear-left  selection-panel-close-L" id="selection-panel-close-bottom" href="javascript:void(0);" ><img class="close-button" alt="help"  width="16" height="16" src="<?php echo VTCRT_URL;?>/admin/images/close-icon.png" /></a>           						
        </div>       
       <?php 
   return;  
  }    
  
  
  //*************************************************
  //  TOOLTIP AREA
  //*************************************************
   
  function vtcrt_show_help_tooltip($context, $location = null) {
     // hasTooltip set up to show the next div (hidden) as tooltip...
   ?>             
     <img class="helpImg  twelveByTwelve  hasTooltip" alt="help"  src="<?php echo VTCRT_URL;?>/admin/images/help.png" /> 
     <div class="hideMe"> 
     <?php 
      /* //add in class for location as needed
      switch($location) {
        case 'title': 
            echo ' tooltipTitleSpacing';
          break;
      } */
     ?>  
          <b> <?php vtcrt_show_help_tooltip_text($context); ?> </b> 
          
     </div>                  
   <?php              
  } 
    
  function vtcrt_show_help_tooltip_text($context) {          
    switch($context) {
      //display templates            
      case 'basic-rule-scheduling':  
           _e('Rule scheduling is required.', 'vtcrt');
            echo '<br><br>';
            _e('The rule may Begin any time, the End Date may be the same as Begin Date or later.', 'vtcrt');
            echo '<br><br>';
            _e('In order for the rule to be active, the date must fall between the Begin and End Dates (inclusive of the stated boundary dates).', 'vtcrt');               
        break;
      case 'deal-type-title':  
           _e('The Pricing Deal Template helps you to define what kind of Pricing Deal rule you wish to employ.  By choosing a template, further overall rule attributes
               are refined to reflect what is valid for that template type.', 'vtcrt');
              echo '<br><br>';
              _e('For most templates, the Buy (Buy one) Pool and the Get (Get one) Pool can have various contents.', 'vtcrt');
              echo '<br><br>';
              _e('For example, "Buy a 2 Laptops, get 10% off" - that would be a Buy Pool Selection of the Laptops category, 
               and an Get group selection of "Get Pool Group same as Buy Pool Group" .', 'vtcrt');
               
        break;
      case 'buy-amt-title':  
           _e('The Buy Amount sets the gateway cart purchase Amount into this discount rule.  Options include whether the rule gnerally applies to the entire but pool, or if there is a 
                count or $$ activation amount.', 'vtcrt');
              echo '<br><br>';             
             _e('In order for a discount to apply, the Buy Amount criteria must first be satisfied', 'vtcrt');              
        break; 
      case 'buy_amt_mod_title':
           _e('When the Buy Pool Amt Type threshhold is set to a Quantity Count, Set a Minimum or Maximum $$ value the rule must also reach.', 'vtcrt');        
        break;                      
      case 'buy_repeat_condition_title':    
           _e('How many times the Whole Rule is repeated, for the cart.', 'vtcrt');
              echo '<br><br>';
              _e('For example, "Buy 5, get 10% off" with unlimited Rule repeats is the rule.  If the purchaser gets 10 items which participate in the Buy pool, then the 
             10% off will apply again vs the second group of 5.', 'vtcrt');
              echo '<br><br>';
              _e('To control how many times the Whole Rule can Ever be executed for a Customer, use the "Per Customer Limit".', 'vtcrt');
        break;
      case 'buy-amt-applies-to':     
            _e('Buy 5 ... "OF A SINGLE ITEM / FROM A GROUP "...', 'vtcrt');
              echo '<br><br>';
           _e('Applies to EACH = the count or $$ value applies ONLY to a quantity/$$ value of a single product.', 'vtcrt');
              echo '<br><br>';
           _e('Applies to ALL = the count or $$ value applies ', 'vtcrt');
              echo '<br>';
           _e(' EITHER to a a quantity/$$ value of a single product, ', 'vtcrt');
              echo '<br>';
           _e(' OR the a quantity/$$ value of a GROUP of products 
              (within the specified "Buy" group).', 'vtcrt');
        break;        
      case 'action_amt_title':  
           _e('.', 'vtcrt');
              echo '<br><br>';
              _e('The threshhold (Get Pool Amount Condition) can apply to all products in the cart, or individual products quantites in the cart.', 'vtcrt');               
        break;
      case 'action_amt_mod_title':
           _e('When the Get Pool Amt Type threshhold is set to a Quantity Count, Set a Minimum or Maximum $$ value the rule must also reach.', 'vtcrt');        
        break;                      
      case 'action_repeat_condition_title':  
           _e('How many times the Get Pool condition is counted (once the Buy Pool conditions are reached).  
            This essentially counts the number of times the JUST the action pool is repeated and eventually discounted.', 'vtcrt');
              echo '<br><br>';
              _e('For example, "Buy 5, get 10% off next one" with unlimited Get repeats is the rule, Get pool same as Buy pool set.  
             If the purchaser gets 10 items which participate in the Buy pool, then the 1st 5 will count towards the Buy count. 
             The 10% off will apply against products 6 - 10.', 'vtcrt');
        break;                            
      case 'get-amt-applies-to':     
            _e('Get 5 ... "OF A SINGLE ITEM / FROM A GROUP "...', 'vtcrt');
              echo '<br><br>';
           _e('Applies to EACH = the count or $$ value applies ONLY to a quantity/$$ value of a single product.', 'vtcrt');
              echo '<br><br>';
           _e('Applies to ALL = the count or $$ value applies ', 'vtcrt');
              echo '<br>';
           _e(' EITHER to a a quantity/$$ value of a single product, ', 'vtcrt');
              echo '<br>';
           _e(' OR the a quantity/$$ value of a GROUP of products 
              (within the specified "Get" group).', 'vtcrt');
        break;                                                
      case 'discount_amt_title': 
           _e('The Discount offered is the heart of the Pricing Deal rule system.  
              Discount types include % off, $$ off, sell at a fixed price, free, or "for the price of" discount.', 'vtcrt');
              echo '<br><br>';
              _e('The discount can apply to each Get product individually, or all products in the Get Pool.  The discount can also be applied against the
             most expensive/lease expensive product in the Get group.  Discounts granted by this rule can be limited by Maximum limits below.', 'vtcrt');
        break;  
      case 'discount_applies_to': 
           _e('The discount can be applied against the each individual product/all products as a group, or against.
             most expensive/lease expensive product in the Get group.  Discounts granted by this rule can be limited by Maximum limits below.', 'vtcrt');
        break;
      case 'discount_auto_add_free_product': 
           _e('Always automatically insert the Free Product into the cart.', 'vtcrt');
           echo '<br><br>';
           _e('Automatically Remove the Free Product from the cart, if "free" conditions no longer apply...', 'vtcrt');
           echo '<br><br>';
           _e('The Free product will never be one of the items purchased by the client.', 'vtcrt');             
           echo '<br><br>';
           _e('The free product is only ever inserted automatically*.  (This is a reversal of normal behavior...)', 'vtcrt');             
        break;        
      case 'discount_rule_max_amt_type':
           _e('Maximum Discount Limits for Cart Purchases as granted through this rule.', 'vtcrt');
              echo '<br><br>';
              _e('Lifetime Maximum Discount limits by IP can be applied immediately at add-to-cart time.', 'vtcrt');
              echo '<br><br>';
              _e('All other name, email and address limits are applied at checkout time.', 'vtcrt');
        break;
      case 'discount_rule_max_amt_msg': 
           _e('This msg is optionally available on demand in your theme using the "echo do_action" syntax discussed in the documentation and the readme.', 'vtcrt');
        break;
      case 'discount_lifetime_max_amt_msg': 
           _e('This msg is optionally available on demand in your theme using the "echo do_action" syntax discussed in the documentation and the readme.', 'vtcrt');
        break;        
      case 'discount_rule_cum_max_amt_msg': 
           _e('This msg is optionally available on demand in your theme using the "echo do_action" syntax discussed in the documentation and the readme.', 'vtcrt');
        break;        
      case 'discount_lifetime_max_amt_type':
           _e('Maximum Discount Limits for Lifetime Purchases as granted through this rule.  
                  If the Lifetime limit for a rule is reached, the shortcode deal message for this rule will not display in the theme, 
                  as the customer will no longer have access to that deal.', 'vtcrt');
        break;
      case 'discount_full_msg':
           _e('Theme-displayable Product message, using the "echo do_action" syntax discussed in the documentation and the readme.', 'vtcrt');
        break;
      case 'discount_short_msg':
           _e('The short message is used in the Cart, at the product detail level.  
              The short message is combined with the product name as the label for the product discount.', 'vtcrt');
              echo '<br><br>';
              _e('For example, if the short msg = "Buy 1 Get 1 at 10% off", the line showing the product discount could be:', 'vtcrt');
              echo '<br><br>';
              _e('"Buy 1 Get 1 at 10% off - discount for Dell Vostro Laptop:  cr $150.00"', 'vtcrt');
        break;
      case 'cumulativeSalePricingLimitation':     //
           _e('PLEASE NOTE - Due to a WPEC system limitation,', 'vtcrt');
              echo '<br><br>';
              _e('if a product VARIATION is on sale, and there is an applicable Realtime product price discount,', 'vtcrt');
              echo '<br><br>';
              _e('the Rule discount WILL ALWAYS BE APPLIED, in ADDITION to the Sale Price,', 'vtcrt');
              echo '<br><br>';
              _e('REGARDLESS of any switch settings.', 'vtcrt');          
        break;
      case 'cumulative_pricing_switches':     //cumulativeSalePricingLimitation
           _e('The switches control the interaction of this rule with other rules, sale pricing and coupons.', 'vtcrt');
           if (VTCRT_PARENT_PLUGIN_NAME == 'WP E-Commerce') {
              echo '<br><br>';
              _e('PLEASE NOTE - Due to a system limitation, if a product VARIATION is on sale, and there is an applicable Realtime
              product price discount, the Rule discount WILL ALWAYS BE APPLIED, in addition to the Sale Price discount, regardless of any switch settings.', 'vtcrt');
           }           
        break;        
      case 'discount_rule_cum_max_amt_type':
           _e('Maximum $$ value This Rule can create across the Cart', 'vtcrt');
        break;
      case 'ruleApplicationPriority_num':
           _e('This number helps determine which rule gets priority, when multiple rule discounts may be applied.  The LOWER the number, the higher the priority.  The default value is "10".', 'vtcrt');
        break;
      case 'cumulativeRulePricing':
           _e('If "Apply this Rule Discount in Addition to Other Rule Discounts" = "yes", 
              if this rule is applicable in addition to previous Rules applied, the additional
              discount will be applied UP TO the applicable Maximum settings.', 'vtcrt');
              echo '<br><br>';
              _e('Please NOTE: This switch ONLY acts on other CART rules, there is no interaction with CATALOG/Display pricing rules', 'vtcrt');              
        break;
      case 'cumulativeSalePricing':
           _e('"No Discount if Product Sale Priced" = All discounts are ignored if Product is Sale priced', 'vtcrt');
              echo '<br><br>';
              _e('"Apply Discount in addition to Product Sale Price" = Apply all discounts to the Product Sale Price, if there', 'vtcrt');
              echo '<br><br>';
              _e('"Use Discounted List Price, if Less than Sale Price" = Apply all discounts to the List Price.  Compare to Sale Price, and use
              discounted List Price, if less than Sale Price.', 'vtcrt');
        break;       
      case 'cumulativeCouponPricing':
           _e('If "Apply this Rule Discount in Addition to Coupon Discount" = "yes", 
              if the customer applies a coupon to the cart, this Rule will also apply
              its discount In Addition To the coupon discount.', 'vtcrt');
        break;  
      case 'pop-prod-id':
           _e('Only apply rule to a single product found in the cart, whose ID is supplied in the "Product ID" box.  The product ID can be found in the URL
            of the product during a product edit session', 'vtcrt');
              echo '<br><br>';
              _e('For example, in the product edit session url:<br>
            http://www.xxxx.com/wp-admin/post.php?post=872&action=edit', 'vtcrt');
             echo '<br><br>';
              _e('The product id is in the "post=872" portion of the address, and hence the number is 872.
            ', 'vtcrt');
        break;
      case 'buy-group-title':
           _e('The Product is the gateway into this discount rule. ', 'vtcrt');
              echo '<br><br>';
            _e('In order for a discount to apply, the Product criteria must first be satisfied', 'vtcrt');
              echo '<br><br>';
            _e('The Product can be defined as the whole store catalog, or part of it  
            by product category, pricing deal category, wholesaler or membership, product or product variation.', 'vtcrt');
        break; 
      case 'action-group-title':
           _e('The Get group defines what product or group of products the discount action may be applied to.', 'vtcrt');
              echo '<br><br>';
            _e('In order for a product to receive this discount, the product must participate in the Get Group.', 'vtcrt');
              echo '<br><br>';
            _e('The Get group can be defined as the same as Product, the whole store catalog, or  
            by product category, pricing deal category, wholesaler or membership, product or product variation.', 'vtcrt');
        break;
      case 'discount_amt_count_forThePriceOf':
           _e('For the price of Units works with either the Buy Amount or the Get Amount, based on which template was chosen.', 'vtcrt');
              echo '<br><br>';
              _e('The Buy/Get Amount is the first
            half of the "Buy 5, get for the price of 4".  The second half is the discount "For the Price of Units" amount.  The Buy/Get Amount must be greater than 
            the "For the Price of Units" amount.', 'vtcrt');
        break; 
      case 'includeOrExclude':
           _e('Control how individual product interacts with all Pricing Deal Rules as a group.', 'vtcrt');
           if(!defined('VTCRT_PRO_DIRNAME')) { 
             echo '<br><br>';
              _e('Please Note: This functionality is only available with the Pro plugin.', 'vtcrt');
           }
           echo '<br><br>';
           _e('Each option available in the dropdown (combined with the check list of rules, for two of the options) affects whether this product will participate with any/all rules.', 'vtcrt');
        break; 
      case 'showPro-checkbox':
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
           _e('Unprotect All the Pro Options.', 'vtcrt');
           echo '<br><br>';
           _e("You'll be able to investigate the addtional Buy and Get Group Selection Options:", 'vtcrt');
               ?>  
                <ol>
                  <li><?php _e('  Use Category, Membership / Wholesaler / Role Selection Groups ', 'vtcrt'); ?> </li>
                  <li><?php _e('  Single Product with Variations  .', 'vtcrt'); ?> </li>
                  <li><?php _e('  Single Product Only  ', 'vtcrt'); ?> </li>  
                </ol>
                <?php          
           _e("You'll also be able to investigate the addtional Advanced Settings Discount Limits.", 'vtcrt');
        break; 
      case 'upgradeToPro':
           echo '<strong>'; _e('Group Power  -  Apply rules to any group you can think of, and More!', 'vtcrt'); echo '</strong>';
           echo '<br><br>';
           echo '<strong>';  _e("Create Rules which Filter By:", 'vtcrt'); echo '</strong>';
               ?>  
                <ol>
                  <li><?php _e('  Membership / Wholesaler / Role Selection Groups (logged-in Status)', 'vtcrt'); ?> </li>
                  <li><?php _e('  Product Category', 'vtcrt'); ?> </li>
                  <li><?php _e('  Pricing Deal Custom Category', 'vtcrt'); ?> </li>
                  <li><?php _e('  Variations', 'vtcrt'); ?> </li>
                  <li><?php _e('  Single Product', 'vtcrt'); ?> </li>  
                </ol>
                <?php        
           echo '<strong>'; _e("Product-level Deal Exclusion", 'vtcrt');  echo '</strong>';
           echo '<br><br>';
           echo '<strong>'; _e('Maximum Deal Limits, including "One Per Customer" limit', 'vtcrt');  echo '</strong>';
        break;                
      case 'onlyShowsIfJSerror':
           ?>  
              <h3 class="hide-by-jquery"><?php _e('JavaScript Error on Page!', 'vtcrt'); ?> </h3>
              <p class="hide-by-jquery"><strong><?php _e('The best way to debug the problem, is to:', 'vtcrt'); ?> </strong> 
                <ol>
                  <li><?php _e('Deactivate all plugins ', 'vtcrt'); echo '<strong>'; _e('except', 'vtcrt'); echo '</strong>'; _e(' Cart Deals and your E-Commerce plugin (WPEC, WOO or JIGOSHOP)', 'vtcrt'); ?> </li>
                  <li><?php _e('Set your theme to the 2012 theme.', 'vtcrt'); ?> </li>
                  <li><?php _e('Take a snapshot of this paragraph (using the snipping tool...).', 'vtcrt'); ?> </li>  
                  <li><?php _e('Retest this page.', 'vtcrt'); ?> </li>  
                  <li><?php _e('Once this plugin page shows successfully, add in your theme/plugins one at a time, retesting after each add.', 'vtcrt'); ?> </li>
                </ol>
                <?php _e('This will help you to isolate the issue which is causing the conflict.', 'vtcrt'); ?> </p>
              <p class="hide-by-jquery"><?php _e('The Cart Deals plugin uses WordPress best-practice for adding and using JS and JQuery resources.  Thanks for using the Cart Deals plugin.', 'vtcrt'); ?> </p> 
           <?php
        break;                                                                                
    }
  }  // End TOOLTIP AREA           
  
  
  
  //*************************************************
  //  Object Hover Help AREA
  //    Outputs both small help and big (wizard) help 
  //    qTip can access the next object by type - 
  //      <span> is the small help
  //      <div> is the big help
  //    choice is controlled by onscreen checkbox 'show wizard'
  //    ONE of the hover help always shows... => add screen is 
  //      automatically thrown into wizard mode...
  //*************************************************
   
  function vtcrt_show_object_hover_help ($context, $type, $asterisk=null) {
   
      if ($type == 'small') {

   ?>                           
         <div class="hoverHelp hideMe"> 
            <?php vtcrt_show_object_hover_small_text($context); ?> 
            <?php if ($context != 'hover-help') { //don't show buttons in this case ?>
                <div class="wizard-links clear-left">  
                  <a id="more-info1<?php echo '-' .$context; ?>"  target="_blank" class="wizard-more-info" href="<?php vtcrt_get_more_info_url($context); ?>">
                      <h4>More Info</h4>
                  </a>
                </div>  
            <?php } ?>                     
         </div>
                 
   <?php 
      } else { ?>       
         <div class="wizardHelp wizardToolTip hideMe"> 
         
           <?php vtcrt_show_object_hover_wizard_text($context); ?>
              
              <div class="wizard-links clear-left">  
                  <a id="more-info2<?php echo '-' .$context; ?>"  target="_blank" class="wizard-more-info" href="<?php vtcrt_get_more_info_url($context); ?>">
                      <h4>More Info</h4>
                  </a>
                   <!-- 
                  <span class="wizard-pipe">|</span> --> 
                  <a id="more-info<?php echo '-' .$context; ?>" class="wizard-turn-hover-help-off" href="javascript:void(0);">
                      <h4>Turn off Hover Help Wizard</h4>
                  </a>           
      
              </div>  
                 
         </div>                     
   <?php
    }  
  } 
  
     
  function vtcrt_get_more_info_url($context) {          
    switch($context) {                      
      case 'cart_or_catalog_select':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#blueprint.catalogorcart";              
        break;                
      case 'pricing_type_select':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#blueprint.dealtype"; 
        break;
      case 'minimum_purchase_select':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#blueprint.dealaction";              
        break;        
      case 'scheduling':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#blueprint.scheduling";              
        break;                 
      case 'buy_amt_type':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#buygroup.buyamount";              
        break;
      case 'buy_amt_applies_to':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#buygroup.buyamountapplies";              
        break;     
      case 'inPop':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#buygroup.buyfilter";              
        break;         
       case 'buy_amt_mod':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#buygroup.minmax";              
        break;        
      case 'buy_repeat_condition':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#buygroup.repeat";              
        break;        
      case 'action_amt_type':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#getgroup.getamount";              
        break;
      case 'action_amt_applies_to':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#getgroup.getamountapplies";              
        break;        
      case 'actionPop':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#getgroup.getfilter";              
        break;        
     case 'action_amt_mod':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#getgroup.minmax";             
        break;        
       case 'action_repeat_condition':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#getgroup.repeat";             
        break;        
      case 'discount_amt_type':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#discount.discountamount";              
        break;
      case 'discount_free':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#discount.discountfree";              
        break;                
      case 'discount_applies_to':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#discount.discountappliesto";             
        break;        
      case 'discount_product_short_msg':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#messages.checkout";              
        break;        
      case 'discount_product_full_msg':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#messages.marketing";              
        break;        
      case 'discount_lifetime_max_amt_type':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#limits.percustomer";              
        break;         
      case 'discount_rule_max_amt_type':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#limits.percart";              
        break;        
      case 'discount_rule_cum_max_amt_type':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#limits.perproduct";            
        break;                
      case 'cumulativeRulePricing':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#workingwith.otherrules";            
        break;        
      case 'cumulativeCouponPricing':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#workingwith.coupons";              
        break;        
      case 'cumulativeSalePricing':
          echo "http://www.varktech.com/documentation/cart-deals/introrule/#workingwith.saleprice";              
        break;        
      case '':
          echo "";             
        break;
     
    } //end switch                  
  } 
   
    
  function vtcrt_show_object_hover_small_text($context) {          
    switch($context) {           
           
      case 'cart_or_catalog_select':
          ?>  
                
          <!-- catalogorcart--> 
          <div class="section">
            <a name="blueprint.catalogorcart" data-type="group"></a><h2>Discount applied in Cart or Catalog</h2>
             <p class="larger-strong">
              <strong>When and where does the discount happen?</strong>
                <ul class="">
                  <li><strong>Cart Purchase Discount</strong>
                  <br> - &nbsp;&nbsp; Discount <em>first applied</em>&nbsp; when a product is <em>added to cart</em> <strong> (Most Deals!)</strong>
                  </li>
                  <li><strong>Catalog Price Reduction</strong>
                  <br> - &nbsp;&nbsp; Discount <em>first applied</em>&nbsp; when the product is <em>seen in the catalog</em>&nbsp; (just like a product sale price)
                  </li>
               </ul>
             </p>                
          </div> <!-- //catalogorcart--> 
           
          <?php             
        break;
                
      case 'pricing_type_select':
          ?>  
          
          <!-- dealtype-->         
          <div class="section">
            <p class="larger-strong">
                <strong>What kind of Pricing Deal do you want to offer?</strong>
               <ul class="">
                  <li><em>Discount by Category, Logged-in Role, Product ...</em>                
                      <br><strong> - "10% Off All Laptops"</strong>
                  </li>
                  <li><em>Whole Store / Catalog on Sale</em>                
                      <br><strong> - (Just what it says!)</strong>
                  </li>
              
               </ul>            
            </p>                            
                                               
          </div> 
  
          <?php             
        break;
         
       case 'minimum_purchase_select':
          ?>  
 
          <!-- dealaction-->
          <div class="section">
            <a name="blueprint.dealaction" data-type="group"></a><h2>Deal Action</h2>
            <p class="narrower-paragraph larger-strong">
                <strong>What are we discounting? </strong>
               <ul>
                  <li><strong>Do you have to</strong> 
                  </li>
                  <li><strong><em>purchase something first,</em></strong> 
                  </li> 
                   <li><strong>before you can purchase the discounted item?</strong> 
                  </li>                                     
                 <li>If <b>"Yes"</b>, Choose <em><b>"Discount *Next* item"</b></em>  
                 </li> 
                 <li>If <b>"No"</b>,&nbsp; Choose <em><b>"Discount the item"</b></em>  
                 </li>                                                                      
               </ul>

            </p>                                                    
          </div> 

          <?php             
        break;
        
      case 'scheduling':
          ?>       
          <!-- scheduling-->
          <div class="section">
            <a name="blueprint.scheduling" data-type="group"></a><h2>Deal Schedule</h2>
            <p class="narrower-paragraph larger-strong">
                <strong>When is the Deal active?</strong>

               <ul class="">
                  <li>Rule is ON + Begin / End Dates&nbsp;&nbsp;=</li>
                  <li>&nbsp;&nbsp; Rule is active with scheduling</li>
                  <li>Rule is ON Always &nbsp;&nbsp;=</li> 
                  <li>&nbsp;&nbsp; Rule is active with NO scheduling limits</li>
                  <li>Rule is OFF &nbsp;&nbsp;=</li> 
                  <li>&nbsp;&nbsp; Shut off the rule</li>                
               </ul>               
            </p>
          </div>  <!-- //scheduling--> 
 
          <?php             
        break;
        
      case 'wizard_on_off_sw_select':
          ?>  
          <div class="section">
            <a name="blueprint.showme" data-type="group"></a><h2>Hover Help Wizard</h2>
            <p class="narrower-paragraph larger-strong">
                <strong>Wizard is On = 
                <br>Show Hover in-Depth Info</strong>
            </p>                                                               
          </div>             

          <?php             
        break; 
         
      case 'hover-help':
          ?>       
            <p class="narrower-paragraph">
               <ul class="">
                  <li><em>- Turn on Hover Help Wizard</em></li> 
                  <li>&nbsp;</li> 
                  <li><b>Hover over the Label Names </li> 
                  <li>&nbsp;&nbsp;&nbsp; in the Left Column</b></li> 
                  <li>&nbsp;</li>
                  <li>&nbsp;&nbsp;&nbsp; to see Hover Wizard Help</li>            
               </ul> 
            </p> 
 
          <?php             
        break;
                           
      case 'rule-type-select':
          ?>  
          
          <!-- showme-->
          <div class="section">
            <a name="blueprint.showme" data-type="group"></a><h2>Show Me</h2>
            <p class="narrower-paragraph larger-strong">
                <strong>Basic Rule layout or Advanced?</strong>
                <ul class="">
                  <li>Basic rule &nbsp; =</li>
                  <li>&nbsp;&nbsp;&nbsp; <em>just the stuff you need to make a rule work</em> . &nbsp;(default)</li>  
                  <li>Advanced rule &nbsp; =</li> 
                  <li>&nbsp;&nbsp;&nbsp; <em>the whole shooting match,</em>&nbsp; with all of the bells and whistles.</li>                
               </ul>  
            </p>                                                            
          </div>  <!-- //showme-->             

          <?php             
        break; 
        
      case 'buy_amt_type':
          ?>  
                     
          <!-- buyamount-->
          <div class="section">
            <a name="buygroup.buyamount" data-type="group"></a><h2>Product Amount</h2>
            <p class="larger-strong">
               <strong>How Many do we have to Buy to carry on processing this Deal?</strong>  
                <ol class="">
                  <li><em>Buy</em>&nbsp; <strong>XX</strong> &nbsp;<em>get a discount</em></li>
                  <li><em>Buy</em>&nbsp; <strong>XX</strong> &nbsp;<em>Get yy a discount</em></li>                 
               </ol>                                             
            </p>                      
          </div>            
  <!-- //buyamount-->

          <?php             
        break;
      case 'buy_amt_applies_to':
          ?>  
          
          <div class="section subsection">
            <a name="buygroup.buyamountapplies" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Product Amount Applies To</a></h2>          
            <p>
                <strong>How is the count Applied?</strong>                                                 
                 <ul class="list-more-margin">
                    <li><em>All Products</em> 
                    <br> - <b>All Products of the group are tallied together</b>
                    </li>

                    <li><em>Each Product</em> 
                    <br> - <b>Each product is tallied as a separate product total</b>.
                    </li>
                 </ul>                                                                   
            </p>
            
          </div>
          <?php             
        break;
      
      case 'inPop':
          ?>  

          <!-- buyfilter-->           
          <div class="section">
            <a name="buygroup.buyfilter" data-type="group"></a><h2>Product Filter</h2>
            <p class="larger-strong">
                <strong> Does the Product apply to:</strong>                                                              
                 <ul class="list-more-margin">
                    <li>All the products from the catalog?  
                    </li>

                    <li>Or only some of the products from the catalog?  
                    </li>
                 </ul>  
            </p>
            <p class="">
              <span class="bold-black">BUY Filter &nbsp;=&nbsp;</span> <em>Specifying what products are candidates for the Deal.</em>
            </p> 
                              
          </div>  <!-- //buyfiltercat--> 
        
          <?php             
        break; 
        
       case 'buy_amt_mod':
          ?>  

          <!-- buyminmax--> 
          <div class="section subsection clickable-subsection">
            <a name="buygroup.minmax" data-type="group"></a><h2>Product Min / Max</h2>  
            <p class="larger-strong">
                <strong>Set a Minimum or Maximum $$ Value Condition </strong>

               <ol class="">
                  <li>Buy any 5 vegetables <b>for a minimum total of $5</b>, get 20% off </li>
                  <li>Buy any Laptop <b>for a maximum price of $2000</b>, get 10% off </li>          
               </ol>               
            </p>

          </div>  <!-- //buyminmax-->          
 
          <?php             
        break;
        
      case 'buy_repeat_condition':
          ?>  

          <!-- buyrepeat--> 
          <div class="section subsection clickable-subsection">
            <a name="buygroup.repeat" data-type="group"></a><h2>How Many Times do we Apply the Discount?</h2>  
            <p class="larger-strong">
               <ol class="">
                  <li>Apply Rule Once per Cart
                  </li>                  
                  <li>Unlimited Rule Usage Counts per Cart
                  </li> 
                  <li>Rule Usage Count Times, per Cart &nbsp;+&nbsp; a Count
                  </li> 
               </ol>                              
            </p>
            <p class="larger-strong">
                <strong>To Limit how many times a Customer can get a Discount,</strong>
                
                <em>Go to "Customer Rule Limit"<br> below (Advanced Rule)</em>              
            </p>                                                                                                     
          </div>  <!-- //buyrepeat-->          
 
          <?php             
        break;
        
      case 'action_amt_type':
          ?>  
                    
          <!-- getamount-->                         
          <div class="section">
            <a name="getgroup.getamount" data-type="group"></a><h2>Get Group Amount</h2>
            <p class="larger-strong">
               <strong>How Many do we have to Get to carry on processing this Deal?</strong>
                 <ol class="">
                  <li><em>Buy xx Get </em>&nbsp; <strong>YY</strong> &nbsp;<em>a discount</em></li>                 
               </ol>                                              
            </p>          
            <p>
                <strong>How is the Get (Discount) Group Counted?</strong>                                                 
            </p>              
           </div>


          <?php             
        break;
      case 'action_amt_applies_to':
          ?>  
          
          <div class="section subsection">
            <a name="getgroup.getamountapplies" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Get Group Amount Applies To</a></h2>          
            <p>
                <strong>How is the count Applied?</strong>                                                 

                 <ul class="list-more-margin">
                    <li><em>All Products</em> 
                    <br> - <b>All Products of the group are tallied together</b>
                    </li>

                    <li><em>Each Product</em> 
                    <br> - <b>Each product is tallied as a separate product total</b>
                    </li>
                 </ul>                                                                   
            </p>
                
          </div>  <!-- //getamount-->

          <?php             
        break;
        
      case 'actionPop':
          ?>  
 
          <!-- getfilter-->           
          <div class="section">
            <a name="getgroup.getfilter" data-type="group"></a><h2>Get Group Filter</h2>
            <p class="larger-strong">
                <strong> Does the Get Group apply to:</strong>                                                              
                 <ul class="list-more-margin">
                    <li>All the products from the catalog? 
                    </li>

                    <li>Or only some of the products from the catalog?  
                    </li>
                 </ul> 
            </p>
            <p class="">
              <span class="bold-black">Filter &nbsp;=&nbsp;</span> <em>Specifying what products are candidates for the Deal.</em>
            </p>
                         
          </div>  <!-- //getfilter-->  
 

          <?php             
        break;
        
     case 'action_amt_mod':
          ?>  

          <!-- getminmax--> 
          <div class="section subsection clickable-subsection">
            <a name="getgroup.minmax" data-type="group"></a><h2>Get Group Min / Max</h2>  
            <p class="larger-strong">
                <strong>Set a Minimum or Maximum $$ Value Condition </strong>

               <ul class="">
                  <li>None
                  </li>                  
                  <li>Minimum $$ Value  &nbsp;+&nbsp; Value
                  </li> 
                  <li>Maximum $$ Value  &nbsp;+&nbsp; Value
                  </li> 
               </ul>                              

               <ol class="">
                  <li>Buy any 5 vegetables, get the Next 5 Vegetables <em>which have a minimum total of $5</em>&nbsp;, for 20% off </li>
                  <li>Buy any 5 vegetables, get the Next 5 Vegetables <em>which have a maximimum total of $5</em>&nbsp;, for 20% off </li>          
               </ol>               
            </p>
                                                                               
          </div>  <!-- //getminmax-->          
       
          <?php             
        break; 
        
       case 'action_repeat_condition':
          ?>  
 
          <!-- getrepeat--> 
          <div class="section subsection clickable-subsection">
            <a name="getgroup.repeat" data-type="group"></a><h2>Get Group Repeat</h2>  
            <p class="larger-strong">
                <strong>How many times does the Get Group get counted, <em>once the Product count has been satisfied?</em></strong>

               <ol class="list-more-margin">
                  <li><b>None</b>
                  </li>                  
                  <li><b>Unlimited Discount Group Repeats</b>
                  </li> 
                  <li><b>Discount Group Repeat Count &nbsp;+&nbsp; a Count</b>
                  </li> 
               </ol>                              
            </p>           
                                                                                           
          </div>   <!-- //getrepeat-->          

          <?php             
        break;
        
      case 'discount_amt_type':
          ?>  

          <!-- discountamount-->                         
          <div class="section">
            <a name="discount.discountamount" data-type="group"></a><h2>Discount Amount</h2>
            <p class="larger-strong">
               <strong>What $ Value Discount are we Offering?  How is that $ Discount computed?</strong>                                             
            </p>
          </div>  
 
          <?php             
        break;
        
      case 'discount_free':
          ?>  
                                         
          <!-- discountfree-->        
          <div class="section subsection clickable-subsection">
            <a  name="discount.discountfree" data-type="group"></a><h2>Free, with Auto Add</h2>
             <p class="larger-strong">
                <strong>Discount Amount Type - &nbsp;Free&nbsp; -</strong>  a Free Product can be Added Automatically to Cart                                                
            </p>
            <p>
              You can instruct the rule to Add a Free product to the cart automatically, when Discount Type = "Free". 
            </p>             

           <p>
                <b>Note:</b>&nbsp; <b>Auto Add</b> of free products is <em>only</em>&nbsp; <b>available when the Discount Group is a single, unique product</b>
                <br> - (otherwise auto add would not know what to add!)
            </p>
          </div>  <!-- //discountfree--> 


          <?php             
        break;
                
      case 'discount_applies_to':
          ?>  
          <!-- discountappliesto-->                         
          <div class="section">
            <a name="discount.discountappliesto" data-type="group"></a><h2>Discount Applies To</h2>       
            <p>
                <strong>How is the count Applied?</strong>                                                 
            </p>
            <p>
                 <ul class="list-more-margin">
                    <li><em>All Products</em> 
                    <br> - <b>All Products are tallied as a unified group</b>
                    </li>

                    <li><em>Each Product</em> 
                    <br> - <b>Each product is tallied as a separate product total</b>
                    </li>
                 </ul>                                                                   
            </p>
           
          </div>
          <?php             
        break;
        
      case 'discount_product_short_msg':
          ?>  
        
          <div class="section">
            <a name="messages.checkout" data-type="group"></a><h2>Checkout Message</h2>
            <p>
                 The short <strong>checkout message</strong> <em>summarizes your deal,</em>&nbsp; and is used both in the mini-cart and at checkout 
                 <br>for cart purchases <em>only.</em>                                              
            </p>
            <p>
                 <strong>The short checkout message is Never used for a Catalog Discount.</strong>                                               
            </p>       
          </div> 
     
          <?php             
        break;
        
      case 'discount_product_full_msg':
          ?>  
      
          <div class="section">
            <a name="messages.marketing" data-type="group"></a><h2> Advertising Message</h2>
            <p>
                 The  <strong>Advertising Message</strong> is the place for you to put in your full <b>Deal marketing message</b>.                                              
            </p>
           <p>
                 The <b> Advertising Messages</b> can be shown in your Website using <a class="commentURL" target="_blank" href="http://www.varktech.com/documentation/cart-deals/shortcodes"><?php _e('Shortcodes', 'vtcrt');?></a> .                         
            </p>           
                                                               
          </div>                 
          
          <?php             
        break;
        
      case 'discount_lifetime_max_amt_type':
          ?>  
       
          <div class="section">
            <a name="limits.percustomer" data-type="group"></a><h2>Customer Rule Limit</h2>
            <p class="larger-strong">
                 <strong>Controls the Number of times a customer can use a Discount. &nbsp;&nbsp;Ever.</strong>                                              

                 <ol class="">
                    <li><em>The Number of times a customer can use a Discount.</em> &nbsp;&nbsp;<strong>Ever.</strong></li>

                    <li><em>The $$ value total a customer can receive from a Discount.</em> &nbsp;&nbsp;<strong>Ever.</strong></li>
                 </ol>                                            
            </p>

          </div>
                   
          <?php             
        break; 
        
      case 'discount_rule_max_amt_type':
          ?>  
        
          <div class="section">
            <a name="limits.percart" data-type="group"></a><h2>Cart Limit</h2>
            <p class="larger-strong">
                 <strong>Controls the Number of times a Cart can use a Discount..</strong>                                              

                 <ol class="">
                    <li><em>The percentage value</em>&nbsp; a Cart can use a Discount. </li>
                    <li><em>The Number of times</em>&nbsp; a Cart can use a Discount.</li>
                    <li><em>The $$ value total</em>&nbsp; a Cart can receive from a Discount.</li>
                 </ol>                                            
            </p>

          </div>                    

          <?php             
        break;
        
        
      case 'discount_rule_cum_max_amt_type':
          ?>  
      
          <div class="section">
            <a name="limits.perproduct" data-type="group"></a><h2>Product Limit</h2>
            <p class="larger-strong">
                 <strong>Controls the Number of times a Product can use a Discount.</strong>                                              

                 <ol class="">
                    <li><em>The percentage value</em>&nbsp; a customer can use a Discount in the product. </li>
                    <li><em>The Number of times</em>&nbsp; a customer can use a Discount in the product.</li>
                    <li><em>The $$ value total</em>&nbsp; a customer can receive from a Discount in the product.</li>
                 </ol>                                            
            </p>
 
          </div>
          <?php             
        break;
        
        
      case 'cumulativeRulePricing':
          ?>  
          
          <div class="section">
            <a name="workingwith.otherrules" data-type="group"></a><h2>Work with Other Rule Discounts</h2>
            <p>
                <strong>Does this rule work with other Rule Discounts?</strong>                                              

                 <ul class="list-more-margin">
                    <li><b>Yes</b> 
                        <br> - This discount will apply <em>in addition to</em>&nbsp; any other Rule Discounts. 
                    </li>
                    <li><b>No</b> 
                        <br> - If nother Rule Discount is present, <em>this discount will not be applied.</em> 
                    </li>
                   
                 </ul>                                            
            </p>           
     
          </div>  
    
          <?php             
        break;
        
      case 'cumulativeCouponPricing':
          ?>  

          <div class="section">
            <a name="workingwith.coupons" data-type="group"></a><h2>Working with Coupons</h2>
            <p>
                <strong>Does this rule work with other Coupons?</strong>                                             

                 <ul class="list-more-margin">
                    <li><b>Yes</b> 
                        <br> - This discount will apply <em>in addition to</em>&nbsp; any Coupon Discount. 
                    </li>
                    <li><b>No</b> 
                        <br> - If a Coupon is presented, <em>this discount will not be applied.</em> 
                    </li>
                   
                 </ul>                                            
            </p>                                          
          </div>  
         
          <?php             
        break;
        
      case 'cumulativeSalePricing':
          ?>  
        
          <div class="section">
            <a name="workingwith.saleprice" data-type="group"></a><h2>Working with Product Sale Pricing</h2>
            <p>
                <strong>Is the Product already on Sale?</strong>                                              

                 <ol class="list-more-margin">
                    <li><b> No</b> - if product already on Sale, no further discount  
                    </li>
                    <li><b>Apply Deal Discount to Product Sale Price</b>  
                    </li>
                    <li><b>Apply Discount to Regular Price, if Less than Sale Price</b>  </li>                
                 </ol>                                            
            </p>
                     
          </div>  
          <?php             
        break;
 
        
      case '':
          ?>  

          <?php             
        break;
     
    } //end switch                  
  } 
  
    
  function vtcrt_show_object_hover_wizard_text($context) {          
    switch($context) {           
      
      case 'cart_or_catalog_select':
          ?>  
                
          <!-- catalogorcart--> 
          <div class="section">
            <a name="blueprint.catalogorcart" data-type="group"></a><h2>Discount applied in Cart or Catalog</h2>
            <p class="larger-strong">
              <strong>When and where does the discount happen?</strong>
                <ul class="">
                  <li><strong>Cart Purchase Discount</strong>
                  <br> - &nbsp;&nbsp; Discount <em>first applied</em>&nbsp; when a product is <em>added to cart</em> <strong> (Most Deals!)</strong>
                  </li>
                  <li><strong>Catalog Price Reduction</strong>
                  <br> - &nbsp;&nbsp; Discount <em>first applied</em>&nbsp; when the product is <em>seen in the catalog</em>&nbsp; (just like a product sale price)
                  </li>
               </ul>
             </p>

             <p class="larger-strong">
               <em>Examples of Catalog Price Reduction</em>
               <ol class="">
                  <li>For Membership or Wholesaler (by logged-in Role) Catalog Discount</li>
                  <li>Any Direct Catalog Discount Sale</li>
               </ol> 
             </p>
              <p class="larger-strong">
                  <b>Note:</b>&nbsp; <b>Catalog Rules always apply to the entire Filter Group!</b>
              </p>                   
          </div> <!-- //catalogorcart--> 
          
          <?php             
        break;
                
      case 'pricing_type_select':
          ?>  
          
          <!-- dealtype-->         
          <div class="section">

            <p class="larger-strong">
                <strong>What kind of Pricing Deal do you want to offer?</strong>
               <ul class="">
                  <li><em>  Discount by Category, Logged-in Role, Product ...   </em>                
                      <br><strong> - "10% Off All Laptops"</strong>
                  </li>
                  <li><em>Whole Store / Catalog on Sale</em>                
                      <br><strong> - (Just what it says!)</strong>
                  </li>
              
               </ul>            
            </p>                             
                                                     
          </div>  <!-- //bogo, baby--> 
          
          <?php             
        break;
         
       case 'minimum_purchase_select':
          ?>  
 
          <!-- dealaction-->
          <div class="section">
            <a name="blueprint.dealaction" data-type="group"></a><h2>Deal Action</h2>
            <p class="narrower-paragraph larger-strong">
                <strong>What are we discounting?</strong>
            </p> 
            
            <p class="">
               <h3 class="subtitle-h3 ">Does the Deal need a Gateway Value? That is,</h3>
               <ul class="list-more-margin larger-strong">
                  <li><strong>Do you have to <em>purchase something first,</em> 
                     <br>before you can purchase the discounted item?</strong>. 
                  </li> 
                 <li>If <b>"Yes"</b>, Choose <em><b>"Buy Something, Discount the *Next* item"</b></em>  
                 </li> 
                 <li>If <b>"No"</b>,&nbsp; Choose <em><b>"Buy Something, Discount the item"</b></em>  
                 </li>                                                                      
               </ul>

                Once we satisfy the Product requirements, 
                <br>- do we Discount something we've already counted, 
                <br>- or Discount something not yet counted ?
            </p>                                                    
          </div> 
                  
          <div class="section subsection">
            <a name="blueprint.dealaction1" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Buy Something, Discount the *Next* Item</a></h2>
             <p>
              This Deal <strong>requires that a Product <em>Gateway Value</em>&nbsp; be reached</strong>, <br>before the discount is applied to the <strong><em>Next</em></strong> &nbsp;item.

               <ul class="list-more-margin">
                  <li>Buy a Laptop, Get <em>a mouse</em> &nbsp;free</li>                  
                  <li>Buy a Laptop, Get a <em>2nd Laptop</em> &nbsp;at 20% off</li>                  
               </ul>                              
            </p>
          </div> 
                  
          <div class="section subsection">
            <a name="blueprint.dealaction2" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Buy Something, Discount the Item</a></h2>
             <p>
              This Deal <strong>applies the discount directly to the Product &nbsp;(<em>This</em>&nbsp; Group )</strong>

               <ul class="">
                  <li>" Buy a Laptop, Get 10% off "</li>
                  <li>" Buy a 2 Laptops, Get $200 off "</li>                  
               </ul>               
            </p>
          </div>  <!-- //dealaction-->   
       
          <?php             
        break;
        
      case 'scheduling':
          ?>       
          <!-- scheduling-->
          <div class="section">
            <a name="blueprint.scheduling" data-type="group"></a><h2>Deal Schedule</h2>
            <p class="narrower-paragraph larger-strong">
                <strong>When is the Deal active?</strong>
            </p> 
            <p>
               <h3 class="subtitle-h3">Deals Can be Scheduled in a few ways:</h3>
               <ul class="">
                  <li>" Rule is ON " + Begin / End Dates  &nbsp;&nbsp;=&nbsp;&nbsp; Rule is active between the dates &nbsp;&nbsp;(including begin day / end day)                  
                      <br>&nbsp;&nbsp; - A deal can be scheduled to begin now or in the future.
                  </li>
                  <li>" Rule is ON Always " &nbsp;&nbsp;=&nbsp;&nbsp; Rule is active with NO scheduling limits</li> 
                  <li>" Rule is OFF " &nbsp;&nbsp;=&nbsp;&nbsp; Shut off the rule</li>                 
               </ul>               
            </p>
            <br>
            <p class="larger-strong">
                <b>Note:</b>&nbsp; Default = <b>"Rule is ON" ,&nbsp; Begin Date: <em>today</em> ,&nbsp;  End Date: <em>in 1 year</em>.</b>
            </p>
          </div>  <!-- //scheduling--> 
 
          <?php             
        break;
    
      case 'rule-type-select':
          ?>  
          
          <!-- showme-->
          <div class="section">
            <a name="blueprint.showme" data-type="group"></a><h2>Show Me</h2>
            <p class="narrower-paragraph larger-strong">
                <strong>Basic Rule layout or Advanced?</strong>
            </p> 
            <p>
               Basic rule &nbsp; = &nbsp; <em>just the stuff you need to make a rule work</em> . &nbsp;(default)
            </p> 
            <p>
               Advanced rule &nbsp; = &nbsp; <em>the whole shooting match,</em>&nbsp; with all of the bells and whistles.
            </p>                                                              
          </div>  <!-- //showme-->             

          <?php             
        break; 
        
      case 'buy_amt_type':
          ?>  
                     
          <!-- buyamount-->
          <div class="section">
            <a name="buygroup.buyamount" data-type="group"></a><h2>Product Amount</h2>
            <p class="larger-strong">
               <strong>How Many do we have to Buy to carry on processing this Deal?</strong>
                <ol class="">
                  <li><em>Buy</em>&nbsp; <strong>XX</strong> &nbsp;<em>get a discount</em></li>
                  <li><em>Buy</em>&nbsp; <strong>XX</strong> &nbsp;<em>Get yy a discount</em></li>                 
               </ol>                                                
            </p>
          </div>           
          
          <div class="section subsection">
            <a name="buygroup.buyamounttype" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Product Amount Type</a></h2>          
            <p>
                <strong>How is the Product Counted?</strong>                                                 
            </p>            
            <p>
                 <ul class="list-more-margin">
                    <li><em>Buy Each Unit</em> 
                    <br> - by single product units
                    </li> 

                    <li><em>Buy Unit Quntity</em> 
                    <br> - by a quantity of product units
                    </li>

                    <li><em>Buy $$ Value</em> 
                    <br> - by a $$ Value of product units
                    </li>  

                 </ul>                                                                                                  
            </p>

            <p>
                Product Amount Type &nbsp; is a <em>required field.</em>                                                
            </p>
          </div>        
          
          <div class="section subsection">
            <a name="buygroup.buyamountcount" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Product Amount Count</a></h2>          
            <p>
                <strong>The Count box contains the actual number Quantity or $$ Value</strong> we have to purchase to gain access to this Deal                                                 
            </p>

            <p>
                Product Amount Count &nbsp; is a <em>required field, if</em>&nbsp;  the &nbsp; Product Amount Type &nbsp; needs it.                                               
            </p>             
          </div> 
  <!-- //buyamount-->

          <?php             
        break;
      case 'buy_amt_applies_to':
          ?>  
          
          <div class="section subsection">
            <a name="buygroup.buyamountapplies" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Product Amount Applies To</a></h2>          
            <p>
                <strong>How is the count Applied?</strong>                                                 
            </p>
            <p>
                 <ul class="list-more-margin">
                    <li><em>All Products</em> 
                    <br> - <b>All Products of the group are tallied together</b>
                    <br>&nbsp;&nbsp;For example: 2 Oranges and 3 Apples in the Product &nbsp;=&nbsp; <b>a single total of 5 units.</b>
                    </li>

                    <li><em>Each Product</em> 
                    <br> - <b>Each product is tallied as a separate product total</b>
                    <br>&nbsp;&nbsp;For example: 2 Oranges and 3 Apples in the Product &nbsp;=&nbsp; <b>separate totals of 2 and 3 units respectively</b>.
                    </li>
                 </ul>                                                                   
            </p>

            <p>
                Product Amount Applies To &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>  &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" Each Product "</b>                                               
            </p>            
          </div>
          <?php             
        break;
      
      case 'inPop':
          ?>  

          <!-- buyfilter-->           
          <div class="section">
            <a name="buygroup.buyfilter" data-type="group"></a><h2>Product Filter</h2>
            <p class="larger-strong">
                <strong> Does the Product apply to:</strong>                                                              
                 <ul class="list-more-margin">
                    <li>All the products from the catalog?  
                    </li>

                    <li>Or only some of the products from the catalog?  
                    </li>
                 </ul>  
            </p>
            <p class="">
              <span class="bold-black">Filter &nbsp;=&nbsp;</span> <em>Specifying what products are candidates for the Deal.</em>
            </p> 

            <p>
                Product Filter &nbsp; is a <em>required field.</em>                                               
            </p>            
          </div>  <!-- //buyfilter-->  


          <!-- buyfilterany--> 
          <div class="section subsection">
            <a name="buygroup.buyfilterany" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Filter by Any Product</a></h2>           
             <p>
              <strong>Any Product</strong> &nbsp;=&nbsp Product is Any Product in the  <strong>Whole Store / Whole Cart</strong>.
            </p>          
          </div>  <!-- //buyfilterany--> 
          
               
          <!-- buyfiltersinglevar-->
          <div class="section subsection">
            <a name="buygroup.buyfiltersinglevar" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Filter by Single Product Variations</a></h2>          
             <p class="">
              <strong>Product is Any Variations from a Single Product</strong>.

               <ul class="">
                  <li>" <b>XL or XXL</b> Men's Empire Crew-Neck Shirts, 10% off" </li>
                  <li>" Galaxy S IV <b>in Green, Blue or Purple</b> 10% off "</li>
               </ul>               
            </p>                      
          </div>  <!-- //buyfiltersinglevar-->

          
          <!-- buyfiltersingle-->
          <div class="section subsection">
            <a name="buygroup.buyfiltersingle" data-type="group"></a><h2> 
              <a class="subsection-title-smaller" href="javascript:void(0);">Filter by Single Product</a></h2>         
             <p class="">
              <strong>Product is Any Single Product</strong>.

               <ul class="">
                  <li>" Ipad Mini, 10% off" </li>
                  <li>" Galaxy Tablet Model 10.1, 10% off "</li>          
               </ul>               
            </p>                      
          </div>  <!-- //buyfiltersingle-->                             
                             
          
          <!-- buyfiltercat-->  
          <div class="section subsection">
            <a name="buygroup.buyfiltersingle" data-type="group"></a><h2> 
              <a class="subsection-title-smaller" href="javascript:void(0);">Product Filter by Category / Role</a></h2>  
             <p class="larger-strong">
              Specify which products are Product candidates <strong>by Category &nbsp;and / or&nbsp; Logged-in Role</strong>.
                 <ul class="">
                    <li>Product Categories and Pricing Deal Categories <em>are presented as checkable lists</em></li>
                    <li>to be in the Product, <em>a Product must be a member of one of the Checked Categories</em></li>
                 </ul>

                 <h3>And / Or</h3>
                 <ul class="">
                    <li><b>And</b> 
                        <br> - Product must be in one of the checked Categories 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;<strong><em>and</em></strong> 
                        <br> - the Customer's Role is checked in the Logged-in Role List (longer explanation below).
                    </li>
                    <li><b>Or</b> 
                        <br> - Product must be in one of the checked categories 
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;<strong><em>or</em></strong> 
                        <br> - the Customer's Role is checked in the Logged-in Role List (longer explanation below).
                    </li>                    
                 </ul>                                                                  

                <h3>By Logged-in Role</h3>
            </p> 
            

            <p>
                <em>Role Pricing is used primarily to give different pricing levels for Members or Wholesalers,
                <br> and/or to differentiate generally between logged-in pricing and Not logged-in pricing</em>                                                                 
            </p>            
            <p>
                 <h3>The Basics:</h3>
                 <ul class="">
                    <li>to be in the Product:
                    <br> - The Customer is logged in, and <b>his role is checked</b> 
                    <br> - <strong>OR</strong> the Customer is NOT logged in, and <b>the 'not logged in / just visiting' Role is checked</b> 
                    </li>
                 </ul>                                                                  
            </p>
            <p>
                 <h3>The Whole Nine Yards:</h3>
                 <ul class="list-more-margin">
                    <li>Customer is assigned to a Role at Signup time (defaults to "Subscriber")</li>
                    <li>At time of purchase, Customer <em>may or may not</em>&nbsp; be logged in, or <em>may not have signed up</em></li>
                    <li>to be in the Rule's Product:
                        <br> - The Customer is logged in, and <b>his role is checked</b> 
                        <br> - <strong>OR</strong> the Customer is NOT logged in, and <b>the 'not logged in / just visiting' Role is checked</b> 
                    </li>
                    <li>Use Role Management software (see below) <em>To Create different roles</strong></em>
                    <li>Use these roles to <b>create different pricing levels</b> in <b>separate pricing deal rules</b>
                    </li>
                 </ul>                                                                  
            </p>                        
                                           
          </div>  <!-- //buyfiltercat--> 
        
          <?php             
        break; 
        
       case 'buy_amt_mod':
          ?>  

          <!-- buyminmax--> 
          <div class="section subsection clickable-subsection">
            <a name="buygroup.minmax" data-type="group"></a><h2>Product Min / Max</h2>  
            <p class="larger-strong">
                <strong>Set a Minimum or Maximum $$ Value Condition </strong>
            </p>
           
            <p>
                You can set a Minimum or Maximum $$ Value for the entire Product, as an additional gateway value test for the Pricing Deal.                                                 
            </p>        
            <p>
               <h3 class="subtitle-h3">Options are:</h3>
               <ul class="">
                  <li>" None "
                  </li>                  
                  <li>" Minimum $$ Value "  &nbsp;+&nbsp; Value
                  </li> 
                  <li>" Maximum $$ Value "  &nbsp;+&nbsp; Value
                  </li> 
               </ul>                              

               <ol class="">
                  <li>" Buy any 5 vegetables <b>for a minimum total of $5</b>, get 20% off " </li>
                  <li>" Buy any Laptop <b>for a maximum price of $2000</b>, get 10% off " </li>          
               </ol>               
            </p>

            <p>
                Product Min / Max &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>  &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" None "</b>                                               
            </p>
          </div>  <!-- //buyminmax-->          
 
          <?php             
        break;
        
      case 'buy_repeat_condition':
          ?>  

          <!-- buyrepeat--> 
          <div class="section subsection clickable-subsection">
            <a name="buygroup.repeat" data-type="group"></a><h2>How Many Times do we Apply the Discount?</h2>  
            <p>
               <h3 class="subtitle-h3">Options are:</h3>
               <ul class="">
                  <li>" Apply Rule Once per Cart "
                  </li>                  
                  <li>" Unlimited Rule Usage Counts per Cart "
                  </li> 
                  <li>" Rule Usage Count Times, per Cart " &nbsp;+&nbsp; a Count
                  </li> 
               </ul>                              
            </p>           

            <p class="larger-strong">
                <strong>To Limit how many times a Customer can get a Discount,</strong>
                <br>
                <em>Go to "Customer Rule Limit" below (Advanced Rule)</em>              
            </p>                                                                             
          </div>  <!-- //buyrepeat-->          
 
          <?php             
        break;
        
      case 'action_amt_type':
          ?>  
                    
          <!-- getamount-->                         
          <div class="section">
            <a name="getgroup.getamount" data-type="group"></a><h2>Get Group Amount</h2>
            <p class="larger-strong">
               <strong>How Many do we have to Get to carry on processing this Deal?</strong> 
               <ol class="">
                  <li><em>Buy xx Get </em>&nbsp; <strong>YY</strong> &nbsp;<em>a discount</em></li>                 
               </ol>                                             
            </p>
          </div>  
          
          <div class="section subsection">
            <a name="getgroup.getamounttype" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Get Group Amount Type</a></h2>          
            <p>
                <strong>How is the Get (Discount) Group Counted?</strong>                                                 
            </p>            
            <p>
                 <ul class="list-more-margin">
                    <li><em>Discount Each Unit</em> 
                    <br> - Apply the Discount to <em>Each Unit</em> in the Get Group
                    </li> 

                    <li><em>Discount Next One (Single Unit)</em> 
                    <br> - Allows you to Discount the next unit
                    </li>

                    <li><em>Discount Unit Quantity</em> 
                    <br> - Discount a quantity of product units 
                    </li>  

                    <li><em>Discount $$ Value</em> 
                    <br> - Discount a $$ Value of product units
                    </li>   
                    <li><em>Discount Nth Unit</em> 
                    <br> - Discount by a repeating pattern of items, based on a count
                    </li>  
                 </ul>                                                                                                  
            </p>
            
            
            <p>
                Get Group Amount Type &nbsp; is a <em>required field.</em>                                             
            </p>            
          </div>        
          
          <div class="section subsection">
            <a name="getgroup.getamountcount" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Get Group Amount Count</a></h2>          
            <p>
                <strong>The Count box contains the actual number Quantity or $$ Value</strong> we have to purchase to gain access to this Deal                                                 
            </p>
            
            
            <p>
                Get Group Amount Count &nbsp; is a <em>required field, if</em>&nbsp;  the  &nbsp; Get Group Amount Type &nbsp; needs it.                                               
            </p>             
          </div> 
          <!-- //getamount-->


          <?php             
        break;
      case 'action_amt_applies_to':
          ?>  
          
          <div class="section subsection">
            <a name="getgroup.getamountapplies" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Get Group Amount Applies To</a></h2>          
            <p>
                <strong>How is the count Applied?</strong>                                                 
            </p>
            <p>
                 <ul class="list-more-margin">
                    <li><em>All Products</em> 
                    <br> - <b>All Products of the group are tallied together</b>
                    <br>&nbsp;&nbsp;For example: 2 Oranges and 3 Apples in the Get Group &nbsp;=&nbsp; <b>a single total of 5 units.</b>
                    </li>

                    <li><em>Each Product</em> 
                    <br> - <b>Each product is tallied as a separate product total</b>
                    <br>&nbsp;&nbsp;For example: 2 Oranges and 3 Apples in the Get Group &nbsp;=&nbsp; <b>separate totals of 2 and 3 units respectively</b>.
                    </li>
                 </ul>                                                                   
            </p>
 
            <p>
                Get Group Amount Applies To &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" All Products "</b>                         
            </p>                
          </div>  <!-- //getamount-->

          <?php             
        break;
        
      case 'actionPop':
          ?>  
 
          <!-- getfilter-->           
          <div class="section">
            <a name="getgroup.getfilter" data-type="group"></a><h2>Get Group Filter</h2>
            <p class="larger-strong">
                <strong> Does the Get Group apply to:</strong>                                                              
                 <ul class="list-more-margin">
                    <li>All the products from the catalog? 
                    </li>

                    <li>Or only some of the products from the catalog?  
                    </li>
                 </ul> 
            </p>
            <p class="">
              <span class="bold-black">Filter &nbsp;=&nbsp;</span> <em>Specifying what products are candidates for the Deal.</em>
            </p>
                         
          </div>  <!-- //getfilter-->  
 

          <!-- getfiltersame--> 
          <div class="section subsection">
            <a name="getgroup.getfiltersame" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Discount Group Same as Product</a></h2>           
             <p>
              <strong>Get (Discount) Group is exactly the same as the Product</strong>.
            </p>
             <p>
              This filter option allows you to declare the same products for the Get Group as the Product.
              The group can be counted or viewed differently, to create the Deal Discount.
            </p>
             <p>
              For Example: " Buy any 2 Laptops, get the 3rd Laptop 30% off "
            </p>                                   
          </div>  <!-- //getfiltersame--> 



          <!-- getfilterany--> 
          <div class="section subsection">
            <a name="getgroup.getfilterany" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Filter by Any Product</a></h2>           
             <p>
              <strong>Any Product</strong> &nbsp;=&nbsp Get Group is Any Product in the  <strong>Whole Store / Whole Cart</strong>.
            </p>          
          </div>  <!-- //getfilterany--> 


          
          <!-- getfiltercat-->  
          <div class="section subsection">
            <a name="getgroup.getfiltercat" data-type="group"></a><h2>          
             <a class="subsection-title-smaller" href="javascript:void(0);">Get Group Filter by Category</a></h2>
             <p class="">
              Specify which products are Get Group candidates 
              <br> - <strong>by &nbsp;Product Category &nbsp;or&nbsp; Pricing Deal Category</strong>.

                 <ul class="">
                    <li>Product Categories and Pricing Deal Categories <em>are presented as checkable lists</em></li>
                    <li>to be in the Get Group, <em>a Product must be a member of one of the Checked Categories</em></li>
                 </ul>
                                                                 
            </p>
                                         
          </div> <!-- //getfiltercat--> 
 
                  
               
          <!-- getfiltersinglevar-->
          <div class="section subsection">
            <a name="getgroup.getfiltersinglevar" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Filter by Single Product Variations</a></h2>          
             <p class="">
              <strong>Get Group is Any Variations from a Single Product</strong>.

               <ul class="">
                  <li>" <b>XL or XXL</b> Men's Empire Crew-Neck Shirts, 10% off" </li>
                  <li>" Galaxy S IV <b>in Green, Blue or Purple</b> 10% off "</li>
               </ul>               
            </p>                      
          </div>  <!-- //getfiltersinglevar-->

          
          <!-- getfiltersingle-->
          <div class="section subsection">
            <a name="getgroup.getfiltersingle" data-type="group"></a><h2> 
              <a class="subsection-title-smaller" href="javascript:void(0);">Filter by Single Product</a></h2>         
             <p class="">
              <strong>Get Group is Any Single Product</strong>.

               <ul class="">
                  <li>" Ipad Mini, 10% off" </li>
                  <li>" Galaxy Tablet Model 10.1, 10% off "</li>          
               </ul>               
            </p>                      
          </div>  <!-- //getfiltersingle-->                             

          <?php             
        break;
        
     case 'action_amt_mod':
          ?>  

          <!-- getminmax--> 
          <div class="section subsection clickable-subsection">
            <a name="getgroup.minmax" data-type="group"></a><h2>Get Group Min / Max</h2>  
            <p class="larger-strong">
                <strong>Set a Minimum or Maximum $$ Value Condition </strong>
            </p>
           
            <p>
                You can set a Minimum or Maximum $$ Value for the entire Get Group, as an additional gateway value test for the Pricing Deal.                                                 
            </p>        
            <p>
               <h3 class="subtitle-h3">Options are:</h3>
               <ul class="">
                  <li>" None "
                  </li>                  
                  <li>" Minimum $$ Value "  &nbsp;+&nbsp; Value
                  </li> 
                  <li>" Maximum $$ Value "  &nbsp;+&nbsp; Value
                  </li> 
               </ul>                              

               <ol class="">
                  <li>" Buy any 5 vegetables, get the Next 5 Vegetables <em>which have a minimum total of $5</em>&nbsp;, for 20% off " </li>
                  <li>" Buy any 5 vegetables, get the Next 5 Vegetables <em>which have a maximimum total of $5</em>&nbsp;, for 20% off " </li>          
               </ol>               
            </p>
 
            <p>
                Get Group Min / Max &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" None "</b>                        
            </p>                                                                                
          </div>  <!-- //getminmax-->          
       
          <?php             
        break; 
        
       case 'action_repeat_condition':
          ?>  
 
          <!-- getrepeat--> 
          <div class="section subsection clickable-subsection">
            <a name="getgroup.repeat" data-type="group"></a><h2>Get Group Repeat</h2>  
            <p class="larger-strong">
                <strong>How many times does the Get Group get counted, <em>once the Product count has been satisfied?</em></strong>
            </p> 
            <p>
               <h3 class="subtitle-h3">Options are:</h3>
               <ul class="list-more-margin">
                  <li><b>" None "</b>
                      <br> - So no repeats, the Discount Group is counted only <b>once</b>.  Default value.
                  </li>                  
                  <li><b>" Unlimited Discount Group Repeats"</b>
                      <br> - Example: " Buy a Laptop, <em>get any other purchases 10% off</em> &nbsp;"
                  </li> 
                  <li><b>" Discount Group Repeat Count " &nbsp;+&nbsp; a Count</b>
                      <br> - Example: " Buy a Laptop, <em>get the next 3 purchases 10% off</em> &nbsp;"
                  </li> 
               </ul>                              
            </p>           
 
            <p>
                Get Group Repeat &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em> &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" None "</b> 
                <br>&nbsp;&nbsp;&nbsp;(no Repeats, Discount Group counted once)                       
            </p>                                                                                           
          </div>   <!-- //getrepeat-->          

          <?php             
        break;
        
      case 'discount_amt_type':
          ?>  

          <!-- discountamount-->                         
          <div class="section">
            <a name="discount.discountamount" data-type="group"></a><h2>Discount Amount</h2>
            <p class="larger-strong">
               <strong>What $ Value Discount are we Offering?</strong>                                             
            </p>
          </div>  
          
          <div class="section subsection">
            <a name="discount.discountamounttype" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Discount Amount Type</a></h2>          
            <p>
                <strong>How is the Discount Counted?</strong>                                                 
            </p>            
            <p>
                 <ul class="list-more-margin">
                    <li><b>% Off</b> 
                    <br> - Apply a percentage off of each product unit or group, to obtain the Discount
                    </li> 

                    <li><b>$ Off</b> 
                    <br> - Subtract a Currency amount from the cost of each product unit or group, to obtain the Discount 
                    </li>

                    <li><b>Fixed Unit Price</b> 
                    <br> - Offer a product unit or group at a fixed $ cost.
                    <br> - The Discount is the difference between the original price and the new price.  
                    </li>  

                    <li><b>Free</b> 
                    <br> - Discount is the entire product unit or group price.
                    <br> - (see below for free auto-add) 
                    </li> 
                     
                    <li><b>Package Price</b> 
                    <br> - Offer a Product Package for a fixed price, <em>"X Units for the Price of $$"</em>
                    <br> - The Discount is the difference between the original price and the new price.                    
                    <br> - (see below for details) 
                    </li>
                     
                    <li><b>Package Price by Unit Count Pricing</b> 
                    <br> - Offer a Product Package for a computed price, <em>"X Units for the Price of Y Units"</em>
                    <br> - The Discount is the difference between the original price and the new price.
                    <br> - (see below for details)
                    </li>
                 
                 </ul>                                                                                                  
            </p>
            
        
            <p>
                Discount Amount Type &nbsp; is a <em>required field.</em>                             
            </p>
            
          </div>        
          
          <div class="section subsection">
            <a name="discount.discountamountcount" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Discount Amount Count</a></h2>          
            <p>
                <strong>The Count box contains the actual number Quantity or $$ Value</strong> we have to purchase to gain access to this Deal                                                                 
            </p>
            
        
            <p>
                Discount Amount Count &nbsp; is a <em>required field, if</em>&nbsp; the  &nbsp; Discount Amount Type &nbsp; needs it.                                               
            </p>
             
          </div> 

          <!-- //discountamount-->    
       
       
          <!-- //discount--> 
 
          <?php             
        break;
        
      case 'discount_free':
          ?>  
                                         
          <!-- discountfree-->        
          <div class="section subsection clickable-subsection">
            <a  name="discount.discountfree" data-type="group"></a><h2>Free, with Auto Add</h2>
             <p class="larger-strong">
                <strong>Discount Amount Type - &nbsp;Free&nbsp; -</strong>  a Free Product can be Added Automatically to Cart                                                
            </p>
            <p>
              You can instruct the rule to Add a Free product to the cart automatically, when Discount Type = "Free". 
            </p>             

           <p>
                <b>Note:</b>&nbsp; <b>Auto Add</b> of free products is <em>only</em>&nbsp; <b>available when the Discount Group is a single, unique product</b>
                <br> - (otherwise auto add wouldn't know what to add!)
            </p>
          </div>  <!-- //discountfree--> 


          <?php             
        break;
                
      case 'discount_applies_to':
          ?>  
          <!-- discountappliesto-->                         
          <div class="section">
            <a name="discount.discountappliesto" data-type="group"></a><h2>Discount Applies To</h2>       
            <p>
                <strong>How is the count Applied?</strong>                                                 
            </p>
            <p>
                 <ul class="list-more-margin">
                    <li><em>All Products</em> 
                    <br> - <b>All Products are tallied as a unified group</b>
                    <br>&nbsp;&nbsp;For example: 2 Oranges and 3 Apples in the Discount Group &nbsp;=&nbsp; <b>a single total of 5 units.</b>
                    </li>

                    <li><em>Each Product</em> 
                    <br> - <b>Each product is tallied as a separate product total</b>
                    <br>&nbsp;&nbsp;For example: 2 Oranges and 3 Apples in the Discount Group &nbsp;=&nbsp; <b>separate totals of 2 and 3 units respectively</b>.
                    </li>
                 </ul>                                                                   
            </p>

            
            <p>
                Discount Applies To &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" Each Product "</b>,     
                <br>- but switches automatically to " All Products " for package deals.
            </p>            
          </div>
          <?php             
        break;
        
      case 'discount_product_short_msg':
          ?>  
        
          <div class="section">
            <a name="messages.checkout" data-type="group"></a><h2>Checkout Message</h2>
            <p>
                 The short <strong>checkout message</strong> <em>summarizes your deal,</em>&nbsp; and is used both in the mini-cart and at checkout 
                 <br>for cart purchases <em>only.</em>                                              
            </p>
             <p>
                 Checkout Message shows by default for purchases with a Cart Purchase rule.                                                
            </p>
             <p>
                 <b>Checkout Message display for Cart Purchases</b> <em>can be shut off,</em>&nbsp; in both the mini-cart and the checkout,  
                <br>using settings available <em>on the Settings Screen.</em>                                                
            </p>
             <p>
                 <b>Checkout Message is <em>never</em>&nbsp; displayed for Catalag Purchases.</b> <em>A default value of "Unused for Catalog Discount"</em>
                 is automatically inserted into Checkout Message, as a placeholder, for Catalag Purchase Rules.                                                
            </p>                             
            <p>
                Checkout Message &nbsp; is a <em>required field.</em>                                              
            </p>
                        
          </div> 
     
          <?php             
        break;
        
      case 'discount_product_full_msg':
          ?>  
      
          <div class="section">
            <a name="messages.marketing" data-type="group"></a><h2> Advertising Message</h2>
            <p>
                 The  <strong>Advertising Message</strong> is the place for you to put in your full <b>Deal marketing message</b>.                                              
            </p>
           <p>
                 The <b> Advertising Messages</b> from all your active Cart Deals
                 <br><b>can be shown in your Website using <em>Shortcodes</em></b> (see below).                         
            </p> 
           <p class="larger-strong">
                 These 
                 <a class="commentURL" target="_blank" href="http://www.varktech.com/documentation/cart-deals/shortcodes"><?php _e('Shortcodes', 'vtcrt');?></a> 
                 can be placed all through your theme and site,
                 <br><strong>to take advantage of the Marketing Power your deals will bring.</strong>                                              
            </p>

            <p>
                Advertising Message &nbsp; is an <em>optional field,</em>&nbsp; available under <em>both the Basic and Advanced rule screen modes</em> 
            </p>            
                                                               
          </div>                 
          
          <?php             
        break;
        
      case 'discount_lifetime_max_amt_type':
          ?>  
       
          <div class="section">
            <a name="limits.percustomer" data-type="group"></a><h2>Customer Rule Limit</h2>
            <p class="larger-strong">
                 <strong>Controls the Number of times a customer can use a Discount. &nbsp;&nbsp;Ever.</strong>                                              
            </p>
            <p>
                 <h3 class="subtitle-h3">Customer Lifetime Limit Controls: </h3>
                 <ul class="">
                    <li><em>The Number of times a customer can use a Discount.</em> &nbsp;&nbsp;<strong>Ever.</strong></li>

                    <li><em>The $$ value total a customer can receive from a Discount.</em> &nbsp;&nbsp;<strong>Ever.</strong></li>
                 </ul>                                            
            </p>
            

           <p>
                 <h3 class="subtitle-h3">Customer Rule Limits Are: </h3>
                 <ul class="list-more-margin">
                    <li><b>None</b> 
                        <br> - Each customer has unlimited access to this Deal. 
                    </li>
                    <li><b>How many times can the Customer use this Discount?</b> 
                        <br> - Customer limit by: the Number of Times the Customer has received this Discount. 
                    </li>
                    <li><b>How much $$ value can the Customer receive from this Discount?</b> 
                        <br> - Customer limit by: the $$ Value Total that the Customer has received from this Discount 
                    </li>                    
                 </ul>                                            
            </p>
            <p>
                 If the Customer Rule Limit for this Discount has been reached,
                 <br><b><em>the Discount will be reduced until the Customer Lifetime Limit has been satisfied.</em></b>                                            
            </p>
                         
            <p>
                Customer Lifetime Limit &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" None "</b>     
            </p>            
                                   
          </div> 
          <div class="section subsection">
            <a name="discount.percustomercount" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Per Customer  Usage Limit Count</a></h2>          
            <p>
                <strong>The Count box contains the actual number Quantity or $$ Value</strong> applied to this Limit                                                                 
            </p> 
          </div>
                   
          <?php             
        break; 
        
      case 'discount_rule_max_amt_type':
          ?>  
        
          <div class="section">
            <a name="limits.percart" data-type="group"></a><h2>Cart Limit</h2>
            <p class="larger-strong">
                 <strong>Controls the Number of times a Cart can use a Discount..</strong>                                              
            </p>
           <p>
                 <h3 class="subtitle-h3">Per Cart Limit Controls: </h3>
                 <ul class="">
                    <li><em>The percentage value a Cart can use a Discount.</em> </strong></li>
                    <li><em>The Number of times a Cart can use a Discount.</em> </strong></li>
                    <li><em>The $$ value total a Cart can receive from a Discount.</em></li>
                 </ul>                                            
            </p>
           <p>
                 <h3 class="subtitle-h3">Per Cart Limits Are: </h3>
                 <ul class="list-more-margin">
                    <li><b>None</b> 
                        <br> - No Cart Limit. 
                    </li>
                    <li><b>Cart Discount Max - Percentage of Total Value</b> 
                        <br> - Cart limit by: percentage value the Cart has received for this Discount. 
                    </li>
                    <li><b>Cart Discount Max - Number of Times Used</b> 
                        <br> - Cart limit by: the Number of Times  the Cart has received this Discount. 
                    </li>
                    <li><b>Cart Discount Max - $$ Value</b> 
                        <br> - Cart limit by: the $$ Value Total  the Cart  has received from this Discount. 
                    </li>                    
                 </ul>                                            
            </p>

           <br> 
            <p>
                Cart Limit &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" None "</b>     
            </p>            
             
          </div> 
          
          <div class="section subsection">
            <a name="limits.percartcount" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Per Cart Usage Limit Count</a></h2>          
            <p>
                <strong>The Count box contains the actual number Quantity or $$ Value</strong> applied to this Limit                                                                 
            </p> 
          </div>                    

          <?php             
        break;
        
        
      case 'discount_rule_cum_max_amt_type':
          ?>  
      
          <div class="section">
            <a name="limits.perproduct" data-type="group"></a><h2>Product Limit</h2>
            <p class="larger-strong">
                 <strong>Controls the Number of times a Product can use a Discount.</strong>                                              
            </p>
           <p>
                 <h3 class="subtitle-h3">Per Product Limit Controls: </h3>
                 <ul class="">
                    <li><em>The percentage value a customer can use a Discount in the product.</em> </strong></li>
                    <li><em>The Number of times a customer can use a Discount in the product.</em> </strong></li>
                    <li><em>The $$ value total a customer can receive from a Discount in the product.</em></li>
                 </ul>                                            
            </p>
           <p>
                 <h3 class="subtitle-h3">Per Product Limits Are: </h3>
                 <ul class="list-more-margin">
                    <li><b>None</b> 
                        <br> - No Product Limit. 
                    </li>
                    <li><b>Product Discount Max - Percentage of Total Value</b> 
                        <br> - Product limit by: percentage value in the product has received for this Discount in the Cart. 
                    </li>
                    <li><b>Product Discount Max - Number of Times Used</b> 
                        <br> - Product limit by: the Number of Times in the product has received this Discount in the Cart. 
                    </li>
                    <li><b>Product Discount Max - $$ Value</b> 
                        <br> - Product limit by: the $$ Value Total in the product has received from this Discount in the Cart 
                    </li>                    
                 </ul>                                            
            </p>

            <p>
                Product Limit &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" None "</b>     
            </p>            
                                                              
          </div> 
          
          <div class="section subsection">
            <a name="limits.perproductcount" data-type="group"></a><h2>
              <a class="subsection-title-smaller" href="javascript:void(0);">Per Product Limit Count</a></h2>          
            <p>
                <strong>The Count box contains the actual number Quantity or $$ Value</strong> applied to this Limit                                                                 
            </p> 
          </div>
          <?php             
        break;
        
        
      case 'cumulativeRulePricing':
          ?>  
          
          <div class="section">
            <a name="workingwith.otherrules" data-type="group"></a><h2>Working with Other Rule Discounts</h2>
            <p>
                <strong>Does this rule work with other Rule Discounts?</strong>                                              

                 <ul class="list-more-margin">
                    <li><b>Yes</b> 
                        <br> - This discount will apply <em>in addition to</em>&nbsp; any other Rule Discounts. 
                    </li>
                    <li><b>No</b> 
                        <br> - If nother Rule Discount is present, <em>this discount will not be applied.</em> 
                    </li>
                   
                 </ul>                                            
            </p>           
            
            <p>
                If "Yes", set a sort priority to establish which Rule Goes first. Default sort priority is "10".                                                
            </p>

            <p>
                Working with Other Rule Discounts &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" Yes "</b>     
            </p>            
                                    
          </div>  
    
          <?php             
        break;
        
      case 'cumulativeCouponPricing':
          ?>  

          <div class="section">
            <a name="workingwith.coupons" data-type="group"></a><h2>Working with Coupons</h2>
            <p>
                <strong>Does this rule work with other Coupons?</strong>                                             

                 <ul class="list-more-margin">
                    <li><b>Yes</b> 
                        <br> - This discount will apply <em>in addition to</em>&nbsp; any Coupon Discount. 
                    </li>
                    <li><b>No</b> 
                        <br> - If a Coupon is presented, <em>this discount will not be applied.</em> 
                    </li>
                   
                 </ul>                                            
            </p>            
  
            <p>
                Working with Coupons &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" Yes "</b>     
            </p>            
                                               
          </div>  
         
          <?php             
        break;
        
      case 'cumulativeSalePricing':
          ?>  
        
          <div class="section">
            <a name="workingwith.saleprice" data-type="group"></a><h2>Working with Product Sale Pricing</h2>
            <p>
                <strong>Is the Product already on Sale?  &nbsp;Working with Product Sale Pricing is a bit more involved.</strong>                                              
            </p>


            <p>
                 <h3 class="subtitle-h3">There are three options: </h3>
                 <ul class="list-more-margin">
                    <li><b> No</b> - if product already on Sale, no further discount  
                    </li>
                    <li><b>Apply Deal Discount to Product Sale Price</b>  
                    </li>
                    <li><b>Apply Discount to Regular Price, if Less than Sale Price</b> 
                        <br> - So apply the Deal discount to the Regular price, and compare the savings with those from the sale price. 
                        <br> - If the Deal Discount with the Regular Price gives a greater discount, apply the Discount.
                        <br> - Otherwise, let the Product Sale Price stand.                   
                 </ul>                                            
            </p>

            <p>
                Working with Product Sale Pricing &nbsp; is an <em>optional field,</em>&nbsp; available under <em>Advanced Rule.</em>   &nbsp;&nbsp;Default &nbsp;=&nbsp; <b>" No "</b>     
            </p>            
                                      
          </div>  
          <?php             
        break;
 
        
      case '':
          ?>  

          <?php             
        break;


               
        
    } //end switch           
  } //end function
 
 
 
                            