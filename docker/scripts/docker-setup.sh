#!/usr/bin/env bash

echo -e "\nWaiting for MySQL to be ready..."
while ! mysql -h"mariadb" -P"3306" -u"root" -p"${MYSQL_ROOT_PASSWORD}" -e "SELECT 1;" >/dev/null 2>&1; do
    echo -e "\nMySQL is not ready yet, waiting..."
    sleep 1
done

echo -e "\nCreate MySQL database '${MYSQL_DATABASE}' (if not exists)"
echo "CREATE DATABASE IF NOT EXISTS \`${MYSQL_DATABASE}\` COLLATE 'utf8_unicode_ci';" |
    mysql -h"mariadb" -P"3306" -u"root" -p"${MYSQL_ROOT_PASSWORD}"

echo "Set up MySQL user '${MYSQL_USER}'"
echo "CREATE USER IF NOT EXISTS '${MYSQL_USER}'@'%' IDENTIFIED BY '${MYSQL_PASSWORD}';" |
    mysql -h"mariadb" -P"3306" -u"root" -p"${MYSQL_ROOT_PASSWORD}"
echo "GRANT ALL PRIVILEGES ON *.* TO '${MYSQL_USER}'@'%';" |
    mysql -h"mariadb" -P"3306" -u"root" -p"${MYSQL_ROOT_PASSWORD}"

if [ ! -d /var/www/html/vendor ]; then
    echo -e "\nInstalling composer dependencies"
    composer install
fi

echo -e "\nSetting up configuration files"
if [ ! -f /var/www/html/config/config-local.php ]; then
    cp /var/www/html/config/config-local.php.dist /var/www/html/config/config-local.php
    sed -i "s/'host' => 'localhost'/'host' => 'mariadb'/g" /var/www/html/config/config-local.php
    sed -i "s/'user' => 'root'/'user' => '${MYSQL_USER}'/g" /var/www/html/config/config-local.php
    sed -i "s/'pass' => 'rootpass'/'pass' => '${MYSQL_PASSWORD}'/g" /var/www/html/config/config-local.php
    sed -i "s/'127.0.0.1' => 6379/'redis' => 6379/g" /var/www/html/config/config-local.php
fi
echo -e "\nChecking for constants.php file"
if [ ! -f /var/www/html/config/constants.php ]; then
    echo -e "constants.php not found, copying from constants.php.dist"
    cp /var/www/html/config/constants.php.dist /var/www/html/config/constants.php
    echo -e "constants.php created successfully"
else
    echo -e "constants.php already exists"
fi

echo -e "\nCreating necessary directories"
mkdir -p /var/www/html/data/logs/$(date +"%Y-%m")
chmod -R 777 /var/www/html/data

echo -e "\nRunning database migrations"
php /var/www/html/bin/doctrine orm:schema-tool:update --force --dump-sql

echo -e "\nCreating test user"
mysql -h"mariadb" -P"3306" -u"root" -p"${MYSQL_ROOT_PASSWORD}" "${MYSQL_DATABASE}" <<EOF
INSERT INTO user (firstName, lastName, email, password, role, isActive, displayName, id)
SELECT 'test', 'test', 'test@example.com', '\$2y\$10\$GGArVO/7.xPDg6D5Kl6GHeELUg2Dnod68ynkFaZ7R2Vfx/K1oZ96O', '1', '1', 'test', '3'
WHERE NOT EXISTS (SELECT 1 FROM user WHERE id = '3');
EOF

echo -e "\nSetup completed!"

