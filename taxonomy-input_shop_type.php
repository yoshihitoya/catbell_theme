<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
    <?php get_template_part('_inc/breadcrumb'); ?>
   
    <!-- content -->
        <section class="content">
            <div class="archive">
                <div class="archive__wrap">

                <?php
                    $type = get_query_var( 'input_shop_type' );
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $args = array(
                        'tax_query' => array( 
                            array(
                                'taxonomy' => 'input_shop_type',
                                'field' => 'slug',
                                'terms' => $type//(shinjuku)
                            ),
                        ),
                        'posts_per_page'=> 8,
                        'paged' => $paged
                    );
                ?>
                <?php 
                    $the_query = new WP_Query( $args );
                    $pages = $the_query->max_num_pages;
                    $wp_query->max_num_pages = $pages;
                    if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                ?>
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
                <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>

                <?php get_template_part('_inc/pager'); ?>
                
            </div>

            <?php get_template_part('_inc/sidebar'); ?>
        </section>
    <!-- /content -->
    </main>
<!-- /main -->

<section class="storeInfo">
    <?php
        $term_id = get_queried_object_id(); // タームIDの取得
        $term_idsp = "input_shop_type_".$term_id;
        $post_object = get_field('link_shop',$term_idsp);
        $post_object_num = $post_object->ID;
        $image = get_post_meta($post_object_num,'shop_img', true);
        $size = 'full';        
    ?>
    <div class="storeInfo__img">
        <?php echo wp_get_attachment_image( $image, $size ); ?>
    </div>
	<div class="storeInfo__content">
		<h3 class="storeInfo__ttl"><?php echo get_the_title($post_object); ?></h3>
		<table class="storeInfo__tbl">
			<tr class="storeInfo__items">
				<td class="storeInfo__label">住所</td>
				<td class="storeInfo__cnt"><?php echo get_post_meta($post_object_num,'shop_address', true); ?></td>
			</tr>
			<tr class="storeInfo__items">
				<td class="storeInfo__label">TEL</td>
				<td class="storeInfo__cnt"><?php echo get_post_meta($post_object_num,'shop_tel', true); ?></td>
			</tr>
			<tr class="storeInfo__items">
				<td class="storeInfo__label">営業時間</td>
				<td class="storeInfo__cnt"><?php echo get_post_meta($post_object_num,'shop_hours', true); ?></td>
			</tr>
		</table>
		<a href="<?php echo get_permalink($post_object); ?>" class="storeInfo__link link__btn"><span class="link__content">店舗の基本情報を見る</span></a>
    </div>
</section>

<?php get_footer(); ?>

</body>
</html>