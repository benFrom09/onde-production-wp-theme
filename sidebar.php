<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onde-production
 */

if (!is_active_sidebar('sidebar-left')) {
	return;
}
?>
<div class="widgets-container">
	<?php dynamic_sidebar('sidebar-left'); ?>
</div>