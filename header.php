<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <title><?php echo wp_get_document_title(); ?></title>

    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                <a href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-green.svg" alt="Power On">
                </a>
            </div>
            <div class="header__nav">
                <ul>
                    <li class="pc-only"><a href="<?php echo esc_url(home_url()); ?>/#staff">セラピスト</a></li>
                    <li class="pc-only"><a href="<?php echo esc_url(home_url()); ?>/#access">アクセス</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/menu/">メニュー</a></li>
                    <li>
                        <a class="button" href="<?php echo esc_url(home_url()); ?>/reserve/">
                            <span class="material-symbols-outlined">calendar_clock</span>
                            <span class="button__text">予約</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main>