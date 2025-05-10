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

// テーマサポート機能の追加
function my_theme_setup() {
    // カスタムロゴのサポート
    add_theme_support('custom-logo', array(
        'height'      => 47,
        'width'       => 89.06,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

?>

