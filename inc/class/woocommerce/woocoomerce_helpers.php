<?php



if (!function_exists('onde_get_woocommerce_product_categories')) {

    function onde_get_woocommerce_product_categories():array
    {
        $onde_shop_product_categories = [];
        $product_categories = get_categories( array(
            'taxonomy'     => 'product_cat',
            'orderby'      => 'name',
            'pad_counts'   => false,
            'hierarchical' => 1,
            'hide_empty'   => false
        ) );

        $product_categories = get_terms($product_categories);
        foreach($product_categories as $product) {
            if($product->taxonomy === 'product_cat') {
                $onde_shop_product_categories[] = $product;
            }
        }
        return $onde_shop_product_categories;
    }
}


if(!function_exists('onde_get_woocommerce_sidebar')) {

    function onde_get_woocommerce_sidebar() {

        dynamic_sidebar('sidebar-woocommerce');
    }
}
