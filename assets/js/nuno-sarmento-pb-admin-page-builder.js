jQuery( document ).ready( function( $ ){

	/* Function: Update Order */
	function nuno_sarmento_pb_UpdateOrder(){

		/* In each of rows */
		$('.nuno-sarmento-pb-rows > .nuno-sarmento-pb-row').each( function(i){

			/* Increase num by 1 to avoid "0" as first index. */
			var num = i + 1;

			/* Update order number in row title */
			$( this ).find( '.nuno-sarmento-pb-order' ).text( num );

			/* In each input in the row */
			$( this ).find( '.nuno-sarmento-pb-row-input' ).each( function(i) {

				/* Get field id for this input */
				var field = $( this ).attr( 'data-field' );

				/* Update name attribute with order and field name.  */
				$( this ).attr( 'name', 'nuno-sarmento-pb[' + num + '][' + field + ']');
			});
		});
	}

	/* Update Order on Page load */
	nuno_sarmento_pb_UpdateOrder();

	/* Make Row Sortable */
	$( '.nuno-sarmento-pb-rows' ).sortable({
		handle: '.nuno-sarmento-pb-handle',
		cursor: 'grabbing',
		stop: function( e, ui ) {
			nuno_sarmento_pb_UpdateOrder();
		},
	});

	/* Add Row */
	$( 'body' ).on( 'click', '.nuno-sarmento-pb-add-row', function(e){
		e.preventDefault();

		 /* Target the template. */
		var template = '.nuno-sarmento-pb-templates > .nuno-sarmento-pb-' + $( this ).attr( 'data-template' );

		/* Clone the template and add it. */
		$( template ).clone().appendTo( '.nuno-sarmento-pb-rows' );

		/* Hide Empty Row Message */
		$( '.nuno-sarmento-pb-rows-message' ).hide();

		/* Update Order */
		nuno_sarmento_pb_UpdateOrder();
	});

	/* Hide/Show Empty Row Message On Page Load */
	if( $( '.nuno-sarmento-pb-rows > .nuno-sarmento-pb-row' ).length ){
		$( '.nuno-sarmento-pb-rows-message' ).hide();
	}
	else{
		$( '.nuno-sarmento-pb-rows-message' ).show();
	}

	/* Delete Row */
	$( 'body' ).on( 'click', '.nuno-sarmento-pb-remove', function(e){
		e.preventDefault();

		/* Delete Row */
		$( this ).parents( '.nuno-sarmento-pb-row' ).remove();

		/* Show Empty Message When Applicable. */
		if( ! $( '.nuno-sarmento-pb-rows > .nuno-sarmento-pb-row' ).length ){
			$( '.nuno-sarmento-pb-rows-message' ).show();
		}

		/* Update Order */
		nuno_sarmento_pb_UpdateOrder();
	});

});
