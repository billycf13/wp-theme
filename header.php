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
            color: #374151;
            font-weight: 500;
            gap: 6px;
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

        /* Sticky Burger Menu Styles */
        .header-sticky-menu {
            display: none;
            /* hidden by default */
            position: relative;
        }

        .is-stuck .header-sticky-menu {
            display: flex;
            align-items: center;
        }

        .burger-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            color: #374151;
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .burger-btn:hover {
            background: #f3f4f5;
        }

        .sticky-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 5px;
            background: #fff;
            min-width: 150px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #eee;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease;
            z-index: 100;
        }

        .header-sticky-menu:hover .sticky-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .sticky-dropdown a {
            display: block;
            padding: 10px 15px;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            border-bottom: 1px solid #f3f4f5;
            transition: background 0.2s, color 0.2s;
        }

        .sticky-dropdown a:last-child {
            border-bottom: none;
        }

        .sticky-dropdown a:hover {
            background: #f9fafb;
            color: #d91640;
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
        <!-- Top Bar -->
        <div class="header-top-bar">
            <div class="header-top-container">
                <div class="top-bar-left">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                    </svg>
                    <span>08123456778</span>
                </div>
                <div class="top-bar-right">
                    <a href="<?php echo esc_url(home_url('/tentang')); ?>">Tentang</a>
                    <a href="<?php echo esc_url(home_url('/kontak')); ?>">Kontak</a>
                    <a href="<?php echo esc_url(home_url('/produk')); ?>">Produk</a>
                    <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
                </div>
            </div>
        </div>

        <header id="masthead" class="site-header site-header-custom" style="position: sticky; top: 0; z-index: 1000;">

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
                        </form>
                    </div>

                    <div class="header-category">
                        <a href="<?php echo esc_url(home_url('/brand')); ?>"
                            style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                            Merek
                        </a>
                    </div>

                    <div class="header-actions">
                        <div class="header-sticky-menu">
                            <button class="burger-btn" aria-label="Menu">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" fill="none"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                            </button>
                            <div class="sticky-dropdown">
                                <a href="<?php echo esc_url(home_url('/tentang')); ?>">Tentang</a>
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>">Kontak</a>
                                <a href="<?php echo esc_url(home_url('/produk')); ?>">Produk</a>
                                <a href="<?php echo esc_url(home_url('/brand')); ?>">Merek</a>
                                <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
                            </div>
                        </div>

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

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const header = document.getElementById("masthead");
                    const topBar = document.querySelector(".header-top-bar");

                    if (header && topBar) {
                        const observer = new IntersectionObserver(
                            ([e]) => {
                                // if top bar is fully out of screen, sticky kicks in
                                if (e.isIntersecting) {
                                    header.classList.remove("is-stuck");
                                } else {
                                    header.classList.add("is-stuck");
                                }
                            },
                            { threshold: [0] }
                        );

                        observer.observe(topBar);
                    }
                });
            </script>