<?php
/**
 * Header template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( "charset" ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <!-- ヘッダーコンテンツ -->
  <div class="container">
    <div class="site-branding">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a href="<?php echo esc_url( home_url( "/" ) ); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="custom-logo">
        </a>
      <?php endif; ?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( "/" ) ); ?>"><?php bloginfo( "name" ); ?></a></h1>
    </div>
    <nav class="main-navigation">
      <?php
      wp_nav_menu( array(
        "theme_location" => "primary",
        "menu_id"        => "primary-menu",
      ) );
      ?>
    </nav>
  </div>
</header>
