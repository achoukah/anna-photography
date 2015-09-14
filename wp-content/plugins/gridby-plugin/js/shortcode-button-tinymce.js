(function() {
    tinymce.PluginManager.add('fb_tc_button', function( editor, url ) {		
		
		editor.addButton( 'youtube-video', {
            title: 'Insert Video from Youtube',
            type: 'button',
            text: 'YouTube',
           
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Insert Video from Youtube',
                            body: [{
                                type: 'textbox',
                                name: 'title',
                                label: 'Video URL:'
                            }],
                            onsubmit: function( e ) {
                                editor.insertContent( '[youtube-video url="' + e.data.title + '"]');
                            }
                        });
                    }
          
        });
        
        editor.addButton( 'button-link', {
            title: 'Insert Button',
            type: 'button',
            text: 'Button',
           
                    onclick: function() {
                        editor.windowManager.open( {
                            title: 'Insert Button',
                            body: [{
                                type: 'textbox',
                                name: 'title',
                                label: 'Button link URL:'
                            },{
					            type: 'textbox',
					            name: 'text',
					            label: 'Button text'
					        },],
                            onsubmit: function( e ) {
                                editor.insertContent( '[button-link text="' + e.data.text  + '" url="' + e.data.title + '"]');
                            }
                        });
                    }
          
        });

		
		
    });
})();