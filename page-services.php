<?php
/**
 * Template Name: Services Page
 * Template Post Type: page
 * 
 * サービス一覧を表示するためのテンプレート
 */

get_header();
?>

<main id="primary" class="site-main services-page">
    <!-- ページヒーローセクション -->
    <?php get_template_part('template-parts/page-hero'); ?>

    <!-- サービス一覧セクション -->
    <section class="services-section">
        <div class="container">
            <?php
            // サービス情報の配列
            $services = array(
                array(
                    'position'     => 'right',  // テキスト左、画像右
                    'tag'          => 'マーケティング',
                    'title'        => 'デジタルマーケティング',
                    'description'  => 'データ分析に基づいた戦略立案から実行、効果測定まで、 
                                      デジタルマーケティングの全工程をワンストップでサポートします。 
                                      SEO対策、SNS運用、広告運用など、最適なチャネルを活用した 効果的な
                                      マーケティング施策を提供します。',
                    'link'         => 'services/service-a',
                    'image'        => 'service-consulting.jpg',
                    'alt'          => 'デジタル戦略コンサルティング'
                ),
                array(
                    'position'     => 'left',   // 画像左、テキスト右
                    'tag'          => '開発',
                    'title'        => 'Webサイト・アプリ開発',
                    'description'  => 'Webアプリケーション、モバイルアプリ、業務システムなど、 お客
                                      様のニーズに合わせたカスタムシステムを開発します。 最新の技術
                                      とアジャイル開発手法を活用し、高品質なシステムを スピーディー
                                      に提供します。',
                    'link'         => 'services/service-b',
                    'image'        => 'service-development.jpg',
                    'alt'          => 'Webサイト・アプリ開発'
                ),
                array(
                    'position'     => 'right',  // テキスト左、画像右
                    'tag'          => 'コンサルティング',
                    'title'        => 'DX戦略コンサルティング',
                    'description'  => '企業のデジタルトランスフォーメーションを成功に導くための 戦略
                                      立案から実行支援まで、包括的なコンサルティングを提供します。
                                      業界知識と最新のテクノロジートレンドを組み合わせ、 お客様のビ
                                      ジネスに最適なDX戦略を策定します。',
                    'link'         => 'services/service-c',
                    'image'        => 'service-marketing.jpg',
                    'alt'          => 'デジタルマーケティング'
                )
            );

            /**
             * 注: 上記の配列はACFを使った管理画面からの編集に置き換えることもできます。
             * その場合は以下のようなコードを使用します：
             * 
             * if (function_exists('get_field')) {
             *     $services = get_field('services');
             * }
             */
            
            // サービス項目のループ
            foreach ($services as $service) :
                $item_class = "service-item service-item-{$service['position']}";
            ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <?php if ($service['position'] === 'left') : ?>
                        <div class="service-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo esc_attr($service['image']); ?>" alt="<?php echo esc_attr($service['alt']); ?>">
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-text">
                        <span class="service-tag"><?php echo esc_html($service['tag']); ?></span>
                        <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                        <p class="service-description">
                            <?php echo esc_html($service['description']); ?>
                        </p>
                        <a href="<?php echo home_url($service['link']); ?>" class="btn btn-purple">詳細を見る →</a>
                    </div>
                    
                    <?php if ($service['position'] === 'right') : ?>
                        <div class="service-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo esc_attr($service['image']); ?>" alt="<?php echo esc_attr($service['alt']); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            
            <?php
            /**
             * サービスページのメインコンテンツを表示（必要な場合）
             */
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <?php 
    // お問い合わせセクションのカスタムテキスト
    $contact_args = array(
        'title'       => 'サービスに関するお問い合わせ',
        'description' => '各サービスの詳細や料金、導入事例などについてのご質問やご相談は、お気軽にお問い合わせください。専門のコンサルタントが丁寧にご対応いたします。',
    );
    get_template_part('template-parts/contact-cta', null, $contact_args);
    ?>
</main>

<?php get_footer(); ?>