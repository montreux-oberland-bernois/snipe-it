FROM php:7.1-fpm-alpine
COPY . /usr/src/snipe-it
WORKDIR /usr/src/snipe-it
CMD [ "php", "-S 0.0.0.0:80" ]