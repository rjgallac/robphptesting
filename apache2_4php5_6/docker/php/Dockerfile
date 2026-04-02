FROM php:5.6-apache

# Install mysql and mysqli extensions
RUN docker-php-ext-install mysql mysqli

# Enable extensions and configure PHP (optional)
RUN docker-php-ext-enable mysql mysqli

RUN pecl install xdebug-2.5.5

RUN docker-php-ext-enable xdebug

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN printf 'log_errors = On\nerror_log = /dev/stderr\n' >> /usr/local/etc/php/conf.d/php.ini

# Restart Apache to apply changes
RUN service apache2 restart   