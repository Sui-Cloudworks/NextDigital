<section class="services-overview section">
    <div class="container">
        <h2 class="section-title">サービス</h2>
        
        <div class="services-list">
            <?php
            // サービスの子ページを取得
            $services_page = get_page_by_path('services');
            
            if ($services_page) {
                $services = get_pages(array(
                    'child_of'    => $services_page->ID,
                    'sort_column' => 'menu_order',
                ));
                
                if ($services) {
                    foreach ($services as $service) {
                        // サービスのアイコンを取得（ACFを使用）
                        $service_icon = '';
                        if (function_exists('get_field')) {
                            $service_icon = get_field('service_icon', $service->ID);
                        }
                        
                        // サービスの説明を取得
                        $service_excerpt = get_the_excerpt($service->ID);
                        ?>
                        <div class="service-item">
                            <?php if ($service_icon) : ?>
                                <div class="service-icon">
                                    <img src="<?php echo esc_url($service_icon); ?>" alt="<?php echo esc_attr($service->post_title); ?>">
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="service-title"><?php echo esc_html($service->post_title); ?></h3>
                            
                            <div class="service-description">
                                <?php echo wp_kses_post($service_excerpt); ?>
                            </div>
                            
                            <a href="<?php echo esc_url(get_permalink($service->ID)); ?>" class="btn btn-outline btn-sm">詳細を見る</a>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>サービスの詳細ページがまだありません。</p>';
                }
            } else {
                // 手動でサービス一覧を表示
                ?>
                <div class="service-item">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </div>
                    <h3 class="service-title">Webサイト制作</h3>
                    <div class="service-description">
                        <p>ユーザビリティに配慮した、見やすく使いやすいWebサイトを制作します。</p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/services/service-a')); ?>" class="btn btn-outline btn-sm">詳細を見る</a>
                </div>
                
                <div class="service-item">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                    </div>
                    <h3 class="service-title">デザイン</h3>
                    <div class="service-description">
                        <p>企業やブランドの個性を活かしたグラフィックデザインやロゴデザインを提供します。</p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/services/service-b')); ?>" class="btn btn-outline btn-sm">詳細を見る</a>
                </div>
                
                <div class="service-item">
                    <div class="service-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3 class="service-title">システム開発</h3>
                    <div class="service-description">
                        <p>業務効率化のためのカスタムシステムやWebアプリケーションを開発します。</p>
                    </div>
                    <a href="<?php echo esc_url(home_url('/services/service-c')); ?>" class="btn btn-outline btn-sm">詳細を見る</a>
                </div>
                <?php
            }
            ?>
        </div>
        
        <div class="services-more">
            <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn">サービス一覧</a>
        </div>
    </div>
</section>