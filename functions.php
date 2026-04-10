<?php
/**
 * Theme Functions
 *
 * @package Universal_Base
 */

if (!function_exists('wp_starter_setup')):
    function wp_starter_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Register Navigation Menus
        register_nav_menus(array(
            'primary-menu' => esc_html__('Primary Menu', 'wp-starter'),
            'footer-menu' => esc_html__('Footer Menu', 'wp-starter'),
            'kategori-produk' => esc_html__('Kategori Produk', 'wp-starter'),
        ));

        // WooCommerce Support: This is required to hijack the styling safely.
        add_theme_support('woocommerce');

        // WooCommerce Enhancements (Slider, Zoom, Lightbox on single product)
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
endif;
add_action('after_setup_theme', 'wp_starter_setup');

/**
 * Register widget areas (Sidebar).
 */
function wp_starter_widgets_init()
{
    // 1. Sidebar Untuk Halaman Blog & Single Post
    register_sidebar(array(
        'name' => esc_html__('Blog Sidebar', 'wp-starter'),
        'id' => 'sidebar-blog',
        'description' => esc_html__('Tambahkan widget di sini untuk muncul di sisi kanan halaman Blog dan Artikel (Single Post).', 'wp-starter'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    // 2. Sidebar Untuk Halaman Toko / WooCommerce
    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar', 'wp-starter'),
        'id' => 'sidebar-shop',
        'description' => esc_html__('Tambahkan widget khusus jualan (Filter WooCommerce, Brand, Harga, dll) ke sisi kiri halaman Katalog.', 'wp-starter'),
        'before_widget' => '<div id="%1$s" class="widget widget-shop %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'wp_starter_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wp_starter_scripts()
{
    wp_enqueue_style('wp-starter-style', get_stylesheet_uri());
    wp_enqueue_style('wp-starter-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'wp_starter_scripts');

/**
 * Move WooCommerce Taxonomy / Archive Description below the products
 */
function wp_starter_move_archive_description()
{
    remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
    remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

    // Pindahkan deskripsi agar tampil di bawah grid (product loop)
    add_action('woocommerce_after_main_content', 'woocommerce_taxonomy_archive_description', 5);
    add_action('woocommerce_after_main_content', 'woocommerce_product_archive_description', 5);

    // Nonaktifkan breadcrumb default agar tidak dobel karena sudah kita panggil manual
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}
add_action('wp', 'wp_starter_move_archive_description');


/**
 * 1. Mengubah Separator dan Teks "Home" menjadi "Produk"
 */
add_filter('woocommerce_breadcrumb_defaults', 'custom_woocommerce_breadcrumbs');
function custom_woocommerce_breadcrumbs($defaults)
{
    if (is_shop() && !is_product_category() && !is_product_tag() && !is_search()) {

        $defaults['delimiter'] = '';
    } else {
        // Mengubah separator. Anda bisa pakai ' >> ' atau ' &raquo; ' (untuk panah ganda halus)
        $defaults['delimiter'] = ' &raquo; ';

        // Mengubah teks "Home" menjadi "Produk"
        $defaults['home'] = 'Produk';
    }

    return $defaults;
}

/**
 * 2. Mengubah arah URL dari tautan "Home" awal ke /produk
 */
add_filter('woocommerce_breadcrumb_home_url', 'custom_breadcrumb_home_url');
function custom_breadcrumb_home_url()
{
    // Memaksa tautan breadcrumb pertama agar mengarah ke situsanda.com/produk
    return home_url('/produk');
}

/**
 * 3. Mengubah Total Isi Breadcrumb HANYA di halaman utama /produk
 */
add_filter('woocommerce_get_breadcrumb', 'custom_modify_shop_breadcrumb', 10, 2);
function custom_modify_shop_breadcrumb($crumbs, $breadcrumb)
{

    // Cek apakah ini HANYA halaman utama toko (/produk)
    // dan BUKAN halaman kategori, tag, atau pencarian.
    if (is_shop() && !is_product_category() && !is_product_tag() && !is_search()) {

        // Kita "kosongkan" breadcrumb bawaannya
        $crumbs = array();

        // Item ke-1: Teks 'Product' yang bisa di-klik dan mengarah ke /produk
        $crumbs[] = array('', home_url('/produk'));

        // Item ke-2: Teks 'All Product' (tanpa URL karena merupakan halaman aktif saat ini)
        $crumbs[] = array('Semua Produk', '');
    }

    // Kembalikan hasilnya ke sistem WooCommerce
    return $crumbs;
}
