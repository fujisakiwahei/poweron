<?php get_header(); ?>

<section class="menu-first-view">
    <div class="menu-first-view__inner">
        <h1 class="menu-first-view__title">Menu</h1>
        <div class="menu-first-view__separator"></div>
        <p class="menu-first-view__subtitle">施術メニュー</p>
    </div>
</section>

<section class="menu-shops">
    <div class="menu-shops__inner">
        <div class="menu-shops__item">
            <p class="menu-shops__item__image">
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/main-shop.webp"
                    srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/main-shop.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/images/common/main-shop@2x.webp 2x"
                    alt="パワーオン 本店"
                    width="340"
                    height="240"
                    loading="lazy"
                    decoding="async"
                    class="" />
            </p>
            <div class="menu-shops__item__text">
                <h3 class="menu-shops__item__title">パワーオン 本店</h3>
                <div class="menu-shops__item__details__container">
                    <span class="material-symbols-outlined">location_on</span>
                    <address class="menu-shops__item_information">福岡県福岡市早良区西新5丁目1-13</address>
                </div>
                <a href="tel:092-707-5788" class="menu-shops__item__details__container">
                    <span class="material-symbols-outlined">phone</span>
                    <p class="menu-shops__item_information">092-707-5788</p>
                </a>
            </div>
            <a class="button" href="#main-shop-menu">
                <span class="material-symbols-outlined">menu_book</span>
                <span class="button__text">本店のメニューを見る</span>
            </a>
        </div>
        <div class="menu-shops__item">
            <p class="menu-shops__item__image">
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/common/new-shop.webp"
                    srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/new-shop.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/images/common/new-shop@2x.webp 2x"
                    alt="画像の説明"
                    width="340"
                    height="240"
                    loading="lazy"
                    decoding="async"
                    class="" />
            </p>
            <div class="menu-shops__item__text">
                <h3 class="menu-shops__item__title">パワーオン 新店</h3>
                <div class="menu-shops__item__details__container">
                    <span class="material-symbols-outlined">location_on</span>
                    <address class="menu-shops__item_information">福岡県福岡市早良区西新5丁目2-37<br> <span>（本店から徒歩1分）</span></address>
                </div>
                <a href="tel:092-407-4776" class="menu-shops__item__details__container">
                    <span class="material-symbols-outlined">phone</span>
                    <p class="menu-shops__item_information">092-407-4776</p>
                </a>
            </div><a class="button" href="#new-shop-menu">
                <span class="material-symbols-outlined">menu_book</span>
                <span class="button__text">新店のメニューを見る</span>
            </a>
        </div>
    </div>
    </div>
</section>
<section class="menu" id="main-shop-menu">
    <div class="menu__inner">
        <div class="every-shop-menu" id="main-shop-menu">
            <?php generate_section_title("本店のメニュー", "Main Shop Menu", "center"); ?>

            <?php
            // 本店メニューのカスタム投稿タイプから投稿を取得
            $args = array(
                'post_type' => 'main-shop-menu', // カスタム投稿タイプのスラッグを確認してください
                'posts_per_page' => -1, // すべて取得
                'orderby' => 'menu_order', // プラグインで設定した順序
                'order' => 'ASC'
            );

            $menu_query = new WP_Query($args);

            // カテゴリごとにメニューをグループ化
            $menus_by_category = array();

            if ($menu_query->have_posts()) :
                while ($menu_query->have_posts()) : $menu_query->the_post();
                    // ACFのカテゴリフィールドを取得
                    $category = get_field('category'); // 'category'はACFのフィールド名

                    if ($category) {
                        $category_value = is_array($category) ? $category['value'] : $category;
                        $category_label = is_array($category) ? $category['label'] : $category;

                        // カテゴリごとに投稿を格納
                        if (!isset($menus_by_category[$category_value])) {
                            $menus_by_category[$category_value] = array(
                                'label' => $category_label,
                                'posts' => array()
                            );
                        }

                        $menus_by_category[$category_value]['posts'][] = array(
                            'menu-title' => get_field('menu-title'),
                            'menu-description' => get_field('menu-description'),
                            'menu-price' => get_field('price'),
                        );
                    }
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <?php if (!empty($menus_by_category)) : ?>
                <?php foreach ($menus_by_category as $category_value => $category_data) : ?>
                    <div class="menu__category">
                        <h3 class="menu__category__title"><?php echo esc_html($category_data['label']); ?></h3>
                        <div class="menu__category__items">
                            <?php foreach ($category_data['posts'] as $menu_item) : ?>
                                <div class="menu__item">
                                    <div class="menu__item__top">
                                        <h4 class="menu__item__title"><?php echo esc_html($menu_item['menu-title']); ?></h4>
                                        <div class="dotted-line"></div>
                                        <div class="menu__item__price over-tablet-only"><?php echo esc_html(number_format($menu_item['menu-price'])); ?><span>&nbsp;円</span></div>
                                    </div>
                                    <div class="menu__item__description"><?php echo esc_html($menu_item['menu-description']); ?></div>
                                    <div class="menu__item__price sp-only"><?php echo esc_html(number_format($menu_item['menu-price'])); ?><span>&nbsp;円</span></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="menu__no-items">メニューが見つかりませんでした。</p>
            <?php endif; ?>
        </div>
        <div class="every-shop-menu" id="new-shop-menu">
            <?php generate_section_title("新店のメニュー", "New Shop Menu", "center"); ?>

            <?php
            // 本店メニューのカスタム投稿タイプから投稿を取得
            $args = array(
                'post_type' => 'new-shop-menu', // カスタム投稿タイプのスラッグを確認してください
                'posts_per_page' => -1, // すべて取得
                'orderby' => 'menu_order', // プラグインで設定した順序
                'order' => 'ASC'
            );

            $menu_query = new WP_Query($args);

            // カテゴリごとにメニューをグループ化
            $menus_by_category = array();

            if ($menu_query->have_posts()) :
                while ($menu_query->have_posts()) : $menu_query->the_post();
                    // ACFのカテゴリフィールドを取得
                    $category = get_field('category'); // 'category'はACFのフィールド名

                    if ($category) {
                        $category_value = is_array($category) ? $category['value'] : $category;
                        $category_label = is_array($category) ? $category['label'] : $category;

                        // カテゴリごとに投稿を格納
                        if (!isset($menus_by_category[$category_value])) {
                            $menus_by_category[$category_value] = array(
                                'label' => $category_label,
                                'posts' => array()
                            );
                        }

                        $menus_by_category[$category_value]['posts'][] = array(
                            'menu-title' => get_field('menu-title'),
                            'menu-description' => get_field('menu-description'),
                            'menu-price' => get_field('price'),
                        );
                    }
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <?php if (!empty($menus_by_category)) : ?>
                <?php foreach ($menus_by_category as $category_value => $category_data) : ?>
                    <div class="menu__category">
                        <h3 class="menu__category__title"><?php echo esc_html($category_data['label']); ?></h3>
                        <div class="menu__category__items">
                            <?php foreach ($category_data['posts'] as $menu_item) : ?>
                                <div class="menu__item">
                                    <div class="menu__item__top">
                                        <h4 class="menu__item__title"><?php echo esc_html($menu_item['menu-title']); ?></h4>
                                        <div class="dotted-line"></div>
                                        <div class="menu__item__price over-tablet-only"><?php echo esc_html(number_format($menu_item['menu-price'])); ?><span>&nbsp;円</span></div>
                                    </div>
                                    <div class="menu__item__description"><?php echo esc_html($menu_item['menu-description']); ?></div>
                                    <div class="menu__item__price sp-only"><?php echo esc_html(number_format($menu_item['menu-price'])); ?><span>&nbsp;円</span></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="menu__no-items">メニューが見つかりませんでした。</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php generate_reserve_cta(true); ?>


<?php get_footer(); ?>