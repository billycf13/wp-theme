<?php
/**
 * Template Name: Halaman Kontak
 * 
 * The template for displaying the contact page
 *
 * @package Universal_Base
 */

get_header();
?>

<style>
    .contact-page {
        padding: 0;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .contact-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .contact-header p {
        color: #666;
        font-size: 16px;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .contact-container {
        display: flex;
        flex-wrap: wrap;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .contact-info-panel {
        flex: 1;
        min-width: 300px;
        background: #d91640;
        color: #fff;
        padding: 50px 40px;
    }

    .contact-info-panel h2 {
        font-size: 24px;
        font-weight: 600;
        color: #fff;
        margin-bottom: 30px;
        margin-top: 0;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 30px;
    }

    .info-item:last-child {
        margin-bottom: 0;
    }

    .info-item svg {
        width: 24px;
        height: 24px;
        margin-right: 20px;
        flex-shrink: 0;
        color: #fff;
        margin-top: 2px;
    }

    .info-item div {
        line-height: 1.6;
        font-size: 15px;
    }

    .contact-form-panel {
        flex: 1.8;
        min-width: 300px;
        padding: 50px 40px;
    }

    .contact-form-panel h2 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
        margin-top: 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-row .form-group {
        flex: 1;
    }

    .form-control {
        width: 100%;
        padding: 14px 15px;
        border: 1px solid #e5e7eb;
        border-radius: 4px;
        font-size: 14px;
        font-family: inherit;
        background: #fcfcfc;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #d91640;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(217, 22, 64, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 160px;
    }

    .btn-submit {
        background: #d91640;
        color: #fff;
        padding: 14px 35px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        display: inline-block;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background: #a40e2d;
    }

    .contact-map {
        margin-top: 60px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        height: 450px;
        padding: 40px;
        background-color: #fff;
    }

    .contact-map iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }

        .contact-container {
            flex-direction: column;
        }
    }
</style>

<div class="contact-page">
    <div class="container-produk">
        <div class="contact-header">
            <h1>Hubungi Kami</h1>
            <p>Punya pertanyaan seputar produk atau pesanan Anda? Silakan isi form di bawah ini atau hubungi kami
                melalui informasi kontak yang tersedia. Kami siap kapan saja untuk membantu Anda!</p>
        </div>

        <div class="contact-container">
            <!-- Left Panel: Info -->
            <div class="contact-info-panel">
                <h2>Informasi Kontak</h2>

                <div class="info-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <div>
                        <strong>Alamat Lengkap:</strong><br>
                        Jalan Raya Karanggintung, KM. 2 No. 7, Kec. Sumbang, Kab. Banyumas, Jawa Tengah 53183
                    </div>
                </div>

                <div class="info-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                    <div>
                        <strong>Telepon / WhatsApp:</strong><br>
                        0851-5969-1822
                    </div>
                </div>

                <div class="info-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <div>
                        <strong>Email Kami:</strong><br>
                        contact@alat-test.com
                    </div>
                </div>

                <div class="info-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <div>
                        <strong>Jam Operasional:</strong><br>
                        Senin - Sabtu:<br>08.00 - 16.00 WIB
                    </div>
                </div>
            </div>

            <!-- Right Panel: Form -->
            <div class="contact-form-panel">
                <h2>Kirim Pesan</h2>
                <?php
                // Jika ingin menggunakan plugin contact form (seperti CF7 atau WPForms),
                // Anda bisa mengganti struktur <form> ini dengan do_shortcode('[contact-form-7...]');
                ?>
                <form action="#" method="POST" id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Alamat Email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Nomor Telepon / WhatsApp"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subjek Pesan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control"
                            placeholder="Tulis pesan, pertanyaan, atau keluhan Anda secara detail di sini..."
                            required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Kirim Pesan Sekarang</button>
                    <p style="margin-top: 15px; font-size: 13px; color: #999;">* Kami akan merespon pesan Anda
                        secepatnya pada jam kerja via Email atau Telepon.</p>
                </form>
            </div>
        </div>

        <!-- Full Width Map below the box -->
        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d679.5497577318575!2d109.24841455459601!3d-7.3813351182826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f768eff7997%3A0xdf9899b1565578e5!2sAlat%20Ukur%20dan%20Uji%20Digital%20(%20Cv%20Java%20Multi%20Mandiri%20)!5e0!3m2!1sid!2sid!4v1775788733789!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="true" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<?php
get_footer();
