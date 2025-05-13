<?php
/**
 * Template part for displaying page hero
 *
 * @param array $args {
 *     Optional. Arguments to customize hero section.
 *
 *     @type string $default_description The default description to use if no ACF value exists.
 * }
 */

// 引数が渡された場合の処理
$default_description = isset($args['default_description']) ? $args['default_description'] : '';

// ページタイトルの取得（ACFフィールドがあればそれを使用、なければページタイトルを使用）
$hero_title = '';
if (function_exists('get_field') && get_field('hero_title')) {
    $hero_title = get_field('hero_title');
} else {
    $hero_title = get_the_title();
}

// 説明文の取得
$hero_description = '';
if (function_exists('get_field') && get_field('hero_description')) {
    $hero_description = get_field('hero_description');
} elseif (!empty($default_description)) {
    // ACFがない場合、または値が設定されていない場合は、デフォルト値を使用
    $hero_description = $default_description;
}
?>

<section class="page-hero">
    <div class="container">
        <h1 class="page-title"><?php echo esc_html($hero_title); ?></h1>
        <?php if (!empty($hero_description)) : ?>
            <p class="page-description"><?php echo esc_html($hero_description); ?></p>
        <?php endif; ?>
    </div>
</section>