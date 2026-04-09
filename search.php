<?php
/**
 * The template for displaying search results
 *
 * @package Universal_Base
 */

get_header(); ?>

<style>
    .search-results-wrapper {
        padding: 60px 0 100px;
        background-color: #f9fafb;
        min-height: 70vh;
    }
    .search-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .search-title {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 25px;
    }
    .search-title span {
        color: #d91640;
    }
    .search-rebar {
        max-width: 600px;
        margin: 0 auto 50px;
    }
    .search-rebar .search-form {
        display: flex;
        box-shadow: 0 6px 20px rgba(0,0,0,0.06);
        border-radius: 50px;
        overflow: hidden;
    }
    .search-rebar input[type="search"] {
        flex: 1;
        padding: 16px 25px;
        border: 1px solid #eaeaea;
        border-right: none;
        border-radius: 50px 0 0 50px;
        font-size: 16px;
        outline: none;
        background: #fff;
    }
    .search-rebar button {
        background: #d91640;
        color: #fff;
        border: none;
        padding: 16px 35px;
        font-weight: bold;
        border-radius: 0 50px 50px 0;
        cursor: pointer;
        transition: background 0.3s;
    }
    .search-rebar button:hover {
        background: #b01030;
    }
    .search-list {
        max-width: 850px;
        margin: 0 auto;
    }
    .search-item {
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        border-left: 4px solid #eaeaea;
        transition: all 0.3s;
    }
    .search-item:hover {
        border-left-color: #d91640;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
        transform: translateX(6px);
    }
    .search-item-type {
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
        background: #f1f2f6;
        color: #555;
        padding: 4px 10px;
        border-radius: 20px;
        margin-bottom: 12px;
        display: inline-block;
        letter-spacing: 0.5px;
    }
    .search-item-title {
        font-size: 22px;
        margin: 0 0 15px 0;
    }
    .search-item-title a {
        color: #222;
        text-decoration: none;
        transition: color 0.2s;
    }
    .search-item-title a:hover {
        color: #d91640;
    }
    .search-item-excerpt {
        color: #666;
        line-height: 1.6;
        font-size: 15px;
        margin-bottom: 0;
    }
</style>

<div class="search-results-wrapper">
    <div class="container">
        
        <header class="search-header">
            <h1 class="search-title">Mencari: <span>"<?php echo get_search_query(); ?>"</span></h1>
            
            <div class="search-rebar">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" placeholder="Cari mesin, komponen, atau artikel..." value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit">Cari Ulang</button>
                </form>
            </div>
        </header>

        <div class="search-list">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article class="search-item">
                        <span class="search-item-type">
                            <?php 
                                $post_type = get_post_type();
                                if ($post_type == 'product') echo "🛍️ Produk";
                                elseif ($post_type == 'post') echo "📝 Artikel";
                                elseif ($post_type == 'page') echo "📄 Halaman";
                                else echo ucfirst($post_type);
                            ?>
                        </span>
                        <h2 class="search-item-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="search-item-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>

                <?php endwhile; ?>
                
                <div style="margin-top: 40px; text-align: center;">
                    <?php 
                        echo paginate_links( array(
                            'prev_text' => '&laquo; Sebelumnya',
                            'next_text' => 'Selanjutnya &raquo;',
                        ) ); 
                    ?>
                </div>

            <?php else : ?>
                <div style="text-align: center; padding: 60px; background: #fff; border-radius: 8px; border: 1px dashed #ddd;">
                    <h3 style="color:#d91640; font-size: 24px; margin-bottom:15px;">Maaf, tidak ada kecocokan.</h3>
                    <p style="color:#666; font-size:16px;">Silakan coba gunakan kata kunci yang lebih spesifik atau telusuri lewat menu kami di atas.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php 
get_footer();
