FROM alpine:3.13

RUN apk add --no-cache \
    coreutils \
    php8-fpm \
    php8-ctype \
    php8-curl \
    php8-dom \
    php8-gd \
    php8-iconv \
    php8-json \
    php8-intl \
    php8-fileinfo\
    php8-mbstring \
    php8-opcache \
    php8-openssl \
    php8-pdo \
    php8-pdo_mysql \
    php8-pdo_pgsql \
    php8-mysqli \
    php8-xml \
    php8-zlib \
    php8-phar \
    php8-tokenizer \
    php8-session \
    php8-simplexml \
    php8-zip \
    php8-xmlwriter \
    php8-pecl-apcu \
    make \
    curl

RUN curl -sS https://getcomposer.org/installer | tee composer-setup.php \
    && php8 composer-setup.php && rm composer-setup.php* \
    && chmod +x composer.phar && mv composer.phar /usr/bin/composer \
    && ln -s /usr/bin/php8 /usr/local/bin/php

RUN apk add --no-cache \
        bash \
        php8-pecl-xdebug

COPY ./docker/images/php/xdebug.ini  /etc/php8/conf.d/
COPY ./docker/images/php/weasel.ini /etc/php8/conf.d/
COPY ./docker/images/php/weasel.ini /etc/php8/cli/conf.d/
COPY ./docker/images/php/weasel.pool.conf /etc/php8/php-fpm.d/

RUN addgroup -g 82 -S www-data
RUN adduser -u 82 -D -S -G www-data www-data

WORKDIR /var/www

CMD ["php-fpm8", "-F"]

EXPOSE 9001


