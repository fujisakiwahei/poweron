<?php

/* ===============================================
  スクリプトとスタイルシートの読み込み
=============================================== */
function my_theme_scripts()
{
    // Google Fonts
    wp_enqueue_style('google-font-noto-serif-jp', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('google-font-cormorant', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', array(), null);
    wp_enqueue_style('google-font-parisienne', 'https://fonts.googleapis.com/css2?family=Parisienne&display=swap', array(), null);

    // Google Icons
    wp_enqueue_style('google-icons-filled', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=block', array(), null);


    // Swiper
    wp_enqueue_style('swiperStyle', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css");
    wp_enqueue_script('swiperScript', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js");

    // 他にもプラグインなどあれば追加

    // assets
    wp_enqueue_style("mainStyle", get_theme_file_uri('style.css'));
    wp_enqueue_script("mainJs", get_theme_file_uri('/assets/js/main.js'));
}

add_action('wp_enqueue_scripts', 'my_theme_scripts');

/* ===============================================
  サムネイルを有効化
=============================================== */
add_theme_support('post-thumbnails');

/* ===============================================
 *  bodyに固定ページのクラスを追加
 =============================================== */
function add_slug_to_body_class($classes)
{
    if (is_page()) {
        global $post;
        if (isset($post->post_name)) {
            $classes[] = 'page-' . $post->post_name;
        }
    }
    return $classes;
}
add_filter('body_class', 'add_slug_to_body_class');

/* ===============================================
  抜粋の区切り文字を変更
=============================================== */
function custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
