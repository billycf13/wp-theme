<?php
/**
 * The main template file
 *
 * @package Universal_Base
 */

get_header();
?>

    <?php if ( have_posts() ) : ?>

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <div class="posts-grid">
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    </header><!-- .entry-header -->
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
            endwhile;
            ?>
        </div>
        <?php

        the_posts_navigation();

    else :
        echo '<p>' . esc_html__( 'Sorry, no posts matched your criteria.', 'universal-base' ) . '</p>';
    endif;
    ?>

<?php
get_footer();
