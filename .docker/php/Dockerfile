FROM php:fpm-alpine

RUN apk --update --no-cache add git

RUN apk add icu-dev
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-configure intl && docker-php-ext-install intl

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

ADD . /var/www
RUN chown -R www-data:www-data /var/www

CMD composer install ; php-fpm

EXPOSE 9000
