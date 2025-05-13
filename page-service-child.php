<?php
/**
 * Template Name: Service Child Page
 * Template Post Type: page
 * 
 * サービス詳細を表示するためのテンプレート
 */

get_header();

// 現在のページ情報
$service_tag = '';
$service_title = get_the_title();
$service_description = '';
$service_image = '';
$service_features = array();
$service_options = array();
$related_works = array();

// ACFフィールドがあれば取得
if (function_exists('get_field')) {
    $service_tag = get_field('service_tag');
    $service_description = get_field('service_description');
    $service_image = get_field('service_image');
    $service_features = get_field('service_features');
    $service_options = get_field('service_options');
    $related_works = get_field('related_works');
}

// デフォルト値（ACFがない場合）
if (empty($service_tag)) {
    // 親ページのスラッグを基に判断
    $parent_id = wp_get_post_parent_id(get_the_ID());
    $current_slug = get_post_field('post_name', get_the_ID());
    
    if ($current_slug === 'service-a') {
        $service_tag = 'コンサルティング';
    } elseif ($current_slug === 'service-b') {
        $service_tag = '開発';
    } elseif ($current_slug === 'service-c') {
        $service_tag = 'マーケティング';
    }
}

// サービス詳細ヒーローのデフォルト説明文
$default_hero_description = 'お客様のビジネス課題を解決するための最適なソリューションを提供します。';
?>

<main id="primary" class="site-main service-child-page">
    <!-- ページヒーローセクション -->
    <section class="page-hero service-hero">
        <div class="container">
            <?php if (!empty($service_tag)) : ?>
                <span class="service-tag"><?php echo esc_html($service_tag); ?></span>
            <?php endif; ?>
            <h1 class="page-title"><?php echo esc_html($service_title); ?></h1>
            <p class="page-description"><?php echo esc_html($default_hero_description); ?></p>
        </div>
    </section>

    <!-- サービス概要セクション -->
    <section class="service-overview">
        <div class="container">
            <div class="service-overview-content">
                <div class="service-overview-text">
                    <h2 class="service-overview-title"><?php echo esc_html($service_title); ?>について</h2>
                    <p class="service-overview-description">
                        <?php 
                        if (!empty($service_description)) {
                            echo esc_html($service_description);
                        } else {
                            // デフォルトの説明文
                            echo 'お客様のビジネス成長を支援するための最適なソリューションを提供します。具体的な課題に対して、専門知識と経験を活かした戦略的なアプローチで解決に導きます。';
                        }
                        ?>
                    </p>
                </div>
                <div class="service-overview-image">
                    <?php if (!empty($service_image)) : ?>
                        <img src="<?php echo esc_url($service_image['url']); ?>" alt="<?php echo esc_attr($service_image['alt']); ?>">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/service/<?php echo esc_attr($current_slug); ?>.jpg" alt="<?php echo esc_attr($service_title); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 提供サービスセクション -->
    <section class="service-features">
        <div class="container">
            <h2 class="section-title">提供サービス</h2>
            
            <div class="features-grid">
                <?php
                // デフォルトのサービス機能
                $default_features = array(
                    array(
                        'icon' => 'icon-strategy',
                        'title' => '戦略立案',
                        'description' => 'ビジネス目標達成のための最適な戦略を立案します。',
                        'points' => array('市場分析', '競合調査', 'ターゲット設定', 'KPI設計')
                    ),
                    array(
                        'icon' => 'icon-development',
                        'title' => '設計・開発',
                        'description' => '要件に合わせた最適なシステム設計と開発を行います。',
                        'points' => array('要件定義', '設計', '開発', 'テスト')
                    ),
                    array(
                        'icon' => 'icon-support',
                        'title' => '運用サポート',
                        'description' => '導入後の運用をサポートし、継続的な改善を提案します。',
                        'points' => array('保守管理', 'アップデート', 'パフォーマンス改善', '問題解決')
                    ),
                    array(
                        'icon' => 'icon-education',
                        'title' => 'トレーニング',
                        'description' => 'システムを最大限に活用するためのトレーニングを提供します。',
                        'points' => array('操作研修', 'マニュアル作成', '個別指導', 'フォローアップ')
                    )
                );
                
                // ACFからのデータがあればそれを使用、なければデフォルト
                $features_to_display = !empty($service_features) ? $service_features : $default_features;
                
                // 機能を表示
                foreach ($features_to_display as $feature) :
                    $icon = isset($feature['icon']) ? $feature['icon'] : 'icon-default';
                    $title = isset($feature['title']) ? $feature['title'] : '機能名';
                    $description = isset($feature['description']) ? $feature['description'] : '説明文';
                    $points = isset($feature['points']) ? $feature['points'] : array();
                ?>
                    <div class="feature-item">
                        <div class="feature-icon <?php echo esc_attr($icon); ?>">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title"><?php echo esc_html($title); ?></h3>
                        <p class="feature-description"><?php echo esc_html($description); ?></p>
                        
                        <?php if (!empty($points)) : ?>
                        <ul class="feature-points">
                            <?php foreach ($points as $point) : ?>
                            <li class="feature-point">
                                <span class="check-mark">✓</span>
                                <?php echo esc_html($point); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- オプションセクション（ページによって異なる部分） -->
    <?php if (!empty($service_options)) : ?>
    <section class="service-options">
        <div class="container">
            <h2 class="section-title">オプションサービス</h2>
            
            <div class="options-content">
                <?php echo wp_kses_post($service_options); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 導入事例セクション -->
    <section class="service-works">
        <div class="container">
            <h2 class="section-title">導入事例</h2>
            
            <div class="works-grid">
                <?php
                // ACFからの関連実績があればそれを使用
                if (!empty($related_works)) {
                    // 関連実績の表示ロジック（ACF relationship field用）
                    foreach ($related_works as $post) :
                        setup_postdata($post);
                        get_template_part('template-parts/content-works');
                    endforeach;
                    wp_reset_postdata();
                } else {
                    // デフォルトの実績を表示（最新の2つの実績）
                    $works_args = array(
                        'post_type' => 'works',
                        'posts_per_page' => 2,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    
                    $works_query = new WP_Query($works_args);
                    
                    if ($works_query->have_posts()) :
                        while ($works_query->have_posts()) : $works_query->the_post();
                            get_template_part('template-parts/content-works');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="no-works">実績が見つかりませんでした。</p>';
                    endif;
                }
                ?>
            </div>
            
            <div class="more-works">
                <a href="<?php echo home_url('/works'); ?>" class="btn btn-outline">すべての実績を見る</a>
            </div>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <?php 
    // お問い合わせセクションのカスタムテキスト
    $contact_args = array(
        'title'       => $service_title . 'のご相談・お問い合わせ',
        'description' => $service_title . 'に関するご質問やご相談は、お気軽にお問い合わせください。専門スタッフが丁寧にご対応いたします。',
    );
    get_template_part('template-parts/contact-cta', null, $contact_args);
    ?>

</main>

<?php get_footer(); ?>