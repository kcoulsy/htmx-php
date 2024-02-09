FROM php:8.2-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql

COPY $PWD/public /var/www/html
COPY $PWD/includes /var/www/includes


EXPOSE 80

# start Apache2 on image start
CMD ["/usr/sbin/apache2ctl","-DFOREGROUND"]