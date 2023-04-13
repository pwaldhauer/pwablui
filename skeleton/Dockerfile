FROM php:8.2.3-alpine3.17

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions intl calendar

COPY . /app

COPY .env.docker /app/.env

WORKDIR /app

RUN mkdir /app/bootstrap/cache
RUN mkdir /app/storage
RUN mkdir /app/storage/app
RUN mkdir /app/storage/framework
RUN mkdir /app/storage/framework/cache
RUN mkdir /app/storage/framework/sessions
RUN mkdir /app/storage/framework/views
RUN mkdir /app/storage/logs

RUN touch /app/storage/database.sqlite
RUN php artisan storage:link -n

CMD php artisan app:init && php artisan serve --host=0.0.0.0 --port=9901 -vvv
