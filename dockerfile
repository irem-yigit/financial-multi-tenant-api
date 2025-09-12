FROM php:8.4-fpm

# System packages and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli mbstring

# Composer installation
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
