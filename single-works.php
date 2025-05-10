<?php get_header(); ?>

<main id="primary" class="site-main single-works">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <div class="works-meta">
                    <?php
                    // カスタムフィールドの表示（Advanced Custom Fieldsプラグインを使用）
                    if (function_exists('get_field')) :
                        // クライアント名
                        $client = get_field('client');
                        if ($client) :
                            ?>
                            <div class="works-client">
                                <span class="meta-label">クライアント:</span>
                                <span class="meta-value"><?php echo esc_html($client); ?></span>
                            </div>
                            <?php
                        endif;

                        // サービスカテゴリ
                        $service_category = get_field('service_category');
                        if ($service_category) :
                            ?>
                            <div class="works-category">
                                <span class="meta-label">カテゴリ:</span>
                                <span class="meta-value"><?php echo esc_html($service_category); ?></span>
                            </div>
                            <?php
                        endif;

                        // URL
                        $url = get_field('url');
                        if ($url) :
                            ?>
                            <div class="works-url">
                                <span class="meta-label">URL:</span>
                                <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($url); ?></a>
                            </div>
                            <?php
                        endif;
                    endif;
                    ?>
                </div>

                <nav class="works-navigation">
                    <div class="nav-previous"><?php previous_post_link('%link', '前の実績'); ?></div>
                    <div class="works-archive-link"><a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>">一覧に戻る</a></div>
                    <div class="nav-next"><?php next_post_link('%link', '次の実績'); ?></div>
                </nav>
            </article>
            
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>