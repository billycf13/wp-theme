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

    /* Di halaman Katalog/Arsip, Sidebar ditarik ke KIRI */
    .is-archive-product {
        flex-direction: row-reverse;
    }

    /* Di Halaman Produk Tunggal, Sidebar jatuh di KANAN (default flow HTML kita) */
    .is-single-product {
        flex-direction: row;
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
        /* background: #fdfdfd; */
        /* border: 1px solid #e5e7eb; */
        border-radius: 4px;
        font-size: 16px !important;
        font-weight: 700;
    }

    .woocommerce-breadcrumb a {
        font-size: 16px !important;
        color: #d91640 !important;
        text-decoration: none;
        font-weight: 450 !important;
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

    p.price {
        color: #000 !important;
        margin: 5px 0 !important;
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

    /* Single Product */

    /* 1. Menyulap kontainer Single Product menjadi Flexbox agar gampang diatur celahnya */
    .woocommerce div.product {
        display: flex !important;
        flex-wrap: wrap;
        /* Agar aman jika dibuka di HP (turun ke bawah) */
        gap: 20px !important;
        /* <<-- KELOLA GAP / JARAK DI SINI */
        align-items: flex-start;
    }

    /* 2. Mematikan sistem peninggalan WooCommerce asli yang bikin repot */
    .woocommerce div.product div.images,
    .woocommerce div.product div.summary {
        float: none !important;
        width: auto !important;
        margin: 0 !important;
        /* Membersihkan margin asli/tersembunyi */
    }

    /* 3. Atur Ukuran Kolom Galeri Gambar (Product Gallery) dikecilkan */
    .woocommerce div.product div.images {
        flex: 0 0 40% !important;
        /* <<-- UBAH UKURAN GAMBAR DI SINI (Misalnya 35% atau 40%) */
    }

    /* 4. Atur Ukuran Kotak Teks (Summary) agar menghabiskan sisa ruangnya */
    .woocommerce div.product div.summary {
        flex: 1 !important;
        /* Akan otomatis mengambil sisa 60% - dikurangi gap */
    }

    /* Khusus untuk di HP (Mobile View) agar gambarnya full dan teksnya turun ke bawah */
    @media (max-width: 768px) {
        .woocommerce div.product {
            flex-direction: column;
        }

        .woocommerce div.product div.images {
            flex: 0 0 100% !important;
        }
    }

    .woo-main .type-product .woocommerce-product-gallery .flex-viewport {
        /* margin: 0; */
        background-color: #fff;
        border-radius: 5px;
    }

    ol.flex-control-nav.flex-control-thumbs {
        margin-top: 15px !important;
    }

    ol.flex-control-nav.flex-control-thumbs li img {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .woo-main .type-product .summary {
        margin: 0;
        background-color: #fff;
        padding: 15px;
        border-radius: 5px;
        box-sizing: border-box;
    }

    /* Desain Meta (SKU, Category, Brand) ala Tabel Tanpa Border */
    .product_meta {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 5px;
    }

    .product_meta>span {
        display: block;
        padding: 8px 12px;
        font-size: 14px;
        color: #64748b;
        /* Warna teks label (SKU:, Category:) */
    }

    /* Efek Zebra (belang-belang) mirip tabel */
    .product_meta>span:nth-child(even) {
        background-color: #f8fafc;
        border-radius: 4px;
    }

    /* Menonjolkan warna dinamis valuenya */
    .product_meta>span a,
    .product_meta>span .sku {
        font-weight: 700;
        color: #0f172a;
        margin-left: 6px;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .product_meta>span a:hover {
        color: #d91640;
        /* Hover merah ala tema kita */
    }

    .woocommerce-tabs {
        background-color: #fff;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .woocommerce-Tabs-panel {
        padding: 0 25px !important;
    }

    .woocommerce-Tabs-panel h2:first-child {
        display: none !important;
    }
</style>

<div class="container-produk">
    <div class="woo-wrapper <?php echo is_singular('product') ? 'is-single-product' : 'is-archive-product'; ?>">

        <!-- Kolom Utama (Konten & Breadcrumbs) -->
        <div class="woo-main">
            <?php
            if (function_exists('woocommerce_breadcrumb')) {
                woocommerce_breadcrumb();
            }
            ?>
            <?php woocommerce_content(); ?>
        </div>

        <!-- Kolom Sidebar -->
        <aside class="woo-sidebar">
            <?php
            if (is_singular('product')) {
                // Tampilan khusus Single Product
                if (is_active_sidebar('sidebar-single-product')) {
                    dynamic_sidebar('sidebar-single-product');
                } else {
                    echo '<div class="widget widget-shop"><h3 class="widget-title">Info Produk</h3><ul><li style="color:#666; font-size:13px; font-style:italic;">Anda belum menambahkan Widget di "Single Product Sidebar". Silakan atur di Dashboard > Tampilan > Widget.</li></ul></div>';
                }
            } else {
                // Tampilan Archive / Katalog
                if (is_active_sidebar('sidebar-shop')) {
                    dynamic_sidebar('sidebar-shop');
                } else {
                    echo '<div class="widget widget-shop"><h3 class="widget-title">Kategori Alat Test</h3><ul><li><a href="#">Contoh Kategori</a></li><li style="color:#d91640; font-size:12px; margin-top:15px; font-style:italic;">*Atur Widget Anda dari Dashboard > Tampilan > Widget > Shop Sidebar</li></ul></div>';
                }
            }
            ?>
        </aside>

    </div>
</div>

<?php
get_footer();
