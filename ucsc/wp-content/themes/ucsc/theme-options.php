<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'ucsc_options', 'ucsc_theme_options', 'theme_options_validate' );

	add_action( 'admin_enqueue_scripts', 'ucsc_color_picker' );
}

function ucsc_color_picker( $hook_suffix ) {
	// first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'ucsc-theme-scripts', get_stylesheet_directory_uri() . '/js/admin-scripts.js', array( 'wp-color-picker' ), false, true );
	wp_enqueue_media();
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'ucsc' ), __( 'Theme Options', 'ucsc' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . __( ' ucsc Theme Options', 'ucsc' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'ucsc' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'ucsc_options' ); ?>
			<?php $options = get_option( 'ucsc_theme_options' ); ?>

			<table class="form-table" style="max-width: 800px;">
				<tr valign="top"><th scope="row"><?php _e( 'Logo', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_logo" class="regular-text" type="text" name="ucsc_theme_options[logo]" value="<?php esc_attr_e( $options['logo'] ); ?>" /><input id="button_ucsc_theme_options_logo" class="meta_upload" name="button_ucsc_theme_options[logo]" type="button" value="Upload" style="width: auto;" />
					<label class="description" for="ucsc_theme_options_logo"><?php _e( 'Insert website logo', 'ucsc' ); ?></label>
					<?php if($options['logo'] ) { ?><br /><img src="<?php echo $options['logo']; ?>" style="max-width: 200px" /><?php } ?>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Footer Logo', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_footer_logo" class="regular-text" type="text" name="ucsc_theme_options[footer_logo]" value="<?php esc_attr_e( $options['footer_logo'] ); ?>" /><input id="button_ucsc_theme_options_footer_logo" class="meta_upload" name="button_ucsc_theme_options[footer_logo]" type="button" value="Upload" style="width: auto;" />
					<label class="description" for="ucsc_theme_options_footer_logo"><?php _e( 'Insert footer logo', 'ucsc' ); ?></label>
					<?php if($options['footer_logo'] ) { ?><br /><img src="<?php echo $options['footer_logo']; ?>" style="max-width: 200px" /><?php } ?>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Copyright Info', 'ucsc' ); ?></th>
					<td>
						<?php $settings = array('media_buttons'=>false,'textarea_rows'=>'5');
								wp_editor( $options['copy_info'], 'ucsc_theme_options[copy_info]', $settings ); ?>
					<label class="description" for="ucsc_theme_options[copy_info]"><?php _e( 'Add Copyright Info', 'ucsc' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Email', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_email" class="regular-text" type="text" name="ucsc_theme_options[email]" value="<?php esc_attr_e( $options['email'] ); ?>" />
					<label class="description" for="ucsc_theme_options_email"><?php _e( 'Insert Email link', 'ucsc' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><td colspan="2"><hr /></td></tr>
				<tr valign="top"><th scope="row"><?php _e( 'Facebook', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_fb" class="regular-text" type="text" name="ucsc_theme_options[fb]" value="<?php esc_attr_e( $options['fb'] ); ?>" />
					<label class="description" for="ucsc_theme_options_fb"><?php _e( 'Insert facebook link', 'ucsc' ); ?></label>
					</td>
				</tr>		
				<tr valign="top"><th scope="row"><?php _e( 'Youtube', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_youtube" class="regular-text" type="text" name="ucsc_theme_options[youtube]" value="<?php esc_attr_e( $options['youtube'] ); ?>" />
					<label class="description" for="ucsc_theme_options_youtube"><?php _e( 'Insert Youtube link', 'ucsc' ); ?></label>
					</td>
				</tr>		
				<tr valign="top"><th scope="row"><?php _e( 'Twitter', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_twitter" class="regular-text" type="text" name="ucsc_theme_options[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" />
					<label class="description" for="ucsc_theme_options_twitter"><?php _e( 'Insert Twitter link', 'ucsc' ); ?></label>
					</td>
				</tr>	
<!--
				<tr valign="top"><th scope="row"><?php _e( 'Google+', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_gplus" class="regular-text" type="text" name="ucsc_theme_options[gplus]" value="<?php esc_attr_e( $options['gplus'] ); ?>" />
					<label class="description" for="ucsc_theme_options_gplus"><?php _e( 'Insert Google+ link', 'ucsc' ); ?></label>
					</td>
				</tr>		
-->
				<tr valign="top"><th scope="row"><?php _e( 'Instagram', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_instagram" class="regular-text" type="text" name="ucsc_theme_options[instagram]" value="<?php esc_attr_e( $options['instagram'] ); ?>" />
					<label class="description" for="ucsc_theme_options_instagram"><?php _e( 'Insert Instagram link', 'ucsc' ); ?></label>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Pinterest', 'ucsc' ); ?></th>
					<td>
						<input id="ucsc_theme_options_pinterest" class="regular-text" type="text" name="ucsc_theme_options[pinterest]" value="<?php esc_attr_e( $options['pinterest'] ); ?>" />
					<label class="description" for="ucsc_theme_options_pinterest"><?php _e( 'Insert Pinterest link', 'ucsc' ); ?></label>
					</td>
				</tr>			

			</table>
            
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'ucsc' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {

	$input['copyright'] = $input['copyright'];
	$input['facebook'] = $input['facebook'];
	$input['instagram'] = $input['instagram'];


	// Say our textarea option must be safe text with the allowed tags for posts
	//$input['textarea'] = wp_filter_post_kses( $input['textarea'] );

	return $input;
}
?>