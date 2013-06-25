<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post, $woocommerce;

?>
<div class="et_images">
<?php
	$thumb = '';
	$width = (int) apply_filters( 'et_single_product_image_width', 280 );
	$height = (int) apply_filters( 'et_single_product_image_height', 231 );
	$classtext = '';
	$titletext = get_the_title();
	$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'SingleProductImage' );
	$thumb = $thumbnail["thumb"];

	if ( '' != $thumb )
		print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext );
?>

	<?php do_action('woocommerce_product_thumbnails'); ?>

</div>