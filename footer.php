<footer class="site-footer">
    <div class="container">
        <div class="footer-columns">
            <!-- 1. 企業情報 -->
            <div class="footer-column">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.png" alt="<?php bloginfo('name'); ?>" class="footer-logo">
                <p class="footer-catchphrase">デジタルの力で驚きと感動を。<br>企業のデジタルトランスフォーメーションを<br>トータルサポートします。</p>
                <div class="social-icons">
                    <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <!-- 2. サイトマップ -->
            <div class="footer-column">
                <h3>サイトマップ</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_class' => 'footer-menu',
                    'container' => false
                ));
                ?>
            </div>
            
            <!-- 3. サービス -->
            <div class="footer-column">
                <h3>サービス</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'services-menu',
                    'menu_class' => 'footer-menu',
                    'container' => false
                ));
                ?>
            </div>
            
            <!-- 4. お問い合わせ -->
            <div class="footer-column">
                <h3>お問い合わせ</h3>
                <p>お気軽にお問い合わせください</p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="contact-button">お問い合わせ</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="copyright">
                &copy; 2025 Nexus Digital Inc. All Rights Reserved.
            </div>
            <div class="footer-links">
                <a href="<?php echo esc_url(home_url('/privacy')); ?>">プライバシーポリシー</a>
                <a href="<?php echo esc_url(home_url('/terms')); ?>">利用規約</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>