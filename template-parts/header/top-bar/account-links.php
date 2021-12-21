<div class="account-link">
	<?php if ( is_user_logged_in() ) { ?>
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('My Account','onde-production'); ?></a>
	<?php } else { ?>
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('Sign In | Register','onde-production'); ?></a>
	<?php } ?>
</div>