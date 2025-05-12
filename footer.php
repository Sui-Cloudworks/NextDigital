</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-container">
            <div class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>" width="160" height="38">
                </a>
            </div>
            
            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1,
                    ));
                    ?>
                </nav>
            <?php endif; ?>
            
            <div class="footer-info">
                <p>サイトマップ</p>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/services')); ?>">サービス</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
                </ul>
            </div>
            
            <div class="footer-contact">
                <p>お気軽にお問い合わせください</p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline">お問い合わせ</a>
            </div>
        </div>
        
        <div class="copyright">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> Inc. All Rights Reserved.
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