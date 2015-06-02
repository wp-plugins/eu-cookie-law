(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton('my_mce_button', {
			text: 'cookie',
			onclick: function() {
				var height = prompt("Height", "100px");
				var width = prompt("Width", "100px");
				var text = prompt("Text", "Content blocked. Please accept cookies to avoid this.");
				
				selected = tinyMCE.activeEditor.selection.getContent();
				if( selected ){
							//If text is selected when button is clicked
							//Wrap shortcode around it.
							content =  '[cookie height="'+height+'" width"'+width+'"]'+selected+'[/cookie]';
						}else{
							content =  '[cookie height="'+height+'" width"'+width+'"]';
						}

						tinymce.execCommand('mceInsertContent', false, content);
			}
		});
	});
})();