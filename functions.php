<?php

include('inc/hs_menu_walker.php');

if (!function_exists('hs_sample_enqueue_theme')) {
    function hs_sample_enqueue_theme()
    {
        wp_enqueue_style('hss-style', get_stylesheet_uri());
    }
    add_action('wp_enqueue_scripts', 'hs_sample_enqueue_theme');
}

if (!function_exists('hs_sample_setup_header')) :
    function hs_sample_setup_header()
    {
        register_nav_menus(
            array(
                'main-menu' => esc_html__('Main Menu', 'hs-sample'),
                'mobile-menu' => esc_html__('Mobile Menu', 'hs-sample'),
            )
        );

        $args = array(
            'default-text-color' => '000',
            'width'              => 1000,
            'height'             => 250,
            'flex-width'         => true,
            'flex-height'        => true,
        );
        add_theme_support('custom-header', $args);

        add_theme_support('custom-logo', array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ));
    }
    add_action('after_setup_theme', 'hs_sample_setup_header');
endif;

if (!function_exists('hs_sample_enqueue_header')) {
    function hs_sample_enqueue_header()
    {
        wp_enqueue_style('hss-header', esc_url(get_template_directory_uri() . '/assets/css/header.css'), array(), '1.0.0');

        wp_enqueue_script('hss-header-script', esc_url(get_template_directory_uri() . '/assets/js/header.js'), ['jquery'], '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'hs_sample_enqueue_header');
}