# Imagen base oficial de PHP con extensiones para Laravel
FROM php:8.2-fpm

# Configuración de la zona horaria
RUN echo "date.timezone=UTC" > /usr/local/etc/php/conf.d/timezone.ini

# Instala herramientas necesarias y Composer
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

# Instala dependencias de Laravel
WORKDIR /var/www
COPY . .

# Establece las variables de entorno necesarias para PostgreSQL
ENV APP_DEBUG=true
ENV DB_CONNECTION=pgsql
ENV DB_HOST=dpg-ct8r0q2j1k6c73eaqlqg-a
ENV DB_PORT=5432
ENV DB_DATABASE=decameron_hotel
ENV DB_USERNAME=stephy
ENV DB_PASSWORD=0FQaKkSuiqpwe5qGmrhz8pKHGVjVzvTW
ENV APP_KEY=base64:2QUflnfWUQOEh8N1D/JegT+iRMx4ZKCcF3kAXLwJHus=

RUN composer install --no-dev --optimize-autoloader

# Da permisos a la carpeta de almacenamiento y caché de Laravel
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Configura Laravel
RUN php artisan config:cache
RUN php artisan route:cache

# RUN php artisan migrate
# RUN php artisan db:seed


# Puerto de escucha para la aplicación
EXPOSE 8000

# Comando predeterminado para iniciar el servidor
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
