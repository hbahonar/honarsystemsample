<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class='hss-site'>
        <a class='hss-skip-link screen-reader-text' href='#content'>
            <?php esc_html_e('Go To Content', 'hs-sample');
            ?>
        </a>
        <button class='hss-to-top-button' onclick='window.scrollTo({top: 0, behavior: "smooth"});'>
            <span class="dashicons dashicons-arrow-up-alt2"></span>
        </button>
        <?php
        $header_image_url = header_image();
        ?>
        <header class="hss-header hs-container" <?php echo !empty($header_image_url) ? 'style="background-image:url(' . esc_url($header_image_url) . ')"' : ''; ?>>
            <div class="hs-row">
                <div class="hs-col-2 hs-col-m-12 hs-col-t-6 hs-order-t-1">
                    <div class='hss-logo'>
                        <?php
                        if (has_custom_logo()) :
                            the_custom_logo();
                        else :
                            $blog_info    = get_bloginfo('name');
                            $blog_description = get_bloginfo('description');
                            $show_title   = (true === display_header_text());
                            $header_class = $show_title ? 'site-title' : 'screen-reader-text';
                        ?>
                            <?php if ($blog_info) : ?>
                                <?php if (is_front_page() && !is_paged()) : ?>
                                    <h1 class="<?php echo esc_attr($header_class); ?>"><?php echo esc_html($blog_info);?></h1>
                                    <span class="site-description"><?php echo esc_html($blog_description); ?></span>
                                <?php elseif (is_front_page() && !is_home()) : ?>
                                    <h1 class="<?php echo esc_attr($header_class); ?>">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo esc_html($blog_info); ?>
                                        </a>
                                    </h1>
                                    <span class="site-description"><?php echo esc_html($blog_description); ?></span>
                                <?php else : ?>
                                    <h1 class="<?php echo esc_attr($header_class); ?>">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo esc_html($blog_info); ?>
                                        </a>
                                    </h1>
                                    <span class="site-description"><?php echo esc_html($blog_description); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="hs-col-7 hs-col-m-6 hs-col-t-12 hs-order-t-3">
                    <div class="hss-main-menu">
                        <?php if(wp_is_mobile()): ?>
                            <?php if (has_nav_menu('mobile-menu')) : ?>
                                <nav class="navbar">
                                    <button class="navbar-toggler" type="button" onclick="hss_open_menu(this)">
                                        <span class="dashicons dashicons-menu-alt3"></span>
                                    </button>
                                    <div id="bscollapse" class="navbar-box">
                                        <button class="menu-close" onclick="hss_close_menu(this)">
                                            <span class="dashicons dashicons-no-alt"></span>
                                        </button>
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'    => 'mobile-menu',
                                            'container'         => 'div',
                                            'menu_class'        => 'nav navbar-nav',
                                            'walker' => new HS_Menu_Walker()
                                        ));
                                        ?>
                                    </div>
                                </nav>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (has_nav_menu('main-menu')) : ?>
                                <nav class="navbar">
                                    <div id="bscollapse" class="navbar-box">
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'    => 'main-menu',
                                            'container'         => 'div',
                                            'menu_class'        => 'nav navbar-nav',
                                            'walker' => new HS_Menu_Walker()
                                        ));
                                        ?>
                                    </div>
                                </nav>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="hs-col-3 hs-col-m-6 hs-col-t-6 hs-justify-content-m-end hs-order-t-2">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </header>