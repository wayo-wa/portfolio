<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php　/* Template Name: プライバシーポリシー */ ?>
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
        <div class="p-page-top p-page__visual">
            <div class="l-section__inner">
                <h1 class="p-section__title p-section__title--lg">Privacy Policy
                    <span class="p-section__title--jp">プライバシーポリシー</span>
                </h1>
                <h2 class="p-page-top__desc">MY PORTFOLIO 2021（以下「当サイト」と言います）は、<br class="privacy">当サイトにおけるユーザーの個人情報の取扱いについて以下のとおり定めます。</h2>
            </div>
        </div>

        <div class="l-section__inner p-section--sm">
            <div class="p-privacy">
                <?php if(have_posts()): ?>
                    <?php while(have_posts()): ?>
                        <?php the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>        
            </div>
        </div>

    </div><!-- /main -->
        

    
    <!-- フッター -->
    <?php get_template_part('includes/footer'); ?>

    <!-- wp-footer -->
    <?php get_footer(); ?>
</body>
</html>