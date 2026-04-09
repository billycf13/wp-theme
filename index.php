<?php
/**
 * The main template file / Blog Archive
 *
 * @package Universal_Base
 */

get_header(); ?>

<style>
    .blog-page-wrapper {
        padding: 40px 0 80px;
        background-color: #f9fafb;
    }
    .blog-header {
        text-align: center;
        margin-bottom: 50px;
    }
    .blog-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
        text-transform: uppercase;
        position: relative;
        display: inline-block;
    }
    .blog-header h1::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background-color: #d91640;
    }
    .blog-layout {
        display: flex;
        gap: 40px;
    }
    .blog-main {
        flex: 1.5;
        min-width: 0;
    }
    .blog-sidebar {
        flex: 1;
        min-width: 300px;
    }
    .blog-post-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 40px;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s;
    }
    .blog-post-card:hover {
        transform: translateY(-5px);
    }
    .blog-post-img {
        position: relative;
        overflow: hidden;
        background: #eee;
    }
    .blog-post-img img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
        transition: transform 0.5s;
    }
    .blog-post-card:hover .blog-post-img img {
        transform: scale(1.05);
    }
    .blog-post-cat-badge {
        position: absolute;
        bottom: 15px;
        left: 15px;
        background: #d91640;
        color: #fff;
        padding: 4px 12px;
        font-size: 11px;
        font-weight: 600;
        border-radius: 20px;
        text-transform: uppercase;
        z-index: 2;
    }
    .blog-post-content {
        padding: 30px;
    }
    .blog-post-title {
        font-size: 22px;
        margin-top: 0;
        margin-bottom: 15px;
        line-height: 1.4;
    }
    .blog-post-title a {
        color: #333;
        text-decoration: none;
        transition: color 0.2s;
    }
    .blog-post-title a:hover {
        color: #d91640;
    }
    .blog-post-meta {
        font-size: 13px;
        color: #9ca3af;
        margin-bottom: 20px;
        display: flex;
        gap: 15px;
        align-items: center;
    }
    .blog-post-meta svg {
        width: 14px;
        height: 14px;
        vertical-align: -2px;
        margin-right: 4px;
    }
    .blog-post-excerpt {
        color: #555;
        line-height: 1.6;
        margin-bottom: 25px;
        font-size: 15px;
    }
    .btn-read-more {
        display: inline-flex;
        align-items: center;
        color: #d91640;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: opacity 0.3s;
    }
    .btn-read-more:hover {
        opacity: 0.8;
    }
    .btn-read-more svg {
        width: 16px;
        height: 16px;
        margin-left: 5px;
    }

    /* Sidebar Styling */
    .widget {
        background: #fff;
        border: 1px solid #e5e7eb;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    }
    .widget-title {
        font-size: 18px;
        color: #333;
        margin-top: 0;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
        position: relative;
    }
    .widget-title::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 40px;
        height: 2px;
        background-color: #d91640;
    }
    .widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .widget ul li {
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px dashed #eee;
    }
    .widget ul li:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    .widget ul li a {
        color: #4b5563;
        text-decoration: none;
        transition: color 0.2s;
    }
    .widget ul li a:hover {
        color: #d91640;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 30px;
    }
    .pagination .page-numbers {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        background: #fff;
        color: #333;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        border: 1px solid #e5e7eb;
        transition: all 0.3s;
    }
    .pagination .page-numbers:hover,
    .pagination .page-numbers.current {
        background: #d91640;
        color: #fff;
        border-color: #d91640;
    }

    @media (max-width: 768px) {
        .blog-layout {
            flex-direction: column;
        }
    }
</style>

<div class="blog-page-wrapper">
    <div class="container">
        
        <div class="blog-header">
            <?php if ( is_category() ) : ?>
                <h1>Kategori: <?php single_cat_title(); ?></h1>
            <?php elseif ( is_tag() ) : ?>
                <h1>Tag: <?php single_tag_title(); ?></h1>
            <?php elseif ( is_search() ) : ?>
                <h1>Pencarian: <?php echo get_search_query(); ?></h1>
            <?php else : ?>
                <h1>Berita & Artikel</h1>
                <p style="color:#666; margin-top:15px;">Informasi terbaru seputar alat uji, industri, dan teknologi instrumen terkini.</p>
            <?php endif; ?>
        </div>

        <div class="blog-layout">
            <div class="blog-main">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <article class="blog-post-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="blog-post-img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large' ); ?>
                                </a>
                                <?php 
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<span class="blog-post-cat-badge">' . esc_html( $categories[0]->name ) . '</span>';
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <div class="blog-post-content">
                            <h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            
                            <div class="blog-post-meta">
                                <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <?php the_author(); ?>
                                </span>
                            </div>

                            <div class="blog-post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn-read-more">
                                BACA ARTIKEL
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </article>

                <?php endwhile; ?>
                    
                    <div class="pagination">
                        <?php 
                        echo paginate_links( array(
                            'prev_text' => '&laquo; Prev',
                            'next_text' => 'Next &raquo;',
                        ) ); 
                        ?>
                    </div>

                <?php else : ?>
                    <div class="blog-post-card" style="padding: 40px; text-align: center;">
                        <h2 style="margin-top:0;">Belum Ada Konten.</h2>
                        <p style="color:#666;">Maaf, sepertinya halaman yang Anda cari tidak dapat ditemukan.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Sidebar -->
            <aside class="blog-sidebar">
                <?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
                <?php else : ?>
                    <!-- Dummy Widget if empty -->
                    <div class="widget">
                        <h3 class="widget-title">Pencarian</h3>
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display:flex;">
                            <input type="search" class="search-field" placeholder="Cari artikel..." value="<?php echo get_search_query(); ?>" name="s" style="flex:1; padding:10px; border:1px solid #ddd; border-radius:4px 0 0 4px; outline:none;" />
                            <button type="submit" class="search-submit" style="background:#d91640; color:#fff; border:none; padding:10px 15px; border-radius:0 4px 4px 0; cursor:pointer;">Cari</button>
                        </form>
                    </div>
                    
                    <div class="widget">
                        <h3 class="widget-title">Pos Terbaru</h3>
                        <ul>
                            <li><a href="#">Cara Kalibrasi Hardness Tester Secara Optimal</a></li>
                            <li><a href="#">Mengapa Water Test Kit Dibutuhkan di Pabrik Makanan?</a></li>
                            <li><a href="#">Tips Merawat pH Meter Agar Tetap Akurat</a></li>
                            <li><a href="#">Memilih Moisture Meter Sesuai Kebutuhan Anda</a></li>
                        </ul>
                    </div>
                    <div style="color:#d91640; font-size:12px; margin-top:15px; font-style:italic;">*Atur Widget Anda dari Dashboard > Tampilan > Widget > Blog Sidebar</div>
                <?php endif; ?>
            </aside>

        </div>
    </div>
</div>

<?php 
get_footer(); 
