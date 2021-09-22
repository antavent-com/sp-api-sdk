FROM php:7.4-apache

LABEL version="0.0.1" \
	description="Docker Image for ibus ebay apis php application with php 7.4 and apache webserver" \
	maintainer="Antavent Solutions GmbH <kontakt@antavent.com>"

RUN set -ex; \
	\
	apt-get update && apt-get install -y \
		libzip-dev \
        zip \
        unzip \
	; \
	apt-get clean; \
	rm -rf /var/lib/apt/lists/*; \
	ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/local/include/; \
	export CFLAGS="-I/usr/src/php"

RUN set -ex; \
	echo "date.timezone = 'Europe/Berlin'\nmysqli.allow_local_infile = true\nmemory_limit = 512M\n" >> /usr/local/etc/php/php.ini

COPY --chown=www-data:www-data ./html /var/www/html

RUN set -ex; \
	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN runuser -u www-data -- composer install --no-dev

RUN a2enmod ssl; \
    a2enmod rewrite; \
    a2ensite default-ssl.conf; \
    openssl genrsa -out server.key 2048; \
    openssl req -new -x509 -key server.key -out server.pem -days 1826 \
        -subj "/C=/ST=/L=/O=/OU=/CN=/emailAddress=/"; \
    mv server.key /etc/ssl/private/ssl-cert-snakeoil.key; \
    mv server.pem /etc/ssl/certs/ssl-cert-snakeoil.pem; \
    service apache2 restart

CMD ["apache2-foreground"]