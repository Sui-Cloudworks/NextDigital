<?php get_header(); ?>

<main id="primary" class="site-main front-page">
    <?php
    while (have_posts()) :
        the_post();
        
        // メインビジュアル
        get_template_part('template-parts/main-visual');
        
        // コンテンツ
        the_content();
        
        // 最新のお知らせ
        get_template_part('template-parts/latest-news');
        
        // 提供サービス
        get_template_part('template-parts/services-overview');
        
        // 実績ハイライト
        get_template_part('template-parts/works-highlight');
        
    endwhile;
    ?>
</main>

<?php get_footer(); ?>