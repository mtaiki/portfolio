<?php
/**
 * テーマのセットアップ
 **/
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( //HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}

add_action('after_setup_theme', 'my_setup');

/**
* CSSとJavaScriptの読み込み
**/
function my_script_init()
{
/** googlefontの読み込み **/
wp_enqueue_style( 'googlefont-style', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Noto+Sans+JP:wght@400;700&display=swap' );
/** fontawesomeの読み込み **/
wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v6.0.0/css/all.css', array(), '6.0.0', 'all');
/** slick cssの読み込み **/
wp_enqueue_style( 'my-slick1.css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array('my-style.css'), '1.8.1' );
wp_enqueue_style( 'my-slick2.css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array('my-style.css'), '1.8.1' );
/** animate cssの読み込み **/
wp_enqueue_style( 'my-animate.css', get_template_directory_uri() . '/css/animate.css',);
/** original cssの読み込み **/
wp_enqueue_style('my-style.css', get_template_directory_uri() . '/css/style.css',);

/** slick jqueryの読み込み **/
wp_enqueue_script( 'my-slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '5.1.3', true );
/** particles jsの読み込み **/
wp_enqueue_script('my-particles-min.js', get_template_directory_uri() . '/js/particles.min.js', array( 'my-script.js' ), '1.0.0', true);
wp_enqueue_script('my-particles.js', get_template_directory_uri() . '/js/particles.js', array( 'my-script.js' ), '1.0.0', true);
/** wow.min jsの読み込み **/
wp_enqueue_script('my-wow.js', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1.0.0', true);
/** original jqueryの読み込み **/
wp_enqueue_script('my-script.js', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

/**
* ヘッダーフッターのメニュー化
**/
register_nav_menus(
  array(
      'global' => 'グローバル化',
      'footer' => 'フッターナビ',
  )
);

// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'news'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// 制作実績のカスタム投稿
function cpt_register_works() {
  $labels = [
    "singular_name" => "works",
    "edit_item" => "works",
  ];
  $args = [
    "label" => "制作実績",
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => [ "slug" => "works", "with_front" => true ],
    "query_ver" => true,
    "menu_position" => 5,
    "supports" => [ "title", "editor", "thumbnail" ],
  ];
  register_post_type( "works", $args );
}
add_action( 'init', 'cpt_register_works' );

// 制作実績のカスタム投稿にカテゴリーを追加
function cpt_register_category() {
  $labels = [
    "singular_name" => "category",
  ];
  $args = [
    "label" => "カテゴリー",
    "labels" => $labels,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_in_menu" => true,
    "query_ver" => true,
    "rewrite" => [ "slug" => "category", "with_front" => true, ],
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_base" => "category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy( "category", ["works"], $args );
}
add_action( 'init', 'cpt_register_category' );

// カスタム投稿一覧の表示絵件数の指定
function change_posts_per_page($query) {
  if ( is_admin() || ! $query->is_main_query() )
      return;
  if ( $query->is_archive('works') ) { //カスタム投稿タイプを指定
      $query->set( 'posts_per_page', '9' ); //表示件数を指定
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );
