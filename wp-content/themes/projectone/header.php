<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header" role="banner" style="background: #333; color: #fff; display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
    
    <div class="site-logo">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo home_url('/wp-content/uploads/2024/04/Artboard-2-300x118.png'); ?>" alt="<?php bloginfo('name'); ?>" style="height: auto;">
        </a>
    </div>

    <nav id="site-navigation" class="main-navigation" role="navigation" style="display: flex;">
        <?php wp_nav_menu( array( 
            'theme_location' => 'primary', 
            'menu_id' => 'primary-menu',
            'container' => false, 
        )); ?>
    </nav>

    <?php if ( class_exists( 'WooCommerce' ) ): ?>
    <div class="header-cart" style="order: 3;">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'textdomain' ); ?>" style="color: #fff; text-decoration: none;">
            <span class="cart-icon" style="margin-right: 10px;">🛒</span>
            <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        </a>
    </div>
    <?php endif; ?>

</header>

<div id="content" class="site-content">
