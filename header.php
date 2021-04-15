<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php get_template_part('_inc/titleinfo'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
    <!-- WPデフォルトのjQueryを読み込まないようにする -->
    <?php wp_deregister_script('jquery'); ?>
    <?php wp_head(); ?>
</head>

<body class="drawer drawer--right">
    <header class="header header--default js-header">
        <a href="<?php echo home_url(); ?>" class="header__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/logo.svg" alt="CAT BELLロゴ画像">
        </a>
        <button type="button" class="drawer-toggle drawer-hamburger">
            <span class="drawer-hamburger-icon"></span>
        </button>
        <nav class="header__nav drawer-nav" role="navigation">
            <ul class="header__list drawer-menu">
                <li class="header__item">
                    <a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>" class="drawer-menu-item">ペットを探す</a>
                </li>
                <li class="header__item">
                    <a href="<?php echo get_post_type_archive_link('shop'); ?>" class="drawer-menu-item">お店を探す</a>
                </li>
                <li class="header__item">
                    <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="drawer-menu-item">ブログ一覧</a>
                </li>
            </ul>
        </nav>
    </header>