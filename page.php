<?php
/**
 * The template for displaying all single pages
 *
 * @package Universal_Base
 */

get_header();
?>

<style>
    .default-page-wrapper {
        padding: 60px 0 100px;
        background-color: #ffffff;
    }
    .default-page-header {
        text-align: center;
        margin-bottom: 50px;
        padding-bottom: 30px;
        border-bottom: 1px solid #eaeaea;
    }
    .default-page-title {
        font-size: 38px;
        font-weight: 800;
        color: #222;
        margin: 0;
    }
    .default-page-content {
        max-width: 850px; /* Lebar artikel ideal agar tidak melelahkan mata mendatar */
        margin: 0 auto;
        font-size: 16px;
        line-height: 1.8;
        color: #4a4a4a;
    }
    .default-page-content h2, .default-page-content h3 {
        color: #333;
        margin-top: 40px;
        margin-bottom: 15px;
    }
    .default-page-content p {
        margin-bottom: 20px;
    }
    .default-page-content ul, .default-page-content ol {
        margin-bottom: 20px;
        padding-left: 20px;
    }
    .default-page-content li {
        margin-bottom: 10px;
    }
    .default-page-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
</style>

<div class="default-page-wrapper">
    <div class="container">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <div class="default-page-header">
                <h1 class="default-page-title"><?php the_title(); ?></h1>
            </div>

            <main class="default-page-content">
                <?php 
                    the_content(); 
                    
                    // Fitur sisipan apabila halaman mengizinkan kolom komentar
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </main>
            
        <?php endwhile; ?>

    </div>
</div>

<?php 
get_footer();
