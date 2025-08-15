FROM php:8.4-apache

# Instalar dependências
RUN apt-get update && apt-get install -y unzip git curl zip \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Ativar mod_rewrite
RUN a2enmod rewrite

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Ajustar DocumentRoot para a pasta public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Definir o diretório de trabalho
WORKDIR /var/www/html
