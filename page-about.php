<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main about-page">
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
                        <!-- 会社情報セクション -->
                        <section class="company-info">
                            <h2>会社情報</h2>
                            <table class="company-info-table">
                                <?php if (get_field('company_name')) : ?>
                                    <tr>
                                        <th>会社名</th>
                                        <td><?php echo esc_html(get_field('company_name')); ?></td>
                                    </tr>
                                <?php endif; ?>
                                
                                <?php if (get_field('established')) : ?>
                                    <tr>
                                        <th>設立</th>
                                        <td><?php echo esc_html(get_field('established')); ?></td>
                                    </tr>
                                <?php endif; ?>
                                
                                <?php if (get_field('representative')) : ?>
                                    <tr>
                                        <th>代表者</th>
                                        <td><?php echo esc_html(get_field('representative')); ?></td>
                                    </tr>
                                <?php endif; ?>
                                
                                <?php if (get_field('capital')) : ?>
                                    <tr>
                                        <th>資本金</th>
                                        <td><?php echo esc_html(get_field('capital')); ?></td>
                                    </tr>
                                <?php endif; ?>
                                
                                <?php if (get_field('employees')) : ?>
                                    <tr>
                                        <th>従業員数</th>
                                        <td><?php echo esc_html(get_field('employees')); ?></td>
                                    </tr>
                                <?php endif; ?>
                                
                                <?php if (get_field('business_content')) : ?>
                                    <tr>
                                        <th>事業内容</th>
                                        <td><?php echo nl2br(esc_html(get_field('business_content'))); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </section>
                        
                        <!-- アクセスセクション -->
                        <section class="access-info">
                            <h2>アクセス</h2>
                            <?php if (get_field('address')) : ?>
                                <p class="address"><?php echo nl2br(esc_html(get_field('address'))); ?></p>
                            <?php endif; ?>
                            
                            <?php if (get_field('map_embed')) : ?>
                                <div class="map-container">
                                    <?php echo get_field('map_embed'); ?>
                                </div>
                            <?php endif; ?>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>