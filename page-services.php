<?php
/**
 * Template Name: Services Page
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main services-page">
    <!-- ページヒーローセクション -->
    <?php get_template_part('template-parts/page-hero'); ?>

    <!-- サービス一覧セクション -->
    <section class="services-section">
        <div class="container">
            <!-- サービスA - テキスト左、画像右 -->
            <div class="service-item service-item-right">
                <div class="service-text">
                    <span class="service-tag">コンサルティング</span>
                    <h3 class="service-title">デジタル戦略<br>コンサルティング</h3>
                    <p class="service-description">
                        企業の課題を深く理解し、最適なデジタル戦略を立案します。
                        競合分析、市場調査、ユーザー行動分析から、具体的な戦略と実行計画を
                        提案し、ビジネスの成長をサポートします。
                    </p>
                    <a href="<?php echo home_url('/services/service-a'); ?>" class="btn btn-purple">詳細を見る →</a>
                </div>
                <div class="service-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/service-consulting.jpg" alt="デジタル戦略コンサルティング">
                </div>
            </div>

            <!-- サービスB - 画像左、テキスト右 -->
            <div class="service-item service-item-left">
                <div class="service-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/service-development.jpg" alt="Webサイト・アプリ開発">
                </div>
                <div class="service-text">
                    <span class="service-tag">開発</span>
                    <h3 class="service-title">Webサイト・<br>アプリ開発</h3>
                    <p class="service-description">
                        目的に沿ったWebサイトやアプリケーションの企画から設計、開発まで
                        一貫して対応。最新技術とUXデザインを取り入れた高品質な開発で、
                        ユーザー体験を向上させます。
                    </p>
                    <a href="<?php echo home_url('/services/service-b'); ?>" class="btn btn-purple">詳細を見る →</a>
                </div>
            </div>

            <!-- サービスC - テキスト左、画像右 -->
            <div class="service-item service-item-right">
                <div class="service-text">
                    <span class="service-tag">マーケティング</span>
                    <h3 class="service-title">デジタル<br>マーケティング</h3>
                    <p class="service-description">
                        SEO対策、コンテンツマーケティング、SNS運用、広告運用などを
                        駆使し、効果的なデジタルマーケティング戦略を実行。
                        データ分析に基づいた改善提案で、成果を最大化します。
                    </p>
                    <a href="<?php echo home_url('/services/service-c'); ?>" class="btn btn-purple">詳細を見る →</a>
                </div>
                <div class="service-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/service-marketing.jpg" alt="デジタルマーケティング">
                </div>
            </div>
        </div>
    </section>

    <!-- お問い合わせセクション -->
    <?php get_template_part('template-parts/contact-cta'); ?>
</main>

<?php get_footer(); ?>