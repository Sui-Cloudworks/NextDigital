<?php
/**
 * Template Name: Service A Page
 * Template Post Type: page
 * 
 * サービスA（デジタルマーケティング）の詳細ページ
 */

get_header();

// 現在のページID
$page_id = get_the_ID();

// サービスの基本情報（ACFがある場合はそちらを優先）
$service_tag = 'マーケティング';
$service_title = get_the_title();
$hero_description = 'データと分析に基づいた効果的なマーケティング戦略で、お客様のビジネス成長を支援します。';

// トップセクションのコンテンツ
$overview_title = 'データドリブンな<br>マーケティング戦略';
$overview_description_1 = 'Nexus Digitalのデジタルマーケティングサービスは、データ分析に基づいた科学的アプローチを採用しています。お客様のビジネス目標や市場環境を徹底的に分析し、最適なマーケティング戦略を立案・実行します。';
$overview_description_2 = 'SEO対策、コンテンツマーケティング、SNS運用、広告運用など、多様なチャネルを活用した統合的なマーケティング施策により、お客様のビジネス成長を強力にサポートします。';
$overview_image = get_template_directory_uri() . '/images/service/service-marketing.jpg';

// ACFフィールドからの値取得（ACFが有効な場合）
if (function_exists('get_field')) {
    $acf_service_tag = get_field('service_tag', $page_id);
    $acf_hero_description = get_field('hero_description', $page_id);
    $acf_overview_title = get_field('overview_title', $page_id);
    $acf_overview_description_1 = get_field('overview_description_1', $page_id);
    $acf_overview_description_2 = get_field('overview_description_2', $page_id);
    $acf_overview_image = get_field('overview_image', $page_id);
    
    // ACFの値があれば上書き
    if (!empty($acf_service_tag)) $service_tag = $acf_service_tag;
    if (!empty($acf_hero_description)) $hero_description = $acf_hero_description;
    if (!empty($acf_overview_title)) $overview_title = $acf_overview_title;
    if (!empty($acf_overview_description_1)) $overview_description_1 = $acf_overview_description_1;
    if (!empty($acf_overview_description_2)) $overview_description_2 = $acf_overview_description_2;
    if (!empty($acf_overview_image)) $overview_image = $acf_overview_image['url'];
}

// 提供サービス（固定）
$features = array(
    array(
        'icon' => 'fas fa-arrow-up',
        'title' => 'SEO対策',
        'description' => '検索エンジン最適化により、Webサイトの検索順位を向上させ、オーガニックトラフィックを増加させます。技術的SEO、コンテンツSEO、外部対策を組み合わせた総合的なアプローチを提供します。',
        'points' => array(
            'キーワード分析・戦略立案',
            'オンページSEO最適化',
            'コンテンツ制作・最適化',
            '技術的SEO改善'
        )
    ),
    array(
        'icon' => 'far fa-file-alt',
        'title' => 'コンテンツマーケティング',
        'description' => '価値あるコンテンツを通じてターゲットオーディエンスとの関係を構築し、ブランド認知度向上やリード獲得を実現します。',
        'points' => array(
            'コンテンツ戦略立案',
            'ブログ記事・ホワイトペーパー制作',
            'インフォグラフィック・動画制作',
            'コンテンツ配信・プロモーション'
        )
    ),
    array(
        'icon' => 'far fa-comment-dots',
        'title' => 'SNSマーケティング',
        'description' => '各SNSプラットフォームの特性を活かした戦略的なソーシャルメディア運用により、ブランドエンゲージメントを高め、コミュニティ形成を支援します。',
        'points' => array(
            'SNS戦略立案',
            'アカウント運用・コンテンツ制作',
            'コミュニティマネジメント',
            'インフルエンサーマーケティング'
        )
    ),
    array(
        'icon' => 'fas fa-ad',
        'title' => '広告運用',
        'description' => 'Google広告、SNS広告など、各種デジタル広告の戦略立案から運用、効果測定まで一貫してサポートし、費用対効果の高い広告運用を実現します。',
        'points' => array(
            '広告戦略立案',
            'アカウント構築・最適化',
            '広告クリエイティブ制作',
            '入札管理・パフォーマンス分析'
        )
    )
);

// ACFの個別フィールド対応（無料版用）
if (function_exists('get_field')) {
    // Feature 1
    if (get_field('feature1_title', $page_id)) {
        $features[0]['title'] = get_field('feature1_title', $page_id);
    }
    if (get_field('feature1_description', $page_id)) {
        $features[0]['description'] = get_field('feature1_description', $page_id);
    }
    if (get_field('feature1_icon', $page_id)) {
        $features[0]['icon'] = get_field('feature1_icon', $page_id);
    }
    if (get_field('feature1_points', $page_id)) {
        // カンマ区切りのテキストを配列に変換
        $points_text = get_field('feature1_points', $page_id);
        $features[0]['points'] = array_map('trim', explode(',', $points_text));
    }
    
    // Feature 2
    if (get_field('feature2_title', $page_id)) {
        $features[1]['title'] = get_field('feature2_title', $page_id);
    }
    if (get_field('feature2_description', $page_id)) {
        $features[1]['description'] = get_field('feature2_description', $page_id);
    }
    if (get_field('feature2_icon', $page_id)) {
        $features[1]['icon'] = get_field('feature2_icon', $page_id);
    }
    if (get_field('feature2_points', $page_id)) {
        $points_text = get_field('feature2_points', $page_id);
        $features[1]['points'] = array_map('trim', explode(',', $points_text));
    }
    
    // Feature 3
    if (get_field('feature3_title', $page_id)) {
        $features[2]['title'] = get_field('feature3_title', $page_id);
    }
    if (get_field('feature3_description', $page_id)) {
        $features[2]['description'] = get_field('feature3_description', $page_id);
    }
    if (get_field('feature3_icon', $page_id)) {
        $features[2]['icon'] = get_field('feature3_icon', $page_id);
    }
    if (get_field('feature3_points', $page_id)) {
        $points_text = get_field('feature3_points', $page_id);
        $features[2]['points'] = array_map('trim', explode(',', $points_text));
    }
    
    // Feature 4
    if (get_field('feature4_title', $page_id)) {
        $features[3]['title'] = get_field('feature4_title', $page_id);
    }
    if (get_field('feature4_description', $page_id)) {
        $features[3]['description'] = get_field('feature4_description', $page_id);
    }
    if (get_field('feature4_icon', $page_id)) {
        $features[3]['icon'] = get_field('feature4_icon', $page_id);
    }
    if (get_field('feature4_points', $page_id)) {
        $points_text = get_field('feature4_points', $page_id);
        $features[3]['points'] = array_map('trim', explode(',', $points_text));
    }
}
?>

<main id="primary" class="site-main service-child-page">
    <!-- ページヒーローセクション -->
    <section class="page-hero service-hero">
        <div class="container">
            <span class="service-tag"><?php echo esc_html($service_tag); ?></span>
            <h1 class="page-title"><?php echo esc_html($service_title); ?></h1>
            <p class="page-description"><?php echo esc_html($hero_description); ?></p>
        </div>
    </section>

    <!-- サービス概要セクション -->
    <section class="service-overview">
        <div class="container">
            <div class="service-overview-content">
                <div class="service-overview-text">
                    <h2 class="service-overview-title"><?php echo wp_kses_post($overview_title); ?></h2>
                    <p class="service-overview-description">
                        <?php echo esc_html($overview_description_1); ?>
                    </p>
                    <p class="service-overview-description">
                        <?php echo esc_html($overview_description_2); ?>
                    </p>
                </div>
                <div class="service-overview-image">
                    <img src="<?php echo esc_url($overview_image); ?>" alt="<?php echo esc_attr($overview_title); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- 提供サービスセクション -->
    <section class="service-features">
        <div class="container">
            <h2 class="section-title">提供サービス</h2>
            
            <div class="features-grid">
                <?php foreach ($features as $feature) : ?>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="<?php echo esc_attr($feature['icon']); ?>"></i>
                    </div>
                    <h3 class="feature-title"><?php echo esc_html($feature['title']); ?></h3>
                    <p class="feature-description"><?php echo esc_html($feature['description']); ?></p>
                    
                    <?php if (!empty($feature['points'])) : ?>
                    <ul class="feature-points">
                        <?php foreach ($feature['points'] as $point) : ?>
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

    <!-- 導入事例セクション -->
    <section class="service-works">
        <div class="container">
            <h2 class="section-title">導入事例</h2>
            
            <div class="works-grid">
                <?php
                // 関連する実績を取得（マーケティング関連の最新2件）
                $works_args = array(
                    'post_type' => 'works',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'works_category',
                            'field' => 'slug',
                            'terms' => 'marketing',
                        ),
                    ),
                );
                
                // ACFから関連実績のIDを個別に取得（無料版対応）
                $related_works_ids = array();
                if (function_exists('get_field')) {
                    $related_work1 = get_field('related_work1', $page_id);
                    $related_work2 = get_field('related_work2', $page_id);
                    
                    if ($related_work1) {
                        $related_works_ids[] = $related_work1;
                    }
                    if ($related_work2) {
                        $related_works_ids[] = $related_work2;
                    }
                    
                    if (!empty($related_works_ids)) {
                        $works_args = array(
                            'post_type' => 'works',
                            'posts_per_page' => count($related_works_ids),
                            'post__in' => $related_works_ids,
                            'orderby' => 'post__in',
                        );
                    }
                }
                
                $works_query = new WP_Query($works_args);
                
                if ($works_query->have_posts()) :
                    while ($works_query->have_posts()) : $works_query->the_post();
                        get_template_part('template-parts/content-works');
                    endwhile;
                    wp_reset_postdata();
                else :
                    // 関連実績がない場合は、最新の実績を2件表示
                    $works_args = array(
                        'post_type' => 'works',
                        'posts_per_page' => 2,
                        'orderby' => 'date',
                        'order' => 'DESC',
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
                endif;
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
    $contact_title = 'デジタルマーケティングのご相談・お問い合わせ';
    $contact_description = 'デジタルマーケティングに関するご質問やご相談は、お気軽にお問い合わせください。専門スタッフが丁寧にご対応いたします。';
    
    // ACFからカスタムテキストを取得（設定されている場合）
    if (function_exists('get_field')) {
        if (get_field('contact_title', $page_id)) {
            $contact_title = get_field('contact_title', $page_id);
        }
        if (get_field('contact_description', $page_id)) {
            $contact_description = get_field('contact_description', $page_id);
        }
    }
    
    $contact_args = array(
        'title'       => $contact_title,
        'description' => $contact_description,
    );
    get_template_part('template-parts/contact-cta', null, $contact_args);
    ?>

</main>

<?php get_footer(); ?>