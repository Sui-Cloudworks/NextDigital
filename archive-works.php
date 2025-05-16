<?php
/**
 * The template for displaying works archive
 * Template Name: Works Page
 * Template Post Type: page
 *
 * 実績一覧のページ
 */

// ページIDは取得しておく（ACFフィールド用）
$current_page_id = get_the_ID();

// タイトルは固定値を使用
$current_page_title = '実績';

// ACFフィールドの取得
$hero_description = '';
if (function_exists('get_field')) {
    $hero_description = get_field('hero_description', $current_page_id);
}

get_header();
?>

<main id="primary" class="site-main works-archive">
    <!-- ハードコードされたヒーローセクション（タイトルを「実績」に固定） -->
    <section class="page-hero">
        <div class="container-inner">
            <h1 class="page-title">実績</h1>
            <?php if (!empty($hero_description)) : ?>
                <p class="page-description"><?php echo esc_html($hero_description); ?></p>
            <?php else : ?>
                <p class="page-description">Nexus Digitalがこれまでに手がけた主な実績をご紹介します。様々な業界のお客様のデジタル変革を支援してきました。</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- 実績一覧セクション -->
    <section class="works-list">
        <div class="container">
            <?php
            // カスタムクエリで実績投稿を取得
            $works_query = new WP_Query(array(
                'post_type'      => 'works',
                'posts_per_page' => 10,
                'post_status'    => 'publish'
            ));
            
            if ($works_query->have_posts()) : 
            ?>
                <div class="works-grid">
                    <?php
                    while ($works_query->have_posts()) :
                        $works_query->the_post();
                        get_template_part('template-parts/content-works');
                    endwhile;
                    ?>
                </div>

                <?php
                // ページネーション
                echo paginate_links(array(
                    'total'      => $works_query->max_num_pages,
                    'prev_text'  => '前へ',
                    'next_text'  => '次へ',
                    'mid_size'   => 2,
                ));
                ?>

            <?php else : ?>
                <p class="no-works">実績が見つかりませんでした。</p>
            <?php endif; ?>
            
            <?php 
            // 元のクエリに戻す
            wp_reset_postdata();
            ?>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <?php get_template_part('template-parts/contact-cta'); ?>
</main>

<?php get_footer(); ?>