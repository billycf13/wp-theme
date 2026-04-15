<?php
/**
 * Mega Menu Auto Generator from WooCommerce Product Categories
 */

// Menambahkan CSS khusus untuk Mega Menu di wp_head
add_action('wp_head', 'wp_starter_mega_menu_css');
function wp_starter_mega_menu_css()
{
    ?>
    <style>
        .header-main-container {
            position: relative;
        }

        /* Container untuk dropdown Mega Menu */
        .wrapper-dropdown-kategori {
            position: static !important;
        }

        .header-category {
            height: 100%;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .mega-menu-wrapper {
            position: absolute;
            top: 100%;
            left: 15px;
            right: 15px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            display: none;
            margin-top: 10px;
        }

        /* Tampilkan saat class active (klik via JS) */
        .wrapper-dropdown-kategori.active .mega-menu-wrapper {
            display: block;
            animation: fadeInMenu 0.25s ease-out forwards;
        }

        @keyframes fadeInMenu {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mega-menu-content-area {
            display: flex;
            min-height: 450px;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
        }

        /* Level 1: Vertical Tabs Kiri (Root Categories) */
        .mega-menu-sidebar-left {
            width: 335px;
            flex-shrink: 0;
            background-color: #f9fafb;
            border-right: 1px solid #e5e7eb;
            padding: 15px 0;
            overflow-y: auto;
            max-height: 550px;
        }

        .mega-menu-level-1 {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .tab-level-1 {
            padding: 10px 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #4b5563;
            font-weight: 600;
            transition: all 0.2s;
            border-left: 4px solid transparent;
        }

        .tab-level-1:hover,
        .tab-level-1.active {
            background-color: #ffffff;
            color: #d91640;
            border-left-color: #d91640;
            box-shadow: 0 -1px 0 #f3f4f6, 0 1px 0 #f3f4f6;
        }

        .tab-level-1 svg {
            color: #9ca3af;
            transition: transform 0.2s;
        }

        .tab-level-1.active svg {
            color: #d91640;
            transform: translateX(4px);
        }

        /* Level 2 & 3 Area Kanan (Sub-categories Grid) */
        .mega-menu-right-area {
            flex: 1;
            padding: 0 40px 30px 40px;
            background-color: #fff;
            overflow-y: auto;
            max-height: 550px;
        }

        /* Panel untuk setiap Level 1 */
        .mega-menu-panel-1 {
            display: none;
            animation: fadeInPanel 0.3s ease-in-out;
        }

        @keyframes fadeInPanel {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .mega-menu-panel-1.active {
            display: block;
        }

        .mega-menu-header {
            margin-bottom: 25px;
            padding-top: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 10;
        }

        .mega-menu-header h3 {
            margin: 0;
            font-size: 20px;
            color: #111827;
            font-weight: 800;
        }

        .mega-menu-header a {
            font-size: 14px;
            color: #d91640;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: opacity 0.2s;
            white-space: nowrap;
        }

        .mega-menu-header a:hover {
            opacity: 0.8;
            text-decoration: underline;
        }

        /* Grid Kolom */
        .mega-menu-masonry {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* 2 grid agar muat banyak text tanpa terpotong, sisanya scroll ke bawah */
            gap: 20px 30px;
            align-items: start;
        }

        .mega-menu-column {
            background: #ffffff;
        }

        /* Level 2 Headers in Grid */
        .mega-menu-title-2 {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
            line-height: 1.4;
        }

        /* Tampilan Level 2 sebagai tombol/card jika tidak punya level 3 */
        .mega-menu-title-2 a {
            color: inherit;
            text-decoration: none;
            padding: 10px 12px;
            display: block;
            border-radius: 6px;
            background-color: #f9fafb;
            border: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        .mega-menu-title-2 a:hover {
            color: #d91640;
            background-color: #fef2f2;
            border-color: #fee2e2;
            transform: translateY(-1px);
        }

        /* Jika punya sub menu (Level 3), kembalikan gaya ke sekedar judul Group Text */
        .mega-menu-column:has(.mega-menu-level-3) .mega-menu-title-2 a {
            background-color: transparent !important;
            border-color: transparent !important;
            padding: 0 0 10px 0 !important;
            transform: none !important;
        }

        .mega-menu-column:has(.mega-menu-level-3) .mega-menu-title-2 a:hover {
            color: #d91640 !important;
            text-decoration: underline;
        }

        /* Level 3 List Items in Grid */
        .mega-menu-level-3 {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .mega-menu-level-3 li {
            margin-bottom: 4px;
        }

        .mega-menu-level-3 a {
            font-size: 13px;
            color: #6b7280;
            text-decoration: none;
            transition: color 0.1s, padding-left 0.2s;
            display: block;
            padding: 6px 12px;
            border-radius: 4px;
        }

        .mega-menu-level-3 a:hover {
            color: #d91640;
            background-color: #fef2f2;
            padding-left: 16px;
        }

        @media (max-width: 900px) {
            .wrapper-dropdown-kategori {
                display: none;
            }
        }
    </style>
    <?php
}

function wp_starter_render_mega_menu()
{
    // Pastikan WooCommerce aktif
    if (!class_exists('WooCommerce')) {
        return '<div class="mega-menu-wrapper"><p style="padding:20px;">WooCommerce belum aktif.</p></div>';
    }

    // Mengambil cache jika ada (untuk mempercepat loading)
    $cache_key = 'wp_starter_mega_menu_html_v3';
    $cached_html = get_transient($cache_key);

    if (false !== $cached_html) {
        return $cached_html;
    }

    // 1. Get Top Level Categories (Level 1)
    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'parent' => 0, // Top level only
        'orderby' => 'name',
    );
    $top_categories = get_terms($args);

    if (empty($top_categories) || is_wp_error($top_categories)) {
        return '<div class="mega-menu-wrapper"><p style="padding:20px;">Belum ada kategori produk.</p></div>';
    }

    ob_start();
    ?>
    <div class="mega-menu-wrapper">
        <div class="mega-menu-content-area">

            <!-- Area Kiri: Sidebar Menu Utama (Level 1) -->
            <div class="mega-menu-sidebar-left">
                <ul class="mega-menu-level-1">
                    <?php foreach ($top_categories as $index => $top_cat): ?>
                        <li class="tab-level-1 <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-target="mega-tab-<?php echo esc_attr($top_cat->term_id); ?>">
                            <span><?php echo esc_html($top_cat->name); ?></span>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Area Kanan: Grid Sub-Kategori -->
            <div class="mega-menu-right-area">
                <?php foreach ($top_categories as $index => $top_cat): ?>
                    <div id="mega-tab-<?php echo esc_attr($top_cat->term_id); ?>"
                        class="mega-menu-panel-1 <?php echo $index === 0 ? 'active' : ''; ?>">

                        <div class="mega-menu-header">
                            <h3>Kategori <?php echo esc_html($top_cat->name); ?></h3>
                            <a href="<?php echo esc_url(get_term_link($top_cat)); ?>">Lihat Semua &rarr;</a>
                        </div>

                        <?php
                        // Get Level 2 Categories (Grid Columns)
                        $level_2_args = array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                            'parent' => $top_cat->term_id,
                            'orderby' => 'name',
                        );
                        $level_2_categories = get_terms($level_2_args);

                        if (!empty($level_2_categories) && !is_wp_error($level_2_categories)):
                            ?>
                            <div class="mega-menu-masonry">
                                <?php foreach ($level_2_categories as $cat_2): ?>
                                    <div class="mega-menu-column">
                                        <h4 class="mega-menu-title-2">
                                            <a href="<?php echo esc_url(get_term_link($cat_2)); ?>">
                                                <?php echo esc_html($cat_2->name); ?>
                                            </a>
                                        </h4>

                                        <?php
                                        // Get Level 3 Categories (List Items)
                                        $level_3_args = array(
                                            'taxonomy' => 'product_cat',
                                            'hide_empty' => false, // Tampilkan meski kosong, atau true tegantung selera
                                            'parent' => $cat_2->term_id,
                                            'orderby' => 'name',
                                        );
                                        $level_3_categories = get_terms($level_3_args);

                                        if (!empty($level_3_categories) && !is_wp_error($level_3_categories)):
                                            ?>
                                            <ul class="mega-menu-level-3">
                                                <?php foreach ($level_3_categories as $cat_3): ?>
                                                    <li>
                                                        <a href="<?php echo esc_url(get_term_link($cat_3)); ?>">
                                                            <?php echo esc_html($cat_3->name); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div style="padding: 20px 0;">
                                <p style="color:#6b7280; font-size:14px; margin-bottom: 10px;">Tidak ada sub-kategori khusus.</p>
                                <a href="<?php echo esc_url(get_term_link($top_cat)); ?>"
                                    style="color:#d91640; font-weight:500; font-size:14px; text-decoration:underline;">Telusuri
                                    koleksi <?php echo esc_html($top_cat->name); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

    <!-- Script Interaksi (Klik Kategori & Klik Tab Kiri) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // 1. Togle Mega Menu Utama (Dropdown) saat mengklik Kategori
            const wrapperKategori = document.querySelector('.wrapper-dropdown-kategori');
            if (wrapperKategori) {
                wrapperKategori.addEventListener('click', function (e) {
                    // Mencegah menu tertutup jika mengklik area DALAM dropdown (panel kanan/kiri)
                    if (e.target.closest('.mega-menu-wrapper')) {
                        return;
                    }
                    e.preventDefault();
                    wrapperKategori.classList.toggle('active');
                });

                // Tutup menu jika user klik mouse di luar dari area kategori
                document.addEventListener('click', function (e) {
                    if (!wrapperKategori.contains(e.target)) {
                        wrapperKategori.classList.remove('active');
                    }
                });
            }

            // 2. Togle Tab Kategori bagian sebelah kiri
            const tabLevel1 = document.querySelectorAll('.tab-level-1');
            tabLevel1.forEach(tab => {
                // Diubah dari 'mouseenter' menjadi 'click'
                tab.addEventListener('click', function (e) {
                    const targetId = this.getAttribute('data-target');

                    // Matikan semua tab kiri & panel kanan
                    const allTabs = document.querySelectorAll('.tab-level-1');
                    const allPanels = document.querySelectorAll('.mega-menu-panel-1');

                    allTabs.forEach(t => t.classList.remove('active'));
                    allPanels.forEach(p => p.classList.remove('active'));

                    // Nyalakan target yang diklik
                    this.classList.add('active');
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.add('active');
                    }
                });
            });
        });
    </script>
    <?php
    $html = ob_get_clean();

    // Simpan cache selama 12 jam (43200 detik). 
    set_transient($cache_key, $html, HOUR_IN_SECONDS * 12);

    return $html;
}

// Function to clear cache when a product category is updated
add_action('create_product_cat', 'wp_starter_clear_mega_menu_cache');
add_action('edit_product_cat', 'wp_starter_clear_mega_menu_cache');
add_action('delete_product_cat', 'wp_starter_clear_mega_menu_cache');
function wp_starter_clear_mega_menu_cache()
{
    delete_transient('wp_starter_mega_menu_html_v3');
    delete_transient('wp_starter_mega_menu_html_v2');
    delete_transient('wp_starter_mega_menu_html');
}
