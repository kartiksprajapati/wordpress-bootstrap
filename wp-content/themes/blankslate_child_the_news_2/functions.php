<?php

function enqueue_thenews_scripts()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'enqueue_thenews_scripts');

function thenews_theme_support()
{
    // register_nav_menus([
    //     'primary' => __('Primary Menu', 'thenews')
    // ]);

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'thenews_theme_support');