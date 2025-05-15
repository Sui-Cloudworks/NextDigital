<?php
/**
 * Template part for displaying contact CTA section
 *
 * @param array $args {
 *     Optional. Arguments to customize the contact CTA section.
 *
 *     @type string $title       The title text.
 *     @type string $description The description text.
 *     @type string $background  Background color option (default or white).
 *     @type bool   $custom_style Whether to apply custom styles.
 * }
 */

// デフォルト値の設定
$defaults = array(
    'title'       => 'サービスに関するお問い合わせ',
    'description' => '各サービスの詳細や料金、導入事例などについてのご質問やご相談は、お気軽にお問い合わせください。専門のコンサルタントが丁寧にご対応いたします。',
    'background'  => 'default',
    'custom_style' => false,
);

// 引数が渡された場合は、デフォルト値とマージ
$args = isset($args) ? wp_parse_args($args, $defaults) : $defaults;

// 背景色のクラスを決定
$background_class = ($args['background'] === 'white') ? 'bg-white' : '';
$custom_style_class = ($args['custom_style']) ? 'custom-style' : '';
?>

<section class="contact-cta <?php echo esc_attr($background_class . ' ' . $custom_style_class); ?>">
    <div class="container">
        <div class="contact-cta-inner">
            <h2 class="contact-cta-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="contact-cta-description"><?php echo esc_html($args['description']); ?></p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-purple btn-lg">お問い合わせはこちら →</a>
        </div>
    </div>
</section>