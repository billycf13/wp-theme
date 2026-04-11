<?php
/**
 * Template Name: Halaman Tentang
 * 
 * The template for displaying the about page
 *
 * @package Universal_Base
 */

get_header();
?>

<style>
    .about-page {
        padding: 30px 0 80px;
        background-color: #ffffff;
    }

    .about-banner {
        margin-bottom: 50px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .about-banner img {
        width: 100%;
        height: auto;
        display: block;
    }

    .about-header {
        text-align: center;
        margin-bottom: 40px;
        padding-top: 20px;
    }

    .about-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
        text-transform: uppercase;
        position: relative;
        display: inline-block;
    }

    .about-header h1::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background-color: #d91640;
    }

    .about-content-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    .about-main-text {
        flex: 1.5;
        min-width: 300px;
        font-size: 16px;
        line-height: 1.8;
        color: #4b5563;
    }

    .about-main-text p {
        margin-bottom: 20px;
        text-align: justify;
    }

    .about-main-text h2 {
        font-size: 24px;
        color: #333;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .about-sidebar {
        flex: 1;
        min-width: 300px;
    }

    .vision-mission-box {
        background: #fdfdfd;
        border-left: 4px solid #d91640;
        padding: 30px;
        border-radius: 0 8px 8px 0;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.03);
        margin-bottom: 30px;
        border-top: 1px solid #f0f0f0;
        border-right: 1px solid #f0f0f0;
        border-bottom: 1px solid #f0f0f0;
    }

    .vision-mission-box h3 {
        font-size: 20px;
        color: #d91640;
        margin-top: 0;
        margin-bottom: 15px;
    }

    .vision-mission-box p,
    .vision-mission-box ul {
        color: #4b5563;
        line-height: 1.7;
        margin-bottom: 0;
    }

    .vision-mission-box ul {
        padding-left: 20px;
        margin-top: 10px;
    }

    .vision-mission-box ul li {
        margin-bottom: 12px;
    }

    @media (max-width: 768px) {
        .about-content-wrapper {
            flex-direction: column;
        }
    }
</style>

<div class="about-page">
    <div class="container">
        <div class="about-header">
            <h1>Tentang CV. Java Multi Mandiri</h1>
            <p>Alat-Test.com yang bernaung di bawah bendera CV. Java Multi Mandiri adalah perusahaan tepercaya yang
                bergerak pada pelayanan penyediaan dan distribusi berbagai macam instrumen laboratorium, alat ukur,
                serta alat uji terkemuka di seluruh kawasan penjuru Indonesia.</p>
        </div>
        <!-- Banner/Hero Image -->
        <div class="about-banner">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/banner/web-banner-tentang-kami.webp'); ?>"
                alt="Banner Tentang Alat-Test">
        </div>

        <!-- Section Title -->
        <div class="about-header">
            <!-- Jika Anda ingin memanggil Judul Halaman dinamis dari CMS, ganti dengan: <h1><?php the_title(); ?></h1> -->
            <h1>Tentang CV. Java Multi Mandiri</h1>
        </div>

        <!-- Content Layout -->
        <div class="about-content-wrapper">
            <div class="about-main-text">
                <!-- Anda juga bisa memasukkan <?php the_content(); ?> di sini agar admin web mudah mengganti isinya -->
                <p><strong>Alat-Test.com</strong> yang bernaung di bawah bendera <strong>CV. Java Multi Mandiri</strong>
                    adalah perusahaan tepercaya yang bergerak pada pelayanan penyediaan dan distribusi berbagai macam
                    instrumen laboratorium, alat ukur, serta alat uji terkemuka di seluruh kawasan penjuru Indonesia.
                </p>

                <p>Kami hadir berdedikasi tinggi untuk memberikan solusi terbaik dari pengukuran maupun pengujian di
                    berbagai sektor mulai dari industri besar, perbankan, perkebunan pertanian, pabrik manufaktur,
                    rancang bangun dan konstruksi, hingga ke instansi kesehatan dan laboratorium pendidikan. Lewat
                    jaringan dan kemitraan kokoh bertaraf global, kami menjembatani teknologi tingkat dunia langsung ke
                    hadapan Anda.</p>

                <h2>Lebih Dari Sekadar Penjualan</h2>
                <p>Filosofi kami menempatkan produk bukan semata-mata sebagai benda niaga, melainkan solusi pasti yang
                    menjadi nyawa dari kualitas aplikasi industri Anda. Kami memahami betapa pentingnya presisi dari
                    sebuah kalibrasi angka.</p>

                <p>Dengan tenaga spesialis dan dukungan teknis <em>(Technical Support)</em> yang sarat dengan jam
                    terbang, kami berupaya memastikan calon pembeli tak salah menjatuhkan pilihan dan menemukan
                    instrumen paling adaptif yang menjawab kebutuhannya. Jangan khawatir dengan pemeliharaan purna jual,
                    kami memberi jaminan asistensi klaim garansi untuk menjamin kenyamanan pikiran Anda.</p>
            </div>

            <div class="about-sidebar">
                <div class="vision-mission-box">
                    <h3>Visi Perusahaan</h3>
                    <p>Menjadi perusahaan <em>supplier</em> penyedia alat instrument, ukur, uji, dan penunjang
                        laboratorium terbesar dan terhandal di Indonesia yang dikenal akan ketangguhan layanannya serta
                        dedikasi utuh terhadap parameter tingkat kualitas.</p>
                </div>

                <div class="vision-mission-box">
                    <h3>Misi Operasional</h3>
                    <ul>
                        <li>Menyediakan instrumen yang akurat dengan teknologi paling mutakhir yang beredar di pasaran.
                        </li>
                        <li>Memfasilitasi pelanggan dengan bimbingan dan layanan teknis secara ramah agar mereka
                            menemukan sistem yang paling efektif.</li>
                        <li>Mempertahankan standar pasca pembelian demi kemitraan yang panjang.</li>
                        <li>Menjangkau seluruh wilayah Indonesia dengan proses pengiriman yang sigap, ringkas, dan bebas
                            masalah.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
