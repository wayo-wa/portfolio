<?php

//コンテンツ幅をセット
if(!isset($content_width)) {
    $content_width = 1100;
}

function custom_theme_setup() {
    //RSSフィールドリンクをhead内に追加
    add_theme_support('automatic-feed-links');
    //タイトルタグを動的に出力
    add_theme_support('title-tag');
    //ブロックエディタ用のCSSを読み込む
    // add_theme_support('wp-block-styles');
    //アイキャッチ画像を有効化
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(240,183, false);
}
add_action('after_setup_theme', 'custom_theme_setup');

/*=====================================================
 jqueryをフロントはGoogle CDN、管理画面はWPデフォルトのjQueryを使う
=======================================================*/
function load_google_cdn() {
    if(!is_admin()) {//管理画面以外
        //WPデフォルトのjQueryの解除
        wp_deregister_script('jquery');
        //GoogleのCDNのjQueryを出力
        wp_enqueue_script(
            'jquery',//scriptのハンドル名
            ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',//src
            array(),//このscriptより前に読み込む必要があるscript
            '3.6.0',//バージョンがある
            true//footer
        );
    }
}
add_action('wp_enqueue_scripts', 'load_google_cdn');

/*=====================================================
 圧縮したCSSファイル、Jsファイルの読み込み
=======================================================*/
function custom_enqueue_styles() {
    wp_enqueue_style(//CSSファイル p148参照
        'base-style',
        get_template_directory_uri().'/css/app.min.css',//sassコンパイル＆css圧縮後のファイル
        array(),
        null,
        'all'//p149参照
    );
    wp_enqueue_script(//JaveScriptファイル
        'base-script',
        get_template_directory_uri().'/js/app.min.js',
        array('jquery'),//このscriptより前に読み込む必要があるscript
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles');

/*=====================================================
 記事の自動成型を無効にする
=======================================================*/
remove_filter('the_content', 'wpautop'); 

/*=====================================================
 ウィジェットエリアの登録
=======================================================*/
function custom_widget_register() {
    register_sidebar(array(
        'name'          => 'サイドバーウィジェットエリア',
        'id'            => 'sidebar-widget',
        'description'   => '学習制作ページのサイドバーに表示されます',
        'before_widget' => '<div id="%1$s" class="p-category__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="p-sideBlock__title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'custom_widget_register');

/*=====================================================
 ページネーション関数（$show_only=false...総ページが1の時はページャー出さない）
=======================================================*/
function pagination($pages, $paged, $show_only = false) {
    $max_page = (int)$pages;
    $current_page = max(1, $paged);//$pagedは1ページの場合0が渡ってくるので1以上に設定。
    if($current_page === 1 || $current_page === $max_page) {
        $range = 2;//1ページ目と最終ページの時はページカラムを+2カラム
    } else {
        $range = 1;//それ以外は左右に+1カラムずつ
    }
    
    //現在ページが2ページ目以降（戻るボタン）
    if($current_page > 1) {
        echo '<li class="p-pagination__list"><a class="p-pagination__link" href="'.get_pagenum_link($current_page-1).'">&lt;</a></li>';
    }
    
    // ページリンクボタン生成
    for($i = 1; $i <= $max_page; $i++) {
        if($i <= $current_page + $range && $i >= $current_page - $range) {
            if($current_page === $i) {
                echo '<li class="p-pagination__list active">'.$i.'</li>';
            } else {
                echo '<li class="p-pagination__list"><a class="p-pagination__link" href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a></li>';
            }
        }    
    }  
    
    //現在ページが最終ページ以外（次へボタン）
    if($current_page < $max_page) {
        echo '<li class="p-pagination__list"><a class="p-pagination__link" href="'.get_pagenum_link($current_page+1).'">&gt;</a></li>';
    }
}


