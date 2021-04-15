<footer class="footer">
    <div class="footer__inner inner">
        <div class="footer__wrap">
            <a href="<?php echo home_url(); ?>" class="footer__logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/logo.svg" alt="CAT BELLロゴ画像">
            </a>
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__item">
                        <a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>">ペットを探す</a>
                    </li>
                    <li class="footer__item">
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>">お店を探す</a>
                    </li>
                    <li class="footer__item">
                        <a href="<?php echo get_post_type_archive_link('blog'); ?>">ブログ一覧</a>
                    </li>
                </ul>
            </nav>
        </div>
        <p class="footer__copyRight">&copy; 2020-2022 CAT BELL Co., Ltd.</p>
    </div>
</footer>
<?php wp_footer(); ?>