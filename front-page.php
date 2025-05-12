<?php get_header(); ?>

<main id="primary" class="site-main front-page">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- メインビジュアルセクション -->
        <section class="main-visual">
            <div class="main-visual-content">
                <h1 class="main-title">The Power Of Digital</h1>
                <p class="sub-title">デジタルの力で驚きと感動を</p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">お問い合わせ →</a>
            </div>
        </section>

        <!-- Nexus Digitalについて -->
        <section class="about-section">
            <div class="container-inner">
                <div class="section-header">
                    <h2 class="section-title">Nexus Digital<br>について</h2>
                    <p class="section-description">私たちは最新のテクノロジーとデジタルマーケティングのノウハウを活かして、<br>お客様のビジネス成長を総合的にサポートします。</p>
                </div>
                
                <div class="feature-blocks">
                    <div class="feature-block">
                        <div class="feature-icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h3 class="feature-title">専門家チーム</h3>
                        <p class="feature-description">各分野のスペシャリストが集結し、お客様のニーズに合わせた最適なソリューションを提供します。</p>
                    </div>
                    
                    <div class="feature-block">
                        <div class="feature-icon">
                            <i class="fa-solid fa-signal"></i>
                        </div>
                        <h3 class="feature-title">データ駆動型アプローチ</h3>
                        <p class="feature-description">最新の分析ツールと手法を活用し、データに基づいた戦略立案と意思決定をサポートします。</p>
                    </div>
                    
                    <div class="feature-block">
                        <div class="feature-icon">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <h3 class="feature-title">革新的ソリューション</h3>
                        <p class="feature-description">常に最新のテクノロジーとトレンドを取り入れ、革新的なソリューションを開発・提供します。</p>
                    </div>
                </div>
                
                <div class="about-more">
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="link-more">会社情報をもっと見る →</a>
                </div>
            </div>
        </section>

        <!-- サービスセクション -->
        <section class="services-section">
            <div class="container-inner">
                <div class="section-header">
                    <h2 class="section-title">サービス</h2>
                    <p class="section-description">Nexus Digitalは、企業のデジタル化を総合的にサポートする多様なサービスを提供しています。</p>
                </div>
                
                <div class="service-blocks">
                    <div class="service-block">
                        <div class="service-image">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/service-marketing.jpg" alt="デジタルマーケティング">
                        </div>
                        <h3 class="service-title">デジタルマーケティング</h3>
                        <p class="service-description">SEO、SNS運用、広告運用など、デジタルチャネルを活用した効果的なマーケティング戦略を提供します。</p>
                        <a href="<?php echo esc_url(home_url('/services/service-a')); ?>" class="link-more">詳細を見る →</a>
                    </div>
                    
                    <div class="service-block">
                        <div class="service-image">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/service-development.jpg" alt="システム開発">
                        </div>
                        <h3 class="service-title">システム開発</h3>
                        <p class="service-description">Webアプリケーション、モバイルアプリ、業務システムなど、ニーズに合わせたカスタムシステムを開発します。</p>
                        <a href="<?php echo esc_url(home_url('/services/service-b')); ?>" class="link-more">詳細を見る →</a>
                    </div>
                    
                    <div class="service-block">
                        <div class="service-image">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/service-consulting.jpg" alt="DX戦略コンサルティング">
                        </div>
                        <h3 class="service-title">DX戦略コンサルティング</h3>
                        <p class="service-description">企業のデジタル改革を成功に導くための戦略立案から実行支援まで、包括的なコンサルティングを提供します。</p>
                        <a href="<?php echo esc_url(home_url('/services/service-c')); ?>" class="link-more">詳細を見る →</a>
                    </div>
                </div>
                
                <div class="services-more">
                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-primary">サービス一覧を見る →</a>
                </div>
            </div>
        </section>

        <!-- 実績セクション -->
        <section class="works-section">
            <div class="container-inner">
                <div class="section-header">
                    <h2 class="section-title">実績</h2>
                    <p class="section-description">これまでに手がけた主な実績をご紹介します。様々な業界のお客様のデジタル改革を支援してきました。</p>
                </div>
                
                <div class="works-blocks">
                    <?php
                    // 実績の投稿を3件取得
                    $works_query = new WP_Query(array(
                        'post_type'      => 'works',
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                    ));
                    
                    if ($works_query->have_posts()) :
                        while ($works_query->have_posts()) : $works_query->the_post();
                            // カスタムフィールドの取得（Advanced Custom Fieldsを使用）
                            $category = '';
                            if (function_exists('get_field')) {
                                $category = get_field('service_category');
                            }
                    ?>
                        <div class="work-block">
                            <div class="work-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/work-placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </div>
                            <?php if ($category) : ?>
                                <div class="work-category"><?php echo esc_html($category); ?></div>
                            <?php endif; ?>
                            <h3 class="work-title"><?php the_title(); ?></h3>
                            <div class="work-description"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="link-more">詳細を見る →</a>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <!-- 実績データがない場合のダミーデータ -->
                        <div class="work-block">
                            <div class="work-image">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/work-1.jpg" alt="ECサイトリニューアル">
                            </div>
                            <div class="work-category">Webサイト制作</div>
                            <h3 class="work-title">大手アパレルブランドECサイトリニューアル</h3>
                            <div class="work-description">顧客体験を向上させるUI/UXデザインと最新のテクノロジーを活用し、売上向上に貢献しました。</div>
                            <a href="#" class="link-more">詳細を見る →</a>
                        </div>
                        
                        <div class="work-block">
                            <div class="work-image">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/work-2.jpg" alt="マーケティング戦略">
                            </div>
                            <div class="work-category">デジタルマーケティング</div>
                            <h3 class="work-title">飲食チェーン店のデジタルマーケティング戦略</h3>
                            <div class="work-description">データ分析に基づいたデジタル広告とSNS戦略により、新規顧客獲得と既存顧客のエンゲージメント向上を実現。</div>
                            <a href="#" class="link-more">詳細を見る →</a>
                        </div>
                        
                        <div class="work-block">
                            <div class="work-image">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/work-3.jpg" alt="業務効率化システム">
                            </div>
                            <div class="work-category">システム開発</div>
                            <h3 class="work-title">製造業向け業務効率化システムの開発</h3>
                            <div class="work-description">生産管理・在庫管理を一元化するシステムを開発し、業務効率化と人的ミスの削減を支援しました。</div>
                            <a href="#" class="link-more">詳細を見る →</a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="works-more">
                    <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="link-more">実績一覧を見る →</a>
                </div>
            </div>
        </section>

        <!-- お知らせセクション -->
        <section class="news-section">
            <div class="container-inner">
                <div class="section-header">
                    <h2 class="section-title">お知らせ</h2>
                    <p class="section-description">Nexus Digitalの最新情報をお届けします。</p>
                </div>
                
                <div class="news-list-container">
                    <div class="news-list">
                        <?php
                        // お知らせの投稿を3件取得
                        $news_query = new WP_Query(array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post_status'    => 'publish',
                        ));
                        
                        if ($news_query->have_posts()) :
                            while ($news_query->have_posts()) : $news_query->the_post();
                                // カテゴリーの取得
                                $categories = get_the_category();
                                $category_name = '';
                                if (!empty($categories)) {
                                    $category_name = $categories[0]->name;
                                }
                        ?>
                            <div class="news-item">
                                <div class="news-date"><?php echo get_the_date('Y-m-d'); ?></div>
                                <?php if ($category_name) : ?>
                                    <div class="news-tag"><?php echo esc_html($category_name); ?></div>
                                <?php endif; ?>
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <a href="<?php the_permalink(); ?>" class="news-link">→</a>
                            </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <!-- お知らせデータがない場合のダミーデータ -->
                            <div class="news-item">
                                <div class="news-date">2025-04-01</div>
                                <div class="news-tag">お知らせ</div>
                                <h3 class="news-title"><a href="#">新サービス「AIマーケティング分析ツール」の提供を開始しました</a></h3>
                                <a href="#" class="news-link">→</a>
                            </div>
                            
                            <div class="news-item">
                                <div class="news-date">2025-03-15</div>
                                <div class="news-tag">イベント</div>
                                <h3 class="news-title"><a href="#">デジタルマーケティングセミナーを開催します（2025年4月10日）</a></h3>
                                <a href="#" class="news-link">→</a>
                            </div>
                            
                            <div class="news-item">
                                <div class="news-date">2025-03-01</div>
                                <div class="news-tag">採用情報</div>
                                <h3 class="news-title"><a href="#">2026年度新卒採用情報を公開しました</a></h3>
                                <a href="#" class="news-link">→</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="news-more">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="link-more">お知らせ一覧を見る →</a>
                </div>
            </div>
        </section>

        <!-- お問い合わせセクション -->
        <section class="contact-section">
            <div class="container-inner">
                <div class="section-header">
                    <h2 class="section-title">お問い合わせ</h2>
                    <p class="section-description">サービスに関するご質問や資料請求など、お気軽にお問い合わせください。</p>
                </div>
                
                <div class="contact-features">
                    <div class="contact-feature">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>サービスに関するご質問</span>
                    </div>
                    <div class="contact-feature">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>お見積り依頼</span>
                    </div>
                    <div class="contact-feature">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>資料請求</span>
                    </div>
                    
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">お問い合わせフォームへ →</a>
                </div>
            </div>
        </section>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>