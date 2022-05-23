<?php
global $wp_rewrite;
$wp_rewrite->flush_rules();

if ( ! function_exists( 'lab_setup' ) ) :

function lab_setup() {
  /* 自動フィードリンク */
  add_theme_support( 'automatic-feed-links' );

  /* titleを自動で書き出し */
  add_theme_support( 'title-tag' );

  /* アイキャッチ画像を設定できるようにする */
  add_theme_support( 'post-thumbnails' );

  /* 検索フォーム、コメントフォーム、コメントリスト、ギャラリー、キャプションでHTML5マークアップの使用を許可します */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /* テーマカスタマイザーにおける編集ショートカット機能の使用 */
  add_theme_support( 'customize-selective-refresh-widgets' );


}
endif;
add_action( 'after_setup_theme', 'lab_setup' );

/*DNS プリフェッチ削除*/
function remove_dns_prefetch( $hints, $relation_type ) {
  if ( 'dns-prefetch' === $relation_type ) {
    return array_diff( wp_dependencies_unique_hosts(), $hints );
  }
  return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

/*絵文字削除*/
function remove_emoji() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'remove_emoji' );

/*EditURIとwlwmanifest削除*/
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/*WPのバージョン表示削除*/
remove_action( 'wp_head', 'wp_generator' );

/*imgの不要な属性削除*/
add_filter( 'image_send_to_editor', 'remove_image_attribute', 10 );
add_filter( 'post_thumbnail_html', 'remove_image_attribute', 10 );

function remove_image_attribute( $html ){
  $html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
  $html = preg_replace( '/class=[\'"]([^\'"]+)[\'"]/i', '', $html );
  $html = preg_replace( '/title=[\'"]([^\'"]+)[\'"]/i', '', $html );
  $html = preg_replace( '/<a href=".+">/', '', $html );
  $html = preg_replace( '/<\/a>/', '', $html );
  return $html;
}

/*使用しないサイズの画像は自動生成を停止*/
function my_intermediate_image_sizes($sizes) {
  $delete = array('thumbnail','medium','large');
  return array_diff($sizes, $delete);
}
add_filter('intermediate_image_sizes', 'my_intermediate_image_sizes');

/* 動画や写真を投稿する際のコンテンツの最大幅を設定 
function lab_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'lab_content_width', 1000 );
}
add_action( 'after_setup_theme', 'lab_content_width', 0 );
*/

//概要（抜粋）の文字数調整
function my_excerpt_length($length) {
  return 60;
}
add_filter('excerpt_length', 'my_excerpt_length');

//概要（抜粋）の省略文字
function my_excerpt_more($more) {
  return '…';
}
add_filter('excerpt_more', 'my_excerpt_more');

/* pタグを削除
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_content', 'wpautop');
*/

function allow_iframe_tag($content){
  global $allowedposttags;
  $allowedposttags['iframe'] = array('class'=>array() , 'src'=>array() , 'width'=>array(), 'height'=>array() , 'frameborder'=>array() , 'scrolling'=>array() , 'marginheight'=>array(), 'marginwidth'=>array() , 'allowfullscreen'=>array());
  return $content;
}
add_filter('content_save_pre','allow_iframe_tag');

//ショートコード
add_shortcode('url', 'shortcode_url');
function shortcode_url() {
  return get_bloginfo('url');
}
add_shortcode('template', 'shortcode_tp');
function shortcode_tp() {
  return get_template_directory_uri();
}

//固定ページではビジュアルエディタを利用できないようにする
function disable_visual_editor_in_page(){
    global $typenow;
    if( $typenow == 'page' ){
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
    }
}
function disable_visual_editor_filter(){
    return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );

//ビジュアルエディタがタグを勝手に削除するのを阻止
function custom_tiny_mce_before_init( $init_array ) {
    global $allowedposttags;

    $init_array['valid_elements'] = '*[*]'; //すべてのタグを許可(削除されないように)
    $init_array['extended_valid_elements'] = '*[*]'; //すべてのタグを許可(削除されないように)
    $init_array['valid_children'] = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']'; //aタグ内にすべてのタグを入れられるように
    $init_array['indent'] = true; //インデントを有効に
    $init_array['wpautop'] = false; //テキストやインライン要素を自動的にpタグで囲む機能を無効に
    $init_array['force_p_newlines'] = false; //改行したらpタグを挿入する機能を無効に

    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'custom_tiny_mce_before_init' );

/*【管理画面】ACF Options Page の設定 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'トップメイン', // ページタイトル
        'menu_title' => 'トップメイン', // メニュータイトル
        'menu_slug' => 'top-main', // メニュースラッグ
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'トップギャラリー', // ページタイトル
        'menu_title' => 'トップギャラリー', // メニュータイトル
        'menu_slug' => 'top-gallery', // メニュースラッグ
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

//特定ページへのベーシック認証
function basic_auth($auth_list,$realm="Restricted Area",$failed_text="認証に失敗しました"){
    if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])){
        if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
            return $_SERVER['PHP_AUTH_USER'];
        }
    }
    header('WWW-Authenticate: Basic realm="'.$realm.'"');
    header('HTTP/1.0 401 Unauthorized');
    header('Content-type: text/html; charset='.mb_internal_encoding());
    die($failed_text);
}