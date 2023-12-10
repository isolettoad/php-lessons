FROM php:8.2-fpm-alpine

RUN apk add build-base \
    && apk add --update linux-headers \
    && apk add --no-cache --update --virtual buildDeps autoconf \
        libpq-dev \
        libzip-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql
