<?php
/**
 * Template part for displaying posts
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
  </header>

  <div class="entry-content">
    <?php the_excerpt(); ?>
    <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more">続きを読む</a>
  </div>
</article>
