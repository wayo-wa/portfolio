#!/bin/sh

yarn config set network-timeout 1000000 #タイムアウト時間を長くしておく
yarn add gulp --dev             # gulpをインストール
yarn global add gulp-cli --dev  # gulpをコマンドから使えるように（グローバルのみインストール）
yarn add gulp-sass --dev        # sassをcssにビルドする
yarn add gulp-sass-glob --dev   # sassファイルのimportをひとつにまとめる
yarn add gulp-clean-css --dev   # css圧縮
yarn add gulp-rename --dev      # 圧縮したcssファイルに.minつける
yarn add gulp-autoprefixer --dev # プレフィックス自動付与
yarn add gulp-plumber           # sassの構文エラーがあってもgulpを止めない
yarn add gulp-uglify --dev     # js圧縮
yarn add gulp-imagemin --dev     # 画像圧縮
yarn add imagemin-mozjpeg --dev 
yarn add imagemin-gifsicle --dev 
yarn add imagemin-pngquant --dev # png画像の圧縮率を上げる
yarn add gulp-changed --dev     # changedで変更されたファイルを返す