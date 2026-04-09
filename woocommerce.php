<?php
/**
 * Custom WooCommerce Template Override
 *
 * Handles both the Shop Archive and Single Product generic wrap.
 *
 * @package Universal_Base
 */

get_header(); ?>

<style>
    .woo-wrapper {
        display: flex;
        gap: 30px;
        margin: 40px 0 80px;
    }
    .woo-sidebar {
        flex: 0 0 260px;
    }
    .woo-main {
        flex: 1;
        min-width: 0;
    }
    /* Widget Styling for the Left Panel */
    .widget-shop {
        background: #fff;
        border: 1px solid #e5e7eb;
        padding: 20px;
        margin-bottom: 25px;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.03);
    }
    .widget-shop .widget-title {
        font-size: 16px;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 15px;
        border-bottom: 2px solid #d91640;
        padding-bottom: 10px;
        display: inline-block;
        color: #333;
    }
    .widget-shop ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .widget-shop ul li {
        margin-bottom: 10px;
        font-size: 14px;
        border-bottom: 1px dashed #eee;
        padding-bottom: 8px;
    }
    .widget-shop ul li:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }
    .widget-shop ul li a {
        color: #4b5563;
        text-decoration: none;
        transition: color 0.2s;
    }
    .widget-shop ul li a:hover {
        color: #d91640;
    }
    /* Title area when archiving */
    .woo-archive-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e7eb;
    }
    .woocommerce-products-header__title {
        margin: 0;
        font-size: 28px;
        color: #333;
    }
    
    @media(max-width: 768px) {
        .woo-wrapper {
            flex-direction: column;
        }
        .woo-sidebar {
            flex: none;
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="woo-wrapper">
        
        <?php 
        // Only show Sidebar if it's an archive page (not a single product). 
        // Single Product will span 100% width automatically.
        if ( ! is_singular( 'product' ) ) : ?>
            <aside class="woo-sidebar">
                <?php if ( is_active_sidebar( 'sidebar-shop' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-shop' ); ?>
                <?php else : ?>
                    <!-- Fallback if user hasn't added widgets yet -->
                    <div class="widget widget-shop">
                        <h3 class="widget-title">Kategori Alat Test</h3>
                        <ul>
                            <li><a href="#">Alat Kelistrikan</a></li>
                            <li><a href="#">Alat Ukur Cuaca</a></li>
                            <li><a href="#">Alat Ukur Kadar Air</a></li>
                            <li><a href="#">Thermometer</a></li>
                            <li><a href="#">Hardness Tester</a></li>
                            <li style="color:#d91640; font-size:12px; margin-top:15px; font-style:italic;">*Atur Widget Anda dari Dashboard > Tampilan > Widget > Shop Sidebar</li>
                        </ul>
                    </div>
                <?php endif; ?>
            </aside>
        <?php endif; ?>

        <div class="woo-main">
            <!-- This magical function outputs EVERYTHING seamlessly -->
            <?php woocommerce_content(); ?>
        </div>
    </div>
</div>

<?php 
get_footer(); 
