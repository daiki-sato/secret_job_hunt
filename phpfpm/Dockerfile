FROM php:7.2.6-fpm
RUN apt-get update \
       && apt-get install -y \
       git \
       unzip \
       libz-dev \
       aptitude \
       libpng-dev \
       mysql-client \
       libmemcached-dev \
       libfreetype6-dev \
       libjpeg62-turbo-dev \
       && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
       && docker-php-ext-install -j$(nproc) gd iconv pdo_mysql \
       && pecl install xdebug-2.6.0 \
       && pecl install memcached \
       && echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

RUN curl -sL https://deb.nodesource.com/setup_11.x | bash - \
       && apt-get install -y nodejs

RUN apt-get install -y nodejs npm && npm install n -g && n 16.15.0

# install composer
RUN cd '/' \
       && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
       && php composer-setup.php \
       && php -r "unlink('composer-setup.php');" \
       && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www
# install vim-gnome
RUN aptitude install -y vim
