<?php
/**
 * Template Name: Halaman Kategori
 * 
 * Template for displaying the categories list page.
 */

get_header(); ?>

<style>
    .kategori-page-wrapper {
        padding: 40px 0 60px;
        /* background-color: #f8fafc; */
        min-height: 60vh;
    }

    .kategori-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .kategori-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 15px;
        text-transform: uppercase;
        position: relative;
        display: inline-block;
    }

    .kategori-header h1::after {
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

    .kategori-header p {
        color: #6b7280;
        font-size: 16px;
        max-width: 600px;
        margin: 20px auto 0;
        line-height: 1.6;
    }

    .kategori-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .kategori-card {
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
        text-decoration: none;
        height: 100%;
        box-sizing: border-box;
    }

    .kategori-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 20px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -5px rgba(0, 0, 0, 0.04);
        border-color: #e2e8f0;
    }

    .kategori-icon {
        width: 70px;
        height: 70px;
        background-color: #fff1f2;
        color: #d91640;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        transition: background-color 0.3s, color 0.3s;
    }

    .kategori-icon svg {
        width: 32px;
        height: 32px;
    }

    .kategori-card:hover .kategori-icon {
        background-color: #d91640;
        color: #ffffff;
    }

    .kategori-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 12px;
    }

    .kategori-desc {
        font-size: 14px;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .kategori-link-text {
        font-size: 14px;
        font-weight: 600;
        color: #d91640;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .kategori-link-text svg {
        transition: transform 0.2s;
    }

    .kategori-card:hover .kategori-link-text svg {
        transform: translateX(4px);
    }

    @media (max-width: 768px) {
        .kategori-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
    }
</style>

<div class="kategori-page-wrapper">
    <div class="kategori-header">
        <h1>Kategori Alat Uji & Instrumen</h1>
        <p>Temukan berbagai macam alat ukur, perangkat uji kualitas, serta instrumen presisi tinggi dari ukuran portabel
            hingga unit benchtop berskala industri.</p>
    </div>

    <div class="kategori-grid">

        <!-- Card 1 -->
        <a href="<?php echo esc_url(home_url('/produk')); ?>" class="kategori-card">
            <div class="kategori-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                    <line x1="6" y1="12" x2="6.01" y2="12"></line>
                    <line x1="10" y1="12" x2="10.01" y2="12"></line>
                    <line x1="14" y1="12" x2="14.01" y2="12"></line>
                    <line x1="18" y1="12" x2="18.01" y2="12"></line>
                </svg>
            </div>
            <h2 class="kategori-title">Alat Ukur Dasar</h2>
            <p class="kategori-desc">Seluruh perangkat dasar untuk mengukur dimensi, berat, suhu, dan parameter fisis
                lainnya dengan tingkat presisi terkalibrasi.</p>
            <span class="kategori-link-text">Lihat Produk <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></span>
        </a>

        <!-- Card 2 -->
        <a href="<?php echo esc_url(home_url('/produk')); ?>" class="kategori-card">
            <div class="kategori-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 2v20"></path>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
            </div>
            <h2 class="kategori-title">Peralatan Uji Kualitas</h2>
            <p class="kategori-desc">Solusi untuk analisis kualitas material, kelembaban, kemurnian air (pH/TDS), hingga
                alat uji kekuatan bahan bangunan.</p>
            <span class="kategori-link-text">Lihat Produk <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></span>
        </a>

        <!-- Card 3 -->
        <a href="<?php echo esc_url(home_url('/produk')); ?>" class="kategori-card">
            <div class="kategori-icon">
                <!-- Portable / Handheld Device Icon -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                    <line x1="12" y1="18" x2="12.01" y2="18"></line>
                    <path d="M5 6h14"></path>
                </svg>
            </div>
            <h2 class="kategori-title">Portable / Handheld</h2>
            <p class="kategori-desc">Instrumen uji berbentuk kompak yang mudah dibawa ke lapangan. Sangat cocok untuk
                inspeksi cepat di area kerja maupun pabrik.</p>
            <span class="kategori-link-text">Lihat Produk <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></span>
        </a>

        <!-- Card 4 -->
        <a href="<?php echo esc_url(home_url('/produk')); ?>" class="kategori-card">
            <div class="kategori-icon">
                <!-- Benchtop Icon (Lab desk monitor/machine) -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                    <line x1="8" y1="21" x2="16" y2="21"></line>
                    <line x1="12" y1="17" x2="12" y2="21"></line>
                    <path d="M22 8H2"></path>
                </svg>
            </div>
            <h2 class="kategori-title">Alat Benchtop</h2>
            <p class="kategori-desc">Mesin instrumen skala menengah dan besar yang diletakkan di atas meja laboratorium
                untuk analisis mendalam dengan akurasi maksimal.</p>
            <span class="kategori-link-text">Lihat Produk <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></span>
        </a>

        <!-- Card 5 -->
        <a href="<?php echo esc_url(home_url('/produk')); ?>" class="kategori-card">
            <div class="kategori-icon">
                <!-- Heavy Machinery / Large Equipment Icon -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 2v8"></path>
                    <path d="M5 10V4.5a2.5 2.5 0 0 1 5 0V10"></path>
                    <path d="M19 10V4.5a2.5 2.5 0 0 0-5 0V10"></path>
                    <polygon points="2 10 22 10 20 22 4 22 2 10"></polygon>
                </svg>
            </div>
            <h2 class="kategori-title">Instrumen Skala Besar</h2>
            <p class="kategori-desc">Peralatan kalibrasi dan instalasi berat untuk berbagai tahap industrialisasi
                seperti mesin uji universal dan chamber suhu.</p>
            <span class="kategori-link-text">Lihat Produk <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></span>
        </a>

        <!-- Card 6 -->
        <a href="<?php echo esc_url(home_url('/produk')); ?>" class="kategori-card">
            <div class="kategori-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <h2 class="kategori-title">Lainnya & Aksesoris</h2>
            <p class="kategori-desc">Temukan komponen pendukung seperti probe, cairan kalibrator, sensor tambahan yang
                membuat kinerja instrumen Anda lebih unggul.</p>
            <span class="kategori-link-text">Lihat Produk <svg viewBox="0 0 24 24" width="16" height="16" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg></span>
        </a>

    </div>
</div>

<?php
get_footer();
