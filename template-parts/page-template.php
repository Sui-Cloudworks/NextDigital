<?php
/**
 * Template Name: Standard Page Template
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main standard-page">
    <!-- ページヒーローセクション -->
    <?php get_template_part('template-parts/page-hero'); ?>

    <!-- メインコンテンツ -->
    <section class="page-content">
        <div class="container-inner">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>