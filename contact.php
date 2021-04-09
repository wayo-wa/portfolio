<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php　/* Template Name: お問い合わせページ */ ?>
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

        <!-- page-top ページのビジュアル-->
        <div class="p-page-top p-page__visual p-page__visual--contact">
            <div class="l-section__inner">
                <h1 class="p-section__title p-section__title--lg">CONTACT
                    <span class="p-section__title--jp">お問い合わせ</span>
                </h1>
                <h2 class="p-page-top__desc">お気軽にお問い合わせください。<br>原則2～3日以内にご返信いたします。</h2>
            </div>
        </div>

        <div class="l-section">
            <div class="l-section__inner p-section--sm">
                <!-- WP Formのショートコード呼び出し -->
                <?php echo do_shortcode('[mwform_formkey key="162"]'); ?>
                <!-- ダミー報告ページに飛ぶ -->
                <div class="p-btn-area">
                    <a class="p-btn p-btn--submit" href="<?php echo esc_url(home_url('/dummy')); ?>">送信</a>
                </div>
            </div>
        </div>

        <!-- breadArea パンくずリスト-->
        <div class="p-bread">
            <?php get_template_part('includes/bread'); ?>
        </div>
        
    </div><!-- /main -->
    
    <!-- フッター -->
    <?php get_template_part('includes/footer'); ?>

    <!-- wp-footer -->
    <?php get_footer(); ?>
</body>
</html>