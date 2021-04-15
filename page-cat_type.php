<?php
/*
Template Name: 猫種類一覧
*/
?>

	<?php get_template_part('header'); ?>

	<section class="findPet">
		<div class="findPet__inner inner">
		<?php get_template_part('_inc/breadcrumb'); ?>
			<div class="findPet__head">
				<h2 class="util__title">ペットを探す</h2>
				<p class="util__subTitle">Find a pet</p>
			</div>

			<div class="findPet__wrap">
				<ul class="findPet__list">
			<?php
				$taxonomy_name = 'cat_type'; //表示したいtaxonomynameを設定
				$taxonomys = get_terms($taxonomy_name);
				if(!is_wp_error($taxonomys) && count($taxonomys)):
					foreach($taxonomys as $taxonomy):
						$term_id = esc_html($taxonomy->term_id);
						$term_idsp = "cat_type_".$term_id; //カスタムフィールドを取得するのに必要なtermのIDは「taxonomyname_ + termID」
						$photo = get_field('cat_type_img',$term_idsp);
						$photosp = wp_get_attachment_image_src($photo, 'full');
					?>
					<li class="findPet__item">
						<a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?><?php echo esc_html($taxonomy->slug); ?>" class="findPet__itemLink">
							<div class="findPet__catImg">
							<img src="<?php echo $photosp[0]; ?>" alt="<?php echo esc_html($taxonomy->name); ?>">
							</div>
							<p class="findPet__catName"><?php echo esc_html($taxonomy->name); ?></p>
						</a>
					</li>
					
					<?php endforeach; endif; ?>
				</ul>
			</div>
			
			<div class="findPet__more">
				<a href="<?php echo get_post_type_archive_link('cat'); ?>" class="util__link">すべての猫一覧を見る</a>
			</div>
		</div>
	</section>
	<!-- /.findPet -->

	<?php get_footer(); ?>
	
</body>

</html>