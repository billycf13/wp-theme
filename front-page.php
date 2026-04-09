<?php
/**
 * The front page template file
 *
 * @package Universal_Base
 */

get_header();
?>

    <style>
        .hero-section {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 40px;
            align-items: flex-start;
        }
        .hero-sidebar {
            flex: 0 0 250px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .hero-category-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .hero-category-menu li {
            border-bottom: 1px solid #e5e7eb;
        }
        .hero-category-menu li:last-child {
            border-bottom: none;
        }
        .hero-category-menu a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .hero-category-menu a::after {
            content: "\203A"; /* Right arrow */
            font-size: 18px;
            color: #9ca3af;
        }
        .hero-category-menu a:hover {
            color: #d91640;
            background-color: #fcfcfc;
        }
        .hero-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
            min-width: 0;
        }
        .hero-slider {
            position: relative;
            overflow: hidden;
            border-radius: 4px;
            background: #fff;
        }
        .hero-slider-inner {
            display: flex;
            width: 100%;
            transition: transform 0.5s ease-in-out;
        }
        .hero-slider-slide {
            width: 100%;
            flex-shrink: 0;
        }
        .hero-slider-slide img {
            width: 100%;
            height: auto;
            display: block;
        }
        .slider-nav {
            position: absolute;
            bottom: 15px;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        .slider-dot {
            width: 10px;
            height: 10px;
            background: rgba(255,255,255,0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .slider-dot.active {
            background: #ffffff;
            box-shadow: 0 0 2px rgba(0,0,0,0.3);
        }
        .hero-brands {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 15px 20px;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
            overflow-x: auto;
            gap: 15px;
        }
        .hero-brands img {
            height: 35px;
            object-fit: contain;
            transition: transform 0.2s ease;
        }
        .hero-brands img:hover {
            transform: scale(1.05);
        }
        .hero-info {
            border-radius: 4px;
            overflow: hidden;
            font-size: 0;
        }
        .hero-info img {
            width: 100%;
            height: auto;
        }
        .novotest-banners {
            display: flex;
            margin-bottom: 40px;
            border-radius: 4px;
            overflow: hidden;
        }
        .novotest-banners > div {
            flex: 1;
        }
        .novotest-banners img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: opacity 0.3s ease;
        }
        .novotest-banners a {
            display: block;
            height: 100%;
        }
        .novotest-banners a:hover img {
            opacity: 0.9;
        }

        @media (max-width: 900px) {
            .hero-section {
                flex-direction: column;
            }
            .hero-sidebar {
                width: 100%;
                flex: none;
            }
            .novotest-banners {
                flex-direction: column;
            }
        }
        /* New Sections CSS */
        .section-title {
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            color: #4b5563;
            margin: 50px 0 30px;
            text-transform: capitalize;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        .product-card {
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            text-align: center;
            padding: 20px 15px;
            position: relative;
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product-image {
            margin-bottom: 15px;
        }
        .product-image img {
            max-width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: contain;
            margin: 0 auto;
        }
        .product-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            min-height: 42px; /* For 2 lines */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .product-rating {
            color: #fbbf24;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .price {
            display: block;
            color: #d91640;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .btn-lihat-produk {
            display: inline-block;
            background-color: #d91640;
            color: #fff;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.3s;
        }
        .btn-lihat-produk:hover {
            background-color: #a40e2d;
            color: #fff;
        }
        .full-banner {
            margin-bottom: 40px;
            border-radius: 4px;
            overflow: hidden;
            display: block;
        }
        .full-banner img {
            width: 100%;
            display: block;
        }
        .split-banners {
            display: flex;
            gap: 0;
            margin-bottom: 40px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .split-banners > div {
            flex: 1;
        }
        .split-banners img {
            width: 100%;
            display: block;
            height: 100%;
            object-fit: cover;
        }
        .testimonial-section {
            background: #f9fafb;
            padding: 40px;
            border-radius: 8px;
            margin-bottom: 50px;
            display: flex;
            gap: 40px;
            align-items: center;
        }
        .testimonial-quote {
            flex: 1.2;
            font-size: 20px;
            font-weight: 600;
            font-style: italic;
            color: #d91640;
            position: relative;
        }
        .testimonial-content {
            flex: 1;
        }
        .testimonial-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .testimonial-desc {
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .article-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }
        .article-card {
            background: #fff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .article-image {
            height: 160px;
            overflow: hidden;
            position: relative;
        }
        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .article-card:hover .article-image img {
            transform: scale(1.05);
        }
        .img-overlay-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(d9,22,64,0.8);
            color: #fff;
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 2px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .article-content {
            padding: 20px;
        }
        .article-title {
            font-size: 15px;
            line-height: 1.4;
            font-weight: 600;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .article-title a {
            color: #d91640;
            text-decoration: none;
        }
        .article-readmore {
            display: inline-block;
            color: #d91640;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }
        .article-meta {
            margin-top: 15px;
            font-size: 12px;
            color: #9ca3af;
        }
        @media (max-width: 900px) {
            .product-grid, .article-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .testimonial-section {
                flex-direction: column;
                gap: 20px;
            }
        }
        @media (max-width: 600px) {
            .product-grid, .article-grid {
                grid-template-columns: 1fr;
            }
            .split-banners {
                flex-direction: column;
            }
        }
    </style>

    <div class="hero-section">
        <aside class="hero-sidebar">
            <?php
            // Kategori Produk Menu
            if ( has_nav_menu( 'kategori-produk' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'kategori-produk',
                    'menu'           => 'Kategori Produk',
                    'container'      => false,
                    'menu_class'     => 'hero-category-menu',
                ) );
            } else {
                // Fallback static menu if custom menu is not set up
                ?>
                <ul class="hero-category-menu">
                    <li><a href="#">Alat Kelistrikan</a></li>
                    <li><a href="#">Alat Ukur</a></li>
                    <li><a href="#">Alat Ukur Cuaca</a></li>
                    <li><a href="#">Alat Ukur Kadar Air</a></li>
                    <li><a href="#">Alat Ukur Kadar Udara</a></li>
                    <li><a href="#">Alat Ukur Portabel</a></li>
                    <li><a href="#">Alat Ukur Tekanan</a></li>
                    <li><a href="#">Alat Ukur Tingkat Kekasaran</a></li>
                    <li><a href="#">Multiparameter</a></li>
                    <li><a href="#">Non Destructive Tool</a></li>
                    <li><a href="#">Thermometer</a></li>
                </ul>
                <?php
            }
            ?>
        </aside>
        
        <div class="hero-content">
            <!-- Carousel/Slider -->
            <div class="hero-slider" id="homeSlider">
                <div class="hero-slider-inner" id="homeSliderInner">
                    <div class="hero-slider-slide">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/web-banner-ukur-uji-novotest.webp' ); ?>" alt="Banner Novotest">
                    </div>
                    <div class="hero-slider-slide">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/Web-banner-launcing-hikmikro.webp' ); ?>" alt="Banner Hikmikro">
                    </div>
                    <div class="hero-slider-slide">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/web-banner-moisture-meter.webp' ); ?>" alt="Banner Moisture Meter">
                    </div>
                </div>
                <div class="slider-nav">
                    <span class="slider-dot active" onclick="goToSlide(0)"></span>
                    <span class="slider-dot" onclick="goToSlide(1)"></span>
                    <span class="slider-dot" onclick="goToSlide(2)"></span>
                </div>
            </div>

            <script>
                let currentSlide = 0;
                const totalSlides = 3;
                function goToSlide(index) {
                    currentSlide = index;
                    const inner = document.getElementById('homeSliderInner');
                    if (inner) {
                        inner.style.transform = `translateX(-${currentSlide * 100}%)`;
                    }
                    const dots = document.querySelectorAll('.slider-dot');
                    dots.forEach((dot, i) => {
                        dot.classList.toggle('active', i === currentSlide);
                    });
                }
                setInterval(() => {
                    let nextSlide = (currentSlide + 1) % totalSlides;
                    goToSlide(nextSlide);
                }, 5000);
            </script>

            <!-- Brands Section -->
            <div class="hero-brands">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/armeka.webp' ); ?>" alt="Armeka">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/kett.webp' ); ?>" alt="Kett">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/amtast.webp' ); ?>" alt="Amtast">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/tmtec.webp' ); ?>" alt="Tmtec">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/lutron.webp' ); ?>" alt="Lutron">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/hannainst.webp' ); ?>" alt="Hanna">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/brand/leicca.webp' ); ?>" alt="Leica">
            </div>

            <!-- Info Icons -->
            <div class="hero-info">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/common/info-alat.webp' ); ?>" alt="Info Alat">
            </div>
        </div>
    </div>

    <!-- Novotest Banners -->
    <div class="novotest-banners">
        <div>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/common/banner-novotest-tud3-left.webp' ); ?>" alt="Pengujian Kekerasan">
        </div>
        <div>
            <a href="https://api.whatsapp.com/send?phone=6285159691822&text=Halo%20AlatTest!%20Saya%20tertarik%20dengan%20alat%20Novotest%20T-UD3.%20Mohon%20informasi%20lebih%20banyak%20mengenai%20alat%20ini.%20Terima%20kasih." target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/common/banner-novotest-tud3-right.webp' ); ?>" alt="Diskon Novotest T-UD3">
            </a>
        </div>
    </div>

    <!-- START OF DYNAMIC WOO PRODUCTS & BANNERS SECTION -->
    <?php
    if ( ! function_exists( 'wp_starter_display_products' ) ) {
        function wp_starter_display_products( $query_args ) {
            if ( !class_exists( 'WooCommerce' ) ) {
                echo '<p style="text-align:center; margin: 40px 0; color: #d91640;">Pesanan: Pastikan plugin WooCommerce telah aktif untuk menampilkan produk di sini.</p>';
                return;
            }
            $products = new WP_Query( $query_args );
            if ( $products->have_posts() ) {
                echo '<div class="product-grid">';
                while ( $products->have_posts() ) {
                    $products->the_post();
                    global $product;
                    if ( empty( $product ) ) continue;
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php echo woocommerce_get_product_thumbnail(); ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php the_title(); ?></h3>
                            <div class="product-rating">
                                <span style="color:#fbbf24;">★★★★★</span>
                            </div>
                            <?php if ( $price_html = $product->get_price_html() ) : ?>
                                <span class="price"><?php echo $price_html; ?></span>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="btn-lihat-produk">Lihat Produk</a>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>';
                wp_reset_postdata();
            } else {
                echo '<p style="text-align:center; color: #999; margin-bottom: 40px;">Belum ada produk untuk ditampilkan.</p>';
            }
        }
    }
    ?>

    <h2 class="section-title">NOVOTEST HARDNESS TESTER</h2>
    <?php
    wp_starter_display_products( array(
        'post_type'      => 'product',
        'post__in'       => array( 8749, 8807, 8782, 8794 ),
        'orderby'        => 'post__in',
        'posts_per_page' => 4,
    ) );
    ?>

    <!-- Water Test Kits Banner -->
    <div class="full-banner">
        <a href="https://api.whatsapp.com/send?phone=6285159691822&text=Halo%20AlatTest!%20Saya%20tertarik%20dengan%20alat%20OCT-B%20Full%20Set%20Reagent%20(AMTAST).%20Mohon%20informasi%20lebih%20banyak%20mengenai%20alat%20ini.%20%20Terima%20kasih." target="_blank" rel="noopener">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/banner-water-test-kits.webp' ); ?>" alt="Water Test Kits">
        </a>
    </div>

    <!-- Banner AMF-013 -->
    <div class="split-banners">
        <div>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/banner-amtast-amf-013-left.webp' ); ?>" alt="Bagaimana Cara Mengukur Suara">
        </div>
        <div>
            <a href="https://api.whatsapp.com/send?phone=6285159691822&text=Halo%20AlatTest!%20Saya%20tertarik%20dengan%20alat%20AMTAST%20AMF-013.%20Mohon%20informasi%20lebih%20banyak%20mengenai%20alat%20ini.%20Terima%20kasih." target="_blank" rel="noopener">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/banner-amtast-amf-013-right.webp' ); ?>" alt="AMTAST AMF-013">
            </a>
        </div>
    </div>

    <h2 class="section-title">Alat Ukur Kelembaban Moisture Meter</h2>
    <?php
    wp_starter_display_products( array(
        'post_type'      => 'product',
        'product_cat'    => 'moisture-meter',
        'posts_per_page' => 4,
    ) );
    ?>

    <h2 class="section-title">Alat Ukur Kekerasan Hardness Tester</h2>
    <?php
    wp_starter_display_products( array(
        'post_type'      => 'product',
        'product_cat'    => 'hardness-tester',
        'posts_per_page' => 4,
    ) );
    ?>

    <h2 class="section-title">Alat Ukur Kadar pH</h2>
    <?php
    wp_starter_display_products( array(
        'post_type'      => 'product',
        'product_cat'    => 'ph-meter',
        'posts_per_page' => 4,
    ) );
    ?>

    <!-- Raise Your Glass Banner -->
    <div class="split-banners">
        <div>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/banner-alcohol-tester-series-left.webp' ); ?>" alt="Raise Your Glass">
        </div>
        <div>
            <a href="https://api.whatsapp.com/send?phone=6285159691822&text=Halo%20AlatTest!%20Saya%20tertarik%20dengan%20alat%20pengukur%20kadar%20alkohol.%20Mohon%20informasi%20lebih%20banyak%20mengenai%20alat%20ini%20dan%20pengaruh%20alkohol%20dalam%20tubuh.%20Terima%20kasih." target="_blank" rel="noopener">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/banner-alcohol-tester-series-right.webp' ); ?>" alt="Alcohol Tester Special">
            </a>
        </div>
    </div>

    <!-- Testimonial Section -->
    <?php
    $testimonials = array(
        array( 'quote' => 'Mohon dipertahankan dan ditingkatkan untuk pelayanannya yang sudah bagus!', 'name' => 'PT. Taharica', 'loc' => 'Raden Inten, Jakarta Timur' ),
        array( 'quote' => 'Pengiriman sangat cepat dan barang tiba dengan utuh. Akurasi alat luar biasa!', 'name' => 'Budi Santoso', 'loc' => 'Surabaya, Jawa Timur' ),
        array( 'quote' => 'Harga di Alat-Test kompetitif dan barang terjamin original. Akan order lagi.', 'name' => 'CV. Maju Jaya', 'loc' => 'Bandung, Jawa Barat' ),
        array( 'quote' => 'Respons CS sangat sigap memandu kami memilih alat ukur yang paling tepat.', 'name' => 'PT. Agro Nusantara', 'loc' => 'Medan, Sumatera Utara' ),
        array( 'quote' => 'Proses klaim garansi sangat mudah berkat tim support yang siap membantu 24/7.', 'name' => 'Rina Wijaya', 'loc' => 'Semarang, Jawa Tengah' ),
        array( 'quote' => 'Banyak pilihan instrumen khusus yang sulit dicari di tempat lain. Lengkap!', 'name' => 'Bintang Teknik', 'loc' => 'Yogyakarta' ),
        array( 'quote' => 'Pemesanan partai besar ditangani dengan sangat profesional dan terstruktur.', 'name' => 'PT. Makmur Sentosa', 'loc' => 'Balikpapan, Kaltim' ),
        array( 'quote' => 'Kami sudah bermitra selama 3 tahun, kepuasan selalu jadi nomor satu.', 'name' => 'Dian Purnama', 'loc' => 'Denpasar, Bali' ),
        array( 'quote' => 'Alat ukur parameter air sangat presisi. Sangat direkomendasikan untuk industri.', 'name' => 'Kawasan Industri', 'loc' => 'Cikarang, Jawa Barat' ),
        array( 'quote' => 'Pengalaman berbelanja alat teknik terbaik secara online hanya di Alat-Test.', 'name' => 'Andi Setiawan', 'loc' => 'Palembang, Sumsel' ),
    );
    ?>
    <div class="testimonial-section">
        <div class="testimonial-quote-wrapper" style="flex: 1.2; position: relative; overflow: hidden; display: flex; flex-direction: column;">
            <div class="testimonial-track" id="testimonialTrack" style="display: flex; transition: transform 0.5s ease-in-out; width: 10px;">
                <?php foreach ( $testimonials as $index => $testi ) : ?>
                <div class="testimonial-slide" style="width: 100%; flex-shrink: 0; box-sizing: border-box; padding-right: 20px;">
                    <div class="testimonial-quote">
                        "<?php echo esc_html( $testi['quote'] ); ?>"
                        <div style="font-size: 13px; font-weight: normal; color: #999; margin-top: 15px; font-style: normal; display: flex; align-items: center; gap: 10px;">
                            <span style="color:#fbbf24; font-size:16px;">★★★★★</span>
                            <div>
                                <strong style="color: #333; display: block;"><?php echo esc_html( $testi['name'] ); ?></strong>
                                <?php echo esc_html( $testi['loc'] ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="testimonial-dots" style="display: flex; gap: 6px; margin-top: 30px;">
                <?php foreach ( $testimonials as $index => $testi ) : ?>
                    <span class="t-dot <?php echo $index === 0 ? 'active' : ''; ?>" onclick="goToTesti(<?php echo $index; ?>)" style="width: 10px; height: 10px; background: <?php echo $index === 0 ? '#d91640' : '#d1d5db'; ?>; border-radius: 50%; cursor: pointer; transition: background 0.3s; display: inline-block;"></span>
                <?php endforeach; ?>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const track = document.getElementById('testimonialTrack');
                    const slides = document.querySelectorAll('.testimonial-slide');
                    const dots = document.querySelectorAll('.t-dot');
                    
                    // Set correct width dynamically based on wrapper to ensure smooth full-width sliding
                    function resizeSlides() {
                        if (!track || !slides.length) return;
                        const wrapperWidth = track.parentElement.clientWidth;
                        track.style.width = (wrapperWidth * slides.length) + 'px';
                        slides.forEach(slide => {
                            slide.style.width = wrapperWidth + 'px';
                        });
                        if (typeof currentTesti !== 'undefined') goToTesti(currentTesti); // re-adjust position
                    }
                    window.addEventListener('resize', resizeSlides);

                    let currentTesti = 0;
                    const totalTesti = <?php echo count( $testimonials ); ?>;
                    
                    window.goToTesti = function(index) {
                        currentTesti = index;
                        const slideWidth = slides[0].clientWidth;
                        track.style.transform = `translateX(-${currentTesti * slideWidth}px)`;
                        dots.forEach((dot, i) => {
                            dot.style.background = i === currentTesti ? '#d91640' : '#d1d5db';
                        });
                    }
                    
                    setTimeout(resizeSlides, 100);

                    setInterval(() => {
                        let nextTesti = (currentTesti + 1) % totalTesti;
                        if(window.goToTesti) window.goToTesti(nextTesti);
                    }, 5000);
                });
            </script>
        </div>
        
        <div class="testimonial-content">
            <h3 class="testimonial-title">Mengukur dan Menguji Apa Saja Tanpa Ragu!</h3>
            <p class="testimonial-desc">Temukan alat yang sesuai dengan kebutuhan anda.<br>Tersedia untuk Industri, Perkantoran, dan Perumahan.</p>
            <a href="https://api.whatsapp.com/send?phone=6285159691822" class="btn-lihat-produk" target="_blank">Hubungi Kami</a>
        </div>
    </div>

    <h2 class="section-title">Our Customer</h2>
    <div class="full-banner" style="margin-bottom: 50px;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/banner/our-customers.webp' ); ?>" alt="Our Customers" style="width: 100%; display: block; border-radius: 4px; border: 1px solid #e5e7eb; box-shadow: 0 1px 3px rgba(0,0,0,0.05); padding: 10px; background: #fff;">
    </div>

    <h2 class="section-title">Artikel Terbaru</h2>
    <?php
    $latest_posts = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
    ) );
    
    if ( $latest_posts->have_posts() ) {
        echo '<div class="article-grid">';
        while ( $latest_posts->have_posts() ) {
            $latest_posts->the_post();
            ?>
            <div class="article-card">
                <div class="article-image">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'medium' );
                    } else {
                        echo '<img src="https://via.placeholder.com/400x250?text=Artikel" alt="Placeholder" style="width:100%; height:100%; object-fit:cover;">';
                    }
                    ?>
                    <?php 
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<span class="img-overlay-badge" style="background:#d91640;">' . esc_html( $categories[0]->name ) . '</span>';
                    }
                    ?>
                </div>
                <div class="article-content">
                    <h3 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <a href="<?php the_permalink(); ?>" class="article-readmore">BACA ARTIKEL &raquo;</a>
                    <div class="article-meta">
                        <?php echo get_the_author(); ?> &bull; <?php echo get_the_date(); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_postdata();
    }
    ?>

<?php
get_footer();
