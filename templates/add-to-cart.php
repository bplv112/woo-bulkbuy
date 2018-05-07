<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );
$cart = WC()->instance()->cart;
$count = "0";

if ( $product->is_in_stock() ) : ?>


	<form class="cart" action="" method="post" enctype='multipart/form-data' id="<?php echo get_the_ID(); ?>">
		<?php
 		   
            echo woocommerce_quantity_input(array(
                                'input_name'    => "quickbuy-".get_the_ID(),
                                'max_value'     => $product->get_max_purchase_quantity(),
                                'min_value'     => '0',
                                'product_name'  => $product->get_name(),
                            ), $product, false );
		?>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	</form>


<?php endif; ?>
