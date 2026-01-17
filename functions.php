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

/* ===============================================
 *  予約CTAセクションを生成
 =============================================== */
function generate_reserve_cta()
{
?>
  <section class="reserve-cta">

    <p class="reserve-cta__subtitle">\ オンライン & 電話予約 /</p>
    <h2 class="reserve-cta__title">予約はこちら</h2>
    <div class="reserve-cta__button-area">
      <a href="<?php echo esc_url(home_url()); ?>/reserve/" class="reserve-cta__button">
        <span class="material-symbols-outlined">calendar_clock</span>
        <span class="reserve-cta__button__text">オンライン<br class="under-tablet-only">予約</span>
      </a>
      <a href="tel:092-407-4776" class="reserve-cta__button">
        <span class="material-symbols-outlined">phone_enabled</span>
        <span class="reserve-cta__button__text">電話予約 <br class="under-tablet-only">（本店）</span>
        <div class="reserve-cta__button__tel_area">
          <span class="material-symbols-outlined">phone</span>
          <span class="reserve-cta__button__number">092-407-4776</span>
        </div>
      </a>
      <a href="tel:092-707-5788" class="reserve-cta__button">
        <span class="material-symbols-outlined">phone_enabled</span>
        <span class="reserve-cta__button__text">電話予約 <br class="under-tablet-only">（新店）</span>
        <div class="reserve-cta__button__tel_area">
          <span class="material-symbols-outlined">phone</span>
          <span class="reserve-cta__button__number">092-707-5788</span>
        </div>
      </a>
    </div>
  </section>
<?php
}

/* ===============================================
 *  セクションタイトルを作成
 =============================================== */
function generate_section_title($japanese, $english = null, $classes = null)
{
?>
  <h2 class="section-title 
  <?php if ($classes) {
    echo $classes;
  } ?>
  ">
    <span class="section-title__japanese"><?php echo $japanese; ?></span>
    <span class="section-title__english"><?php echo $english; ?></span>
  </h2>
<?php
}
