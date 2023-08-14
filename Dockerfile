FROM php:8.0-apache

ENV WORKDIR "/var/www/html"

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y \
#    libfreetype6-dev \
#    libjpeg-dev \
#    libpng-dev \
#    libpq-dev \
    libzip-dev \
    unzip \
    vim \
    zip

#RUN docker-php-ext-configure \
#    gd --with-jpeg --with-freetype

RUN docker-php-ext-install \
#    gd \
#    mysqli pdo pdo_mysql \
    zip

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

#COPY . ${WORKDIR}
#WORKDIR ${WORKDIR}

#RUN composer install

#RUN chown www-data:www-data -R ${WORKDIR} \
RUN a2enmod rewrite \
    && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
