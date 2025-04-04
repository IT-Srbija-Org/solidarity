# IT Srbija - Mreža solidarnosti

Mreža solidarnosti je jednostavna web aplikacija koja omogućava korisnicima da se prijavljuju na istu putem formi ili da upravljaju podacima unutar dash-a.

## Table of Contents
- [Instalacija](#instalacija)
- [Podešavanje baze](#podešavanje-baze-manuelna-instalacija)
- [Upotreba](#upotreba)
## Instalacija

Da biste instalirali APP na lokalu, pratite sledeće korake:

1. Install vagrant - https://developer.hashicorp.com/vagrant/downloads
2. Install virtualbox - https://www.virtualbox.org/wiki/Downloads
3. From app root/config clone config-local.php-dist and constants.php.dist and remove .dist from file name
4. Add entries to etc/hosts
    ```bash
    192.168.25.43	solidarity.local
    192.168.25.43	solidforms.local
    ```
5. From app root run (if stuck here try restarting guest system, usually windows)
    ```bash
    vagrant up
    ```
6. From app root run (manuelna instalacija)
    ```bash
    composer install
    php composer.phar install
    ```
   or update libraries
    ```bash
    composer update
    php composer.phar update
    ```

## Podešavanje baze (manuelna instalacija)

Da biste podesili bazu za APP na lokalu, pratite sledeće korake:

1. Install MariaDB for example - https://mariadb.org/download/
2. All details about the local database can be found here - app root/config/config-local.php
3. Create APP database, open terminal and run
    ```bash
    mysql -u root -p
    CREATE DATABASE solid;
    ```
4. To migrate database, run
   ```bash
    php bin/doctrine orm:schema-tool:update --complete --force --dump-sql
    ```
5. To validate database schema, run
    ```bash
    php bin/doctrine orm:validate-schema
    ```
6. To clear orm cache, run
    ```bash
    php bin/doctrine orm:clear-cache:metadata
    php bin/doctrine orm:clear-cache:query
    php bin/doctrine orm:clear-cache:result
    ```

## Upotreba

Projekat sa formama će biti dostupan na `http://solidforms.local` a dash sistem na `http://solidarity.local`.

1. To ssh into machine, from app root run (ssh password is vagrant)
    ```bash
    vagrant ssh
    ```
2. To style and validate forms, navigate to app root/public/assets and run (node is required - https://nodejs.org/en/download)
    ```bash
    npm install
    npm run build
    ```
   Inside assets folder you will find scss files and js/main-default.js