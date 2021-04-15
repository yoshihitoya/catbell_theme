<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
    <?php get_template_part('_inc/breadcrumb'); ?>

    <!-- content -->
        <section class="content">
            <div class="archive">
                <div class="archive__wrap">
                <?php
                    $tag = get_queried_object();
                    $the_query = new WP_Query(array(
                        'tag' => $tag->slug,
                        'post_type' => 'blog',
                        'posts_per_page' => -1,
                    ));
                ?>
                
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="archive__card">
                        <a href="<?php the_permalink(); ?>" class="archive__cardLink">
                            <div class="archive__cardWrap">
                                <div class="archive__img">
                                    <img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                                <div class="archive__content">
                                    <span class="date"><?php the_modified_date('Y.m.d') ?></span>
                                    <div class="archive__ttl"><?php echo get_the_title(); ?></div>
                                    <div class="archive__txt"><?php echo get_field('blog_text'); ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="archive__tagItems">
                            <div class="top__tagItems">
                                <?php the_tags('<div class="tag top__tag">','</div><div class="tag top__tag">','</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div> 
            </div>

            <div class="side">
                <div class="pickup">
                    <h3 class="pickup__topTtl">ピックアップ</h3>

                    <!-- 力わざ -->
                    <?php
                        $countup = 0;
                        $args = array(
                            'post_type' => 'blog',
                            'order' => 'ASC',
                            'posts_per_page' => -1,
                        );
                        $my_query = new WP_Query($args);
                        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                    ?>
                    <?php if (get_field('blog_pickup') && $countup < 3): ?>
                    
                        <a href="<?php the_permalink(); ?>" class="pickup__card">
                            <div class="pickup__img">
                            <img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
                            </div>
                            <div class="pickup__ttl"><?php echo get_the_title(); ?></div>
                            <span class="date pickup__date"><?php the_modified_date('Y.m.d') ?></span>
                        </a>
                    <?php $countup++; ?>
                    <?php endif; endwhile; endif; ?>
                </div>
                <div class="keyword">
                    <h3 class="keyword__topTtl">キーワード</h3>
                    <ul class="keyword__tagItems">
                        <?php
                        $posttags = get_tags();
                        if ($posttags) {
                            foreach($posttags as $tag) {
                                echo '<li class="keyword__tagItem"><a href="'. get_tag_link($tag->term_id) .'" class="tag keyword__tag">' . $tag->name . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>

</body>
</html>