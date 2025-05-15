<?php
/**
 * Template Name: Service C Page
 * Template Post Type: page
 * 
 * サービスC（DX戦略コンサルティング）の詳細ページ
 */

get_header();

// 現在のページID
$page_id = get_the_ID();

// サービスの基本情報（ACFがある場合はそちらを優先）
$service_tag = 'コンサルティング';
$service_title = get_the_title();
$hero_description = 'デジタル技術を活用した新たな価値創造と業務変革を実現するコンサルティングサービスを提供します。';

// トップセクションのコンテンツ
$overview_title = 'デジタルで実現する<br>ビジネス変革';
$overview_description_1 = 'Nexus DigitalのDX戦略コンサルティングは、お客様のビジネスを深く理解し、デジタル技術を活用した新たな価値創造と業務変革を実現します。';
$overview_description_2 = '業界知識と最新のテクノロジートレンドを組み合わせ、お客様のビジネスに最適なDX戦略を策定。戦略立案から実行支援まで、DX推進の全プロセスをサポートします。';
$overview_image = get_template_directory_uri() . '/images/service-consulting.jpg';

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
        'icon' => 'fas fa-chart-bar',
        'title' => 'DX戦略策定',
        'description' => '企業のビジョンや経営課題を踏まえ、デジタル技術を活用した事業変革の戦略を策定します。競合分析や市場動向調査も含め、実現性の高いDX戦略を立案します。',
        'points' => array(
            'DXビジョン策定',
            'DXロードマップ作成',
            'デジタル成熟度診断',
            '投資対効果分析'
        )
    ),
    array(
        'icon' => 'fas fa-cogs',
        'title' => '業務プロセス改革',
        'description' => '既存の業務プロセスを分析し、デジタル技術を活用した業務効率化・自動化を実現します。業務フローの再設計から、必要なシステム導入までをトータルでサポートします。',
        'points' => array(
            '業務プロセス分析',
            '業務フロー再設計',
            'RPA・自動化導入支援',
            '業務システム選定支援'
        )
    ),
    array(
        'icon' => 'fas fa-bolt',
        'title' => 'デジタル人材育成',
        'description' => 'DX推進に必要なデジタル人材の育成を支援します。経営層向けのDX研修から、実務者向けのデジタルスキル研修まで、組織のデジタル成熟度向上をサポートします。',
        'points' => array(
            'DX人材要件定義',
            '経営層向けDX研修',
            'デジタルリテラシー研修',
            'DX推進組織構築支援'
        )
    ),
    array(
        'icon' => 'fas fa-file-alt',
        'title' => 'データ活用支援',
        'description' => '企業内外のデータを収集・分析し、経営判断や業務改善に活用するためのデータ戦略策定から分析基盤構築までをサポートします。',
        'points' => array(
            'データ戦略策定',
            'データ分析基盤構築',
            'データ可視化・ダッシュボード',
            'AI・機械学習活用支援'
        )
    )
);

// コンサルティングプロセス（固定）
$consulting_processes = array(
    array(
        'number' => '1',
        'title' => '現状分析',
        'description' => '企業の現状や課題、市場環境、競合状況などを徹底的に分析し、 デジタル成熟度診断を実施します。'
    ),
    array(
        'number' => '2',
        'title' => '戦略立案',
        'description' => '分析結果に基づき、企業のビジョンや目標を実現するための DX戦略とロードマップを策定します。'
    ),
    array(
        'number' => '3',
        'title' => '実行支援',
        'description' => '策定した戦略の実行をサポート。プロジェクト管理、 システム導入、組織変革など、包括的に支援
します。'
    ),
    array(
        'number' => '4',
        'title' => '効果測定・改善',
        'description' => 'DX施策の効果を定量的に測定し、継続的な改善を支援します。 KPIの設定から測定、分析、改善提案まで一貫してサポートします。'
    )
);

// ACFの個別フィールド対応（無料版用）
if (function_exists('get_field')) {
    // Feature 1-4の処理（省略 - service-a, service-bと同様）
    
    // Consulting Process 1-4
    for ($i = 1; $i <= 4; $i++) {
        $field_prefix = 'consulting_process_' . $i;
        
        if (get_field($field_prefix . '_title', $page_id)) {
            $consulting_processes[$i-1]['title'] = get_field($field_prefix . '_title', $page_id);
        }
        
        if (get_field($field_prefix . '_description', $page_id)) {
            $consulting_processes[$i-1]['description'] = get_field($field_prefix . '_description', $page_id);
        }
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

    <!-- コンサルティングプロセスセクション -->
    <section class="consulting-process">
        <div class="container">
            <h2 class="section-title">コンサルティングプロセス</h2>
            
            <div class="process-grid">
                <!-- プロセス1-3 (横並び) -->
                <div class="process-row">
                    <?php for ($i = 0; $i < 3; $i++) : ?>
                    <div class="process-item">
                        <div class="process-number">
                            <span><?php echo esc_html($consulting_processes[$i]['number']); ?></span>
                        </div>
                        <h3 class="process-title"><?php echo esc_html($consulting_processes[$i]['title']); ?></h3>
                        <p class="process-description">
                            <?php echo esc_html($consulting_processes[$i]['description']); ?>
                        </p>
                    </div>
                    <?php endfor; ?>
                </div>
                
                <!-- プロセス4 (幅広) -->
                <div class="process-wide">
                    <div class="process-number">
                        <span><?php echo esc_html($consulting_processes[3]['number']); ?></span>
                    </div>
                    <h3 class="process-title"><?php echo esc_html($consulting_processes[3]['title']); ?></h3>
                    <p class="process-description">
                        <?php echo esc_html($consulting_processes[3]['description']); ?>
                    </p>
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
                // 関連する実績を取得（コンサルティング関連の最新2件）
                $works_args = array(
                    'post_type' => 'works',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'works_category',
                            'field' => 'slug',
                            'terms' => 'consulting',
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
    $contact_title = 'DX戦略に関するご相談';
    $contact_description = '企業のデジタルトランスフォーメーションに関するご相談は、お問い合わせフォームよりお気軽にご連絡ください。専門のコンサルタントが丁寧にご対応いたします。';
    
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