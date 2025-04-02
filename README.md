# IT Srbija - Mreža solidarnosti

Mreža solidarnosti je jednostavna web aplikacija koja omogućava korisnicima da se prijavljuju na istu putem formi ili da upravljaju podacima unutar dash-a.

## Sadržaj
- [IT Srbija - Mreža solidarnosti](#it-srbija---mreža-solidarnosti)
  - [Sadržaj](#sadržaj)
  - [Instalacija](#instalacija)
    - [Docker instalacija (Preporučeno)](#docker-instalacija-preporučeno)
    - [Vagrant instalacija](#vagrant-instalacija)
  - [Podešavanje baze (manuelna instalacija)](#podešavanje-baze-manuelna-instalacija)
  - [Upotreba](#upotreba)
  - [Korisnički kredencijali](#korisnički-kredencijali)
  - [Komande za bazu podataka](#komande-za-bazu-podataka)

## Instalacija

### Docker instalacija (Preporučeno)

Za instalaciju pomoću Docker-a, pogledajte [README.docker.md](README.docker.md).

### Vagrant instalacija

Preduslovi:
- Vagrant - https://developer.hashicorp.com/vagrant/downloads
- VirtualBox - https://www.virtualbox.org/wiki/Downloads (nije potreban na Linux-u ako imate instaliran libvirt)

Koraci:
1. Iz app root/config klonirajte config-local.php-dist i constants.php.dist i uklonite .dist iz imena fajla
2. Dodajte sledeće unose u etc/hosts fajl:
    ```bash
    192.168.25.43	solidarity.local
    192.168.25.43	solidforms.local
    ```
3. Iz korena aplikacije pokrenite (ako zapne, pokušajte restartovati guest sistem, obično Windows):
    ```bash
    vagrant up
    ```
4. Iz korena aplikacije instalirajte zavisnosti:
    ```bash
    composer install
    # ili ako composer nije instaliran globalno
    php composer.phar install
    ```
   Za ažuriranje biblioteka:
    ```bash
    composer update
    php composer.phar update
    ```

SSH pristup:
- Komanda: `vagrant ssh`
- Lozinka: `vagrant`

## Podešavanje baze (manuelna instalacija)

Da biste podesili bazu za aplikaciju na lokalu, pratite sledeće korake:

1. Instalirajte MariaDB, na primer sa - https://mariadb.org/download/
2. Svi detalji o lokalnoj bazi podataka mogu se naći u - app root/config/config-local.php
3. Kreirajte bazu podataka, otvorite terminal i pokrenite:
    ```bash
    mysql -u root -p
    CREATE DATABASE solid;
    ```

## Upotreba

Projekat sa formama će biti dostupan na `http://solidforms.local` a dash sistem na `http://solidarity.local`.

1. Za SSH pristup mašini, iz korena aplikacije pokrenite (SSH lozinka je vagrant):
    ```bash
    vagrant ssh
    ```
2. Za stilizovanje i validaciju formi, navigirajte do app root/public/assets i pokrenite (potreban je node - https://nodejs.org/en/download):
    ```bash
    npm install
    npm run build
    ```
   Unutar assets foldera naći ćete scss fajlove i js/main-default.js

## Korisnički kredencijali

- Email: test@example.com
- Lozinka: testtest

## Komande za bazu podataka

Za migraciju baze podataka:
```bash
php bin/doctrine orm:schema-tool:update --complete --force --dump-sql
```

Za validaciju šeme baze podataka:
```bash
php bin/doctrine orm:validate-schema
```

Za čišćenje ORM keša:
```bash
php bin/doctrine orm:clear-cache:metadata
php bin/doctrine orm:clear-cache:query
php bin/doctrine orm:clear-cache:result
