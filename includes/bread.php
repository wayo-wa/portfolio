<!-- breadArea パンくずリスト-->
<div class="l-section__inner p-section--full">
    <div class="p-bread__menu">
        <?php //パンくずリストのプラグイン使用（表示箇所に設置）
            if ( function_exists( 'bcn_display' ) ) {
                bcn_display();
            }
        ?>
    </div>
</div>