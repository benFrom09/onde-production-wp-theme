<a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="header-cart-amount">
		<?php echo sprintf( _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'onde-production'), WC()->cart->get_cart_contents_count() );?> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?>
	</span>
	<span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
		<span><?php esc_html_e('Checkout', 'onde-production'); ?></span> <i class="fas fa-shopping-cart"></i>
	</span>
</a>