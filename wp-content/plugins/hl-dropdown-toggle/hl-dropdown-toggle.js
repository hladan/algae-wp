(function() {
    tinymce.create('tinymce.plugins.mytoggle', {
        init : function(ed, url) {
            ed.addButton('mytoggle', {
                title : 'drop-down toggle', // by hovering cursor over the button, this title displays. 
                image : '../wp-includes/images/drop-down-icon.png',
                onclick : function() {
                	 // by clicking the button, the following string displays in the post editor. 
                     ed.selection.setContent('[toggle name = NAME ]' +'  '+'Insert a text!' +'  '+'[/toggle]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('mytoggle', tinymce.plugins.mytoggle);
})();
