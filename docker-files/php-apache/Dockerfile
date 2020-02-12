FROM php:7.3-apache 
RUN docker-php-ext-install mysqli
COPY ./index.php /var/www/html/
COPY ./dataloader.php /var/www/html/
