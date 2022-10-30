ARG PHP_VERSION=8.0
ARG COMPOSER_VERSION=2.0

FROM composer:${COMPOSER_VERSION}
FROM php:${PHP_VERSION}-cli

USER root
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
    apt-get install -y autoconf pkg-config libssl-dev git libzip-dev zlib1g-dev \
    pecl install mongodb && docker-php-ext-enable mongodb \
    pecl install xdebug && docker-php-ext-enable xdebug \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite