FROM php:8.3-fpm

RUN curl -fsSL https://deb.nodesource.com/setup_21.x | bash - \
  && apt update \
  && apt install -y git \
    libpq-dev \
    unzip \
    nodejs \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && docker-php-ext-install pgsql pdo_pgsql

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
