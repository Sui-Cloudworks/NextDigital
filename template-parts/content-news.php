<?php
/**
 * Template part for displaying news posts in an archive page
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-item news-card'); ?> style="width: 48%; float: left; margin: 0 1% 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; background: #fff;">
    <div style="display: block; width: 100%;">
        <!-- 画像部分 -->
        <div class="news-image" style="position: relative;">
            <a href="<?php the_permalink(); ?>" style="display: block; height: 192px; width: 100%; overflow: hidden;">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('news-thumbnail', array('style' => 'width: 100%; height: 100%; object-fit: cover; min-width: 496px;')); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/not4.jpg" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover; min-width: 496px;">
                <?php endif; ?>
            </a>
            
            <?php
            // 投稿タイプをチェック
            $post_type = get_post_type();

            // 投稿タイプが works なら「実績」タグを表示、それ以外は通常のタグを表示
            if ($post_type === 'works') {
                // works投稿タイプの場合
            ?>
                <span style="position: absolute; top: 16px; left: 16px; display: inline-block; font-size: 12px; font-weight: 600; color: #fff; background-color: #9333EA; padding: 4px 12px; border-radius: 9999px; z-index: 5;">実績</span>
            <?php
            } else {
                // 通常のタグ表示
                $post_tags = get_the_tags();
                if (!empty($post_tags)) :
                    $first_tag = $post_tags[0];
            ?>
                    <span style="position: absolute; top: 16px; left: 16px; display: inline-block; font-size: 12px; font-weight: 600; color: #fff; background-color: #9333EA; padding: 4px 12px; border-radius: 9999px; z-index: 5;"><?php echo esc_html($first_tag->name); ?></span>
            <?php
                endif;
            }
            ?>
        </div>
        
        <!-- コンテンツ部分 -->
        <div style="padding: 20px;" class="news-content-wrapper">
            <!-- 日付 -->
            <div style="margin-bottom: 12px; font-size: 14px; color: #6B7280;">
                <span class="news-date"><?php echo get_the_date('Y年n月j日'); ?></span>
            </div>
            
            <!-- タイトル -->
            <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 12px; line-height: 1.4; word-wrap: break-word; color: #0A0A0A;">
                <a href="<?php the_permalink(); ?>" style="color: #0A0A0A; text-decoration: none;">
                    <?php the_title(); ?>
                </a>
            </h2>
            
            <!-- 概要 -->
            <div style="color: #6B7280; font-size: 16px; line-height: 1.6; margin-bottom: 16px; word-wrap: break-word;">
                <?php 
                // ACFフィールドのwork_summaryを優先表示、なければexcerptを表示
                if (function_exists('get_field') && get_field('work_summary')) :
                    echo wp_kses_post(get_field('work_summary'));
                else :
                    the_excerpt();
                endif;
                ?>
            </div>
            
            <!-- 詳細を見るリンク -->
            <a href="<?php the_permalink(); ?>" style="display: inline-block; color: #9333EA; font-weight: 500; text-decoration: none;">詳細を見る →</a>
        </div>
    </div>
</article>

<?php
// 2つ目のカードの後に改行を入れる
$current_post = $wp_query->current_post;
if ($current_post % 2 == 1) {
    echo '<div style="clear: both;"></div>';
}
?>