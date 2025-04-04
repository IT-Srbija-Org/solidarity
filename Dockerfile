FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libxslt1-dev \
    libgd-dev \
    libbz2-dev \
    librabbitmq-dev \
    libssl-dev \
    libmagickwand-dev \
    unzip \
    imagemagick \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
    bz2 \
    gd \
    intl \
    mbstring \
    opcache \
    pdo_mysql \
    soap \
    xsl \
    zip \
    dom

# Install Redis extension
RUN pecl install redis igbinary \
    && docker-php-ext-enable redis igbinary

# Install ImageMagick extension
RUN curl -sSLf \
    -o /usr/local/bin/install-php-extensions \
    https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions imagick

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Configure PHP
COPY docker/php/php.ini /usr/local/etc/php/conf.d/app.ini

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
