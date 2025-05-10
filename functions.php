<?php
// 親テーマのスタイルとスクリプトを読み込み
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'my-theme-style', get_stylesheet_directory_uri() . '/css/style.css', array(), filemtime(get_stylesheet_directory() . '/css/style.css') );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// SVGファイルのアップロードを許可
function add_svg_to_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

// SVGセキュリティ対策
function fix_svg_upload_sanitization($data, $file, $filename, $mimes) {
    if (isset($data['ext']) && $data['ext'] === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['proper_filename'] = $filename;
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_upload_sanitization', 10, 4);  

// テーマサポートを追加
function nexusdigital_setup() {
    // タイトルタグのサポート
    add_theme_support('title-tag');
    
    // アイキャッチ画像のサポート
    add_theme_support('post-thumbnails');
    
    // メニューの登録
    register_nav_menus(array(
        'header-menu' => 'ヘッダーメニュー',
        'footer-menu' => 'フッターメニュー',
        'services-menu' => 'サービスメニュー'
    ));
}
add_action('after_setup_theme', 'nexusdigital_setup');

// スタイルシートとスクリプトの読み込み
function nexusdigital_scripts() {
    wp_enqueue_style('nexusdigital-style', get_stylesheet_uri());
    wp_enqueue_style('nexusdigital-main-style', get_template_directory_uri() . '/css/style.css');
    
    // 必要に応じてJavaScriptを追加
    wp_enqueue_script('nexusdigital-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'nexusdigital_scripts');

// カスタム投稿タイプの登録（実績用）
function nexusdigital_custom_post_types() {
    register_post_type('works', 
        array(
            'labels' => array(
                'name' => '実績',
                'singular_name' => '実績'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'rewrite' => array('slug' => 'works')
        )
    );
}
add_action('init', 'nexusdigital_custom_post_types');
?>