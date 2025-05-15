<?php
/**
 * Template part for displaying works in an archive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('work-item'); ?>>
    <a href="<?php the_permalink(); ?>" class="work-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('work-thumbnail'); ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/work-default.jpg" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
    </a>
    
    <div class="work-content">
        <?php 
        // カテゴリーを表示
        $terms = get_the_terms(get_the_ID(), 'works_category');
        if ($terms && !is_wp_error($terms)) :
            $term = array_shift($terms);
        ?>
            <span class="work-category"><?php echo esc_html($term->name); ?></span>
        <?php endif; ?>
        
        <h2 class="work-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <div class="work-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="work-link">詳細を見る →</a>
    </div>
</article>