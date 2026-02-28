FROM php:8.2-apache

# Instal·lar extensions necessàries
RUN docker-php-ext-install pdo pdo_mysql

# Instal·lar utilitats necessàries per Composer
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl

# Instal·lar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Activar mod_rewrite (opcional)
RUN a2enmod rewrite

# Directori de treball
WORKDIR /var/www/html
