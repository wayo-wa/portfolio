<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- wp-header -->
    <?php get_header(); ?>
</head>

<body class="<?php body_class(); ?>">
    <!-- ヘッダー -->
    <?php get_template_part('includes/header'); ?>
    
    <!-- ドロワーメニュー -->
    <?php get_template_part('includes/drawer'); ?>

    <!-- main -->
    <div class="l-main">

        <!-- VISUAL ビジュアル-->
        <div class="p-frontPage-visual l-section__inner">
            <!-- <div class="l-section__inner"> -->
                <div class="p-frontPage-visual__title js-effect-fade">
                    <!-- <h1 class="p-frontPage-visual__logo">MY PORTFOLIO 2021</h1> -->
                    <h1 class="p-frontPage-visual__logo">プログラミング学習の<br>制作記録</h1>
                    <h2 class="p-frontPage-visual__desc">WEBエンジニアを目指し2020年3月からプログラミング言語を日々学習中。</h2>
                </div>
            <!-- </div> -->
        </div>
        
        <!-- ABOUT 自己紹介-->
        <section id="about" class="p-frontPage-about l-section">
            <div class="p-frontPage-about__inner l-section__inner p-section js-effect-fade">
                <h2 class="p-section__title">ABOUT
                    <span class="p-section__title--jp">自己紹介</span>
                </h2>
                <div class="p-frontPage-about__body">
                        <?php 
                            $load_page = get_page_by_path('about'); //固定ページURLスラッグ名
                            $page = get_post($load_page);
                            $image_id = get_post_thumbnail_id($page->ID); //アイキャッチ画像の情報を取得
                        ?>
                    <div class="p-frontPage-about__illustration">
                        <img src="<?php echo get_the_post_thumbnail_url($page->ID); ?>" alt="<?php echo get_the_post_thumbnail_caption($page->ID); ?>">
                    </div>
                    <div class="p-frontPage-about__content">
                        <?php 
                            echo $page->post_content; //load-pageのコンテンツ内容
                        ?>
                        
                    </div>
                </div>
                
            </div>
        </section>
        
        <!-- STUDY 学習実績 -->
        <section class="p-frontPage-study l-section">
            <div class="l-section__inner p-section js-effect-fade">
                <h2 class="p-section__title">STUDY
                    <span class="p-section__title--jp">学習制作</span>
                </h2>
                <p class="p-frontPage-study__desc">
                    これまで学習のアウトプットで作成したサイトをご紹介します。
                </p>

                <!-- ループ処理 -->
                <div class="p-grid <?php post_class(); ?>">
                    <!-- postデータを出力する -->
                    <?php
                        if(wp_is_mobile())://スマホ・タブレットの場合(4件)
                            $wp_query = new WP_Query();
                                $my_posts = array(
                                    'post_type' => 'post',
                                    'posts_per_page'=> '4',
                                );
                        else://PCの場合(3件)
                            $wp_query = new WP_Query();
                                $my_posts = array(
                                    'post_type' => 'post',
                                    'posts_per_page'=> '3',
                                );
                        endif;
                        $wp_query->query( $my_posts );
                        if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
                    ?>

                        <!-- ループさせるコンテンツ部分 -->
                        <div class="p-grid__item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="p-grid__thumbnail">
                                    <?php if(has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/img-default.png">
                                    <?php endif; ?>
                                        <div class="p-grid__thumbnail--mask">
                                        <span class="p-grid__thumbnail--caption">詳しく見る</span>
                                    </div>
                                </div>
                                <p class="p-grid__title"><?php the_title_attribute(); ?></p>
                            </a>
                        </div><!--/p-grid__item-->

                    <?php endwhile; ?>
                    <?php else: ?>
                        <p>まだ投稿がありません。</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>

                </div><!-- /ループ処理終了 -->

                <div class="p-btn-area">
                    <a class="p-btn p-btn--more" href="<?php echo esc_url(home_url('/study')); ?>">MORE</a>
                </div>
            </div>
        </section>
        
        <!-- CONTACT お問い合わせ -->
        <section class="p-frontPage-contact l-section u-bgColor-lightBeige">
            <div class="l-section__inner p-section--sm js-effect-fade">
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
        </section>

    </div>
    
    <!-- フッター -->
    <?php get_template_part('includes/footer'); ?>

    <!-- wp-footer -->
    <?php get_footer(); ?>
</body>
</html>