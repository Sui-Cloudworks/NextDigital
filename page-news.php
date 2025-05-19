<?php
/**
 * Template Name: お知らせページ
 * Template Post Type: page
 * 
 * お知らせ一覧を表示するためのテンプレート
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- ページヒーローセクション -->
    <section style="background-color: #F3E8FF; padding: 80px 0; text-align: center; margin-bottom: 40px;">
        <div class="container">
            <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 20px;">お知らせ</h1>
            <p style="max-width: 768px; margin: 0 auto; font-size: 18px; color: #6B7280;">
                Nexus Digitalの最新情報をお届けします。サービスの新機能やイベント、採用情報などをこちらで公開します。
            </p>
        </div>
    </section>

    <!-- お知らせ一覧セクション -->
    <section style="padding: 60px 0;" class="news-list">
        <div class="container" style="max-width: 1024px; margin: 0 auto;">
            <div style="display: block; width: 100%; overflow: hidden;" class="news-grid">
                <?php
                // お知らせ記事と実績を取得
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $news_query = new WP_Query(array(
                    'post_type'      => array('post', 'works'), // 投稿と実績の両方を取得
                    'posts_per_page' => 10, // 10件表示
                    'paged'          => $paged
                ));
                
                if ($news_query->have_posts()) : 
                    // 記事のループ
                    while ($news_query->have_posts()) :
                        $news_query->the_post();
                        
                        // content-news.phpを使ってカードを表示
                        get_template_part('template-parts/content', 'news');
                        
                    endwhile;
                    
                    // ページネーション
                    echo '<div style="clear: both; text-align: center; margin-top: 40px;">';
                    echo paginate_links(array(
                        'base'       => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'format'     => '?paged=%#%',
                        'current'    => max( 1, get_query_var('paged') ),
                        'total'      => $news_query->max_num_pages,
                        'prev_text'  => '前へ',
                        'next_text'  => '次へ',
                        'mid_size'   => 2,
                    ));
                    echo '</div>';
                    
                    // ループ後にリセット
                    wp_reset_postdata();
                else : 
                    // 記事がない場合
                    echo '<p style="text-align: center; color: #6B7280; padding: 40px 0;">お知らせが見つかりませんでした。</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <?php get_template_part('template-parts/contact-cta'); ?>
</main>

<style>
/* 直接スタイルを適用して確実に反映させる */
.page-numbers {
    display: inline-block;
    padding: 8px 12px;
    margin: 0 5px;
    border-radius: 4px;
    background-color: #fff;
    color: #333;
    text-decoration: none;
}
.page-numbers.current {
    background-color: #9333EA;
    color: #fff;
}
</style>

<script>
// カードの高さを揃えるJavaScript
document.addEventListener('DOMContentLoaded', function() {
    // 行ごとにカードの高さを揃える関数
    function equalizeCardHeights() {
        // カードをすべて取得
        var cards = document.querySelectorAll('.news-item');
        if (!cards.length) return;
        
        // 現在の行を保持する変数
        var currentRow = [];
        var currentTop = cards[0].getBoundingClientRect().top;
        
        // 各カードを走査して行ごとにグループ化
        for (var i = 0; i < cards.length; i++) {
            var card = cards[i];
            var cardTop = card.getBoundingClientRect().top;
            
            // 新しい行の開始
            if (Math.abs(cardTop - currentTop) > 10) { // 10pxの許容範囲を設定
                // 前の行のカードの高さを揃える
                equalizeRow(currentRow);
                // 新しい行の準備
                currentRow = [card];
                currentTop = cardTop;
            } else {
                // 同じ行のカード
                currentRow.push(card);
            }
        }
        
        // 最後の行の処理
        equalizeRow(currentRow);
    }
    
    // 行内のカードの高さを揃える
    function equalizeRow(cards) {
        if (!cards.length) return;
        
        // 最大高さを見つける
        var maxHeight = 0;
        cards.forEach(function(card) {
            // 一時的に固定の高さをリセット
            card.style.height = 'auto';
            var height = card.offsetHeight;
            maxHeight = Math.max(maxHeight, height);
        });
        
        // すべてのカードを最大の高さに設定
        cards.forEach(function(card) {
            card.style.height = maxHeight + 'px';
        });
    }
    
    // ページ読み込み時に実行
    equalizeCardHeights();
    
    // ウィンドウサイズ変更時にも実行
    window.addEventListener('resize', equalizeCardHeights);
    
    // 画像読み込み完了後に再度実行
    window.addEventListener('load', equalizeCardHeights);
});
</script>

<?php get_footer(); ?>