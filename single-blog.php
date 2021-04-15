<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
    <?php get_template_part('_inc/breadcrumb'); ?>
    <!-- top -->
        <section>
            <div class="top__img">
			<img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
            </div>
        </section>
	<!-- /top -->
	
    <!-- content -->
        <section class="content">
            <div class="blogs">
				<span class="date"><?php the_time('Y.m.d'); ?></span>
				<h2 class="blog__ttl"><?php echo get_the_title(); ?></h2>
				<div class="blog__wrapper">
					<?php echo get_field('blog_text'); ?>
				</div>
				<div class="blog__tagItems">
					<?php the_tags('<div class="tag top__tag">','</div><div class="tag top__tag">','</div>'); ?>
				</div>

				<!-- 画像IDの出力 -->
				<?php
					$post_object = get_field('blog_shop');
					$image = get_post_meta($post_object,'shop_img', true);
					$size = 'full';
				?>
				<div class="storeInfo">
					<div class="storeInfo__img">
						<?php echo wp_get_attachment_image( $image, $size ); ?>
					</div>
					<div class="storeInfo__content">
						<h3 class="storeInfo__ttl"><?php echo get_the_title($post_object); ?></h3>
						<table class="storeInfo__tbl">
							<tr class="storeInfo__items">
								<td class="storeInfo__label">住所</td>
								<td class="storeInfo__cnt"><?php echo get_post_meta($post_object,'shop_address', true); ?></td>
							</tr>
							<tr class="storeInfo__items">
								<td class="storeInfo__label">TEL</td>
								<td class="storeInfo__cnt"><?php echo get_post_meta($post_object,'shop_tel', true); ?></td>
							</tr>
							<tr class="storeInfo__items">
								<td class="storeInfo__label">営業時間</td>
								<td class="storeInfo__cnt">
									<?php echo get_post_meta($post_object,'shop_hours', true); ?>
								</td>
							</tr>
						</table>
					</div>
					<a href="<?php echo get_permalink($post_object); ?>" class="storeInfo__link link__btn"><span class="link__content">お取扱い店舗を見る</span></a>
				</div>

				<div class="newBlog">
					<h3 class="newBlog__ttl"><?php echo get_the_title($post_object); ?>の最新ブログ</h3>
					<div class="newBlog__wrapper">
					
					<?php
						$taxonomy = 'input_shop_type';
						$terms = get_the_terms($post->ID,$taxonomy);
						$term_slug = "";
						foreach($terms as $term){
							$term_slug = $term->slug;
						}
						
						$custom_posts = get_posts(array(
							'post_type' => 'blog',
							'order' => 'DESC',
							'posts_per_page' => 4,
							'tax_query' => array(
							array(
								'taxonomy' => $taxonomy, //タクソノミーを指定
								'field' => 'slug', //ターム名をスラッグで指定する
								'terms' => $term_slug, //表示したいタームをスラッグで指定
							),
							)
						));
						global $post;
						if($custom_posts): foreach($custom_posts as $post): 
							setup_postdata($post);
					?>
						<a href="<?php the_permalink(); ?>" class="newBlog__card">
							<div class="newBlog__img">
							<img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
							</div>
							<div class="newBlog__ttl"><?php echo get_the_title(); ?></div>
							<span class="date newBlog__date"><?php the_time('Y.m.d') ?></span>
						</a>
					<?php endforeach; endif; wp_reset_postdata(); ?>

					</div>
					<a href="<?php echo get_term_link( $term_slug, $taxonomy ); ?>" class="newBlog__link link__btn"><span class="link__content newBlog__link--cnt">この店舗のブログを見る</span></a>
				</div>
            </div>
			<?php get_template_part('_inc/sidebar'); ?>
        </section>
    <!-- /content -->
    </main>
<!-- /main -->

<?php get_footer(); ?>

<!-- WordPress用テンプレートタグ -->
<!-- <?php wp_footer(); ?> -->
</body>
</html>