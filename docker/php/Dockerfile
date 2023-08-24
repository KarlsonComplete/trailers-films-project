FROM php:8.1-fpm
RUN apt-get update && apt-get install -y zlib1g-dev g++ git libpq-dev libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo_pgsql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip
WORKDIR /var/www
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash
