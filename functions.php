<?php
/**
 * Next Digital functions and definitions
 */

if (!function_exists('nextdigital_setup')) {
    function nextdigital_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Add support for custom logo
        add_theme_support('custom-logo', array(
            'height'      => 47,
            'width'       => 200,
            'flex-width'  => true,
            'flex-height' => true,
        ));

        // Register navigation menus
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'nextdigital'),
            'footer'  => esc_html__('Footer Menu', 'nextdigital'),
        ));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for responsive embeds
        add_theme_support('responsive-embeds');

        // Add support for HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ));
    }
}
add_action('after_setup_theme', 'nextdigital_setup');

/**
 * Enqueue scripts and styles.
 */
function nextdigital_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // メインのスタイルシート - コンパイルされたCSSを直接読み込む
    wp_enqueue_style('nextdigital-style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' . time());
    
    // テーマ定義用の元のstyle.cssも読み込む（テーマ情報のみ）
    wp_enqueue_style('nextdigital-original', get_stylesheet_uri(), array(), '1.0.0');
    
    // JavaScript
    wp_enqueue_script('nextdigital-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.0.0', true);
    
    // カスタムスクリプト
    wp_enqueue_script('nextdigital-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nextdigital_scripts');

/**
 * Register custom post types
 */
function nextdigital_register_post_types() {
    // Works (実績) Custom Post Type
    register_post_type('works', array(
        'labels' => array(
            'name'               => '実績',
            'singular_name'      => '実績',
            'menu_name'          => '実績',
            'add_new'            => '新規追加',
            'add_new_item'       => '新規実績を追加',
            'edit_item'          => '実績を編集',
            'new_item'           => '新しい実績',
            'view_item'          => '実績を表示',
            'search_items'       => '実績を検索',
            'not_found'          => '実績が見つかりませんでした',
            'not_found_in_trash' => 'ゴミ箱に実績はありません',
        ),
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => array('slug' => 'works'),
        'menu_icon'   => 'dashicons-portfolio',
        'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
}
add_action('init', 'nextdigital_register_post_types');

/**
 * Register widget area.
 */
function nextdigital_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'nextdigital'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'nextdigital'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area', 'nextdigital'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add footer widgets here.', 'nextdigital'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'nextdigital_widgets_init');

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 */
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
    if ('dns-prefetch' == $relation_type) {
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, array($emoji_svg_url));
    }
    return $urls;
}

/**
 * Excerpt length
 */
function nextdigital_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'nextdigital_excerpt_length', 999);

/**
 * Excerpt more
 */
function nextdigital_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'nextdigital_excerpt_more');

/**
 * Better pre_get_posts
 */
function nextdigital_pre_get_posts($query) {
    if (!is_admin() && $query->is_main_query()) {
        // Archive pages show 12 posts per page
        if ($query->is_archive()) {
            $query->set('posts_per_page', 12);
        }
        
        // Search pages show 10 posts per page
        if ($query->is_search()) {
            $query->set('posts_per_page', 10);
        }
    }
}
add_action('pre_get_posts', 'nextdigital_pre_get_posts');

/**
 * Add ACF options page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'テーマ設定',
        'menu_title' => 'テーマ設定',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
}

/**
 * Load WP-SCSS
 */
if (class_exists('Wp_Scss_Settings')) {
    // Force compile on every page load during development
    add_filter('wp_scss_needs_compiling', '__return_true');
}