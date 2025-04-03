to set local env:
*) install vagrant
*) install virtualbox
*) from app root/config
clone config-local.php-dist and constants.php.dist and remove .dist from file name
*) from app root run: vagrant up (if stuck here try restarting guest system, usually windows)
*) add entries to etc/hosts:
192.168.25.43	solidarity.local
192.168.25.43	solidforms.local
*) from app root call
composer install
php composer.phar install

to ssh into machine, from app root run: vagrant ssh
ssh password is vagrant

setup database (config/config-local.php details)
install MariaDB for example - https://mariadb.org/download/
mysql -u root -p
CREATE DATABASE solid;

to migrate db
php bin/doctrine orm:schema-tool:update --complete --force --dump-sql

to validate db schema:
php bin/doctrine orm:validate-schema

to clear orm cache:
php bin/doctrine orm:clear-cache:metadata
php bin/doctrine orm:clear-cache:query
php bin/doctrine orm:clear-cache:result
