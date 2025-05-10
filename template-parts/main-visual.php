<?php
// ACFが有効な場合、メインビジュアルのカスタムフィールドを取得
$main_visual_image = '';
$main_title = '';
$sub_title = '';

if (function_exists('get_field')) {
    $main_visual_image = get_field('main_visual_image');
    $main_title = get_field('main_title');
    $sub_title = get_field('sub_title');
}
?>

<section class="main-visual">
    <?php if ($main_visual_image) : ?>
        <div class="main-visual-image" style="background-image: url('<?php echo esc_url($main_visual_image); ?>');">
    <?php else : ?>
        <div class="main-visual-image">
    <?php endif; ?>
        <div class="main-visual-content">
            <?php if ($main_title) : ?>
                <h1 class="main-title"><?php echo esc_html($main_title); ?></h1>
            <?php else : ?>
                <h1 class="main-title"><?php bloginfo('name'); ?></h1>
            <?php endif; ?>
            
            <?php if ($sub_title) : ?>
                <p class="sub-title"><?php echo esc_html($sub_title); ?></p>
            <?php else : ?>
                <p class="sub-title"><?php bloginfo('description'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>