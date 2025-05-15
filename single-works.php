<?php
/**
 * The template for displaying single works
 */

get_header();

// カスタムフィールドの取得
$project_date = get_field('project_date');
$client_name = get_field('client_name');
$work_summary = get_field('work_summary');
$work_challenge = get_field('work_challenge');
$work_solutions = get_field('work_solutions');
$work_gallery = get_field('work_gallery');
$work_results = get_field('work_results');
$client_testimonial = get_field('client_testimonial');
$client_position = get_field('client_position');
$client_person = get_field('client_person');
?>

<main id="primary" class="site-main single-works">
    <!-- ヒーローセクション -->
    <section class="work-hero">
        <div class="container">
            <div class="work-hero-header">
                <div class="header-content">
                    <a href="<?php echo get_post_type_archive_link('works'); ?>" class="back-link">← 実績に戻る</a>
                    
                    <?php
                    // カテゴリーの表示
                    $terms = get_the_terms(get_the_ID(), 'works_category');
                    if ($terms && !is_wp_error($terms)) :
                        $term = array_shift($terms);
                    ?>
                        <span class="work-category"><?php echo esc_html($term->name); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            
            <h1 class="work-title"><?php the_title(); ?></h1>
            
            <div class="work-meta">
                <?php if ($project_date) : ?>
                <div class="meta-item">
                    <i class="fas fa-calendar"></i>
                    <span><?php echo esc_html($project_date); ?></span>
                </div>
                <?php endif; ?>
                
                <?php if ($client_name) : ?>
                <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <span><?php echo esc_html($client_name); ?></span>
                </div>
                <?php endif; ?>
                
                <?php
                // タグの表示
                $post_tags = wp_get_post_tags(get_the_ID());
                if (!empty($post_tags)) : ?>
                <div class="meta-item">
                    <i class="fas fa-tag"></i>
                    <span>
                        <?php 
                        $tag_names = array();
                        foreach ($post_tags as $tag) {
                            $tag_names[] = $tag->name;
                        }
                        echo esc_html(implode(', ', $tag_names));
                        ?>
                    </span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <!-- メインコンテンツ -->
    <section class="work-content">
        <div class="container-narrow">
            <!-- サムネイル画像 -->
            <div class="work-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('work-large'); ?>
                <?php endif; ?>
            </div>
            
            <!-- 概要セクション -->
            <?php if ($work_summary) : ?>
            <div class="work-section">
                <h2 class="section-title">概要</h2>
                <div class="section-content">
                    <?php echo wp_kses_post($work_summary); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- 課題セクション -->
            <?php if ($work_challenge) : ?>
            <div class="work-section work-challenge">
                <h2 class="section-title">課題</h2>
                <div class="section-content">
                    <?php echo wp_kses_post($work_challenge); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- ソリューションセクション -->
            <?php 
            // ソリューションフィールドが入力されているか確認
            $has_solutions = false;
            for ($i = 1; $i <= 5; $i++) {
                if (!empty(get_field('solution_' . $i))) {
                    $has_solutions = true;
                    break;
                }
            }

            if ($has_solutions) : ?>
            <div class="work-section">
                <h2 class="section-title">ソリューション</h2>
                <div class="solution-list">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php $solution = get_field('solution_' . $i); ?>
                        <?php if (!empty($solution)) : ?>
                            <div class="solution-item">
                                <div class="solution-number">
                                    <span><?php echo esc_html($i); ?></span>
                                </div>
                                <div class="solution-text">
                                    <?php echo wp_kses_post($solution); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- プロジェクト画像ギャラリー -->
            <?php
            // 画像が1つ以上あるか確認
            $has_gallery = false;
            for ($i = 1; $i <= 6; $i++) {
                if (!empty(get_field('work_gallery_' . $i))) {
                    $has_gallery = true;
                    break;
                }
            }

            if ($has_gallery) : ?>
            <div class="work-section">
                <h2 class="section-title">プロジェクト画像</h2>
                <div class="gallery-container">
                    <div class="gallery-scroll">
                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                            <?php $image = get_field('work_gallery_' . $i); ?>
                            <?php if (!empty($image)) : ?>
                                <div class="gallery-item">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <?php 
            // 成果フィールドが入力されているか確認
            $has_results = false;
            for ($i = 1; $i <= 5; $i++) {
                if (!empty(get_field('result_' . $i))) {
                    $has_results = true;
                    break;
                }
            }

            if ($has_results) : ?>
            <div class="work-section work-results">
                <h2 class="section-title">成果</h2>
                <div class="results-container">
                    <div class="results-inner">
                        <ul class="results-list">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <?php $result = get_field('result_' . $i); ?>
                                <?php if (!empty($result)) : ?>
                                    <li class="result-item">
                                        <span class="check-mark">✓</span>
                                        <span class="result-text"><?php echo esc_html($result); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- お客様の声セクション -->
            <?php if ($client_testimonial) : ?>
            <div class="work-section">
                <h2 class="section-title">お客様の声</h2>
                <div class="testimonial-container">
                    <blockquote class="testimonial-content">
                        <p><?php echo esc_html($client_testimonial); ?></p>
                        <?php if ($client_person) : ?>
                            <cite>
                                <?php echo esc_html($client_name); ?>
                                <?php if ($client_position) : ?>
                                    <?php echo esc_html($client_position); ?>
                                <?php endif; ?>
                                <?php echo esc_html($client_person); ?>
                            </cite>
                        <?php endif; ?>
                    </blockquote>
                </div>
            </div>
            <?php endif; ?>
        </div>
    
    <!-- お問い合わせセクション -->
    <?php 
    $contact_args = array(
        'title'       => 'お客様の課題解決をサポートします',
        'description' => 'Nexus Digitalは、お客様のビジネス課題に合わせた最適なデジタルソリューションを提供します。まずはお気軽にご相談ください。',
        'background'  => 'white', // 背景色を白に指定
        'custom_style' => true, // カスタムスタイルを適用
    );
    get_template_part('template-parts/contact-cta', null, $contact_args);
    ?>
        </section>
</main>

<?php get_footer(); ?>