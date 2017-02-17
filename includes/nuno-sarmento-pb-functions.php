<?php defined('ABSPATH') or die();
/**
 * Page Builder Functions
 * - Sanitize Page Builder Data
 *
**/

/**
 * Sanitize Page Builder Data
 */
function nuno_sarmento_pb_sanitize( $input ){

	/* If data is not array, return. */
	if( !is_array( $input ) ){
		return null;
	}

	/* Output var */
	$output = array();

	/* Loop the data submitted */
	foreach( $input as $row_order => $row_data ){

		/* Only if row type is set */
		if( isset( $row_data['type'] ) && $row_data['type'] ){

			/* Get type of row ("col-1" or "col-2") */
			$row_type = esc_attr( $row_data['type'] );

			/* Row with 1 Column */
			if( 'col-1' == $row_type ){

				/* Sanitize value for "content" field. */
				$output[$row_order]['content'] = wp_kses_post( $row_data['content'] );
				$output[$row_order]['type'] = $row_type;
			}

			/* Row with 2 Columns */
			elseif( 'col-2' == $row_type ){

				/* Sanitize value for "content-1" and "content-2" field */
				$output[$row_order]['content-1'] = wp_kses_post( $row_data['content-1'] );
				$output[$row_order]['content-2'] = wp_kses_post( $row_data['content-2'] );
				$output[$row_order]['type'] = $row_type;
			}

			/* Row with 3 Columns */
			elseif( 'col-3' == $row_type ){

				/* Sanitize value for "content-1" and "content-2" etc */
				$output[$row_order]['content-1'] = wp_kses_post( $row_data['content-1'] );
				$output[$row_order]['content-2'] = wp_kses_post( $row_data['content-2'] );
				$output[$row_order]['content-3'] = wp_kses_post( $row_data['content-3'] );
				$output[$row_order]['type'] = $row_type;
			}

			/* Row with 4 Columns */
			elseif( 'col-4' == $row_type ){

				/* Sanitize value for "content-1" and "content-2" etc */
				$output[$row_order]['content-1'] = wp_kses_post( $row_data['content-1'] );
				$output[$row_order]['content-2'] = wp_kses_post( $row_data['content-2'] );
				$output[$row_order]['content-3'] = wp_kses_post( $row_data['content-3'] );
				$output[$row_order]['content-4'] = wp_kses_post( $row_data['content-4'] );
				$output[$row_order]['type'] = $row_type;
			}

			/* Row with call out box */
			elseif( 'col-5' == $row_type ){
				/* Sanitize value for call out box */
				$output[$row_order]['content-1'] = wp_kses_post( $row_data['content-1'] );
				$output[$row_order]['content-2'] = wp_kses_post( $row_data['content-2'] );
				$output[$row_order]['content-3'] = wp_kses_post( $row_data['content-3'] );
				$output[$row_order]['type'] = $row_type;
			}

			/* Row with 1-3 - 2-3 Columns */
			elseif( 'col-6' == $row_type ){
				/* Sanitize value for 1-3 - 2-3 */
				$output[$row_order]['content-1'] = wp_kses_post( $row_data['content-1'] );
				$output[$row_order]['content-2'] = wp_kses_post( $row_data['content-2'] );
				$output[$row_order]['type'] = $row_type;
			}

			/* Row with 2-3 - 1-3 Columns */
			elseif( 'col-7' == $row_type ){
				/* Sanitize value for 2-3 - 1-3  */
				$output[$row_order]['content-1'] = wp_kses_post( $row_data['content-1'] );
				$output[$row_order]['content-2'] = wp_kses_post( $row_data['content-2'] );
				$output[$row_order]['type'] = $row_type;
			}

		}
	}

	return $output;
}


/**
 * Enable Default Content Filter
 */
function nuno_sarmento_pb_default_content_filter( $content ){
	if( $content ){
		global $wp_embed;
		$content = $wp_embed->run_shortcode( $content );
		$content = $wp_embed->autoembed( $content );
		$content = wptexturize( $content );
		$content = convert_smilies( $content );
		$content = convert_chars( $content );
		$content = wptexturize( $content );
		$content = do_shortcode( $content );
		$content = shortcode_unautop( $content );
		if( function_exists('wp_make_content_images_responsive') ) { /* WP 4.4+ */
			$content = wp_make_content_images_responsive( $content );
		}
		$content = wpautop( $content );
	}
	return $content;
}
