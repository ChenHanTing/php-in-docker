FROM php:fpm
MAINTAINER k445566778899k@gmail.com

# pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql


RUN apt-get update
# install GraphicsMagick
RUN apt-get install -y \
		libgraphicsmagick1-dev graphicsmagick zlib1g-dev libicu-dev gcc g++ --no-install-recommends
RUN pecl -vvv install gmagick-beta && docker-php-ext-enable gmagick
# redis
RUN pecl install redis && docker-php-ext-enable redis
# intl
RUN docker-php-ext-configure intl && docker-php-ext-install intl
# cleanup
RUN apt-get clean && rm -rf /var/lib/apt/lists/*