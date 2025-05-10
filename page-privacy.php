<?php
/**
 * Template Name: Privacy Policy Page
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main privacy-page">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <div class="container">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </div>
            </header>

            <div class="entry-content">
                <div class="container">
                    <div class="privacy-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>