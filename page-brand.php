<?php
/**
 * Template Name: Halaman Brand
 * 
 * Template for displaying the brands list page.
 */

get_header();

// Try to auto-detect brand taxonomy from popular WooCommerce Brand plugins
$brand_tax = '';
if (taxonomy_exists('pwb-brand')) { // Perfect WooCommerce Brands
    $brand_tax = 'pwb-brand';
} elseif (taxonomy_exists('product_brand')) { // WooCommerce Brands by YITH or Official
    $brand_tax = 'product_brand';
} elseif (taxonomy_exists('yith_product_brand')) { // Specific YITH flag
    $brand_tax = 'yith_product_brand';
}

// Fetch terms if taxonomy found
$brands = array();
if ($brand_tax) {
    $brands = get_terms(array(
        'taxonomy' => $brand_tax,
        'hide_empty' => false,
    ));
}
?>

<style>
    .brand-page-wrapper {
        padding: 40px 0 60px;
        /* background-color: #f8fafc; */
        min-height: 60vh;
    }

    .brand-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .brand-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 15px;
        text-transform: uppercase;
        position: relative;
        display: inline-block;
    }

    .brand-header h1::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background-color: #d91640;
        border-radius: 2px;
    }

    .brand-header p {
        color: #6b7280;
        font-size: 16px;
        max-width: 600px;
        margin: 20px auto 0;
        line-height: 1.6;
    }

    .brand-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .brand-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 30px 25px;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        height: 100%;
        min-height: 200px;
        box-sizing: border-box;
    }

    .brand-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 20px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -5px rgba(0, 0, 0, 0.04);
        border-color: #e2e8f0;
    }

    .brand-image {
        width: 100%;
        max-width: 120px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .brand-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .brand-image-placeholder {
        width: 70px;
        height: 70px;
        background-color: #fff1f2;
        color: #d91640;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brand-image-placeholder svg {
        width: 32px;
        height: 32px;
    }

    .brand-title {
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .brand-count {
        font-size: 13px;
        color: #64748b;
        background: #f1f5f9;
        padding: 4px 10px;
        border-radius: 20px;
        margin-bottom: 15px;
    }

    .brand-link-text {
        font-size: 14px;
        font-weight: 600;
        color: #d91640;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: auto;
    }

    .brand-link-text svg {
        transition: transform 0.2s;
    }

    .brand-card:hover .brand-link-text svg {
        transform: translateX(4px);
    }

    @media (max-width: 768px) {
        .brand-grid {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 20px;
        }
    }
</style>

<div class="brand-page-wrapper">
    <div class="brand-header">
        <h1>Brand & Merek Partner</h1>
        <p>Kami menjalin kemitraan erat dengan produsen dan brand alat ukur terkemuka di dunia untuk selalu menghadirkan
            produk dengan kualitas tak tertandingi.</p>
    </div>

    <div class="brand-grid">

        <?php if (!empty($brands) && !is_wp_error($brands)): ?>

            <?php foreach ($brands as $brand):
                // Coba ambil ID gambar. Beberapa plugin memakai 'thumbnail_id', yang lain 'pwb_brand_image'
                $thumbnail_id = get_term_meta($brand->term_id, 'thumbnail_id', true);
                if (!$thumbnail_id)
                    $thumbnail_id = get_term_meta($brand->term_id, 'pwb_brand_image', true);

                $image_url = '';
                if ($thumbnail_id) {
                    $image_url = wp_get_attachment_url($thumbnail_id);
                }
                ?>
                <a href="<?php echo esc_url(get_term_link($brand)); ?>" class="brand-card">
                    <div class="brand-image">
                        <?php if ($image_url): ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($brand->name); ?>">
                        <?php else: ?>
                            <div class="brand-image-placeholder">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h2 class="brand-title"><?php echo esc_html($brand->name); ?></h2>
                    <span class="brand-count"><?php echo esc_html($brand->count); ?> Produk</span>
                    <span class="brand-link-text">Lihat Merek <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg></span>
                </a>
            <?php endforeach; ?>

        <?php else: ?>

            <!-- Default Sample Display if NO plugin taxonomy is found atau brand belum dibuat -->
            <?php
            $sample_brands = array('Fluke', 'Mitutoyo', 'Hanna Instruments', 'Testo', 'Extech', 'Bosch');
            foreach ($sample_brands as $brand_name):
                ?>
                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="brand-card">
                    <div class="brand-image">
                        <div class="brand-image-placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="brand-title"><?php echo esc_html($brand_name); ?></h2>
                    <span class="brand-count">Mitra Resmi</span>
                    <span class="brand-link-text">Lihat Merek <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg></span>
                </a>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>

<?php
get_footer();
