FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    curl git unzip zip \
    imagemagick \
    libmagickwand-dev libmagickcore-dev \
    libxml2-dev libxslt1-dev zlib1g-dev libjpeg-dev libpng-dev libwebp-dev \
    libfreetype6-dev libonig-dev libzip-dev libcurl4-openssl-dev libedit-dev \
    build-essential autoconf pkg-config \
    && docker-php-ext-install \
        bz2 curl pdo_mysql xml gd mbstring opcache zip xsl intl \
    && pecl install redis igbinary xdebug imagick-3.6.0 \
    && docker-php-ext-enable redis igbinary xdebug imagick

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]