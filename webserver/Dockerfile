FROM php:7-apache

# Install nano
RUN apt-get update && \
    apt-get install -yqq \
    nano

# Apache config

    # Mod rewrite (RewriteEngine)
    RUN a2enmod rewrite headers

    # Mod macro (for vhosts)
    RUN a2enmod macro

    # Mod Proxy (proxypass in vhosts)
    RUN a2enmod proxy
    RUN a2enmod proxy_http

    # Setup vhosts
    COPY ./apache/vhosts.conf /etc/apache2/sites-available/000-default.conf
    RUN mkdir -p /var/www/vhosts/default

    # Enable config
    COPY ./apache/apache2.conf /etc/apache2/conf-available/dev_stack.conf
    RUN a2enconf dev_stack.conf

# PHP config

    # Enable config
    COPY ./php/php.ini /usr/local/etc/php/conf.d/dev_stack.ini

    # Extension Xdebug
    ARG INSTALL_XDEBUG=false
    RUN if [ ${INSTALL_XDEBUG} = true ]; then \
        pecl install -f xdebug && \
        docker-php-ext-enable xdebug \
    ;fi

    # Extension PDO-MYSQL
    ARG INSTALL_PDO_MYSQL=false
    RUN if [ ${INSTALL_PDO_MYSQL} = true ]; then \
        docker-php-ext-install pdo_mysql \
    ;fi

    # Extension MongoDB
    ARG INSTALL_MONGODB=false
    RUN if [ ${INSTALL_MONGODB} = true ]; then \
        pecl install -f mongodb && \
        docker-php-ext-enable mongodb \
    ;fi