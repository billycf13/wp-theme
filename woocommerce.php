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
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
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
        margin: 0 0 20px 0 !important;
        font-size: 28px;
        color: #333;
    }

    /* Breadcrumbs */
    .woocommerce-breadcrumb {
        font-size: 14px;
        color: #666;
        margin-bottom: 30px !important;
        padding: 12px 20px;
        background: #fdfdfd;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
    }

    .woocommerce-breadcrumb a {
        color: #d91640;
        text-decoration: none;
        font-weight: 500;
    }

    .woocommerce-breadcrumb a:hover {
        text-decoration: underline;
    }

    /* Product Grid Overrides */
    .woocommerce ul.products,
    .woocommerce-page ul.products {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 30px !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .woocommerce ul.products::before,
    .woocommerce ul.products::after {
        display: none !important;
    }

    .woocommerce ul.products li.product {
        width: 100% !important;
        margin: 0 !important;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 8px;
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
        padding-bottom: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .woocommerce ul.products li.product:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        border-color: #e5e7eb;
    }

    .woocommerce ul.products li.product img {
        margin-bottom: 15px;
        width: 100%;
        height: auto;
        display: block;
    }

    .woocommerce ul.products li.product .woocommerce-loop-product__title {
        font-size: 15px;
        color: #333;
        padding: 0 15px;
        margin-bottom: 10px;
        font-weight: 600;
        line-height: 1.4;
    }

    .woocommerce ul.products li.product .price {
        color: #d91640;
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 15px;
        display: block;
    }

    .woocommerce ul.products li.product .button {
        display: inline-block;
        background: #fff;
        color: #d91640;
        border: 1px solid #d91640;
        padding: 8px 20px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s;
        margin-top: auto;
        align-self: center;
    }

    .woocommerce ul.products li.product .button:hover {
        background: #d91640;
        color: #fff;
    }

    .woocommerce span.onsale {
        background-color: #d91640;
        border-radius: 4px;
        font-weight: bold;
        padding: 4px 8px;
        min-height: auto;
        min-width: auto;
        line-height: 1;
        top: 10px;
        left: 10px;
        right: auto;
    }

    @media(max-width: 1024px) {

        .woocommerce ul.products,
        .woocommerce-page ul.products {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    @media(max-width: 768px) {

        .woocommerce ul.products,
        .woocommerce-page ul.products {
            grid-template-columns: 1fr !important;
        }

        .woo-wrapper {
            flex-direction: column;
        }

        .woo-sidebar {
            flex: none;
            width: 100%;
        }
    }
</style>

<div class="container-produk">
    <div class="woo-wrapper">

        <?php
        // Only show Sidebar if it's an archive page (not a single product). 
        // Single Product will span 100% width automatically.
        if (!is_singular('product')): ?>
            <aside class="woo-sidebar">
                <?php if (is_active_sidebar('sidebar-shop')): ?>
                    <?php dynamic_sidebar('sidebar-shop'); ?>
                <?php else: ?>
                    <!-- Fallback if user hasn't added widgets yet -->
                    <div class="widget widget-shop">
                        <h3 class="widget-title">Kategori Alat Test</h3>
                        <ul>
                            <li><a href="#">Alat Kelistrikan</a></li>
                            <li><a href="#">Alat Ukur Cuaca</a></li>
                            <li><a href="#">Alat Ukur Kadar Air</a></li>
                            <li><a href="#">Thermometer</a></li>
                            <li><a href="#">Hardness Tester</a></li>
                            <li style="color:#d91640; font-size:12px; margin-top:15px; font-style:italic;">*Atur Widget Anda
                                dari Dashboard > Tampilan > Widget > Shop Sidebar</li>
                        </ul>
                    </div>
                <?php endif; ?>
            </aside>
        <?php endif; ?>

        <div class="woo-main">
            <!-- Menampilkan Penunjuk Arah (Breadcrumb) secara manual -->
            <?php
            if (function_exists('woocommerce_breadcrumb')) {
                woocommerce_breadcrumb();
            }
            ?>
            <!-- This magical function outputs EVERYTHING seamlessly -->
            <?php woocommerce_content(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
