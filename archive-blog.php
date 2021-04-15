<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
    <?php get_template_part('_inc/breadcrumb'); ?>
    <!-- top -->
        <section>
            <a href="<?php the_permalink(); ?>" class="top__img">
                <img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
            </a>
            <div class="top__content">
                
            <?php if ( have_posts() ) : ?>
                <a href="<?php the_permalink(); ?>">
                    <h2 class="top__ttl"><?php echo get_the_title(); ?></h2>
                    <div class="top__txt"><?php echo get_field('blog_text'); ?></div>
                </a>
                <div class="top__tagItems">
                    <?php the_tags('<div class="tag top__tag">','</div><div class="tag top__tag">','</div>'); ?>
                </div>
                <span class="date top__date"><?php the_time('Y.m.d') ?></span>
            <?php endif; wp_reset_postdata(); ?>

            </div>
        </section>
    <!-- /top -->
    <!-- content -->
        <section class="content">
            <div class="archive">
                <div class="archive__wrap">
                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <?php if (!is_first()) : ?>
                    <div class="archive__card">
                        <a href="<?php the_permalink(); ?>" class="archive__cardLink">
                            <div class="archive__cardWrap">
                                <div class="archive__img">
                                    <img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                                <div class="archive__content">
                                    <span class="date"><?php the_time('Y.m.d') ?></span>
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
                <?php endif; endwhile; endif; wp_reset_postdata(); ?>
                </div>

                <?php get_template_part('_inc/pager'); ?>
                
            </div>

            <?php get_template_part('_inc/sidebar'); ?>
        </section>
    <!-- /content -->
    </main>
<!-- /main -->

<?php get_footer(); ?>

</body>
</html>