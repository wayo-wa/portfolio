<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- wp-head -->
    <?php get_header(); ?>
</head>

<!-- 個別投稿ページ -->

<body class="<?php body_class(); ?>">
    <!-- ヘッダー -->
    <?php get_template_part('includes/header'); ?>
    
    <!-- ドロワーメニュー -->
    <?php get_template_part('includes/drawer'); ?>

    

    <!-- main -->
    <div class="l-main">
    <!-- breadArea パンくずリスト-->
    <div class="p-bread p-bread--bgGray">
        <?php get_template_part('includes/bread'); ?>
    </div>
        <!-- コンテンツエリア（2カラム） -->
        <div class="l-section">
            <div class="l-section__inner p-section--md">
                <div class="l-container">
                    <!-- 記事 -->
                    <div class="l-container__main">
                        <!-- ループ処理 -->
                        <?php if(have_posts()): ?>
                            <?php while(have_posts()): ?>
                                <?php the_post(); ?>
                                    <div class="p-article <?php post_class(); ?>">
                                          <h1 class="p-article__title"><?php the_title(); ?></h1>
                                          <?php the_content(); ?>
                                    </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <!-- カテゴリー、タグ -->
                        <div class="p-taxonomy">
                            <span class="p-taxonomy--cat">
                                <?php the_category('&nbsp;'); ?>
                            </span>
                        </div>
                    </div>


                    <!-- サイドバー -->
                    <aside class="l-container__sidebar">
                        <!-- カテゴリー -->
                        <div class="p-category p-sideBlock">
                            <?php dynamic_sidebar('sidebar-widget'); ?>
                        </div>
                        <!-- 新着投稿 -->
                        <div class="p-post p-sideBlock">
                            <h3 class="p-sideBlock__title">新着投稿</h3>
                            <ul class="p-post__menu">
                            <!-- postデータを5件出力するコード -->
                            <?php
                                $wp_query = new WP_Query();
                                $my_posts = array(
                                    'post_type' => 'post',
                                    'posts_per_page'=> '5',
                                );
                                $wp_query->query( $my_posts );
                                if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
                            ?>
                                <!-- ループさせるコンテンツ部分 -->
                                <li class="p-post__item">
                                    <div class="p-post__thumbnail">
                                        <a href="<?php the_permalink(); ?>" class="p-post__thumbnail-link">
                                            <?php if(has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/img-default.png">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="p-post__desc">
                                        <h3 class="p-post__title">
                                            <a class="p-post__title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                    </div>
                                </li> 
                            <?php endwhile; ?>
                            <?php else: ?>
                                <p>まだ投稿がありません。</p>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

        
        
        
    </div><!-- /main -->
    
    <!-- フッター -->
    <?php get_template_part('includes/footer'); ?>

    <!-- wp-footer -->
    <?php get_footer(); ?>
</body>
</html>
