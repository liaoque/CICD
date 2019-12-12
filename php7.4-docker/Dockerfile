FROM php:7.4.0-fpm-buster

# Install required system packages
RUN apt-get update && \
    apt-get -y install \
            git \
            libzip-dev \
            zlib1g-dev \
            libssl-dev \
        --no-install-recommends && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install composer
# 原下载地址，https://getcomposer.org/installer
# 如果下不下来就用这个，https://img.okwan.com/installer
RUN curl -sS https://img.okwan.com/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin
RUN composer config -g repo.packagist composer https://packagist.phpcomposer.com

RUN docker-php-ext-install \
    bcmath \
    zip

# Install pecl extensions
RUN pecl install redis xdebug && \
    docker-php-ext-enable redis && \
    docker-php-ext-enable xdebug

# Configure php
RUN echo "date.timezone = UTC" >> /usr/local/etc/php/php.ini

# Install phpunit
# 原下载地址，https://phar.phpunit.de/phpunit-8.0.6.phar
# 如果下不下来就用这个，https://img.okwan.com/phpunit-8.0.6.phar
RUN php -r "copy('https://img.okwan.com/phpunit-8.0.6.phar', 'phpunit-8.0.6.phar');" && \
    chmod +x phpunit-8.0.6.phar && \
    mv phpunit-8.0.6.phar /usr/local/bin/phpunit \
    phpunit --version

