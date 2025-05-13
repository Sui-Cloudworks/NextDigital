<?php
/**
 * Template Name: Standard Page Template
 * Template Post Type: page
 */

get_header();

// ページに応じた初期説明文の設定
$default_description = '';

// 現在のページIDまたはスラッグに基づいて初期値を設定
$current_page_id = get_the_ID();

// 各ページの初期説明文を設定
// これはページIDに基づく例です。必要に応じてスラッグやタイトルでの条件分岐も可能です
switch ($current_page_id) {
    case get_page_by_path('about')->ID:
        $default_description = 'Nexus Digitalは、お客様のビジネス成長を支援するデジタル戦略パートナーです。私たちの技術力とクリエイティブな発想で、お客様のビジネスに最適なソリューションを提供します。';
        break;
    case get_page_by_path('services')->ID:
        $default_description = 'Nexus Digitalは、企業のデジタル変革を総合的にサポートする多様なサービスを提供しています。';
        break;
    case get_page_by_path('works')->ID:
        $default_description = '私たちはさまざまな業界のお客様とともに数多くのプロジェクトを手がけてきました。実績一覧をご覧ください。';
        break;
    case get_page_by_path('contact')->ID:
        $default_description = 'お問い合わせ・ご相談はこちらのフォームからお気軽にご連絡ください。';
        break;
    // 必要に応じて他のページの説明文も追加
    default:
        $default_description = ''; // デフォルト値（空）
        break;
}

// ページが存在しない場合のエラー回避
if (!$default_description) {
    $default_description = '';
}
?>

<main id="primary" class="site-main standard-page">
    <!-- ページヒーローセクション -->
    <?php 
    get_template_part('template-parts/page-hero', null, array(
        'default_description' => $default_description
    )); 
    ?>

    <!-- メインコンテンツ -->
    <section class="page-content">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>