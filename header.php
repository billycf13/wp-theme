<?php
/**
 * The header for our theme
 *
 * @package Universal_Base
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="container site-branding">
            <?php
            if ( has_custom_logo() ) :
                the_custom_logo();
            else :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                $universal_base_description = get_bloginfo( 'description', 'display' );
                if ( $universal_base_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $universal_base_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif;
            endif;
            ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation container">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
            ) );
            ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <main id="primary" class="site-main container">
