FROM php:7.2-apache

LABEL version="0.1.0" \
	description="Docker Image for our legacy php applications on our Strato VServers with php 5.5.9 and apache" \
	maintainer="Antavent Solutions GmbH <kontakt@antavent.com>"

RUN set -ex; \
	\
	apt-get update && apt-get install -y \
		libmcrypt-dev \
		libxml2-dev \
		libbz2-dev \
		zlib1g-dev \
		libxslt1-dev \
		git \
		nano \
		wget \
		zip \
		unzip

RUN set -ex; \
    echo "Europe/Berlin" > /etc/timezone; \
    ln -sf /usr/share/zoneinfo/Europe/Berlin /etc/localtime; \
    echo "date.timezone = 'Europe/Berlin'\n" >> /usr/local/etc/php/php.ini; \
    echo "memory_limit = 1024M\n" >> /usr/local/etc/php/php.ini


RUN a2enmod rewrite

RUN pecl install xdebug-2.9.8

RUN export CFLAGS="-I/usr/src/php"
#RUN docker-php-ext-enable xdebug imagick mcrypt apcu
RUN docker-php-ext-install zip xsl
RUN docker-php-ext-enable xdebug zip xsl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./.project/fullchain.pem /fullchain.pem
COPY ./.project/privkey.pem /privkey.pem
COPY ./.project/default-ssl.conf /etc/apache2/sites-available/default-ssl.conf

RUN a2enmod ssl; \
    a2ensite default-ssl.conf; \
    service apache2 restart

#RUN composer require stevenmaguire/oauth2-microsoft microsoft/microsoft-graph
#RUN runuser -u www-data composer install

CMD ["apache2-foreground"]