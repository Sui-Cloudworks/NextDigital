<?php
/**
 * Template part for displaying contact CTA section
 *
 * @param array $args {
 *     Optional. Arguments to customize the contact CTA section.
 *
 *     @type string $title       The title text.
 *     @type string $description The description text.
 * }
 */

// デフォルト値の設定
$defaults = array(
    'title'       => '見出し',
    'description' => '説明文',
);

// 引数が渡された場合は、デフォルト値とマージ
$args = isset($args) ? wp_parse_args($args, $defaults) : $defaults;
?>

<section class="contact-cta">
    <div class="container">
        <div class="contact-cta-inner">
            <h2 class="contact-cta-title"><?php echo esc_html($args['title']); ?></h2>
            <p class="contact-cta-description"><?php echo esc_html($args['description']); ?></p>
            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-purple btn-lg">お問い合わせはこちら →</a>
        </div>
    </div>
</section>