#get ubuntu
FROM ubuntu:trusty
MAINTAINER An Dinh Luan <luanad6365@setacinq.com.vn>

# Install LAMP
RUN apt-get update 
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install supervisor 
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install git 
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install libapache2-mod-php5
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install mysql-server 
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install php5-mysql 
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install pwgen 
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install php-apc

# Add image configuration and scripts
ADD start-apache2.sh /start-apache2.sh
ADD start-mysqld.sh /start-mysqld.sh
ADD run.sh /run.sh
RUN chmod 755 /*.sh
ADD my.cnf /etc/mysql/conf.d/my.cnf
ADD supervisord-apache2.conf /etc/supervisor/conf.d/supervisord-apache2.conf
ADD supervisord-mysqld.conf /etc/supervisor/conf.d/supervisord-mysqld.conf

# Remove pre-installed database
RUN rm -rf /var/lib/mysql/*

# Add MySQL utils
ADD create_mysql_admin_user.sh /create_mysql_admin_user.sh
ADD import_sql.sh /import_sql.sh
ADD create_db.sh /create_db.sh
RUN chmod 755 /*.sh

# config to enable .htaccess
ADD apache_default /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Configure /app folder with sample app
RUN git clone https://github.com/fermayo/hello-world-lamp.git /app
RUN mkdir -p /app && rm -fr /var/www/html && ln -s /app /var/www/html

# Add volumes for MySQL 
VOLUME  ["/etc/mysql", "/var/lib/mysql" ]


# Download latest version of Wordpress into /app
RUN rm -fr /app && git clone --depth=1 https://kienbd6336-seta:Kevin2seta@bitbucket.org/kienbd6336-seta/setawebsite.git /app

# Configure Wordpress to connect to local DB
ADD wp-config.php /app/wp-config.php
RUN chmod 644 /app/wp-config.php

# Modify permissions to allow plugin upload
RUN chmod -R 777 /app/wp-content

# Add database setup script
ADD db_product.sql /db_product.sql
RUN chmod 777 /db_product.sql
ADD create_mysql_admin_user_2.sh /create_mysql_admin_user_2.sh
ADD run_2.sh /run_2.sh
RUN chmod 755 /*.sh

ENV MYSQL_PASS setawebsite

EXPOSE 80 3306
CMD ["/run.sh"]
CMD ["/run_2.sh"]