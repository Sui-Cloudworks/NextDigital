<?php
/**
 * The template for displaying works archive
 */

get_header();
?>

<main id="primary" class="site-main works-archive">
    <!-- ページヒーローセクション -->
    <section class="page-hero">
        <div class="container">
            <h1 class="page-title">実績</h1>
            <p class="page-description">Nexus Digitalがこれまでに手がけた主な実績をご紹介します。様々な業界のお客様のデジタル変革を支援してきました。</p>
        </div>
    </section>

    <!-- 実績一覧セクション -->
    <section class="works-list">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="works-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content-works');
                    endwhile;
                    ?>
                </div>

                <?php
                // ページネーション
                the_posts_pagination(array(
                    'prev_text' => '前へ',
                    'next_text' => '次へ',
                    'mid_size' => 2,
                ));
                ?>

            <?php else : ?>
                <p class="no-works">実績が見つかりませんでした。</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <?php 
    $contact_args = array(
        'title'       => 'お客様の課題解決をサポートします',
        'description' => 'Nexus Digitalは、お客様のビジネス課題に合わせた最適なデジタルソリューションを提供します。まずはお気軽にご相談ください。',
    );
    get_template_part('template-parts/contact-cta', null, $contact_args);
    ?>
</main>

<?php get_footer(); ?>