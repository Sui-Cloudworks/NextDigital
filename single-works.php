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
                $tags = get_the_tags();
                if ($tags) : ?>
                <div class="meta-item">
                    <i class="fas fa-tag"></i>
                    <span>
                        <?php
                        $tag_names = array();
                        foreach ($tags as $tag) {
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
            <?php if ($work_solutions) : ?>
            <div class="work-section">
                <h2 class="section-title">ソリューション</h2>
                <div class="solution-list">
                    <?php
                    $count = 1;
                    foreach ($work_solutions as $solution) : ?>
                        <div class="solution-item">
                            <div class="solution-number">
                                <span><?php echo esc_html($count); ?></span>
                            </div>
                            <div class="solution-text">
                                <?php echo wp_kses_post($solution['solution_text']); ?>
                            </div>
                        </div>
                    <?php
                        $count++;
                    endforeach;
                    ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- プロジェクト画像ギャラリー -->
            <?php if ($work_gallery) : ?>
            <div class="work-section">
                <h2 class="section-title">プロジェクト画像</h2>
                <div class="gallery-container">
                    <div class="gallery-scroll">
                        <?php foreach ($work_gallery as $image) : ?>
                            <div class="gallery-item">
                                <img src="<?php echo esc_url($image['sizes']['gallery-thumb']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- 成果セクション -->
            <?php if ($work_results) : ?>
            <div class="work-section work-results">
                <h2 class="section-title">成果</h2>
                <div class="results-container">
                    <div class="results-inner">
                        <ul class="results-list">
                            <?php foreach ($work_results as $result) : ?>
                                <li class="result-item">
                                    <span class="check-mark">✓</span>
                                    <span class="result-text"><?php echo esc_html($result['result_text']); ?></span>
                                </li>
                            <?php endforeach; ?>
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
    </section>
    
    <!-- お問い合わせセクション -->
    <?php 
    $contact_args = array(
        'title'       => 'お客様の課題解決をサポートします',
        'description' => 'Nexus Digitalは、お客様のビジネス課題に合わせた最適なデジタルソリューションを提供します。まずはお気軽にご相談ください。',
        'background'  => 'white', // 背景色を白に指定
    );
    get_template_part('template-parts/contact-cta', null, $contact_args);
    ?>
</main>

<?php get_footer(); ?>