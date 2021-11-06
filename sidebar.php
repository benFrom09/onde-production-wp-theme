<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onde-production
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>
<div class="widgets-icons">
	<p>
		<?php echo __('Click on icon below to open the sidebar', 'onde-production'); ?>
	</p>
	<div class="icon-container">
		<i id="open-sidebar-btn" class="fas fa-chevron-down"></i>
	</div>
</div>
<div id="left-widget-area" class="widget-area">
	<div class="close">
		<i id="sidebar-close-btn" class="fas fa-times"></i>
	</div>
	<div class="widgets-container">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>

</div><!-- #secondary -->