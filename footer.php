<?php
/**
 * The template for displaying the footer
 *
 * @package Universal_Base
 */
?>

</main><!-- #primary -->

<style>
    .site-footer-custom {
        background-color: #ffffff;
        color: #333333;
        font-size: 14px;
        padding-top: 50px;
    }

    .footer-top {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 40px;
    }

    .footer-col {
        flex: 1;
        min-width: 250px;
    }

    .footer-col.col-about {
        flex: 1.5;
    }

    .footer-logo {
        margin-bottom: 25px;
    }

    .footer-logo img {
        max-height: 45px;
    }

    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 18px;
        line-height: 1.5;
        color: #555;
    }

    .footer-contact-item svg {
        flex-shrink: 0;
        margin-top: 2px;
        width: 18px;
        height: 18px;
        color: #000;
    }

    .footer-heading {
        font-size: 18px;
        font-weight: 700;
        color: #000;
        margin-bottom: 25px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 15px;
    }

    .footer-links a {
        color: #555;
        text-decoration: none;
        transition: color 0.2s;
    }

    .footer-links a:hover {
        color: #d91640;
    }

    .footer-map iframe {
        width: 100%;
        height: 140px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .footer-socials {
        display: flex;
        gap: 8px;
    }

    .footer-socials a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        color: #fff;
        border-radius: 4px;
        transition: opacity 0.2s;
    }

    .footer-socials a.soc-fb {
        background-color: #3b5998;
    }

    .footer-socials a.soc-tw {
        background-color: #1da1f2;
    }

    .footer-socials a.soc-ig {
        background-color: #262626;
    }

    .footer-socials a.soc-yt {
        background-color: #cd201f;
    }

    .footer-socials a:hover {
        opacity: 0.8;
    }

    .footer-bottom {
        border-top: 1px solid #eaeaea;
        padding: 25px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        color: #555;
        font-size: 14px;
    }

    .footer-bottom-links {
        display: flex;
        gap: 20px;
    }

    .footer-bottom-links a {
        color: #555;
        text-decoration: none;
    }

    .footer-bottom-links a:hover {
        color: #d91640;
    }

    .footer-copyright span {
        color: #d91640;
    }

    @media (max-width: 768px) {
        .footer-bottom {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
    }
</style>

<footer id="colophon" class="site-footer site-footer-custom">
    <div class="container">
        <div class="footer-top">

            <!-- Kolom 1 (Baru): Tentang Perusahaan -->
            <div class="footer-col col-about">
                <div class="footer-logo">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo/logo-Alat-test-01-e1635299440277.png'); ?>"
                        alt="Logo Alat-Test">
                </div>
                <p style="line-height: 1.6; color: #555; text-align: justify; font-size: 14px; margin-top: 15px;">
                    Alat-test.com adalah platform katalog alat ukur dan alat uji multi brand dari Ukurdanuji (CV. Java
                    Multi Mandiri) untuk berbagai kebutuhan industri dan laboratorium. Menyediakan beragam produk
                    original dengan dukungan konsultasi dan layanan teknis untuk membantu Anda memilih solusi yang
                    tepat.
                </p>
            </div>

            <!-- Kolom 2: Kontak -->
            <div class="footer-col col-contact">
                <h3 class="footer-heading">Kontak Kami</h3>
                <div class="footer-contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <div>Jam Operasional.<br> Senin - Sabtu: 08.00 - 16.00</div>
                </div>
                <div class="footer-contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <div>Jalan Raya Karanggintung, KM. 2 No. 7, Kec. Sumbang, Kab. Banyumas, Jawa Tengah<br>53183
                    </div>
                </div>
                <div class="footer-contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <div>contact@alat-test.com</div>
                </div>
                <div class="footer-contact-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                    <div>0857-1711-2222</div>
                </div>
            </div>

            <div class="footer-col">
                <h3 class="footer-heading">Layanan Pelanggan</h3>
                <ul class="footer-links">
                    <li><a href="#">INAPROC</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Kebijakan Garansi</a></li>
                    <li><a href="#">Syarat dan Ketentuan</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3 class="footer-heading">Google Maps</h3>
                <div class="footer-map">
                    <iframe
                        src="https://maps.google.com/maps?q=CV.%20Java%20Multi%20Mandiri,%20Sumbang&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="footer-socials">
                    <a href="#" class="soc-fb" aria-label="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="#" class="soc-tw" aria-label="Twitter">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="soc-ig" aria-label="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="#" class="soc-yt" aria-label="YouTube">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.33 29 29 0 0 0-.46-5.33z">
                            </path>
                            <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; Copyright <?php echo date('Y'); ?> - <span>CV. JAVA MULTI MANDIRI</span>
            </div>
            <div class="footer-bottom-links">
                <a href="<?php echo esc_url(home_url('/produk')); ?>">Produk</a>
                <a href="<?php echo esc_url(home_url('/kontak')); ?>">Kontak</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
                <a href="<?php echo esc_url(home_url('/tentang-kami')); ?>">Tentang Kami</a>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>