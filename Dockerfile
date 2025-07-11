FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]
