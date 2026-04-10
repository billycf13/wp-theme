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
        gap: 20px;
        margin: 15px 0 30px;
    }

    .woo-sidebar {
        flex: 0 0 270px;
    }

    .woo-main {
        flex: 1;
        min-width: 0;
    }

    /* Widget Styling for the Left Panel */
    .widget-shop {
        background: #fff;
        border: 1px solid #e5e7eb;
        padding: 15px;
        margin-bottom: 25px;
        border-radius: 6px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
    }

    .widget-shop .widget-title {
        font-size: 14px;
        font-weight: 500;
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
        border-bottom: 1px dashed #aaa;
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
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e5e7eb;
    }

    .woocommerce-products-header__title {
        margin: 0 0 10px 0 !important;
        font-size: 28px;
        color: #333;
    }

    /* Breadcrumbs */
    .woocommerce-breadcrumb {
        color: #333 !important;
        margin-bottom: 15px !important;
        padding: 3px !important;
        background: #fdfdfd;
        border: 1px solid #e5e7eb;
        border-radius: 4px;
    }

    .woocommerce-breadcrumb a {
        font-size: 16px;
        color: #d91640 !important;
        text-decoration: none;
        font-weight: 500;
    }

    .woocommerce-breadcrumb a:first-child {
        margin-left: 10px;
    }

    .woocommerce-breadcrumb a:hover {
        text-decoration: underline;
    }

    .page-title {
        display: none;
    }

    .woocommerce-result-count {
        display: none;
    }

    .woocommerce-ordering {
        display: none;
    }

    /* Product Grid Overrides */
    .woocommerce ul.products,
    .woocommerce-page ul.products {
        display: grid !important;
        gap: 20px !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Adaptasi Otomatis dengan Pengaturan Kolom Bawaan WordPress/WooCommerce */
    .woocommerce ul.products.columns-1 {
        grid-template-columns: repeat(1, 1fr) !important;
    }

    .woocommerce ul.products.columns-2 {
        grid-template-columns: repeat(2, 1fr) !important;
    }

    .woocommerce ul.products.columns-3 {
        grid-template-columns: repeat(3, 1fr) !important;
    }

    .woocommerce ul.products.columns-4 {
        grid-template-columns: repeat(4, 1fr) !important;
    }

    .woocommerce ul.products.columns-5 {
        grid-template-columns: repeat(5, 1fr) !important;
    }

    .woocommerce ul.products.columns-6 {
        grid-template-columns: repeat(6, 1fr) !important;
    }

    /* Fallback standar 3 kolom jika tidak ada pengaturan sama sekali */
    .woocommerce ul.products:not([class*="columns-"]) {
        grid-template-columns: repeat(3, 1fr) !important;
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

    .woocommerce-pagination {
        margin-top: 15px;
        border: none;
    }

    .woocommerce-pagination ul {
        border: none;
    }

    .woocommerce-pagination ul li {
        background-color: #fff;
        border: none;
        border-radius: 5px;
    }

    .woocommerce-pagination ul li a {
        color: #d91640;
    }

    .woocommerce-pagination ul li a:hover {
        background-color: #d91640 !important;
        color: #fff !important;
    }

    .current {
        background-color: #b51030 !important;
        color: #fff !important;
    }

    @media(max-width: 1024px) {

        .woocommerce ul.products[class*="columns-"],
        .woocommerce ul.products,
        .woocommerce-page ul.products {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    @media(max-width: 768px) {

        .woocommerce ul.products[class*="columns-"],
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
