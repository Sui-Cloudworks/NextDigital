<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <!-- ロゴ画像またはテキスト -->
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        
        <nav class="header-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_class' => 'nav-menu',
                'container' => false
            ));
            ?>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="contact-button">お問い合わせ</a>
        </nav>
    </div>
</header>