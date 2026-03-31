FROM php:5.6-apache

# Install mysql and mysqli extensions
RUN docker-php-ext-install mysql mysqli

# Enable extensions and configure PHP (optional)
RUN docker-php-ext-enable mysql mysqli

# install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN printf 'log_errors = On\nerror_log = /dev/stderr\n' >> /usr/local/etc/php/conf.d/php.ini

# Restart Apache to apply changes
RUN service apache2 restart   