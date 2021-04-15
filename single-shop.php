<?php get_header(); ?>
<section class="page-shopDetail">

  <div class="mainvisual">
    <div class="mainvisual__img inner">
      <?php get_template_part('_inc/breadcrumb'); ?>
      <img src="<?php echo get_field('shop_img'); ?>" alt="<?php get_the_title(); ?>">
    </div>
  </div>

  <section class="access">
    <div class="inner">
      <h2 class="section__title"><?php echo get_the_title(); ?>の基本情報</h2>
      <div class="access__inner">
        <div class="access__text">
          <dl>
            <dt>住所</dt>
            <dd><?php echo get_field('shop_address'); ?></dd>
            <dt>TEL</dt>
            <dd><?php echo get_field('shop_tel'); ?></dd>
            <dt>営業時間</dt>
            <dd><?php echo get_field('shop_hours'); ?></dd>
            <dt>アクセス</dt>
            <dd><?php echo get_field('shop_access'); ?></dd>
          </dl>
        </div>

        <div class="access__map">
          <?php echo get_field('shop_map'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="catlist">
    <div class="inner">
      <h2 class="section__title"><?php echo get_the_title(); ?>の新入りの猫ちゃん</h2>
      <ul class="catlist__items">

      <?php
        $taxonomy = 'hand_shop_type';
        $term_slug = $post->post_name;
        $args = array(
          'post_type' => 'cat',
          'order' => 'ASC',
          'posts_per_page' => 3,
          'tax_query' => array(
            array(
              'taxonomy' => $taxonomy, //タクソノミーを指定
              'field' => 'slug', //ターム名をスラッグで指定する
              'terms' => $term_slug, //表示したいタームをスラッグで指定
            )
          )
        );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) : 
        while ($my_query->have_posts()) : $my_query->the_post();
      ?>
        <li class="catlist__item">
          <a href="<?php echo the_permalink(); ?>">
          <?php foreach (SCF::get('猫ちゃんサムネイル画像') as $field_name => $field_value) : ?>
          <?php
            $carousel_thumbnail = wp_get_attachment_image_src($field_value['cat_img'], 'large');
            $carousel_thumbnail = esc_url($carousel_thumbnail[0]);
          ?>
            <img src="<?php echo $carousel_thumbnail ?>" alt="<?php echo get_the_title(); ?>">
          <?php break; endforeach; ?>
            <h3 class="catlist__item__title"><?php echo get_the_title(); ?></h3>
            <dl>
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
            </dl>
          </a>
        </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </ul>

      <div class="btn">
        <a href="<?php echo get_term_link( $term_slug, $taxonomy ); ?>" class="btn__item">この店舗の猫ちゃんを見る</a>
      </div>

    </div>
  </section>

  <section class="concept">
    <div class="inner">
      <h2 class="section__title">店長よりごあいさつ</h2>
      <div class="concept__inner">
        <div class="concept__left">
          <img src="<?php echo get_field('shop_manager_img'); ?>" alt="<?php get_the_title(); ?>店長">
        </div>

        <div class="concept__right">
          <h3 class="concept__subtitle"><?php echo get_field('shop_manager_title'); ?></h3>
          <p class="concept__text">
            <?php echo get_field('shop_manager_text'); ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="blog">
    <div class="inner">
      <h2 class="section__title"><?php echo get_the_title(); ?>の最新ブログ</h2>
      <ul class="blog__items">
      <?php
        $taxonomy = 'input_shop_type';
        $args = array(
          'post_type' => 'blog',
            'order' => 'ASC',
            'posts_per_page' => 3,
            'tax_query' => array(
            array(
            'taxonomy' => $taxonomy, //タクソノミーを指定
            'field' => 'slug', //ターム名をスラッグで指定する
            'terms' => $term_slug, //表示したいタームをスラッグで指定
            )
          )
        );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) : 
        while ($my_query->have_posts()) : $my_query->the_post();
      ?>
        <li class="blog__item">
            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_field('blog_img'); ?>" alt="<?php echo get_the_title(); ?>">
            </a>
            <div class="blog__item__text">
              <a href="<?php the_permalink(); ?>">
                <p class="date"><?php the_modified_date('Y.m.d') ?></p>
                <h3 class="blog__subtitle"><?php echo get_the_title(); ?></h3>
                <div class="blog__text"><?php echo get_field('blog_text'); ?></div>
              </a>
              <div class="blog__item__link">
                <?php the_tags('<div class="tag top__tag">','</div><div class="tag top__tag">','</div>'); ?>
              </div>
            </div>
        </li>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </ul>

      <div class="btn">
        <a href="<?php echo get_term_link( $term_slug, $taxonomy ); ?>" class="btn__item">この店舗のブログを見る</a>
      </div>

    </div>
  </section>
</section>

<?php get_footer(); ?>
  
</body>
</html>