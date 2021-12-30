FROM php:8.0.2-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev

RUN docker-php-ext-install pdo pdo_mysql mysqli zip pdo_pgsql pgsql

#Install xdebug
#RUN pecl install xdebug-3.1.2 && docker-php-ext-enable xdebug

RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet

WORKDIR /symfony