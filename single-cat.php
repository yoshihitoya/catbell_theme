<?php get_header(); ?>

  <section class="single__cat">
    <div class="single__cat__inner inner">
      <?php get_template_part('_inc/breadcrumb'); ?>

      <div class="single__cat__wrap">
        <div class="single__cat__img">
          <div class="single__cat--mainImg your-class">
          <?php 
            $CATcountUp = 0;
            foreach (SCF::get('猫ちゃんサムネイル画像') as $field_name => $field_value) :
            $carousel_thumbnail = wp_get_attachment_image_src($field_value['cat_img'], 'large');
            $carousel_thumbnail = esc_url($carousel_thumbnail[0]);
            if ($countUp < 4) {
          ?>
            <img src="<?php echo $carousel_thumbnail; ?>" alt="<?php echo get_the_title(); ?>">
          <?php } $CATcountUp++ ?>
          <?php endforeach; ?>
          </div>
          <div class="slider-nav">
          <?php
            $ARRAYcountUp = 0;
            foreach (SCF::get('猫ちゃんサムネイル画像') as $field_name => $field_value) :
            $carousel_drop = wp_get_attachment_image_src($field_value['cat_img'], 'large');
            $carousel_drop = esc_url($carousel_drop[0]);
            if ($ARRAYcountUp < 4) {
          ?>
          <img class="single__cat--subImgb" src="<?php echo $carousel_drop; ?>" alt="<?php echo get_the_title(); ?>">
          <?php } $ARRAYcountUp++ ?>
          <?php endforeach; ?>
          </div>
        </div>
        <div class="single__cat__body">
          <h2><a href="#" class="single__cat__title"><?php echo get_the_title(); ?></a></h2>
          <dl class="single__cat__content">
            <dt>生年月日</dt>
            <dd><?php echo get_field('cat_birthday'); ?></dd>
            <dt>性別</dt>
            <dd>
              <?php if(get_field('cat_sex') === "men") : ?>
                オス
              <?php else : ?>
                メス
              <?php endif; ?>
            </dd>
            <dt>生体価格</dt>
            <dd><span class="cat__price"><?php echo get_field('cat_price') ?></span>円（税抜）</dd>
            <dt>血統書</dt>
            <dd>
            <?php if(get_field('cat_pedigree') === "on") : ?>
              あり
            <?php else : ?>
              なし
            <?php endif; ?>
            </dd>
          </dl>
          <div class="single__cat__footer hover">
            <?php
              $terms = get_the_terms($post->ID, 'cat_type');
              foreach ( $terms as $term ) {
              $term_link = get_term_link( $term );
            ?>
            <a href="<?php echo $term_link; ?>"><?php echo $term->name; ?>一覧を見る<i class="fas fa-angle-right"></i></a>
            <?php } ?>
          </div>
        </div>
      </div><!-- /single__cat -->

      <div class="about__cat">
        <h3 class="about__cat__title">コメント</h3>
        <div class="about__cat__text">
          <?php echo get_field('cat_text') ?>
        </div>
      </div>

      <!-- 画像IDの出力 -->
      <?php
        $post_object = get_field('cat_shop');
        $image = get_post_meta($post_object,'shop_img', true);
        $size = 'full';
      ?>
      <div class="about__store">
        <div class="about__store__img hover">
          <?php echo wp_get_attachment_image( $image, $size ); ?>
        </div>
        <div class="about__store__body">
          <div class="about__store__head">          
            <div class="store__list__title hover"><?php echo get_the_title($post_object); ?></div>
          </div>
          <dl class="about__store__content">
            <dt>住所</dt>
            <dd><?php echo get_post_meta($post_object,'shop_address', true); ?></dd>
            <dt>TEL</dt>
            <dd><?php echo get_post_meta($post_object,'shop_tel', true); ?></dd>
            <dt>営業時間</dt>
            <dd><?php echo get_post_meta($post_object,'shop_hours', true); ?></dd>
          </dl>
          <div class="about__store__footer">
            <a href="<?php echo get_permalink($post_object); ?>" class="util__link about__store_btn hover">お取扱い店舗を見る</a>
          </div>
        </div>
      </div><!-- /.about__store -->

      <?php get_template_part('_inc/othercat'); ?>
      <!-- /.anotherPet__wrap -->


    </div>
  </section>
  <?php get_footer(); ?>
   
  <!-- slick -->
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
  <script>
    $(".your-class").slick({
        slidesToShow: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-nav",
      });
      $(".slider-nav").slick({
        slidesToShow: 4,
        asNavFor: ".your-class",
        centerMode: true,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 384,
            settings: {
              swipe: true,
              arrows: false,
              slidesToShow: 3,
              slidesToScroll: 1,
            },
          },
        ],
      });
  </script>
</body>

</html>