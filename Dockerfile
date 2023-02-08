FROM php:8.2-cli

RUN apt update && apt install --yes git libzip-dev zip && docker-php-ext-install zip
RUN curl https://getcomposer.org/download/2.5.2/composer.phar --output composer.phar && chmod +x composer.phar
RUN mv composer.phar /usr/local/bin/composer
WORKDIR /tmp