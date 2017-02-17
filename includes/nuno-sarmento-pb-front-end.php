<?php defined('ABSPATH') or die();
/**
 * Front End Output
**/

/* Filter Content as early as possible, but after all WP code filter runs. */
add_filter( 'the_content', 'nuno_sarmento_pb_filter_content', 10.5 );

/**
 * Filter Content
**/
function nuno_sarmento_pb_filter_content( $content ){

	/* In single page when page builder template selected. */
	if( !is_admin() && is_page() && 'templates/page-builder.php' == get_page_template_slug( get_the_ID() ) ){

		/* Add content with shortcode, autoembed, responsive image, etc. */
		$content = nuno_sarmento_pb_default_content_filter( nuno_sarmento_pb_get_content() );
	}

	/* Return content */
	return $content;
}

/**
 * Page Builder Content Output
 * This need to be use in the loop.
**/
function nuno_sarmento_pb_get_content(){

	/* Get saved rows data and sanitize it */
	$row_datas = nuno_sarmento_pb_sanitize( get_post_meta( get_the_ID(), 'nuno-sarmento-pb', true ) );

	/* return if no rows data */
	if( !$row_datas ){
		return '';
	}

	/* Content */
	$content = '';

	/* Loop for each rows */
	foreach( $row_datas as $order => $row_data ){
		$order = intval( $order );

		/* === Row with 1 column === */
		if( 'col-1' == $row_data['type'] ){
			$content .= '<div class="nuno-sarmento-pb-row nuno-sarmento-pb-row-' . $order . ' nuno-sarmento-pb-col-1">';
			$content .= '<div class="row-content">';
			$content .= $row_data['content'];
			$content .= '</div>';
			$content .= '</div>';
		}
		/* === Row with 2 columns === */
		elseif( 'col-2' == $row_data['type'] ){
			$content .= '<div class="nuno-sarmento-pb-row nuno-sarmento-pb-row-' . $order . ' nuno-sarmento-pb-col-2">';
			$content .= '<div class="row-content-1 nuno-sarmento-pb-col-2-left">';
			$content .= $row_data['content-1'];
			$content .= '</div>';
			$content .= '<div class="row-content-2 nuno-sarmento-pb-col-2-right">';
			$content .= $row_data['content-2'];
			$content .= '</div>';
			$content .= '</div>';
		}

		/* === Row with 3 columns === */
		elseif( 'col-3' == $row_data['type'] ){
			$content .= '<div class="nuno-sarmento-pb-row nuno-sarmento-pb-row-' . $order . ' nuno-sarmento-pb-col-3">';
			$content .= '<div class="row-content-1">';
			$content .= $row_data['content-1'];
			$content .= '</div>';
			$content .= '<div class="row-content-2">';
			$content .= $row_data['content-2'];
			$content .= '</div>';
			$content .= '<div class="row-content-3">';
			$content .= $row_data['content-3'];
			$content .= '</div>';
			$content .= '</div>';
		}

		/* === Row with 4 columns === */
		elseif( 'col-4' == $row_data['type'] ){
			$content .= '<div class="nuno-sarmento-pb-row nuno-sarmento-pb-row-' . $order . ' nuno-sarmento-pb-col-4">';
			$content .= '<div class="row-content-1">';
			$content .= $row_data['content-1'];
			$content .= '</div>';
			$content .= '<div class="row-content-2">';
			$content .= $row_data['content-2'];
			$content .= '</div>';
			$content .= '<div class="row-content-3">';
			$content .= $row_data['content-3'];
			$content .= '</div>';
			$content .= '<div class="row-content-4">';
			$content .= $row_data['content-4'];
			$content .= '</div>';
			$content .= '</div>';
		}

		/* === Row with call out box === */
		elseif( 'col-5' == $row_data['type'] ){
			$url_call = $row_data['content-2'];
			$content .= '<div class="nuno-sarmento-pb-row nuno-sarmento-pb-row-' . $order . ' nuno-sarmento-pb-col-5 help-box">';
			$content .= '<div class="box__callout_left">';
			$content .= '<a href='.$url_call.' class="row-content-1 nuno-sarmento-pb-call-button ">';
			$content .=  $row_data['content-1'] ;
			$content .= '</a>';
			$content .= '</div>';
			$content .= '<div class="box__callout_right">';
			$content .=  $row_data['content-3'];
			$content .= '</div>' ;
			$content .= '</div>' ;
		}

		/* === Row with 6 2-3 - 1-3 columns === */
		elseif( 'col-6' == $row_data['type'] ){
			$content .= '<div class="nuno-sarmento-pb-row nuno-sarmento-pb-row-' . $order . ' nuno-sarmento-pb-col-6">';
			$content .= '<div class="nuno-sarmento-pb-col-2-3">';
			$content .= $row_data['content-1'];
			$content .= '</div>';
			$content .= '<div class="nuno-sarmento-pb-col-1-3">';
			$content .= $row_data['content-2'];
			$content .= '</div>';
			$content .= '</div>';
		}

		/* === Row with 6 1-3 - 2-3 columns === */
		elseif( 'col-7' == $row_data['type'] ){
			$content .= '<div class="nuno-sarmento-pb-row nuno-sarmento-pb-row-' . $order . ' nuno-sarmento-pb-col-7">';
			$content .= '<div class="nuno-sarmento-pb-col-1-3">';
			$content .= $row_data['content-1'];
			$content .= '</div>';
			$content .= '<div class="nuno-sarmento-pb-col-2-3">';
			$content .= $row_data['content-2'];
			$content .= '</div>';
			$content .= '</div>';
		}

	}
	return $content;
}


/* === FRONT-END SCRIPTS === */

/* Enqueue Script */
add_action( 'wp_enqueue_scripts', 'nuno_sarmento_pb_pbbase_front_end_scripts' );

function nuno_sarmento_pb_pbbase_front_end_scripts(){

	/* In a page using page builder */
	if( is_page() && ( 'templates/page-builder.php' == get_page_template_slug( get_queried_object_id() ) ) ){

		/* Enqueue CSS & JS For Page Builder */
		wp_enqueue_style( 'nuno-sarmento-pb-page-builder', NUNO_SARMENTO_TEND_PBBASE_URI. 'assets/css/style.css', array(), NUNO_SARMENTO_TEND_PBBASE_VERSION );
	}
}
