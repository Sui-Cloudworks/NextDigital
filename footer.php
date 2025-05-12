</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- ロゴの列 -->
            <div class="footer-column footer-branding">
                <div class="footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" width="160" height="38">
                    </a>
                </div>
                <p class="footer-description">
                    デジタルの力で驚きと感動を。<br>
                    企業のデジタルトランスフォーメーションを<br>
                    トータルサポートします。
                </p>
                <div class="footer-social">
                    <a href="#" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <!-- サイトマップの列 -->
            <div class="footer-column footer-sitemap">
                <h3 class="footer-title">サイトマップ</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">ホーム</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>">会社情報</a></li>
                    <li><a href="<?php echo esc_url(home_url('/services')); ?>">サービス</a></li>
                    <li><a href="<?php echo esc_url(home_url('/works')); ?>">実績</a></li>
                    <li><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
                </ul>
            </div>
            
            <!-- サービスの列 -->
            <div class="footer-column footer-services">
                <h3 class="footer-title">サービス</h3>
                <ul class="footer-links">
                    <?php
                    // サービスページの子ページを取得
                    $services = get_pages(array(
                        'child_of'    => get_page_by_path('services')->ID,
                        'sort_column' => 'menu_order',
                    ));
                    
                    if ($services) {
                        foreach ($services as $service) {
                            echo '<li><a href="' . esc_url(get_permalink($service->ID)) . '">' . esc_html($service->post_title) . '</a></li>';
                        }
                    } else {
                        // サービスページがない場合は固定のリンクを表示
                        ?>
                        <li><a href="<?php echo esc_url(home_url('/services/service-a')); ?>">デジタルマーケティング</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/service-b')); ?>">システム開発</a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/service-c')); ?>">DX戦略コンサルティング</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            
            <!-- お問い合わせの列 -->
            <div class="footer-column footer-contact">
                <h3 class="footer-title">お問い合わせ</h3>
                <address class="footer-address">
                    〒106-0032<br>
                    東京都港区六本木6-10-1<br>
                    六本木ヒルズ森タワー 23F
                </address>
                <p class="footer-tel">TEL: <a href="tel:0312345678">03-1234-5678</a></p>
                <p class="footer-email">E-mail: <a href="mailto:Test@test.jp">Test@test.jp</a></p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> Inc. All Rights Reserved.
            </div>
            <div class="footer-legal">
                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">プライバシーポリシー</a>
                <a href="<?php echo esc_url(home_url('/terms')); ?>">利用規約</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>