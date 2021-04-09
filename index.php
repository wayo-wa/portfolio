<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php　/* Template Name: 学習制作ページ */ ?>
    <!-- wp-head -->
    <?php get_header(); ?>
</head>

<!-- 学習制作ページ -->

<body class="<?php body_class(); ?>">
    <!-- ヘッダー -->
    <?php get_template_part('includes/header'); ?>
    
    <!-- ドロワーメニュー -->
    <?php get_template_part('includes/drawer'); ?>

    <!-- main -->
    <div class="l-main">

        <!-- page-top ページのビジュアル-->
        <div class="p-page-top p-page__visual p-page__visual--study">
            <div class="l-section__inner">
                <h1 class="p-section__title p-section__title--lg">STUDY
                    <span class="p-section__title--jp">学習制作</span>
                </h1>
                <h2 class="p-page-top__desc">プログラミング学習の理解を深める為に制作した<br>オリジナルサイトの記録です。</h2>
            </div>
        </div>

        

        <!-- コンテンツエリア（2カラム） -->
        <div class="l-section">
            <div class="l-section__inner p-section--md">
                <div class="l-container">
                    <div class="l-container__main">
                        <?php if(!(is_home())): ?>
                            <?php the_archive_title('<p class="p-study__archive-title">', '</p>'); ?>
                        <?php endif; ?>
                        <!-- ループ処理 -->
                        <?php if(have_posts()): ?>
                            <?php while(have_posts()): ?>
                                <?php the_post(); ?>
                                    <article class="p-study__article <?php post_class(); ?>">
                                        <div class="p-study__thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if(has_post_thumbnail()): ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php else: ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/img-default.png">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="p-study__content">
                                            <time><?php the_time('Y年n月j日'); ?></time>
                                            <h2 class="p-study__title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a>
                                            </h2>
                                            <?php the_excerpt(); ?>
                                            <!-- カテゴリー、タグ -->
                                            <div class="p-taxonomy">
                                                <span class="p-taxonomy--cat">
                                                    <?php the_category('&nbsp;'); ?>
                                                </span>
                                                <span class="p-taxonomy--tag">                                            
                                                    <i class="fas fa-tag"></i>
                                                    <?php the_tags('<span class="p-taxsonomy--spanTag">', '&nbsp;,&nbsp;','</span>'); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </article>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>まだ投稿がありません。</p>
                        <?php endif; ?>

                        <!-- ページネーション -->
                        <div class="p-pagination">
                            <ul class="p-pagination__block">
                                <?php 
                                if(function_exists('pagination')):
                                    pagination($wp_query->max_num_pages, get_query_var('paged'));
                                endif;
                                ?>
                            </ul>
                        </div>

                    </div><!--/l-container-main-->

                    <!-- サイドバー -->
                    <aside class="l-container__sidebar">
                        <!-- カテゴリー -->
                        <div class="p-category p-sideBlock">
                            <?php dynamic_sidebar('sidebar-widget'); ?>
                        </div>

                        <!-- プロフィール -->
                        <div class="p-profile p-sideBlock">
                            <h2 class="p-sideBlock__title">ABOUT</h2>
                            <div class="p-profile__illustration">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/about-illustration.jpg" alt="自己紹介の画像">
                            </div>
                            <p class="p-profile__text">はじめまして。WEBエンジニアを目指して日々プログラミング学習に励んでします。
                                どうぞよろしくお願い致します。
                            </p>
                            <a class="p-profile__link" href="<?php echo esc_url(home_url('/#about')); ?>">詳しい自己紹介</a>
                        </div>
                    </aside>
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