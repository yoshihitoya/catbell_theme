<?php get_header(); ?>

    <main class="main">
        <div class="mainVisual js-mainVisual">
            <div class="mainVisual__bgImg">
                <div class="mainVisual__inner inner">
                    <div class="mainVisual__wrap">
                        <h1 class="mainVisual__title">猫と暮らそう</h1>
                        <p class="mainVisual__text">安心・安全な猫専門ペットショップ</p>
                        <div class="mainVisual__btnArea">
                            <a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>" class="mainVisual__btn">猫種一覧を見る</a>
                            <a href="<?php echo get_post_type_archive_link('shop'); ?>" class="mainVisual__btn">お店を見る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.mainVisual -->
        <div class="news">
            <div class="news__inner inner">
                <div class="news__wrap">
                    <div class="news__heading">お知らせ</div>
                    <ul class="news__list">
                        <?php
                            $args = array(
                                'post_type' => 'news',
                                'order' => 'DESC',
                                'posts_per_page' => -1
                            );
                            $my_query = new WP_Query($args);
                            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                        ?>
                        <li class="news__item">
                            <div class="news__date"><?php echo get_field('news_date'); ?></div>
                            <div class="news__title">
                                <a href="<?php echo get_field('news_link'); ?>" class="news__link"><?php echo the_title(); ?></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.news -->

        <section class="findPets">
            <div class="findPet__inner inner">
                <div class="findPet__head">
                    <h2 class="util__title">ペットを探す</h2>
                    <p class="util__subTitle">Find a pet</p>
                </div>
                <div class="findPet__wrap">
                    <ul class="findPet__list">
                    <?php
                        $countUp = 0;
                        $taxonomy_name = 'cat_type'; //表示したいtaxonomynameを設定
                        $taxonomys = get_terms($taxonomy_name);
                        if(!is_wp_error($taxonomys) && count($taxonomys)):
                            foreach($taxonomys as $taxonomy):
                                $term_id = esc_html($taxonomy->term_id);
                                $term_idsp = "cat_type_".$term_id; //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」
                                $photo = get_field('cat_type_img',$term_idsp);
                                $photosp = wp_get_attachment_image_src($photo, 'full');
                    ?>
                    <?php if ($countUp < 8) { ?>
                        <li class="findPet__item">
                            <a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?><?php echo esc_html($taxonomy->slug); ?>" class="findPet__link">
                                <div class="findPet__catImg">
                                    <img src="<?php echo $photosp[0]; ?>" alt="<?php echo esc_html($taxonomy->name); ?>">
                                </div>
                                <p class="findPet__catName"><?php echo esc_html($taxonomy->name); ?></p>
                            </a>
                        </li>
                    <?php } ?>
                    <?php $countUp++; ?>
                    <?php endforeach; endif; ?>
                    </ul>
                </div>
                <div class="findPet__more">
                    <a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>" class="util__link">猫種一覧を見る</a>
                </div>
            </div>
        </section>
        <!-- /.findPet -->

        <section class="findStore">
            <div class="findStore__inner inner">
                <div class="findStore__head">
                    <h2 class="util__title">お店を探す</h2>
                    <p class="util__subTitle">Find a store</p>
                </div>
                <div class="findStore__wrap">
                    <div class="findStore__map">
                        <div class="findStore__area findStore__area--hokkaido"></div>
                        <div class="findStore__area findStore__area--kyushu"></div>
                        <div class="findStore__area findStore__area--shikoku"></div>
                        <div class="findStore__area findStore__area--honshu1"></div>
                        <div class="findStore__area findStore__area--honshu2"></div>
                    </div>
                    <div class="findStore__shop">
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/sapporo" class="findStore__link"><div class="findStore__name findStore__name--sapporo">札幌店</div></a>
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/miyagi" class="findStore__link"><div class="findStore__name findStore__name--miyagi">宮城店</div></a>
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/shinjuku" class="findStore__link"><div class="findStore__name findStore__name--shinjuku">新宿店</div></a>
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/ishikawa" class="findStore__link"><div class="findStore__name findStore__name--ishikawa">石川店</div></a>
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/umeda" class="findStore__link"><div class="findStore__name findStore__name--umeda">梅田店</div></a>
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/sizuoka" class="findStore__link"><div class="findStore__name findStore__name--shizuoka">静岡店</div></a>
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/fukuoka" class="findStore__link"><div class="findStore__name findStore__name--fukuoka">福岡店</div></a>
                        <a href="<?php echo get_post_type_archive_link('shop'); ?>/kagoshima" class="findStore__link"><div class="findStore__name findStore__name--kagoshima">鹿児島店</div></a>
                    </div>
                </div>
                <div class="findStore__more">
                    <a href="<?php echo get_post_type_archive_link('shop'); ?>" class="util__link">店舗一覧を見る</a>
                </div>
            </div>
        </section>
        <!-- /.store -->
        <section class="blog">
            <div class="blog__inner inner">
                <div class="blog__head">
                    <h2 class="util__title">ブログ</h2>
                    <p class="util__subTitle">Blog</p>
                </div>
                <div class="blog__wrap">
                    <ul class="blog__list">
                    <?php
                        $args = array(
                            'post_type' => 'blog',
                            'order' => 'DESC',
                            'posts_per_page' => 4
                        );
                        $my_query = new WP_Query($args);
                        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                    ?>
                        <li class="blog__item">
                            <a href="<?php the_permalink(); ?>" class="blog__link">
                                <div class="blog__img">
                                    <img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                                <div class="blog__info">
                                    <h3 class="blog__title"><?php echo get_the_title(); ?></h3>
                                    <p class="blog__date"><?php the_time('Y.m.d'); ?></p>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
                <div class="blog__more">
                    <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="util__link">ブログ一覧を見る</a>
                </div>
            </div>
        </section>
        <!-- /.blog -->
        <div class="about">
            <div class="about__inner inner">
                <div class="about__head">
                    <h2 class="util__title">サイトについて</h2>
                    <p class="util__subTitle">About</p>
                </div>
                <div class="about__wrap">
                    <div class="about__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/about_01.png" alt="">
                    </div>
                    <div class="about__body">
                        <div class="about__title">ペットと人との笑顔ある未来の創造</div>
                        <p class="about__text">
                            家族の絆を深める、子供の情操教育、ヒーリング効果など、<br>
                            ペットと暮らすメリットが証明されてきており、<br>
                            それらの効果は人々の暮らしに必要不可欠な&quot;笑顔&quot;を<br>
                            もたらすことができます。<br>
                            CAT BELLは、ペットというかけがえのない生命を<br>
                            お客様へご提供することで、笑顔ある未来を創造し、<br>
                            より豊かな社会環境の構築に貢献いたします。
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.about -->
    </main>
    <?php get_footer(); ?>
</body>

</html>