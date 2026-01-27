</main>

<footer>
    <div class="footer__inner">
        <div class="footer__logo">
            <a href="<?php echo esc_url(home_url()); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Power On">
            </a>
        </div>
        <div class="footer__access">
            <div class="footer__access__item">
                <h3 class="footer__access__item__title">パワーオン 本店</h3>
                <address class="footer__access__item__address">福岡県福岡市早良区西新5丁目1-13 <br> ※地下鉄西新駅から徒歩3分</address>
                <a href="tel:092-707-5788" class="footer__access__item__tel">
                    <span class="material-symbols-outlined">phone</span>
                    <p>092-707-5788</p>
                </a>
                <a class="button white" href="<?php echo esc_url(home_url()); ?>/reserve/">
                    <span class="material-symbols-outlined">calendar_clock</span>
                    <span class="button__text">ご予約はこちら</span>
                </a>
            </div>
            <div class="footer__access__separator"></div>
            <div class="footer__access__item">
                <h3 class="footer__access__item__title">パワーオン 新店</h3>
                <address class="footer__access__item__address">福岡県福岡市早良区西新5丁目2-37<br> ※地下鉄西新駅から徒歩3分</address>
                <a href="tel:092-407-4776" class="footer__access__item__tel">
                    <span class="material-symbols-outlined">phone</span>
                    <p>092-407-4776</p>
                </a>
                <a class="button white" href="https://beauty.hotpepper.jp/kr/slnH000384472/" target="_blank">
                    <span class="material-symbols-outlined">calendar_clock</span>
                    <span class="button__text">ご予約はこちら</span>
                </a>
            </div>
        </div>
        <small class="footer__copyright">Copyright © 2026 <br class="sp-only">Power On. All rights reserved.</small>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>