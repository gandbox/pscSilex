FROM phusion/baseimage:latest

# Proxy config : uncomment with your proxy values if needed
# RUN echo 'Acquire::http::Proxy "http://10.34.6.100:3128";' > /etc/apt/apt.conf.d/proxy

# Download and install php, nginx, and supervisor, hey, just linux for a change!

RUN apt-get update
RUN apt-get install -y python-software-properties software-properties-common

# RUN apt-get -y dist-upgrade
RUN apt-get install -y php5-fpm nginx supervisor curl php5-cli

# Setup config files
RUN echo "daemon off;" >> /etc/nginx/nginx.conf
ADD ./nginx/default /etc/nginx/sites-enabled/default
ADD ./supervisor/supervisord.conf /etc/supervisor/supervisord.conf
ADD ./php-fpm/php-fpm.conf /etc/php5/fpm/php-fpm.conf

# install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer

# Shared volume
RUN mkdir -p /var/www
VOLUME ["/var/www"]

# Default command for container, start supervisor
# CMD ["supervisord", "--nodaemon"]
USER root

# Expose port 80 of the container
EXPOSE 80

