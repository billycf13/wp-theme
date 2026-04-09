<?php
/**
 * The template for displaying all single posts / Artikel Blog
 *
 * @package Universal_Base
 */

get_header(); ?>

<style>
    .single-page-wrapper {
        padding: 0;
    }

    .single-layout {
        display: flex;
        gap: 40px;
    }

    .single-main {
        flex: 1.5;
        min-width: 0;
        background: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
    }

    .single-sidebar {
        flex: 0 0 28%;
        max-width: 28%;
    }

    .single-post-title {
        font-size: 36px;
        font-weight: 700;
        color: #333;
        line-height: 1.3;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .single-post-meta {
        font-size: 14px;
        color: #888;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .single-post-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .single-post-meta svg {
        width: 16px;
        height: 16px;
    }

    .single-post-meta a {
        color: #d91640;
        text-decoration: none;
    }

    .single-post-thumbnail {
        margin-bottom: 35px;
        border-radius: 6px;
        overflow: hidden;
    }

    .single-post-thumbnail img {
        width: 100%;
        height: auto;
        display: block;
    }

    .single-post-content {
        font-size: 16px;
        line-height: 1.8;
        color: #444;
    }

    .single-post-content h2,
    .single-post-content h3 {
        color: #222;
        margin-top: 35px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .single-post-content p {
        margin-bottom: 20px;
        text-align: justify;
    }

    .single-post-content a {
        color: #d91640;
        text-decoration: underline;
    }

    .single-post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin: 25px 0;
    }

    .single-post-content ul,
    .single-post-content ol {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .single-post-content li {
        margin-bottom: 10px;
    }

    .single-post-content blockquote {
        border-left: 4px solid #d91640;
        padding: 15px 20px;
        margin: 25px 0;
        background: #f9fafb;
        font-style: italic;
        color: #555;
    }

    /* Tags */
    .post-tags {
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #eee;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    .post-tags a {
        display: inline-block;
        background: #f1f5f9;
        color: #4b5563;
        padding: 6px 14px;
        border-radius: 4px;
        font-size: 13px;
        text-decoration: none;
        transition: background 0.2s;
    }

    .post-tags a:hover {
        background: #d91640;
        color: #fff;
    }

    /* Sidebar widget reuse */
    .widget {
        background: #fff;
        border: 1px solid #e5e7eb;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
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

    /* Comments Section */
    .comments-area {
        margin-top: 50px;
    }

    @media (max-width: 900px) {
        .single-layout {
            flex-direction: column;
        }

        .single-main {
            padding: 25px;
        }

        .single-post-title {
            font-size: 28px;
        }
    }
</style>

<div class="single-page-wrapper">
    <div class="container-produk">
        <div class="single-layout">

            <!-- Main Content Area -->
            <div class="single-main">
                <?php while (have_posts()):
                    the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <h1 class="single-post-title"><?php the_title(); ?></h1>

                        <div class="single-post-meta">
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Oleh <?php the_author(); ?>
                            </span>
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <?php echo get_the_date(); ?>
                            </span>
                            <span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                                    </path>
                                </svg>
                                <?php the_category(', '); ?>
                            </span>
                        </div>

                        <?php if (has_post_thumbnail()): ?>
                            <div class="single-post-thumbnail">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="single-post-content">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // Post Tags
                        if (has_tag()) {
                            echo '<div class="post-tags">';
                            echo '<strong>Tags:</strong>';
                            the_tags('', '', '');
                            echo '</div>';
                        }
                        ?>

                        <div class="comments-area">
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()):
                                comments_template();
                            endif;
                            ?>
                        </div>

                    </article>

                <?php endwhile; ?>
            </div>

            <!-- Right Sidebar Area -->
            <aside class="single-sidebar">
                <?php if (is_active_sidebar('sidebar-blog')): ?>
                    <?php dynamic_sidebar('sidebar-blog'); ?>
                <?php else: ?>
                    <!-- Dummy Widget -->
                    <div class="widget">
                        <h3 class="widget-title">Pencarian</h3>
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"
                            style="display:flex;">
                            <input type="search" class="search-field" placeholder="Cari..."
                                value="<?php echo get_search_query(); ?>" name="s"
                                style="flex:1; padding:10px; border:1px solid #ddd; border-radius:4px 0 0 4px; outline:none;" />
                            <button type="submit" class="search-submit"
                                style="background:#d91640; color:#fff; border:none; padding:10px 15px; border-radius:0 4px 4px 0; cursor:pointer;">Cari</button>
                        </form>
                    </div>

                    <div class="widget">
                        <h3 class="widget-title">Kategori Artikel</h3>
                        <ul>
                            <li><a href="#">Berita</a></li>
                            <li><a href="#">Edukasi & Tips</a></li>
                            <li><a href="#">Info Produk</a></li>
                            <li><a href="#">Press Release</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </aside>

        </div>
    </div>
</div>

<?php
get_footer();
