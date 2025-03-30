FROM php:8.2.15-fpm

# システムの依存関係をインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    nodejs \
    npm

# PHP拡張機能をインストール
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo_pgsql

# Composerをインストール
COPY --from=composer:2.6.6 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www

# ログディレクトリの作成
RUN mkdir -p /var/log/php /var/log/php-fpm /var/lib/php/sessions \
    && chown -R www-data:www-data /var/log/php /var/log/php-fpm /var/lib/php/sessions

# カスタムPHP設定を追加
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

# ユーザーを設定
RUN chown -R www-data:www-data /var/www

# コンテナ起動時のコマンド
CMD ["php-fpm"] 