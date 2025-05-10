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
    
    // Main stylesheet
    wp_enqueue_style('nextdigital-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // JavaScript - パスを修正
    wp_enqueue_script('nextdigital-navigation', get_template_directory_uri() . '/navigation.js', array(), '1.0.0', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nextdigital_scripts');

/**
 * Custom template tags for this theme.
 */
$template_tags_file = get_template_directory() . '/inc/template-tags.php';
if (file_exists($template_tags_file)) {
    require $template_tags_file;
} else {
    // template-tags.php がない場合は、基本的な関数を定義
    if (!function_exists('nextdigital_posted_on')) {
        function nextdigital_posted_on() {
            echo '<span class="posted-on">' . get_the_date() . '</span>';
        }
    }
    
    if (!function_exists('nextdigital_posted_by')) {
        function nextdigital_posted_by() {
            echo '<span class="byline">by ' . get_the_author() . '</span>';
        }
    }
}

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
 * Create navigation.js file if it doesn't exist
 */
if (!file_exists(get_template_directory() . '/navigation.js')) {
    $navigation_js = "/**\n * File navigation.js.\n * Handles toggling the navigation menu for small screens.\n */\n( function() {\n\t// Mobile menu toggle\n\tconst menuToggle = document.querySelector('.menu-toggle');\n\tconst mobileNav = document.querySelector('.mobile-navigation');\n\t\n\tif (menuToggle && mobileNav) {\n\t\tmenuToggle.addEventListener('click', function() {\n\t\t\tthis.classList.toggle('active');\n\t\t\tmobileNav.classList.toggle('active');\n\t\t\tdocument.body.classList.toggle('menu-open');\n\t\t});\n\t}\n} )();\n";
    file_put_contents(get_template_directory() . '/navigation.js', $navigation_js);
}