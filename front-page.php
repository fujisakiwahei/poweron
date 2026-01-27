<?php get_header(); ?>

<section class="first-view">
    <img
        src="<?php echo get_template_directory_uri(); ?>/assets/images/front/first-view.webp"
        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/front/first-view.webp 1x,<?php echo get_template_directory_uri(); ?>/assets/images/front/first-view@2x.webp 2x"
        alt="西新でリフレッシュするならパワーオン"
        class="first-view__bg"
        fetchpriority="high">
    <div class="first-view__inner">
        <h1 class="first-view__title">西新でリフレッシュするなら<br>パワーオン</h1>
    </div>
</section>

<?php generate_reserve_cta(true); ?>

<section class="introduction">
    <figure class="introduction__bg">
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/front/introduction-bg.webp"
            alt="背景画像"
            width="514"
            height="692"
            loading="lazy"
            decoding="async"
            class="" />
    </figure>
    <div class="introduction__inner">
        <div class="introduction__text-area">
            <?php generate_section_title("心と体が<br>深呼吸する場所", "Relaxation Place"); ?>
            <p class="introduction__text">
                忙しい日常から少し離れて、<br class="sp-only">自分自身を癒す時間。<br><br class="sp-only">
                パワーオンは、そんな大切なひとときを<br class="sp-only">西新で提供しています。<br><br>
                お客様一人ひとりの<br class="sp-only">体調に合わせた施術を心がけ、<br>
                熟練のセラピストがあなたの疲れを<br class="sp-only">優しく解きほぐします。<br><br>
                パワーオンで、<br class="sp-only">明日への活力をチャージしませんか？
            </p>
            <a class="button" href="<?php echo esc_url(home_url()); ?>/reserve/">
                <span class="material-symbols-outlined">calendar_clock</span>
                <span class="button__text">本店のご予約はこちら</span>
            </a>
            <a class="button" href="https://beauty.hotpepper.jp/kr/slnH000384472/" target="_blank">
                <span class="material-symbols-outlined">calendar_clock</span>
                <span class="button__text">新店のご予約はこちら</span>
            </a>
        </div>
        <p class="introduction__image-area">
            <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/front/introduction-image.webp"
                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/front/introduction-image.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/images/front/introduction-image@2x.webp 2x"
                alt="背術の風景"
                width="775"
                height="522"
                loading="lazy"
                decoding="async"
                class="" />
        </p>
    </div>
</section>

<section class="therapists" id="staff">
    <div class="therapists__inner">
        <div class="therapists__every-shop">
            <?php generate_section_title("本店セラピスト紹介", "Main Shop", "center"); ?>
            <ul class="therapists__list">
                <?php
                $args = array(
                    'post_type' => 'main-shop-therapists',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC'
                );

                $query = new WP_Query($args);
                ?>

                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                        // カスタムフィールドを変数に格納
                        $therapist_name = get_field('therapist_name');
                        $therapist_image = get_field('therapist_image');
                        $therapist_introduction = get_field('therapist_introduction');
                        $therapist_experience = get_field('therapist_experience');
                        $therapist_specialty = get_field('therapist_specialty');
                        $therapist_hobby = get_field('therapist_hobby');
                        if (!$therapist_image) {
                            $therapist_image = get_template_directory_uri() . '/assets/images/common/no-image.svg';
                        }
                        ?>

                        <li class="therapist">
                            <p class="therapist__image">
                                <img
                                    src="<?php echo $therapist_image; ?>"
                                    alt="<?php echo $therapist_name; ?>"
                                    width="400"
                                    height="500"
                                    loading="lazy"
                                    decoding="async"
                                    class="" />
                            </p>
                            <div class="therapist__content">
                                <div class="therapist__name-area">
                                    <p class="therapist__work-at">本店</p>
                                    <h3 class="therapist__name"><?php echo $therapist_name; ?></h3>
                                </div>
                                <?php if ($therapist_introduction) : ?>
                                    <div class="therapist__separator"></div>
                                <?php endif; ?>
                                <?php if ($therapist_introduction) : ?>
                                    <p class="therapist__introduction"><?php echo $therapist_introduction; ?></p>
                                <?php endif; ?>
                                <?php if ($therapist_experience) : ?>
                                    <h4 class="therapist__details-title">経歴</h4>
                                    <p class="therapist__details-content"><?php echo $therapist_experience; ?></p>
                                <?php endif; ?>
                                <?php if ($therapist_specialty) : ?>
                                    <h4 class="therapist__details-title">得意分野</h4>
                                    <p class="therapist__details-content"><?php echo $therapist_specialty; ?></p>
                                <?php endif; ?>
                                <!-- <?php if ($therapist_hobby) : ?>
                                    <h4 class="therapist__details-title">趣味</h4>
                                    <p class="therapist__details-content"><?php echo $therapist_hobby; ?></p>
                                <?php endif; ?> -->
                                <a class="button" href="<?php echo esc_url(home_url()); ?>/reserve/">
                                    <span class="material-symbols-outlined">calendar_clock</span>
                                    <span class="button__text">ご予約はこちら</span>
                                </a>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata(); // クエリをリセット
                    ?>
                <?php else : ?>
                    <p>投稿が見つかりませんでした。</p>
                <?php endif; ?>
            </ul>
        </div>
        <div class="therapists__every-shop">
            <?php generate_section_title("新店セラピスト紹介", "New Shop", "center"); ?>
            <ul class="therapists__list">
                <?php
                $args = array(
                    'post_type' => 'new-shop-therapists',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC'
                );

                $query = new WP_Query($args);
                ?>

                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                        // カスタムフィールドを変数に格納
                        $therapist_name = get_field('therapist_name');
                        $therapist_image = get_field('therapist_image');
                        $therapist_introduction = get_field('therapist_introduction');
                        $therapist_experience = get_field('therapist_experience');
                        $therapist_specialty = get_field('therapist_specialty');
                        $therapist_hobby = get_field('therapist_hobby');
                        if (!$therapist_image) {
                            $therapist_image = get_template_directory_uri() . '/assets/images/common/no-image.svg';
                        }
                        ?>

                        <li class="therapist">
                            <p class="therapist__image">
                                <img
                                    src="<?php echo $therapist_image; ?>"
                                    alt="<?php echo $therapist_name; ?>"
                                    width="400"
                                    height="500"
                                    loading="lazy"
                                    decoding="async"
                                    class="" />
                            </p>
                            <div class="therapist__content">
                                <div class="therapist__name-area">
                                    <p class="therapist__work-at">新店</p>
                                    <h3 class="therapist__name"><?php echo $therapist_name; ?></h3>
                                </div>
                                <?php if ($therapist_introduction) : ?>
                                    <div class="therapist__separator"></div>
                                <?php endif; ?>
                                <?php if ($therapist_introduction) : ?>
                                    <p class="therapist__introduction"><?php echo $therapist_introduction; ?></p>
                                <?php endif; ?>
                                <?php if ($therapist_experience) : ?>
                                    <h4 class="therapist__details-title">経歴</h4>
                                    <p class="therapist__details-content"><?php echo $therapist_experience; ?></p>
                                <?php endif; ?>
                                <?php if ($therapist_specialty) : ?>
                                    <h4 class="therapist__details-title">得意分野</h4>
                                    <p class="therapist__details-content"><?php echo $therapist_specialty; ?></p>
                                <?php endif; ?>
                                <!-- <?php if ($therapist_hobby) : ?>
                                    <h4 class="therapist__details-title">趣味</h4>
                                    <p class="therapist__details-content"><?php echo $therapist_hobby; ?></p>
                                <?php endif; ?> -->
                                <a class="button" href="https://beauty.hotpepper.jp/kr/slnH000384472/" target="_blank">
                                    <span class="material-symbols-outlined">calendar_clock</span>
                                    <span class="button__text">ご予約はこちら</span>
                                </a>
                            </div>
                        </li>
                    <?php endwhile;
                    wp_reset_postdata(); // クエリをリセット
                    ?>
                <?php else : ?>
                    <p>投稿が見つかりませんでした。</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>

<section class="customers-voice">
    <div class="customers-voice__inner">
        <?php generate_section_title("お客様の声", "Customers Voice", "center"); ?>
        <ul class="customers-voice__list">
            <li class="customers-voice__item">
                <p class="customers-voice__item__name">Y様</p>
                <div class="customers-voice__item__stars">★★★★★</div>
                <p class="customers-voice__item__text">
                    &ldquo;首と肩の重いコリが、施術後は嘘のように軽くなります。その軽さが2週間ほど続くので、定期的にリフレッシュしに通っています。&rdquo;
                </p>
            </li>
            <span class="customers-voice__item__separator"></span>
            <li class="customers-voice__item">
                <p class="customers-voice__item__name">K様</p>
                <div class="customers-voice__item__stars">★★★★★</div>
                <p class="customers-voice__item__text">
                    &ldquo;通うマッサージ屋さんは、パワーオンだけになりました。気心の知れた温さんが、私の体の状態や好みの力加減をしっかり理解してくれているからです。&rdquo;
                </p>
            </li>
            <span class="customers-voice__item__separator"></span>
            <li class="customers-voice__item">
                <p class="customers-voice__item__name">M様</p>
                <div class="customers-voice__item__stars">★★★★★</div>
                <p class="customers-voice__item__text">
                    &ldquo;7年半通っています。子連れでも温かく受け入れてくれるアットホームな雰囲気がありがたい...。体も心もリフレッシュできる大切な場所です。&rdquo;
                </p>
            </li>
        </ul>
    </div>
</section>

<section class="access" id="access">
    <div class="access__inner">
        <?php generate_section_title("アクセス", "Access", "center"); ?>
        <p class="access__copy">
            新店・本店どちらも<br class="sp-only">西新駅から徒歩3分！<br>
            仕事帰りにでも、休日ふらっとでも、<br class="sp-only">いつでもお気軽にお越しいただけます。
        </p>
        <div class="access__every-shop">
            <div class="access__every-shop__top">
                <div class="access__every-shop__top__text">
                    <h3 class="access__every-shop__top__text__title">パワーオン 本店</h3>
                    <div class="access__every-shop__top__text__details">
                        <span class="material-symbols-outlined">location_on</span>
                        <address class="access__every-shop__top__text__details__text">福岡県福岡市早良区西新5丁目1-13</address>
                    </div>
                    <div class="access__every-shop__top__text__details">
                        <span class="material-symbols-outlined">phone</span>
                        <a href="tel:092-707-5788" class="access__every-shop__top__text__details__text">092-707-5788</a>
                    </div>
                    <div class="access__every-shop__top__text__separator"></div>
                    <p class="access__every-shop__top__text__walking-time">地下鉄西新駅から徒歩3分</p>
                </div>
                <p class="access__every-shop__top__image">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/common/main-shop.webp"
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/main-shop.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/images/common/main-shop@2x.webp 2x"
                        alt="本店の外観"
                        width="512"
                        height="320"
                        loading="lazy"
                        decoding="async"
                        class="" />
                </p>
            </div>
            <div class="access__every-shop__bottom">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.890626198326!2d130.3546496254652!3d33.582188942404734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354193d81b12a1b7%3A0x5ad63e7c9c1f21df!2z44OR44Ov44O844Kq44Oz5pys5bqX!5e0!3m2!1sja!2sjp!4v1768549502817!5m2!1sja!2sjp" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="access__every-shop">
            <div class="access__every-shop__top">
                <div class="access__every-shop__top__text">
                    <h3 class="access__every-shop__top__text__title">パワーオン 新店</h3>
                    <div class="access__every-shop__top__text__details">
                        <span class="material-symbols-outlined">location_on</span>
                        <address class="access__every-shop__top__text__details__text">福岡県福岡市早良区西新5丁目2-37</address>
                    </div>
                    <div class="access__every-shop__top__text__details">
                        <span class="material-symbols-outlined">phone</span>
                        <a href="tel:092-407-4776" class="access__every-shop__top__text__details__text">092-407-4776</a>
                    </div>
                    <div class="access__every-shop__top__text__separator"></div>
                    <p class="access__every-shop__top__text__walking-time">地下鉄西新駅から徒歩3分</p>
                </div>
                <p class="access__every-shop__top__image">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/common/new-shop.webp"
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/images/common/new-shop.webp 1x, <?php echo get_template_directory_uri(); ?>/assets/images/common/new-shop@2x.webp 2x"
                        alt="新店の外観"
                        width="512"
                        height="320"
                        loading="lazy"
                        decoding="async"
                        class="" />
                </p>
            </div>
            <div class="access__every-shop__bottom">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.8964285777233!2d130.3571676!3d33.582038299999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354193a46d65fe63%3A0xedcc8e093cd3c2cd!2z57eP5ZCI44Oq44Op44Kv44K844O844K344On44Oz44OR44Ov44O844Kq44Oz5paw5bqX!5e0!3m2!1sja!2sjp!4v1768549479561!5m2!1sja!2sjp" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<?php generate_reserve_cta(); ?>

<?php get_footer(); ?>