<?php

// Hook into WordPress
add_action( 'admin_init', 'add_custom_metabox' );
add_action( 'save_post', 'save_custom_url' );

/**
 * Add meta box
 */
function add_custom_metabox() {
	add_meta_box( 'featured-metabox', __( 'Frontpage Featured Slider' ), 'url_custom_metabox', 'slider', 'normal', 'low' );
}

/**
 * Display the metabox
 */
function url_custom_metabox() {
	global $post;
	$feature_url = get_post_meta( $post->ID, 'feature_url', true );
	$feature_bg = get_post_meta( $post->ID, 'feature_bg', true );
	
	?>

	<p><label for="feature_url"><strong>Link to</strong> (eg. http://yoursite.com/reviews/dead-space-2):<br />
		<input id="feature_url" size="65" name="feature_url" value="<?php if( $feature_url ) { echo $feature_url; } ?>" /></label></p>
	<p><label for="feature_bg"><strong>Background color</strong> (eg. #000000):<br />
		<input id="feature_bg" size="9" name="feature_bg" value="<?php if( $feature_bg ) { echo $feature_bg; } ?>" /></label></p>
<?php
}


/**
 * Process the custom metabox fields
 */
function save_custom_url( $post_id ) {
	global $post;	

	if( $_POST ) {
		update_post_meta( $post->ID, 'feature_url', $_POST['feature_url'] );
		update_post_meta( $post->ID, 'feature_bg', $_POST['feature_bg'] );
	}
}

/**
 * Get and return the values for the URL and description
 */
function get_url_desc_box() {
	global $post;
	$feature_url = get_post_meta( $post->ID, 'feature_url', true );
	$feature_bg = get_post_meta( $post->ID, 'feature_bg', true );

	return array( $feature_url, $feature_bg );
}
?>