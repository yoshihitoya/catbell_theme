<?php

// ページの記事数制御
function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( $query->is_archive('blog') &&  get_query_var('post_type') === 'blog' ) {
        $query->set( 'posts_per_page', '6' );
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

// 最初の記事のみ表示
function is_first(){
	global $wp_query;
	return ($wp_query->current_post === 0);
}

add_action('pre_get_posts', 'custom_pre_get_posts' );
function custom_pre_get_posts($query){
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
    if($query->is_single && !$query->is_preview){
        $query->set( 'post_status' , 'publish');
    }
}

// スラッグ名が日本語だったら自動的にid付与へ変更（スラッグを設定した場合は適用しない）
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );