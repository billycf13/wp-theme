<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Universal_Base
 */

get_header();
?>

<style>
    .error-404-wrapper {
        padding: 120px 20px;
        text-align: center;
        background-color: #fff;
    }

    .error-404 .page-title {
        font-size: 150px;
        font-weight: 900;
        color: #d91640;
        margin: 0;
        line-height: 1;
        text-shadow: 4px 4px 0px rgba(217, 22, 64, 0.1);
    }

    .error-404 .page-subtitle {
        font-size: 32px;
        color: #333;
        margin-top: 10px;
        margin-bottom: 25px;
        font-weight: 700;
    }

    .error-404 .page-content p {
        font-size: 16px;
        color: #666;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }

    .btn-return-home {
        display: inline-flex;
        align-items: center;
        background-color: #d91640;
        color: #fff;
        padding: 14px 35px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(217, 22, 64, 0.2);
    }

    .btn-return-home:hover {
        background-color: #b01030;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(217, 22, 64, 0.3);
    }

    .btn-return-home svg {
        margin-right: 10px;
        width: 18px;
        height: 18px;
    }

    .search-404 {
        max-width: 500px;
        margin: 50px auto 0;
        position: relative;
    }

    .search-404 .search-form {
        display: flex;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border-radius: 50px;
        overflow: hidden;
    }

    .search-404 .search-field {
        flex: 1;
        padding: 15px 25px;
        border: 1px solid #eee;
        border-right: none;
        border-radius: 50px 0 0 50px;
        font-size: 15px;
        outline: none;
        background: #f9fafb;
    }

    .search-404 .search-field:focus {
        background: #fff;
    }

    .search-404 .search-submit {
        background: #333;
        color: #fff;
        border: none;
        padding: 15px 35px;
        border-radius: 0 50px 50px 0;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .search-404 .search-submit:hover {
        background: #d91640;
    }
</style>

<div class="error-404-wrapper">
    <div class="container">
        <main id="primary" class="site-main error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">404</h1>
                <h2 class="page-subtitle">Oops! Halaman Tidak Ditemukan.</h2>
            </header>

            <div class="page-content">
                <p>Sepertinya tautan yang Anda tuju sudah rusak atau halamannya telah dipindahkan. Silakan kembali ke
                    Beranda atau telusuri produk yang Anda butuhkan di bawah ini.</p>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-return-home">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Kembali ke Beranda
                </a>

                <div class="search-404">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <!-- Defaulting the search to products will be more helpful for an e-commerce site -->
                        <input type="hidden" name="post_type" value="product" />
                        <input type="search" class="search-field" placeholder="Ketik jenis alat test / produk..."
                            value="<?php echo get_search_query(); ?>" name="s" />
                        <button type="submit" class="search-submit">CARI</button>
                    </form>
                </div>

            </div><!-- .page-content -->
        </main><!-- #primary -->
    </div>
</div>

<?php
get_footer();
