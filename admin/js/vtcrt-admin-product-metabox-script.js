
        jQuery.noConflict();
        jQuery(document).ready(function($) {                                                        
           //tried to define the div elsewhere and then shift it in the DOM using insertAfter,
           //  but the textnodes (titles) didn't move with the html

            //Include/Exclude Redirect , inserted into the plugin taxonomy box            
            newHtml  =  '<div id="vtcrt-redirect"><h3>';
            newHtml +=  $("#vtcrt-sectionTitle").val();    //pick up the literals passed up in the html...
            newHtml +=  '</h3><a href="#vtcrt-pricing-deal-info" id="vtcrt-redirect-anchor">+ ';
            newHtml +=  $("#vtcrt-urlTitle").val();        //pick up the literals passed up in the html...
            newHtml +=  '</a></div>';
            
            //Include/Exclude Redirect , inserted into the plugin taxonomy box 
            $(newHtml).insertAfter('div#vtcrt_rule_category-adder');
            
            $('#vtcrt-redirect-anchor').click(function(){ 
                $('div#vtcrt-pricing-deal-info.postbox h3 span').css('color', 'blue');                                                  
            });
            
            //free version, protect everything except 'include in all rules as normal'
            $('#includeOrExclude_includeList').attr('disabled', true);
            $('#includeOrExclude_excludeList').attr('disabled', true);
            $('#includeOrExclude_excludeAll').attr('disabled', true);    
            $('.inOrEx-list-checkbox-class').attr('disabled', true);    //checkbox
            $('.inOrEx-list-checkbox-label').css('color', '#AAAAAA');   //label
            $('#includeOrExclude-title').css('color', '#AAAAAA');       //area title


        
        }); //end ready function 
                        