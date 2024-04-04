FROM php:fpm-alpine

RUN apk --update --no-cache add git

RUN apk add icu-dev
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-configure intl && docker-php-ext-install intl

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD composer install ; php-fpm

RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www

COPY --chown=www-data:www-data . /var/www

EXPOSE 9000
