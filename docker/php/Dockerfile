FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \

        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \

    && docker-php-ext-configure gd \
        --with-freetype-dir=/usr/lib/ \
        --with-png-dir=/usr/lib/ \
        --with-jpeg-dir=/usr/lib/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./src /var/www/test

WORKDIR /var/www/test

#RUN cd parser && composer install

#RUN chmod 0777 config.php ./admin/config.php
#RUN chmod -R 0777 ./image/ ./image/cache/ ./image/catalog/ ./system/storage/cache/ ./system/storage/logs/ ./system/storage/download/ ./system/storage/upload/ ./system/storage/modification/