FROM php:8.2-fpm

RUN echo "date.timezone=UTC" > /usr/local/etc/php/conf.d/timezone.ini

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    mbstring \
    zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
COPY . .

ENV DB_CONNECTION=pgsql
ENV DB_HOST=postgresql://stephy:0FQaKkSuiqpwe5qGmrhz8pKHGVjVzvTW@dpg-ct8r0q2j1k6c73eaqlqg-a/decameron_hotel
ENV DB_PORT=5432
ENV DB_DATABASE=decameron_hotel
ENV DB_USERNAME=stephy
ENV DB_PASSWORD=0FQaKkSuiqpwe5qGmrhz8pKHGVjVzvTW
ENV APP_KEY=base64:2QUflnfWUQOEh8N1D/JegT+iRMx4ZKCcF3kAXLwJHus=

RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

RUN php artisan config:cache
RUN php artisan route:cache

RUN php artisan migrate
RUN php artisan db:seed

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
