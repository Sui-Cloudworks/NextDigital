<?php
/**
 * Template Name: Service B Page
 * Template Post Type: page
 * 
 * サービスB（システム開発）の詳細ページ
 */

get_header();

// 現在のページID
$page_id = get_the_ID();

// サービスの基本情報（ACFがある場合はそちらを優先）
$service_tag = '開発';
$service_title = get_the_title();
$hero_description = '最新技術とアジャイル開発手法を活用した高品質なシステム開発サービスを提供します。';

// トップセクションのコンテンツ
$overview_title = '最新技術で実現する<br>高品質なシステム開発';
$overview_description_1 = 'Nexus Digitalのシステム開発サービスは、最新の技術とアジャイル開発手法を活用し、お客様のビジネス課題を解決する高品質なシステムをスピーディーに提供します。';
$overview_description_2 = '要件定義から設計、開発、テスト、運用保守まで、システム開発の全工程をワンストップでサポート。お客様のビジネスの成長と変化に柔軟に対応できるシステムを構築します。';
$overview_image = get_template_directory_uri() . '/images/service-development.jpg';

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
        'icon' => 'fas fa-globe',
        'title' => 'Webアプリケーション開発',
        'description' => '最新のフレームワークと技術を活用し、使いやすく拡張性の高いWebアプリケーションを開発します。レスポンシブデザインにより、あらゆるデバイスで最適な表示・操作性を実現します。',
        'points' => array(
            'コーポレートサイト・ECサイト',
            '会員サイト・ポータルサイト',
            'SaaS・クラウドサービス',
            '管理画面・ダッシュボード'
        )
    ),
    array(
        'icon' => 'fas fa-mobile-alt',
        'title' => 'モバイルアプリ開発',
        'description' => 'iOS、Android向けのネイティブアプリやクロスプラットフォームアプリを開発します。直感的なUIとスムーズな操作性を備えた、ユーザー体験の高いアプリを提供します。',
        'points' => array(
            'iOSアプリ開発',
            'Androidアプリ開発',
            'クロスプラットフォーム開発',
            'アプリ保守・運用'
        )
    ),
    array(
        'icon' => 'fas fa-microchip',
        'title' => '業務システム開発',
        'description' => 'お客様の業務プロセスを分析し、効率化・自動化を実現する業務システムを開発します。使いやすさと拡張性を兼ね備えたシステムにより、業務効率の大幅な向上を支援します。',
        'points' => array(
            '基幹システム',
            '販売管理・在庫管理システム',
            '顧客管理システム（CRM）',
            'ワークフロー・グループウェア'
        )
    ),
    array(
        'icon' => 'fas fa-cloud',
        'title' => 'クラウドインフラ構築',
        'description' => 'AWS、Azure、GCPなどのクラウドプラットフォームを活用し、スケーラブルで安全性の高いインフラ環境を構築します。',
        'points' => array(
            'クラウドアーキテクチャ設計',
            'サーバーレスアプリケーション開発',
            'マイクロサービスアーキテクチャ',
            'DevOps・CI/CD構築'
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
                    <img src="<?php echo esc_url($overview_image); ?>" alt="<?php echo esc_attr($service_title); ?>">
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

    <!-- 開発プロセスセクション: 数字を実数値に変更 -->
    <section class="development-process">
        <div class="container">
            <h2 class="section-title">開発プロセス</h2>
            
            <div class="process-timeline">
                <!-- ステップ1: 左側配置 -->
                <div class="process-step step-left">
                    <div class="process-content">
                        <h3 class="process-title">要件定義・企画</h3>
                        <p class="process-description">
                            お客様のビジネス課題やニーズを深く理解し、最適なシステム要件を定義します。プロジェクトの目標、スコープ、スケジュール、予算を明確にします。
                        </p>
                    </div>
                    <div class="process-number">
                        <span>1</span>
                    </div>
                </div>
                
                <!-- ステップ2: 右側配置 -->
                <div class="process-step step-right">
                    <div class="process-number">
                        <span>2</span>
                    </div>
                    <div class="process-content">
                        <h3 class="process-title">設計</h3>
                        <p class="process-description">
                            システムアーキテクチャ、データベース設計、UI/UX設計など、システムの基本設計と詳細設計を行います。お客様と密に連携し、要件を満たす最適な設計を行います。
                        </p>
                    </div>
                </div>
                
                <!-- ステップ3: 左側配置 -->
                <div class="process-step step-left">
                    <div class="process-content">
                        <h3 class="process-title">開発</h3>
                        <p class="process-description">
                            アジャイル開発手法を採用し、短いサイクルで機能を開発・リリースします。定期的なレビューとフィードバックにより、品質と進捗を確保します。
                        </p>
                    </div>
                    <div class="process-number">
                        <span>3</span>
                    </div>
                </div>
                
                <!-- ステップ4: 右側配置 -->
                <div class="process-step step-right">
                    <div class="process-number">
                        <span>4</span>
                    </div>
                    <div class="process-content">
                        <h3 class="process-title">テスト・品質保証</h3>
                        <p class="process-description">
                            単体テスト、結合テスト、システムテスト、受け入れテストなど、多段階のテストを実施し、高品質なシステムを提供します。
                        </p>
                    </div>
                </div>
                
                <!-- ステップ5: 左側配置 -->
                <div class="process-step step-left">
                    <div class="process-content">
                        <h3 class="process-title">リリース・導入</h3>
                        <p class="process-description">
                            システムのリリースとスムーズな導入をサポートします。ユーザートレーニングやマニュアル作成も含め、システムの定着を支援します。
                        </p>
                    </div>
                    <div class="process-number">
                        <span>5</span>
                    </div>
                </div>
                
                <!-- ステップ6: 右側配置 -->
                <div class="process-step step-right">
                    <div class="process-number">
                        <span>6</span>
                    </div>
                    <div class="process-content">
                        <h3 class="process-title">保守・運用</h3>
                        <p class="process-description">
                            システムの安定稼働を維持するための保守・運用サービスを提供します。継続的な改善と機能拡張により、システムの価値を長期的に高めます。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 導入事例セクション -->
    <section class="service-works">
        <div class="container">
            <h2 class="section-title">導入事例</h2>
            
            <div class="works-grid">
                <?php
                // 関連する実績を取得（開発関連の最新2件）
                $works_args = array(
                    'post_type' => 'works',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'works_category',
                            'field' => 'slug',
                            'terms' => 'development',
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
    $contact_title = 'システム開発のご相談';
    $contact_description = 'システム開発の導入や既存システムの改善についてのご相談は、 お問い合わせフォームよりお気軽にご連絡ください。 専
門のエンジニアが丁寧にご対応いたします。';
    
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