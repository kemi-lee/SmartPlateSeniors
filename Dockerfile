FROM php:8.4-cli

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY . /var/www/html
WORKDIR /var/www/html

EXPOSE 8080
CMD ["php", "-S", "0.0.0.0:8080"]