FROM php:8.3-fpm

ARG WWWGROUPID
ARG WWWUSERID

RUN mkdir -p /var/www

RUN apt-get update && apt-get install -y \
        curl \
        libpq-dev \
        libicu-dev \
        libzip-dev \
        libxml2-dev \
        zip \
        git && \
        docker-php-ext-install -j$(nproc) iconv pdo pdo_pgsql pgsql bcmath intl zip soap && \
        docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql  && \
        docker-php-ext-enable pdo_pgsql && \
        apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl install xdebug-3.4.1 \
	&& docker-php-ext-enable xdebug

#GD
RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y ca-certificates
COPY certs /usr/local/share/ca-certificates/
RUN update-ca-certificates

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd --gid $WWWGROUPID lara-usr && useradd --uid $WWWUSERID --gid $WWWGROUPID lara-usr

USER lara-usr

WORKDIR /var/www/app

CMD ["php-fpm"]
