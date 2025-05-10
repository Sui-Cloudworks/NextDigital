<?php
// 実績の投稿を6件取得
$works = new WP_Query(array(
    'post_type'      => 'works',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
));
?>

<section class="works-highlight section">
    <div class="container">
        <h2 class="section-title">実績</h2>
        
        <?php if ($works->have_posts()) : ?>
            <div class="works-grid">
                <?php while ($works->have_posts()) : $works->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('works-item'); ?>>
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="works-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="works-title"><?php the_title(); ?></h3>
                            <div class="works-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            
            <div class="works-more">
                <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="btn btn-outline">一覧を見る</a>
            </div>
            
        <?php else : ?>
            <p><?php esc_html_e('実績はまだありません。', 'nextdigital'); ?></p>
        <?php endif; ?>
    </div>
</section>