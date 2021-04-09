<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php　/* Template Name: ダミー報告ページ */ ?>
    <!-- wp-head -->
    <?php get_header(); ?>
</head>

<!-- 固定ページテンプレート -->

<body class="<?php body_class(); ?>">
    <!-- ヘッダー -->
    <?php get_template_part('includes/header'); ?>
    
    <!-- ドロワーメニュー -->
    <?php get_template_part('includes/drawer'); ?>

    <!-- main -->
    <div class="l-main">

        <!-- page-top -->
        <div class="p-page-top p-page-top--full">
            <div class="l-section__inner">
                <div class="p-section__img-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
                </div>
                <h1 class="p-section__title p-section__title--sm">MY PORTFORIO 2021</h1>
                <p class="p-page-top__desc">大変申し訳ございません。<br>デザイン上配置したダミーの為、<br class="dammy">下記項目は機能しておりません。<br>（お問い合わせフォーム、Twitter、Facebook）</p>
                <a class="p-page__a-link" href="<?php echo esc_url(home_url('/')); ?>">トップページへ</a>
            </div>
        </div>

        <div class="l-section u-bgColor-lightBeige">
            <div class="l-section__inner p-section--sm">
                <h2 class="p-section__title">CONTACT
                    <span class="p-section__title--jp">お問い合わせ</span>
                </h2>
                <!-- WP Formのショートコード呼び出し -->
                <?php echo do_shortcode('[mwform_formkey key="162"]'); ?>
                <!-- ダミー報告ページに飛ぶ -->
                <div class="p-btn-area">
                    <a class="p-btn p-btn--submit" href="<?php echo esc_url(home_url('/dummy')); ?>">送信</a>
                </div>
            </div>
        </div>
        
    </div>
    
    <!-- フッター -->
    <?php get_template_part('includes/footer'); ?>

    <!-- wp-footer -->
    <?php get_footer(); ?>
</body>
</html>