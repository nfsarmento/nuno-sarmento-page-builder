jQuery( document ).ready( function($) {

	/* Editor Toggle Function */
	function nuno_sarmento_pb_Editor_Toggle(){
		if( 'templates/page-builder.php' == $( '#page_template' ).val() ){
			$( '#postdivrich' ).hide();
			$( '#nuno-sarmento-pb-page-builder' ).show();
		}
		else{
			$( '#postdivrich' ).show();
			$( '#nuno-sarmento-pb-page-builder' ).hide();
		}
	}

	/* Toggle On Page Load */
	nuno_sarmento_pb_Editor_Toggle();

	/* If user change page template drop down */
	$( "#page_template" ).change( function(e) {
		nuno_sarmento_pb_Editor_Toggle();
	});

});
