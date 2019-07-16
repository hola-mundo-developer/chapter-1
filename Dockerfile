ARG PHP_VERSION=7.3

FROM php:7.3-cli

ARG COMPOSER_VERSION=1.8.6
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION};

RUN mkdir -p /app

RUN apt-get update
RUN apt-get install -y apt-utils git unzip zip

COPY composer.lock composer.json /app/
COPY src /app/src

WORKDIR /app

ENV COMPOSER_ALLOW_SUPERUSER=1
