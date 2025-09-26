# Imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar la extensión mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copiar tu proyecto al contenedor
COPY . /var/www/html/

# Exponer el puerto de Apache
EXPOSE 80
