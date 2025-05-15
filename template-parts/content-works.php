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
        // カテゴリーを表示（文字数制限付き）
        $terms = get_the_terms(get_the_ID(), 'works_category');
        if ($terms && !is_wp_error($terms)) :
            $term = array_shift($terms);
            // 文字数を20文字に制限し、超える場合は...を追加
            $term_name = mb_strimwidth($term->name, 0, 20, '...');
        ?>
            <span class="work-category"><?php echo esc_html($term_name); ?></span>
        <?php endif; ?>
        
        <h2 class="work-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <div class="work-excerpt">
            <?php 
            // ACFフィールドの work_summary を表示
            if (function_exists('get_field') && get_field('work_summary')) :
                echo wp_kses_post(get_field('work_summary'));
            else :
                // ACFフィールドがない場合は通常の抜粋を表示（フォールバック）
                the_excerpt();
            endif;
            ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="work-link">詳細を見る →</a>
    </div>
</article>