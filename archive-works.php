<?php get_header(); ?>

<main id="primary" class="site-main works-archive">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">実績</h1>
        </header>

        <div class="works-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('works-item'); ?>>
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="works-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            <h2 class="works-title"><?php the_title(); ?></h2>
                            <div class="works-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
                
                <?php the_posts_pagination(); ?>
                
            <?php else : ?>
                <p><?php esc_html_e('実績が見つかりませんでした。', 'nextdigital'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>