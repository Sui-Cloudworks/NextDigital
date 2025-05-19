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
 * 実績のカスタム投稿タイプとタクソノミーを登録
 */
function nextdigital_register_works_post_type() {
    // 実績の投稿タイプ
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
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-portfolio',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'works'),
    ));

    // 実績のカテゴリー
    register_taxonomy('works_category', 'works', array(
        'labels' => array(
            'name'              => '実績カテゴリー',
            'singular_name'     => '実績カテゴリー',
            'search_items'      => '実績カテゴリーを検索',
            'all_items'         => 'すべての実績カテゴリー',
            'parent_item'       => '親カテゴリー',
            'parent_item_colon' => '親カテゴリー:',
            'edit_item'         => 'カテゴリーを編集',
            'update_item'       => 'カテゴリーを更新',
            'add_new_item'      => '新規カテゴリーを追加',
            'new_item_name'     => '新しいカテゴリー名',
            'menu_name'         => 'カテゴリー',
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'works-category'),
    ));
}
add_action('init', 'nextdigital_register_works_post_type');

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

/**
 * 実績用のサムネイルサイズを登録
 */
function nextdigital_add_image_sizes() {
    // 既存の設定
    add_image_size('work-thumbnail', 363, 256, true);
    
    // 実績詳細ページ用の追加設定
    add_image_size('work-large', 896, 896, false);
    add_image_size('gallery-thumb', 288, 288, true);
}
add_action('after_setup_theme', 'nextdigital_add_image_sizes');

/**
 * 実績詳細用のACFフィールド
 */
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_works_details',
        'title' => '実績詳細情報',
        'fields' => array(
            // メタ情報
            array(
                'key' => 'field_project_date',
                'label' => 'プロジェクト日付',
                'name' => 'project_date',
                'type' => 'text',
                'instructions' => '例: 2022年10月',
            ),
            array(
                'key' => 'field_client_name',
                'label' => '取引先名',
                'name' => 'client_name',
                'type' => 'text',
            ),
            
            // 概要・課題
            array(
                'key' => 'field_work_summary',
                'label' => '概要',
                'name' => 'work_summary',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_work_challenge',
                'label' => '課題',
                'name' => 'work_challenge',
                'type' => 'wysiwyg',
            ),
            
            // ソリューション（個別フィールド）
            array(
                'key' => 'field_solution_1',
                'label' => 'ソリューション1',
                'name' => 'solution_1',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_solution_2',
                'label' => 'ソリューション2',
                'name' => 'solution_2',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_solution_3',
                'label' => 'ソリューション3',
                'name' => 'solution_3',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_solution_4',
                'label' => 'ソリューション4',
                'name' => 'solution_4',
                'type' => 'wysiwyg',
            ),
            array(
                'key' => 'field_solution_5',
                'label' => 'ソリューション5',
                'name' => 'solution_5',
                'type' => 'wysiwyg',
            ),
            
            // プロジェクト画像
            array(
                'key' => 'field_work_gallery_1',
                'label' => '画像1',
                'name' => 'work_gallery_1',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_work_gallery_2',
                'label' => '画像2',
                'name' => 'work_gallery_2',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_work_gallery_3',
                'label' => '画像3',
                'name' => 'work_gallery_3',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_work_gallery_4',
                'label' => '画像4',
                'name' => 'work_gallery_4',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_work_gallery_5',
                'label' => '画像5',
                'name' => 'work_gallery_5',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_work_gallery_6',
                'label' => '画像6',
                'name' => 'work_gallery_6',
                'type' => 'image',
                'return_format' => 'array',
            ),
            
            // 成果（個別フィールド）
            array(
                'key' => 'field_result_1',
                'label' => '成果1',
                'name' => 'result_1',
                'type' => 'text',
            ),
            array(
                'key' => 'field_result_2',
                'label' => '成果2',
                'name' => 'result_2',
                'type' => 'text',
            ),
            array(
                'key' => 'field_result_3',
                'label' => '成果3',
                'name' => 'result_3',
                'type' => 'text',
            ),
            array(
                'key' => 'field_result_4',
                'label' => '成果4',
                'name' => 'result_4',
                'type' => 'text',
            ),
            array(
                'key' => 'field_result_5',
                'label' => '成果5',
                'name' => 'result_5',
                'type' => 'text',
            ),
            
            // お客様の声
            array(
                'key' => 'field_client_testimonial',
                'label' => 'お客様の声',
                'name' => 'client_testimonial',
                'type' => 'textarea',
            ),
            array(
                'key' => 'field_client_position',
                'label' => '部署・役職',
                'name' => 'client_position',
                'type' => 'text',
            ),
            array(
                'key' => 'field_client_person',
                'label' => '担当者名',
                'name' => 'client_person',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'works',
                ),
            ),
        ),
    ));

    /**
     * お知らせページ用の画像サイズを登録
     * functions.php に追加
     */
    
    // カスタム画像サイズを追加
    function nextdigital_custom_image_sizes() {
        // お知らせ一覧用のサムネイルサイズ（496x192）
        add_image_size('news-thumbnail', 496, 192, true);
    }
    add_action('after_setup_theme', 'nextdigital_custom_image_sizes');

    // 管理画面の画像サイズ選択に追加
    function nextdigital_custom_image_sizes_names($sizes) {
        return array_merge($sizes, array(
            'news-thumbnail' => __('お知らせサムネイル', 'nextdigital'),
        ));
    }
    add_filter('image_size_names_choose', 'nextdigital_custom_image_sizes_names');

    /**
     * お知らせページ用のスクリプトを登録
     * functions.php に追加
     */
    
    // スクリプトの登録と読み込み
    function nextdigital_news_scripts() {
        // お知らせページの場合のみ読み込み
        if (is_page_template('page-news.php') || is_category('news')) {
            // お知らせカード用スクリプト
            wp_enqueue_script(
                'nextdigital-news-cards',
                get_template_directory_uri() . '/js/news-cards.js',
                array(), // 依存関係なし
                filemtime(get_template_directory() . '/js/news-cards.js'), // バージョン（ファイル更新時に自動更新）
                true // フッターで読み込み
            );
        }
    }
    add_action('wp_enqueue_scripts', 'nextdigital_news_scripts');

    /**
 * 管理画面の「投稿」メニューを「お知らせ投稿」に変更する
 */
function nextdigital_change_post_menu_label() {
    global $menu;
    global $submenu;
    
    // メインメニューの「投稿」を「お知らせ投稿」に変更
    $menu[5][0] = 'お知らせ投稿';
    
    // サブメニューの「投稿」を「お知らせ一覧」に変更
    if(isset($submenu['edit.php'])) {
        $submenu['edit.php'][5][0] = 'お知らせ一覧';
        $submenu['edit.php'][10][0] = '新規お知らせ追加';
    }
}
add_action('admin_menu', 'nextdigital_change_post_menu_label');

/**
 * 管理画面の「投稿」関連のラベルを変更する
 */
function nextdigital_change_post_object_label() {
    global $wp_post_types;
    
    // 「投稿」を「お知らせ」に置き換える
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'お知らせ';
    $labels->singular_name = 'お知らせ';
    $labels->add_new = '新規お知らせを追加';
    $labels->add_new_item = '新規お知らせを追加';
    $labels->edit_item = 'お知らせを編集';
    $labels->new_item = '新規お知らせ';
    $labels->view_item = 'お知らせを表示';
    $labels->search_items = 'お知らせを検索';
    $labels->not_found = 'お知らせが見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱にお知らせはありません';
    $labels->menu_name = 'お知らせ投稿';
}
add_action('init', 'nextdigital_change_post_object_label');

/**
 * 管理画面に投稿ページのスタイルをカスタマイズするためのCSS追加
 */
function nextdigital_admin_post_styles() {
    // 投稿画面のみに適用するスタイル
    echo '<style>
        /* 投稿メニューアイコンの色を変更 */
        #adminmenu .menu-icon-post div.wp-menu-image:before {
            color: #9333EA !important;
        }
        
        /* 投稿一覧ページのヘッダーをカスタマイズ */
        .post-type-post .wrap h1.wp-heading-inline {
            position: relative;
            padding-left: 25px;
        }
        
        .post-type-post .wrap h1.wp-heading-inline:before {
            content: "📢";
            position: absolute;
            left: 0;
        }
    </style>';
}
add_action('admin_head', 'nextdigital_admin_post_styles');
}