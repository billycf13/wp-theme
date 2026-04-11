<?php
/**
 * The header for our theme
 *
 * @package Universal_Base
 */
?><!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <style>
        .site-header-custom {
            background-color: #ffffff;
            /* shadow moved to main-bar */
            padding: 0px !important;
        }

        /* Top Bar Styles */
        .header-top-bar {
            background-color: #f3f4f5;
            padding: 4px !important;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }

        .header-top-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1110px;
            margin: 0 auto;
            padding: 0px !important;
        }

        .top-bar-left {
            display: flex;
            align-items: center;
            gap: 20px;
            color: #374151;
            font-weight: 500;
        }

        .top-bar-contact-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .top-bar-right a {
            color: #6d7588;
            text-decoration: none;
            transition: color 0.2s;
        }

        .top-bar-right a:hover {
            color: #d91640;
        }

        /* Main Bar Styles */
        .header-main-bar {
            background-color: #ffffff;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }

        .header-main-container {
            display: flex;
            align-items: center;
            gap: 30px;
            max-width: 1110px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .header-logo img {
            max-height: 40px;
            width: auto;
            display: block;
        }

        .header-category {
            color: #374151;
            font-size: 15px;
            cursor: pointer;
            transition: color 0.2s;
            white-space: nowrap;
        }

        .header-category:hover {
            color: #d91640;
        }

        /* Search Styles */
        .header-search-wrap {
            flex: 1;
            display: flex;
        }

        .header-search {
            display: flex;
            align-items: center;
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            /* Tokopedia style */
            overflow: hidden;
            background: #fff;
            transition: border-color 0.2s;
        }

        .header-search:focus-within {
            border-color: #d91640;
        }

        .header-search button {
            background: transparent;
            border: none;
            padding: 0 10px 0 15px;
            color: #9ca3af;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .header-search button:hover {
            color: #d91640;
        }

        .header-search input[type="search"] {
            flex: 1;
            border: none;
            padding: 12px 15px 12px 0;
            outline: none;
            font-size: 14px;
            color: #374151;
        }

        .header-search input[type="search"]::placeholder {
            color: #9ca3af;
        }

        /* Action Buttons */
        .header-actions {
            display: flex;
            align-items: center;
        }

        .inaproc-link {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .inaproc-link:hover {
            background-color: #f3f4f5;
        }

        .inaproc-link img {
            max-height: 28px;
            border-radius: 4px;
        }

        .btn-search {
            background-color: #d91640 !important;
            color: #fff !important;
            border: none;
            padding: 10px 20px !important;
            margin-right: 3px !important;
            font-weight: 700 !important;
            border-radius: 0 5px 5px 0 !important;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-search:hover {
            background-color: #d91640;
        }

        @media (max-width: 900px) {
            .header-top-bar {
                display: none;
            }

            .header-main-container {
                flex-wrap: wrap;
                gap: 15px;
            }

            .header-search-wrap {
                order: 3;
                min-width: 100%;
            }

            .header-actions {
                margin-left: auto;
            }

            .header-category {
                display: none;
                /* simple mobile fallback */
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">

        <header id="masthead" class="site-header site-header-custom" style="position: sticky; top: 0; z-index: 1000;">
            <!-- Top Bar -->
            <div class="header-top-bar">
                <div class="header-top-container">
                    <div class="top-bar-left">
                        <div class="top-bar-contact-item">
                            <!-- Icon Gagang Telepon Solid -->
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <span>08123456778</span>
                        </div>
                        <div class="top-bar-contact-item">
                            <!-- Icon Amplop Surat Solid -->
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor">
                                <path
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                            </svg>
                            <span>contact@alat-test.com</span>
                        </div>
                    </div>
                    <div class="top-bar-right">
                        <a href="<?php echo esc_url(home_url('/tentang')); ?>">Tentang</a>
                        <a href="<?php echo esc_url(home_url('/kontak')); ?>">Kontak</a>
                        <a href="<?php echo esc_url(home_url('/produk')); ?>">Produk</a>
                        <a href="<?php echo esc_url(home_url('/brand')); ?>">Brand</a>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
                    </div>
                </div>
            </div>

            <!-- Main Bar -->
            <div class="header-main-bar">
                <div class="header-main-container">
                    <div class="header-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo/alat-test.webp'); ?>"
                                alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div>

                    <div class="header-category">
                        <a href="<?php echo esc_url(home_url('/kategori')); ?>"
                            style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                            Kategori
                        </a>
                    </div>

                    <div class="header-search-wrap">
                        <form role="search" method="get" class="header-search woocommerce-product-search"
                            action="<?php echo esc_url(home_url('/')); ?>">
                            <button type="submit" aria-label="Search">
                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                            <input type="search" class="search-field" placeholder="Cari alat test..."
                                value="<?php echo get_search_query(); ?>" name="s" />
                            <input type="hidden" name="post_type" value="product" />
                            <button type="submit" class="btn-search">
                                Cari
                            </button>
                        </form>
                    </div>

                    <div class="header-actions">
                        <a href="<?php echo esc_url(home_url('/inaproc')); ?>" class="inaproc-link" title="INAPROC">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo/inaproc.webp'); ?>"
                                alt="INAPROC Logo">
                            <span>INAPROC</span>
                        </a>
                    </div>
                </div>
            </div>
        </header><!-- #masthead -->

        <main id="primary" class="site-main container">