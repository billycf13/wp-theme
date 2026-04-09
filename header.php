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
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-logo img {
            max-height: 48px;
            width: auto;
            vertical-align: middle;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .header-nav a {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #d91640;
            /* matches closely with logo */
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .header-nav a:hover {
            color: #a40e2d;
        }

        .header-nav a svg {
            stroke-width: 2px;
        }

        .header-search {
            display: flex;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            overflow: hidden;
            width: 100%;
            max-width: 260px;
        }

        .header-search input[type="search"] {
            flex: 1;
            padding: 10px 15px;
            border: none;
            background: transparent;
            outline: none;
            font-size: 13px;
            min-width: 0;
            color: #374151;
        }

        .header-search input[type="search"]::placeholder {
            color: #9ca3af;
        }

        .header-search button {
            background-color: #d91640;
            border: none;
            color: white;
            padding: 0 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }

        .header-search button:hover {
            background-color: #a40e2d;
        }

        @media (max-width: 900px) {
            .header-nav {
                display: none;
            }

            .header-container {
                justify-content: space-between;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <header id="masthead" class="site-header site-header-custom">
            <div class="container header-container">
                <div class="site-branding header-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo/alat-test.webp'); ?>"
                            alt="<?php bloginfo('name'); ?>">
                    </a>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation header-nav">
                    <a href="<?php echo esc_url(home_url('/tentang')); ?>">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16M9 9h6M9 13h6M9 17h6" />
                        </svg>
                        Tentang
                    </a>
                    <a href="<?php echo esc_url(home_url('/kontak')); ?>">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        Kontak
                    </a>
                    <a href="<?php echo esc_url(home_url('/produk')); ?>">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z">
                            </path>
                            <polyline points="2.32 6.16 12 11 21.68 6.16"></polyline>
                            <line x1="12" y1="22.76" x2="12" y2="11"></line>
                        </svg>
                        Produk
                    </a>
                    <a href="<?php echo esc_url(home_url('/blog')); ?>">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        Blog
                    </a>
                    <a href="<?php echo esc_url(home_url('/inaproc')); ?>">
                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        INAPROC
                    </a>
                </nav><!-- #site-navigation -->

                <div class="header-search-wrap">
                    <form role="search" method="get" class="header-search woocommerce-product-search"
                        action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" class="search-field" placeholder="Cari produk..."
                            value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="hidden" name="post_type" value="product" />
                        <button type="submit">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </header><!-- #masthead -->

        <main id="primary" class="site-main container">