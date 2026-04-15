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

    // 3. Sidebar Untuk Halaman Single Product
    register_sidebar(array(
        'name' => esc_html__('Single Product Sidebar', 'wp-starter'),
        'id' => 'sidebar-single-product',
        'description' => esc_html__('Tambahkan widget yang akan muncul di sisi kanan SAAT pengunjung melihat detail satupun produk.', 'wp-starter'),
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

    // Deteksi apakah sedang di halaman Brand
    $is_brand_page = is_tax('pwb-brand') || is_tax('product_brand') || is_tax('yith_product_brand');

    // Cek apakah ini HANYA halaman utama toko (/produk)
    if (is_shop() && !is_product_category() && !is_product_tag() && !is_search() && !$is_brand_page) {

        // Kita "kosongkan" breadcrumb bawaannya
        $crumbs = array();

        // Item ke-1: Teks 'Product' yang bisa di-klik dan mengarah ke /produk
        $crumbs[] = array('', home_url('/produk'));

        $crumbs[] = array('Semua Produk', '');
    } elseif (is_product_category()) {
        // Ubah breadcrumb Home/Produk ke Kategori
        if (isset($crumbs[0])) {
            $crumbs[0][0] = 'Kategori';
            $crumbs[0][1] = home_url('/kategori');
        }
        // Pastikan tidak ada "Produk" ganda di tengah-tengah
        if (isset($crumbs[1]) && stripos($crumbs[1][0], 'produk') !== false) {
            unset($crumbs[1]);
            $crumbs = array_values($crumbs);
        }
    } elseif ($is_brand_page) {
        // Ubah breadcrumb Home/Produk ke Brand
        if (isset($crumbs[0])) {
            $crumbs[0][0] = 'Brand';
            $crumbs[0][1] = home_url('/brand');
        }
        // Pastikan tidak ada "Produk" ganda di tengah-tengah
        if (isset($crumbs[1]) && stripos($crumbs[1][0], 'produk') !== false) {
            unset($crumbs[1]);
            $crumbs = array_values($crumbs);
        }
    }

    // Kembalikan hasilnya ke sistem WooCommerce
    return $crumbs;
}

/**
 * 4. Merombak Urutan Tampilan Single Product
 */
function custom_reorder_single_product()
{
    // 1. Buang Rating asli bawaan, karena akan kita buat baris gabungan baru
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

    // 2. Harga dipindah jadi urutan 15
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 15);

    // 3. Masukkan Blok Bintang 5 Khusus & Stock di atas Harga (urutan 12)
    add_action('woocommerce_single_product_summary', 'render_custom_stock_and_rating', 12);

    // 4. Cabut Short Description asli karena kita jahit di dalam Tab Custom
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

    // 5. Masukkan Tab Buatan Sendiri (Custom) ke bawah Harga (urutan 20/25)
    add_action('woocommerce_single_product_summary', 'render_custom_summary_tabs', 25);

    // 6. Buang tombol ADD TO CART (Beli) asli bawaan dari WooCommerce
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

    // 7. Masukkan tombol Tanya via WhatsApp / Email (berada pas di bawah Tab, urutan 30)
    add_action('woocommerce_single_product_summary', 'render_custom_contact_buttons', 30);

    // 8. Membuang Meta bawaan (SKU, Categories, Tags) karena dimasukkan ke dalam Tab
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
}
add_action('wp', 'custom_reorder_single_product');

/**
 * Mencegah WooCommerce mencetak teks Stock ganda di bawah layar (menghilangkan bawaannya)
 */
add_filter('woocommerce_get_stock_html', '__return_empty_string');

/**
 * Mencetak Rating Permanen 5 Bintang & Posisi Stock dinamis
 */
function render_custom_stock_and_rating()
{
    global $product;
    if (!$product)
        return;

    // Deteksi ketersediaan asli
    // $is_in_stock = $product->is_in_stock();
    // $stock_qty = $product->get_stock_quantity();

    $stock_text = 'Tersedia';
    $stock_color = '#000';


    // if ($is_in_stock) {
    //     $stock_text = $stock_qty ? $stock_qty . ' in stock' : 'In stock';
    //     $stock_color = '#000'; // Hijau sesuai Tailwind (Accent color)
    // } else {
    //     $stock_text = 'Habis';
    //     $stock_color = '#000'; // Merah
    // }
    ?>
    <div class="custom-stock-rating" style="display:flex; align-items:center; gap:10px; margin-bottom:0px; flex-wrap:wrap;">

        <!-- Tulisan Stock Dinamis -->
        <span class="stock-info" style="font-size:14px; color:<?php echo $stock_color; ?>; font-weight:700;">
            ✓ <?php echo esc_html($stock_text); ?>
        </span>

        <span style="color:#d1d5db;">|</span>

        <!-- Bintang 5 Permanen (Hardcoded) -->
        <div class="rating-info" style="color:#f59e0b; font-size:18px; letter-spacing:1px;">
            &#9733;&#9733;&#9733;&#9733;&#9733;
            <span
                style="color:#64748b; font-size:13px; font-weight:500; letter-spacing:normal; margin-left:4px;">(5.0)</span>
        </div>

    </div>
    <?php
}

/**
 * Membuang tab "Additional Information" dari blok bawah bawaan 
 * agar tidak kembar dengan yang ada di Tab Atas kita.
 */
add_filter('woocommerce_product_tabs', 'remove_native_additional_info_tab', 98);
function remove_native_additional_info_tab($tabs)
{
    unset($tabs['additional_information']);
    return $tabs;
}

/**
 * Mencetak Tab Kustom rakitan sendiri berisi Short Description & Additional Info
 */
function render_custom_summary_tabs()
{
    global $product;
    if (!$product)
        return;

    $short_desc = $product->get_short_description();
    ?>
    <div class="custom-summary-tabs" style="margin: 0; padding:5px;">

        <!-- Navigasi Tab -->
        <div class="summary-tabs-nav"
            style="display:flex; border-bottom:1px solid #eee; margin-bottom:5px; gap: 5px; border-top: 1px solid #eee">
            <button type="button" class="summary-tab-btn" onclick="openSummaryTab(event, 'tab-shortdesc')"
                style="background:none; border:none; border-bottom:2px solid #d91640; padding:10px 5px; font-size:14px; font-weight:bold; cursor:pointer; color:#333;">Deskripsi
                Singkat</button>
            <button type="button" class="summary-tab-btn" onclick="openSummaryTab(event, 'tab-addinfo')"
                style="background:none; border:none; padding:10px 5px; font-size:14px; font-weight:bold; cursor:pointer; color:#777;">Informasi</button>
            <button type="button" class="summary-tab-btn" onclick="openSummaryTab(event, 'tab-detail')"
                style="background:none; border:none; padding:10px 5px; font-size:14px; font-weight:bold; cursor:pointer; color:#777;">Meta</button>
        </div>

        <!-- Isi Tab 1: Short Description -->
        <div id="tab-shortdesc" class="summary-tab-content">
            <?php echo apply_filters('woocommerce_short_description', $short_desc) ?: '<p>Tidak ada rincian singkat.</p>'; ?>
        </div>

        <!-- Isi Tab 2: Additional Info -->
        <div id="tab-addinfo" class="summary-tab-content" style="display:none; font-size:14px;">
            <?php do_action('woocommerce_product_additional_information', $product); ?>
        </div>

        <!-- Isi Tab 3: Detail Produk (Meta SKU & Category) -->
        <div id="tab-detail" class="summary-tab-content" style="display:none; font-size:14px;">
            <?php woocommerce_template_single_meta(); ?>
        </div>

    </div>

    <!-- Script Sederhana Penggerak Tab -->
    <script>
        function openSummaryTab(evt, tabName) {
            var i, tabcontent, tablinks;
            // Sembunyikan semua isi
            tabcontent = document.getElementsByClassName("summary-tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            // Matikan gaya tombol aktif
            tablinks = document.getElementsByClassName("summary-tab-btn");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.borderBottom = "none";
                tablinks[i].style.color = "#777";
            }
            // Nyalakan yang diklik
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.style.borderBottom = "2px solid #d91640";
            evt.currentTarget.style.color = "#333";
        }
    </script>
    <?php
}

/**
 * Mencetak Tombol Custom WhatsApp dan Email untuk menggantikan Add to Cart
 */
function render_custom_contact_buttons()
{
    global $product;
    if (!$product)
        return;

    $product_title = $product->get_name();
    $product_url = get_permalink($product->get_id());

    // Siapkan Teks Otomatis
    $wa_message = rawurlencode("Halo, saya tertarik dengan produk {$product_title}. Boleh minta detailnya selengkapnya? ({$product_url})");
    $email_subject = rawurlencode("Tanya Info: {$product_title}");
    $email_body = rawurlencode("Halo,\n\nSaya ingin bertanya lebih lanjut mengenai produk:\n{$product_title}\n\nLink: {$product_url}\n\nMohon informasi ketersediaannya. Terima kasih.");

    // TODO: Ganti dengan Nomor / Email Anda
    $wa_number = '6281234567890';
    $email_address = 'tanya@alat-test.com';
    ?>

    <div class="custom-contact-buttons" style="display:flex; gap:15px; margin: 0; flex-wrap:wrap;">

        <a href="https://wa.me/<?php echo $wa_number; ?>?text=<?php echo $wa_message; ?>" target="_blank"
            style="flex:1; min-width: 100px; text-align:center; background-color:#25D366; color:#fff; padding:12px 20px; font-weight:700; border-radius:6px; text-decoration:none; display:flex; justify-content:center; align-items:center; gap:8px; font-size:15px; transition:opacity 0.2s;"
            onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
            <svg style="width:20px; height:20px;" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.418-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.938 6.938-.001 3.826-3.113 6.938-6.938 6.938z" />
            </svg>
            WhatsApp
        </a>

        <a href="mailto:<?php echo $email_address; ?>?subject=<?php echo $email_subject; ?>&body=<?php echo $email_body; ?>"
            style="flex:1; min-width: 100px; text-align:center; background-color:#333; color:#fff; padding:12px 20px; font-weight:700; border-radius:6px; text-decoration:none; display:flex; justify-content:center; align-items:center; gap:8px; font-size:15px; transition:background 0.2s;"
            onmouseover="this.style.backgroundColor='#111'" onmouseout="this.style.backgroundColor='#333'">
            <svg style="width:20px; height:20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
            Email
        </a>
    </div>

    <?php
}

/**
 * Mencetak Rating Permanen 5 Bintang di Loop Produk (Katalog/Archive)
 */
function render_loop_product_rating()
{
    ?>
    <div class="loop-rating-info" style="color:#f59e0b; font-size:14px; margin-bottom:10px; text-align:center;">
        &#9733;&#9733;&#9733;&#9733;&#9733;
        <span style="color:#64748b; font-size:12px; font-weight:500; margin-left:4px;">(5.0)</span>
    </div>
    <?php
}
add_action('woocommerce_after_shop_loop_item_title', 'render_loop_product_rating', 5);

/**
 * Load internal components
 */
require get_template_directory() . '/inc/mega-menu.php';
