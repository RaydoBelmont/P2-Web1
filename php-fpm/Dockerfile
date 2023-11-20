FROM php:7.4-fpm

RUN apt-get -y update \
    && apt-get install -y libicu-dev \
    && apt-get install -y libpq-dev \
    && apt-get install -y libldap2-dev \
    && apt-get install -y git zip unzip

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php  -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/var/www"