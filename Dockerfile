FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

ENV WEBROOT /var/www/html/public

ENV RUN_SCRIPTS 1
COPY scripts/start.sh /var/www/html/start.sh
RUN chmod +x /var/www/html/start.sh
