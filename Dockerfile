FROM php:8.2-apache

COPY . /var/www/html/

RUN mkdir -p /var/www/html/img \
    /var/www/html/productes \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/img \
    && chmod -R 775 /var/www/html/productes \
    && chmod 775 /var/www/html

EXPOSE 80
