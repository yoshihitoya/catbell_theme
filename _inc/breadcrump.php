<nav>
    <ol class="breadcrumbs">
      <li class="breadcrumbs__item"><a href="<?php echo home_url(); ?>" class="breadcrumbs__link">ホーム</a></li>

    <!-- ブログ一覧 -->
    <?php if(is_post_type_archive('blog')) : ?>
      <li class="breadcrumbs__item">ブログ一覧</li>
      
    <!-- ブログ詳細 -->
    <?php elseif(is_singular('blog')) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('blog'); ?>" class="breadcrumbs__link">ブログ一覧</a></li>
      <li class="breadcrumbs__item"><?php echo the_title(); ?></li>

    <!-- 猫一覧 -->
    <?php elseif(is_post_type_archive('cat')) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>"><span class="breadcrumbs__link">猫種一覧</span></a></li>
      <li class="breadcrumbs__item">全猫ちゃん一覧</li>

    <!-- 猫詳細 -->
    <?php elseif(is_singular('cat')) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>" class="breadcrumbs__link">猫種一覧</a></li>
      <li class="breadcrumbs__item">
        <?php
          $terms = get_the_terms($post->ID, 'cat_type');
          foreach ( $terms as $term ) {
          $term_link = get_term_link( $term );
        ?>
        <a href="<?php echo $term_link; ?>" class="breadcrumbs__link"><?php echo $term->name; ?>一覧</a>
        <?php } ?>
      </li>
      <li class="breadcrumbs__item"><?php echo the_title(); ?></li>

    <!-- 店舗一覧 -->
    <?php elseif(is_post_type_archive('shop')) : ?>
      <li class="breadcrumbs__item">お店を探す</li>

    <!-- 店舗詳細 -->
    <?php elseif(is_singular('shop')) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('shop'); ?>" class="breadcrumbs__link">お店を探す</a></li>
      <li class="breadcrumbs__item"><?php echo get_the_title(); ?></li>

    <!-- タグ -->
    <?php elseif(is_tag()) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('blog'); ?>" class="breadcrumbs__link">ブログ一覧</a></li>
      <li class="breadcrumbs__item"><?php single_term_title(); ?></li>

    <!-- 固定ページ -->
    <?php elseif(is_page('cat_type')) : ?>
      <li class="breadcrumbs__item">猫種一覧</li>

    <!-- ペット種類別タクソノミーページ -->
    <?php elseif(is_tax('cat_type')) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>" class="breadcrumbs__link">猫種一覧</a></li>
      <li class="breadcrumbs__item"><?php single_term_title(); ?>一覧</li>

    <!-- ペット種類別タクソノミーページ -->
    <?php elseif(is_tax('input_shop_type')) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_post_type_archive_link('blog'); ?>" class="breadcrumbs__link">ブログ一覧</a></li>
      <li class="breadcrumbs__item"><?php single_term_title(); ?>ブログ</li>
    
    <!-- 猫一覧 -->
    <?php elseif(is_tax('hand_shop_type')) : ?>
      <li class="breadcrumbs__item"><a href="<?php echo get_permalink( get_page_by_path('cat_type')->ID ); ?>" class="breadcrumbs__link">猫種一覧</a></li>
      <li class="breadcrumbs__item"><?php single_term_title(); ?>の猫ちゃん一覧</li>

    <?php endif; ?>
    </ol>
</nav>