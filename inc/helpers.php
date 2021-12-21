<?php
/**
 *  Menu items - Add "Custom sub-menu" in menu item render output
 *  if menu item has class "menu-item-target"
 */
/*
add_filter( 'walker_nav_menu_start_el', 'wpdocs_menu_item_custom_output', 10, 4 );
function wpdocs_menu_item_custom_output( $item_output, $item, $depth, $args ) {
 
    $menu_item_classes = $item->classes;
    if ( empty( $menu_item_classes ) || !in_array( 'menu-item-has-children', $menu_item_classes ) ) {
        return $item_output;
    }
 
    ob_start(); 
    ?>
    <span class="sub-menu-arrow-btn">&#9660</span>
    <?php
    $custom_sub_menu_html = ob_get_clean();
 
    // Append after <a> element of the menu item targeted
    $item_output .= $custom_sub_menu_html;
 
    return $item_output;
}