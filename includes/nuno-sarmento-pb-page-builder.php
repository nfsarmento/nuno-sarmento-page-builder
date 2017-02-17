<?php defined('ABSPATH') or die();
/**
 * Page Builder
 * - Register Page Template
 * - Add Page Builder Control
 * - Save Page Builder Data
 * - Admin Scripts
 *
**/

/* === REGISTER PAGE TEMPLATE === */

/* Add page templates */
add_filter( 'theme_page_templates', 'nuno_sarmento_pb_pbbase_register_page_template' );

/**
 * Register Page Template: Page Builder
 */
function nuno_sarmento_pb_pbbase_register_page_template( $templates ){
	$templates['templates/page-builder.php'] = 'Page Builder';
	return $templates;
}

/* === ADD PAGE BUILDER CONTROL === */

/* Add page builder form after editor */
add_action( 'edit_form_after_editor', 'nuno_sarmento_pb_pbbase_editor_callback', 10, 2 );

/**
 * Page Builder Control
 * Added after Content Editor in Page Edit Screen.
 */

function nuno_sarmento_pb_pbbase_editor_callback( $post ){
	if( 'page' !== $post->post_type ){
		return;
	}
?>
	<div class="nuno-sarmento-pb-page-admin-container" id="nuno-sarmento-pb-page-builder">

		<div class="nuno-sarmento-pb-rows">
			<?php nuno_sarmento_pb_render_rows( $post ); // display saved rows ?>
		</div><!-- .nuno-sarmento-pb-rows -->

		<div class="nuno-sarmento-pb-actions">
			<a href="#" class="nuno-sarmento-pb-add-row button-primary button-large" data-template="col-1">Add 1 Column</a>
			<a href="#" class="nuno-sarmento-pb-add-row button-primary button-large" data-template="col-2">Add 2 Columns</a>
			<a href="#" class="nuno-sarmento-pb-add-row button-primary button-large" data-template="col-3">Add 3 Columns</a>
			<a href="#" class="nuno-sarmento-pb-add-row button-primary button-large" data-template="col-4">Add 4 Columns</a>
			<a href="#" class="nuno-sarmento-pb-add-row button-primary button-large" data-template="col-6">Add (2-3 - 1-3) Columns</a>
			<a href="#" class="nuno-sarmento-pb-add-row button-primary button-large" data-template="col-7">Add (1-3 - 2-3 ) Columns</a>
			<a href="#" class="nuno-sarmento-pb-add-row button-primary button-large" data-template="col-5">Add call out box</a>
		</div><!-- .nuno-sarmento-pb-actions -->

		<div class="nuno-sarmento-pb-templates" style="display:none;">

			<?php /* == This is the 1 column row template == */ ?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-1">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order">0</span>
					<span class="nuno-sarmento-pb-row-title-text">1 Column</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content" placeholder="Add HTML here..."></textarea>
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="" data-field="type" value="col-1">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-1 -->

			<?php /* == This is the 2 columns row template == */ ?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-2">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order">0</span>
					<span class="nuno-sarmento-pb-row-title-text">2 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-2-left">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-1" placeholder="1st column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-left -->
					<div class="nuno-sarmento-pb-col-2-right">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-2" placeholder="2nd column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-right -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="" data-field="type" value="col-2">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-2 -->


			<?php /* == This is the 3 columns row template == */ ?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-3">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order">0</span>
					<span class="nuno-sarmento-pb-row-title-text">3 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-3">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-1" placeholder="1st column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-3 -->
					<div class="nuno-sarmento-pb-col-3">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-2" placeholder="2nd column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-3 -->
					<div class="nuno-sarmento-pb-col-3">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-3" placeholder="3nd column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-3 -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="" data-field="type" value="col-3">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-3 -->


			<?php /* == This is the 4 columns row template == */ ?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-4">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order">0</span>
					<span class="nuno-sarmento-pb-row-title-text">4 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-1" placeholder="1st column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-2" placeholder="2nd column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-3" placeholder="3nd column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-4" placeholder="4nd column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="" data-field="type" value="col-4">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-4 -->

			<?php /* == This is the callout == */ ?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-5">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order">0</span>
					<span class="nuno-sarmento-pb-row-title-text">Call To Action</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields help-box">
					<div class="nuno-sarmento-pb-col-5">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-1" placeholder="Button's text"></textarea>
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-2" placeholder="Button's link (http://www.example.com)"></textarea>
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-3" placeholder="Box's text"></textarea>
					</div><!-- .nuno-sarmento-pb-col-5 -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="" data-field="type" value="col-5">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-call callout -->


			<?php /* == This is the 2-3 - 1-3 columns row template == */ ?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-6">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order">0</span>
					<span class="nuno-sarmento-pb-row-title-text">2-3 - 1-3 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-2-3">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-1" placeholder="1st (2-3) column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-left -->
					<div class="nuno-sarmento-pb-col-1-3">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-2" placeholder="2nd (1-3) column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-right -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="" data-field="type" value="col-6">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-6 -->


			<?php /* == This is the 1-3 - 2-3 columns row template == */ ?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-7">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order">0</span>
					<span class="nuno-sarmento-pb-row-title-text">1-3 - 2-3 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-1-3">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-1" placeholder="1st (1-3) column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-left -->
					<div class="nuno-sarmento-pb-col-2-3">
						<textarea class="nuno-sarmento-pb-row-input" name="" data-field="content-2" placeholder="2nd (2-3) column content here..."></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-right -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="" data-field="type" value="col-7">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-7 -->


		</div><!-- .nuno-sarmento-pb-templates -->

		<?php wp_nonce_field( "nuno_sarmento_pb_nonce_action", "nuno_sarmento_pb_nonce" ) ?>

	</div><!-- .nuno-sarmento-pb-page-builder -->
<?php
}


/* === SAVE PAGE BUILDER DATA === */

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'nuno_sarmento_pb_pbbase_save_post', 10, 2 );

/**
 * Save Page Builder Data When Saving Page
 */
function nuno_sarmento_pb_pbbase_save_post( $post_id, $post ){

	/* Stripslashes Submitted Data */
	$request = stripslashes_deep( $_POST );

	/* Verify/validate */
	if ( ! isset( $request['nuno_sarmento_pb_nonce'] ) || ! wp_verify_nonce( $request['nuno_sarmento_pb_nonce'], 'nuno_sarmento_pb_nonce_action' ) ){
		return $post_id;
	}
	/* Do not save on autosave */
	if ( defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	/* Check post type and user caps. */
	$post_type = get_post_type_object( $post->post_type );
	if ( 'page' != $post->post_type || !current_user_can( $post_type->cap->edit_post, $post_id ) ){
		return $post_id;
	}

	/* == Save, Delete, or Update Page Builder Data == */

	/* Get (old) saved page builder data */
	$saved_data = get_post_meta( $post_id, 'nuno-sarmento-pb', true );

	/* Get new submitted data and sanitize it. */
	$submitted_data = isset( $request['nuno-sarmento-pb'] ) ? nuno_sarmento_pb_sanitize( $request['nuno-sarmento-pb'] ) : null;

	/* New data submitted, No previous data, create it  */
	if ( $submitted_data && '' == $saved_data ){
		add_post_meta( $post_id, 'nuno-sarmento-pb', $submitted_data, true );
	}
	/* New data submitted, but it's different data than previously stored data, update it */
	elseif( $submitted_data && ( $submitted_data != $saved_data ) ){
		update_post_meta( $post_id, 'nuno-sarmento-pb', $submitted_data );
	}
	/* New data submitted is empty, but there's old data available, delete it. */
	elseif ( empty( $submitted_data ) && $saved_data ){
		delete_post_meta( $post_id, 'nuno-sarmento-pb' );
	}

	/* == Get Selected Page Template == */
	$page_template = isset( $request['page_template'] ) ? esc_attr( $request['page_template'] ) : null;

	/* == Page Builder Template Selected, Save to Post Content == */
	if( 'templates/page-builder.php' == $page_template ){

		/* Page builder content without row/column wrapper */
		$pb_content = nuno_sarmento_pb_format_post_content_data( $submitted_data );

		/* Post Data To Save */
		$this_post = array(
			'ID'           => $post_id,
			'post_content' => sanitize_post_field( 'post_content', $pb_content, $post_id, 'db' ),
		);

		/**
		 * Prevent infinite loop.
		 * @link https://developer.wordpress.org/reference/functions/wp_update_post/
		 */
		remove_action( 'save_post', 'nuno_sarmento_pb_pbbase_save_post' );
		wp_update_post( $this_post );
		add_action( 'save_post', 'nuno_sarmento_pb_pbbase_save_post' );
	}

	/* == Always delete page builder data if page template not selected == */
	else{
		delete_post_meta( $post_id, 'nuno-sarmento-pb' );
	}
}


/**
 * Format Page Builder Content Without Wrapper Div.
 * This is added to post content.
**/
function nuno_sarmento_pb_format_post_content_data( $row_datas ){

	/* return if no rows data */
	if( !$row_datas ){
		return '';
	}

	/* Output */
	$content = '';

	/* Loop for each rows */
	foreach( $row_datas as $order => $row_data ){
		$order = intval( $order );

		/* === Row with 1 column === */
		if( 'col-1' == $row_data['type'] ){
			$content .= $row_data['content'];
		}
		/* === Row with 2 columns === */
		elseif( 'col-2' == $row_data['type'] ){
			$content .= $row_data['content-1'];
			$content .= $row_data['content-2'];
		}
		/* === Row with 3 columns === */
		elseif( 'col-3' == $row_data['type'] ){
			$content .= $row_data['content-1'];
			$content .= $row_data['content-2'];
			$content .= $row_data['content-3'];
		}
		/* === Row with 4 columns === */
		elseif( 'col-4' == $row_data['type'] ){
			$content .= $row_data['content-1'];
			$content .= $row_data['content-2'];
			$content .= $row_data['content-3'];
			$content .= $row_data['content-4'];
		}
		/* === Row with call out box === */
		elseif( 'col-5' == $row_data['type'] ){
			$content .= $row_data['content-1'];
			$content .= $row_data['content-2'];
			$content .= $row_data['content-3'];
		}
		/* === Row with 2-3 - 1-3 Columns === */
		elseif( 'col-6' == $row_data['type'] ){
			$content .= $row_data['content-1'];
			$content .= $row_data['content-2'];
		}
		/* === Row with 1-3 - 2-3  Columns === */
		elseif( 'col-7' == $row_data['type'] ){
			$content .= $row_data['content-1'];
			$content .= $row_data['content-2'];
		}

	}
	return $content;
}


/**
 * Render Saved Rows
 */
function nuno_sarmento_pb_render_rows( $post ){

	/* Get saved rows data and sanitize it */
	$row_datas = nuno_sarmento_pb_sanitize( get_post_meta( $post->ID, 'nuno-sarmento-pb', true ) );

	/* Default Message */
	$default_message = 'Please add row to start!';

	/* return if no rows data */
	if( !$row_datas ){
		echo '<p class="nuno-sarmento-pb-rows-message">' . $default_message . '</p>';
		return;
	}
	/* Data available, hide default notice */
	else{
		echo '<p class="nuno-sarmento-pb-rows-message" style="display:none;">' . $default_message . '</p>';
	}

	/* Loop for each rows */
	foreach( $row_datas as $order => $row_data ){
		$order = intval( $order );

		/* === Row with 1 column === */
		if( 'col-1' == $row_data['type'] ){
			?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-1">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order"><?php echo $order; ?></span>
					<span class="nuno-sarmento-pb-row-title-text">1 Column</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content]" data-field="content" placeholder="Add HTML here..."><?php echo esc_textarea( $row_data['content'] ); ?></textarea>
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="nuno-sarmento-pb[<?php echo $order; ?>][type]" data-field="type" value="col-1">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-1 -->
			<?php
		}
		/* === Row with 2 columns === */
		elseif( 'col-2' == $row_data['type'] ){
			?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-2">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order"><?php echo $order; ?></span>
					<span class="nuno-sarmento-pb-row-title-text">2 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-2-left">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-1]" data-field="content-1" placeholder="1st column content here..."><?php echo esc_textarea( $row_data['content-1'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-left -->
					<div class="nuno-sarmento-pb-col-2-right">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-2]" data-field="content-2" placeholder="2nd column content here..."><?php echo esc_textarea( $row_data['content-2'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-right -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="nuno-sarmento-pb[<?php echo $order; ?>][type]" data-field="type" value="col-2">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-2 -->
			<?php
		}

		/* === Row with 3 columns === */
		elseif( 'col-3' == $row_data['type'] ){
			?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-3">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order"><?php echo $order; ?></span>
					<span class="nuno-sarmento-pb-row-title-text">3 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-3">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-1]" data-field="content-1" placeholder="1st column content here..."><?php echo esc_textarea( $row_data['content-1'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-3 -->
					<div class="nuno-sarmento-pb-col-3">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-2]" data-field="content-2" placeholder="2nd column content here..."><?php echo esc_textarea( $row_data['content-2'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-3 -->
					<div class="nuno-sarmento-pb-col-3">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-3]" data-field="content-3" placeholder="3nd column content here..."><?php echo esc_textarea( $row_data['content-3'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-3 -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="nuno-sarmento-pb[<?php echo $order; ?>][type]" data-field="type" value="col-3">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-3 -->
			<?php
		}

		/* === Row with 4 columns === */
		elseif( 'col-4' == $row_data['type'] ){
			?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-4">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order"><?php echo $order; ?></span>
					<span class="nuno-sarmento-pb-row-title-text">4 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-1]" data-field="content-1" placeholder="1st column content here..."><?php echo esc_textarea( $row_data['content-1'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-2]" data-field="content-2" placeholder="2nd column content here..."><?php echo esc_textarea( $row_data['content-2'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-3]" data-field="content-3" placeholder="3nd column content here..."><?php echo esc_textarea( $row_data['content-3'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<div class="nuno-sarmento-pb-col-4">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-4]" data-field="content-4" placeholder="4nd column content here..."><?php echo esc_textarea( $row_data['content-4'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-4 -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="nuno-sarmento-pb[<?php echo $order; ?>][type]" data-field="type" value="col-4">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-4 -->
			<?php
		}


		/* === Row with call out box === */
		elseif( 'col-5' == $row_data['type'] ){
			?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-5">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order"><?php echo $order; ?></span>
					<span class="nuno-sarmento-pb-row-title-text">Call out box</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-5">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-1]" data-field="content-1" placeholder="Button's text"><?php echo esc_textarea( $row_data['content-1'] ); ?></textarea>
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-2]" data-field="content-2" placeholder="Button's link (http://www.example.com)"><?php echo esc_textarea( $row_data['content-2'] ); ?></textarea>
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-3]" data-field="content-3" placeholder="Box's text"><?php echo esc_textarea( $row_data['content-3'] ); ?></textarea>

					</div><!-- .nuno-sarmento-pb-col-5 -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="nuno-sarmento-pb[<?php echo $order; ?>][type]" data-field="type" value="col-5">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-5 -->
			<?php
		}

		/* === Row with 2-3 - 1-3 columns === */
		elseif( 'col-6' == $row_data['type'] ){
			?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-6">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order"><?php echo $order; ?></span>
					<span class="nuno-sarmento-pb-row-title-text">2-3 - 1-3 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-2-3">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-1]" data-field="content-1" placeholder="1st (2-3) column content here..."><?php echo esc_textarea( $row_data['content-1'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-left -->
					<div class="nuno-sarmento-pb-col-1-3">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-2]" data-field="content-2" placeholder="2nd (1-3) column content here..."><?php echo esc_textarea( $row_data['content-2'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-right -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="nuno-sarmento-pb[<?php echo $order; ?>][type]" data-field="type" value="col-6">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-6 -->
			<?php
		}


		/* === Row with 1-3 - 2-3 columns === */
		elseif( 'col-7' == $row_data['type'] ){
			?>
			<div class="nuno-sarmento-pb-row nuno-sarmento-pb-col-7">

				<div class="nuno-sarmento-pb-row-title">
					<span class="nuno-sarmento-pb-handle dashicons dashicons-sort"></span>
					<span class="nuno-sarmento-pb-order"><?php echo $order; ?></span>
					<span class="nuno-sarmento-pb-row-title-text">1-3 - 2-3 Columns</span>
					<span class="nuno-sarmento-pb-remove dashicons dashicons-trash"></span>
				</div><!-- .nuno-sarmento-pb-row-title -->

				<div class="nuno-sarmento-pb-row-fields">
					<div class="nuno-sarmento-pb-col-1-3">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-1]" data-field="content-1" placeholder="1st (1-3) column content here..."><?php echo esc_textarea( $row_data['content-1'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-left -->
					<div class="nuno-sarmento-pb-col-2-3">
						<textarea class="nuno-sarmento-pb-row-input" name="nuno-sarmento-pb[<?php echo $order; ?>][content-2]" data-field="content-2" placeholder="2nd (2-3) column content here..."><?php echo esc_textarea( $row_data['content-2'] ); ?></textarea>
					</div><!-- .nuno-sarmento-pb-col-2-right -->
					<input class="nuno-sarmento-pb-row-input" type="hidden" name="nuno-sarmento-pb[<?php echo $order; ?>][type]" data-field="type" value="col-7">
				</div><!-- .nuno-sarmento-pb-row-fields -->

			</div><!-- .nuno-sarmento-pb-row.nuno-sarmento-pb-col-6 -->
			<?php
		}



	}
}


/* === ADMIN SCRIPTS === */

/* Admin Script */
add_action( 'admin_enqueue_scripts', 'nuno_sarmento_pb_pbbase_admin_scripts' );

/**
 * Admin Scripts
 */
function nuno_sarmento_pb_pbbase_admin_scripts( $hook_suffix ){
	global $post_type;

	/* In Page Edit Screen */
	if( 'page' == $post_type && in_array( $hook_suffix, array( 'post.php', 'post-new.php' ) ) ){

		/* Load Editor/Page Builder Toggle Script */
		wp_enqueue_script( 'nuno-sarmento-pb-base-admin-editor-toggle', NUNO_SARMENTO_TEND_PBBASE_URI . 'assets/js/nuno-sarmento-pb-admin-editor-toggle.js', array( 'jquery' ), NUNO_SARMENTO_TEND_PBBASE_VERSION );

		/* Enqueue CSS & JS For Page Builder */
		wp_enqueue_style( 'nuno-sarmento-pb-base-admin', NUNO_SARMENTO_TEND_PBBASE_URI. 'assets/css/style.css', array() );
		wp_enqueue_script( 'nuno-sarmento-pb-base-admin', NUNO_SARMENTO_TEND_PBBASE_URI. 'assets/js/nuno-sarmento-pb-admin-page-builder.js', array( 'jquery', 'jquery-ui-sortable' ), NUNO_SARMENTO_TEND_PBBASE_VERSION, true );
	}
}
