# FROM php:8.3-fpm

# # Install system dependencies & PHP extensions (matching bootstrap.sh)
# RUN apt-get update && apt-get install -y \
#     nginx curl git unzip zip imagemagick xpdf \
#     redis-server default-mysql-client \
#     software-properties-common \
#     libmagickwand-dev libmagickcore-dev \
#     libxml2-dev libxslt1-dev zlib1g-dev libjpeg-dev libpng-dev libwebp-dev libfreetype6-dev libonig-dev libzip-dev \
#     libcurl4-openssl-dev libedit-dev \
#     build-essential autoconf pkg-config \
#     && docker-php-ext-install \
#         bz2 \
#         curl \
#         pdo_mysql \
#         xml \
#         gd \
#         mbstring \
#         opcache \
#         zip \
#         xsl \
#         intl \
#     && pecl install redis igbinary xdebug imagick \
#     && docker-php-ext-enable redis igbinary xdebug imagick

# # Configure PHP-FPM socket path
# RUN mkdir -p /run/php && \
#     sed -i 's|listen = .*|listen = /run/php/php8.3-fpm.sock|' /usr/local/etc/php-fpm.d/www.conf

# # Copy Nginx virtual host files (expected to be added in build context)
# COPY nginx/solidarity.local /etc/nginx/sites-available/solidarity.local
# COPY nginx/solidforms.local /etc/nginx/sites-available/solidforms.local

# RUN ln -s /etc/nginx/sites-available/solidarity.local /etc/nginx/sites-enabled/ && \
#     ln -s /etc/nginx/sites-available/solidforms.local /etc/nginx/sites-enabled/

# # Set working directory to match legacy structure
# WORKDIR /var/www/html

# # Entrypoint runs both services in foreground
# CMD service php8.3-fpm start && nginx -g 'daemon off;'
# # CMD ["bash"]

FROM php:8.2-cli

# Install PHP extensions and system dependencies
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

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Start built-in PHP dev server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
# CMD ["bash"]