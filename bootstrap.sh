#!/usr/bin/env bash

# crate swap
sudo /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
sudo /sbin/mkswap /var/swap.1
sudo /sbin/swapon /var/swap.1

sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get update
sudo apt-get upgrade -y

echo "
   Installing MySql - dbName: fakture | user:root | password:rootpass
***************************************************************"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password rootpass"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password rootpass"

sudo apt-get install -y mysql-common mysql-server mysql-client
mysql -u root -prootpass  -e "CREATE DATABASE solid;"

sudo apt-get install -y zip unzip imagemagick
sudo apt-get install -y nginx
sudo apt-get install -y curl git redis-server
sudo apt-get install -y software-properties-common python-software-properties xpdf
sudo apt-get install -y php8.3-common php8.3-cli php8.3-fpm
sudo apt-get install -y php8.3-{bz2,curl,mysql,readline,xml,gd,dev,mbstring,opcache,zip,xsl,dom,intl,redis,igbinary}
sudo apt-get install -y php8.3-{xdebug,imagick,mcrypt}

cd /vagrant/

sudo bash -c "echo '
127.0.0.1       localhost

# The following lines are desirable for IPv6 capab
::1     ip6-localhost   ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters
ff02::3 ip6-allhosts
127.0.0.1       ubuntu-xenial   ubuntu-xenial
' > /etc/hosts"

sudo bash -c "echo 'server {
    listen 80;
    sendfile off;
    root /vagrant/public;
    index index.php;
    server_name solidarity.local;
    location / {
         try_files \$uri \$uri/ /index.php?\$args;
    }
    client_max_body_size 16M;
    client_body_buffer_size 2M;
    proxy_connect_timeout       300;
    proxy_send_timeout          300;
    proxy_read_timeout          300;
    fastcgi_connect_timeout 300;
    fastcgi_send_timeout 300;
    fastcgi_read_timeout 300;

    fastcgi_buffers 16 16k;
    fastcgi_buffer_size 32k;

    location ~ \.php$ {
        try_files \$uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_param APPLICATION_ENV development;
        fastcgi_param APPLICATION backend;
    }
}' > /etc/nginx/sites-available/solidarity.local"

sudo ln -s /etc/nginx/sites-available/solidarity.local /etc/nginx/sites-enabled/solidarity.local

sudo bash -c "echo 'server {
    listen 80;
    sendfile off;
    root /vagrant/public;
    index index.php;
    server_name solidforms.local;
    location / {
         try_files \$uri \$uri/ /index.php?\$args;
    }
    client_max_body_size 16M;
    client_body_buffer_size 2M;
    proxy_connect_timeout       300;
    proxy_send_timeout          300;
    proxy_read_timeout          300;
    fastcgi_connect_timeout 300;
    fastcgi_send_timeout 300;
    fastcgi_read_timeout 300;

    fastcgi_buffers 16 16k;
    fastcgi_buffer_size 32k;

    location ~ \.php$ {
        try_files \$uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_param APPLICATION_ENV development;
        fastcgi_param APPLICATION frontend;
    }
}' > /etc/nginx/sites-available/solidforms.local"

sudo ln -s /etc/nginx/sites-available/solidforms.local /etc/nginx/sites-enabled/solidforms.local
sudo service nginx restart

echo 'run composer install ...'
php composer.phar install
echo 'composer installed.'
echo 'setup configuration.'
cp config/config-local.php.dist config/config-local.php
echo 'configuration set.'
echo 'setup constants.'
cp config/constants.php.dist config/constants.php
echo 'constants set.'
echo 'start db migration.'
php bin/doctrine orm:schema-tool:update --complete --force --dump-sql
echo 'db migration done.'

mysql -u root -prootpass  -e "INSERT INTO solid.user (firstName, lastName, email, password, role, isActive, displayName, id) VALUES ('test', 'test', 'test@example.com', '$2y$10$GGArVO/7.xPDg6D5Kl6GHeELUg2Dnod68ynkFaZ7R2Vfx/K1oZ96O', '1', '1', 'test', '3');"
