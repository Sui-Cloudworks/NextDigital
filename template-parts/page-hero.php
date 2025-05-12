<?php
/**
 * Template part for displaying page hero
 */

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
}
?>

<section class="page-hero">
    <div class="container-inner">
        <h1 class="page-title"><?php echo esc_html($hero_title); ?></h1>
        <?php if (!empty($hero_description)) : ?>
            <p class="page-description"><?php echo esc_html($hero_description); ?></p>
        <?php endif; ?>
    </div>
</section>