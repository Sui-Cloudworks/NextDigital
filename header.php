<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <div class="site-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div>

        <nav class="main-navigation">
            <ul class="nav-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">ホーム</a></li>
                <li><a href="<?php echo esc_url(home_url('/about')); ?>">会社情報</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">サービス</a></li>
                <li><a href="<?php echo esc_url(home_url('/works')); ?>">実績</a></li>
                <li><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
                <li class="contact-button"><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
            </ul>
        </nav>

        <button class="menu-toggle" aria-controls="mobile-navigation" aria-expanded="false">
            <span class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </span>
            <span class="screen-reader-text">メニュー</span>
        </button>

        <nav class="mobile-navigation">
            <ul class="nav-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">ホーム</a></li>
                <li><a href="<?php echo esc_url(home_url('/about')); ?>">会社情報</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">サービス</a></li>
                <li><a href="<?php echo esc_url(home_url('/works')); ?>">実績</a></li>
                <li><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
                <li class="contact-button"><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
            </ul>
        </nav>
    </div>
</header>

<div id="content" class="site-content">