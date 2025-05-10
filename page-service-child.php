<?php
/**
 * Template Name: Service Child Page
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main service-page">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="container">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </div>
            </header>

            <div class="entry-content">
                <div class="container">
                    <?php the_content(); ?>
                    
                    <?php if (function_exists('get_field')) : ?>
                        <!-- サービスの特徴 -->
                        <?php
                        $features = get_field('service_features');
                        if ($features) :
                            ?>
                            <section class="service-features">
                                <h2>サービスの特徴</h2>
                                <div class="feature-list">
                                    <?php foreach ($features as $feature) : ?>
                                        <div class="feature-item">
                                            <?php if (!empty($feature['icon'])) : ?>
                                                <div class="feature-icon">
                                                    <img src="<?php echo esc_url($feature['icon']); ?>" alt="<?php echo esc_attr($feature['title']); ?>">
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="feature-content">
                                                <h3><?php echo esc_html($feature['title']); ?></h3>
                                                <p><?php echo esc_html($feature['description']); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </section>
                        <?php endif; ?>
                        
                        <!-- 関連実績 -->
                        <?php
                        $related_works = get_field('related_works');
                        if ($related_works) :
                            ?>
                            <section class="related-works">
                                <h2>関連実績</h2>
                                <div class="works-grid">
                                    <?php foreach ($related_works as $post) :
                                        setup_postdata($post);
                                        ?>
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
                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </section>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <!-- お問い合わせセクション -->
                    <section class="service-cta">
                        <h2>お問い合わせ</h2>
                        <p>このサービスについてのご質問や、導入のご相談など、お気軽にお問い合わせください。</p>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent">お問い合わせはこちら</a>
                    </section>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>