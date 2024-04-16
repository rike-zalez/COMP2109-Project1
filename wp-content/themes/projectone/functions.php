<?php
function miniature_paints_shop_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'miniature_paints_shop_setup');

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'miniature-paints-shop'),
            'footer-menu' => __('Footer Menu', 'miniature-paints-shop')
        )
    );
}
add_action('init', 'register_my_menus');

function miniature_paints_shop_scripts() {
    wp_enqueue_style('main-css', get_stylesheet_uri());
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'miniature_paints_shop_scripts');

function featured_product_shortcode() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 1,
        'meta_key' => '_featured',
        'meta_value' => 'yes'
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        while ($loop->have_posts()) : $loop->the_post();
            wc_get_template_part('content', 'product');
        endwhile;
    } else {
        echo '<p>No featured products found</p>';
    }
    wp_reset_postdata();
}
add_shortcode('featured_product', 'featured_product_shortcode');



?>