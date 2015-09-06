(function() {
    tinymce.create('tinymce.plugins.mytwocolumn', {
        init : function(ed, url) {
            ed.addButton('mytwocolumn', {
                title : 'two-column generator', // by hovering cursor over the button, this title displays. 
                image : '../wp-includes/images/two-column-icon.png',
                onclick : function() {
                	 // by clicking the button, the following string displays in the post editor.
                	 // Don't use capital letters for a variable name. That's weird! 
                	 /*
                	   left: left column
                	   right: right column
                	   STR: street name
                	   NUMBER: house number  
                	 */   
                     ed.selection.setContent(
                     '[twocolumn \
                       country_left = COUNTRY \
                       company_left = NAME \
                       address_str_left = STR \
                       address_no_left = NUMBER \
                       address_zipcode_left = ZIPCODE \
                       city_left = CITY \
                       phone_left = " " \
                       fax_left = " " \
                       website_left = " " \
                       country_right = " " \
                       company_right = " " \
                       address_str_right = " " \
                       address_no_right = " " \
                       address_zipcode_right = " " \
                       city_right = " " \
                       phone_right = " " \
                       fax_right = " " \
                       website_right = " "]'  
                     +'[/twocolumn]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('mytwocolumn', tinymce.plugins.mytwocolumn);
})();

