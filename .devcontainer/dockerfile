FROM ubuntu
WORKDIR /var/www/html
SHELL ["/bin/bash", "--login", "-c"]
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y apache2 lsb-release ca-certificates curl zip
# RUN curl -sSLo /usr/share/keyrings/deb.sury.org-php.gpg https://packages.sury.org/php/apt.gpg
# RUN echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list
# Apartado donde instalamos todas las librerias de PHP
RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive TZ=Europe/Madrid apt install -y php8.1 php8.1-xdebug php8.1-curl php8.1-dom php8.1-gd php8.1-zip php8.1-mysql -y
# Configuración del xdebug
RUN printf "\
zend_extension=xdebug.so\n\
xdebug.mode=debug\n\
xdebug.discover_client_host=1\n\
xdebug.remote_autostart=on\n\
xdebug.start_with_request = yes\n\
xdebug.client_host=127.0.0.1\n\
xdebug.client_port=9003\n\
">/etc/php/8.1/mods-available/xdebug.ini
ENV NAME_SERVICE=phpdeian
# Configuración de php.ini
RUN sed -i "s/memory_limit = 128M/memory_limit = 256M/" /etc/php/8.1/apache2/php.ini
RUN sed -i "s/upload_max_filesize = 2M/upload_max_filesize = 100M/" /etc/php/8.1/apache2/php.ini
RUN sed -i "s/max_execution_time = 30/max_execution_time = 360/" /etc/php/8.1/apache2/php.ini
RUN sed -i "s/display_errors = Off/display-errors = On/" /etc/php/8.1/apache2/php.ini
RUN sed -i "s/display_startup_errors = Off/display_startup_errors = On/" /etc/php/8.1/apache2/php.ini
#apache
RUN rm /etc/apache2/apache2.conf
COPY ./apache2.conf /etc/apache2/
RUN a2enmod rewrite
RUN sed -i "s/DocumentRoot \/var\/www\/html/DocumentRoot \/var\/www\/html\/public/" /etc/apache2/sites-available/000-default.conf
# Preparación del workspace
RUN rm -r /var/www/html/index.html
# Instalación de composer.
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN chmod 777 /usr/local/bin/composer
# Intalacion de node
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
RUN source /root/.nvm/nvm.sh && nvm install 16
# Ejecucion del servidor Apache
RUN apt install git -y
CMD ["apachectl", "-D", "FOREGROUND"]
