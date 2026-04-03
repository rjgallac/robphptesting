FROM php:8.1-fpm
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini