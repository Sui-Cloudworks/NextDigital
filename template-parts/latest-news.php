<?php
// 最新のお知らせ3件を取得
$latest_news = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
));
?>

<section class="latest-news section">
    <div class="container">
        <h2 class="section-title">お知らせ</h2>
        
        <?php if ($latest_news->have_posts()) : ?>
            <div class="news-grid">
                <?php while ($latest_news->have_posts()) : $latest_news->the_post(); ?>
                    <article class="news-item">
                        <div class="news-meta">
                            <time class="news-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        </div>
                        <h3 class="news-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="news-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            
            <div class="news-more">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline">一覧を見る</a>
            </div>
            
        <?php else : ?>
            <p><?php esc_html_e('お知らせはまだありません。', 'nextdigital'); ?></p>
        <?php endif; ?>
    </div>
</section>