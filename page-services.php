<?php
/**
 * Template Name: Services Page
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main services-page">
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
                    
                    <?php
                    // サービスの子ページを取得
                    $services = get_pages(array(
                        'child_of'    => get_the_ID(),
                        'sort_column' => 'menu_order',
                    ));
                    
                    if ($services) :
                        ?>
                        <div class="services-list">
                            <?php foreach ($services as $service) : ?>
                                <div class="service-item">
                                    <?php
                                    // サービスのアイコンを取得（ACFを使用）
                                    $service_icon = '';
                                    if (function_exists('get_field')) {
                                        $service_icon = get_field('service_icon', $service->ID);
                                    }
                                    ?>
                                    
                                    <?php if ($service_icon) : ?>
                                        <div class="service-icon">
                                            <img src="<?php echo esc_url($service_icon); ?>" alt="<?php echo esc_attr($service->post_title); ?>">
                                        </div>
                                    <?php endif; ?>
                                    
                                    <h3 class="service-title"><?php echo esc_html($service->post_title); ?></h3>
                                    
                                    <div class="service-description">
                                        <?php echo wp_kses_post(get_the_excerpt($service->ID)); ?>
                                    </div>
                                    
                                    <a href="<?php echo esc_url(get_permalink($service->ID)); ?>" class="btn btn-outline btn-sm">詳細を見る</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p>サービスの詳細ページがまだありません。</p>
                    <?php endif; ?>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>