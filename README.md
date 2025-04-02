to set local env:
*) install vagrant
*) install virtualbox
*) from app root run: vagrant up (if stuck here try restarting guest system, usually windows)
*) add entries to etc/hosts:
192.168.25.43	solidarity.local
192.168.25.43	solidforms.local

to ssh into machine, from app root run: vagrant ssh
ssh password is vagrant

to migrate db:
php bin/doctrine orm:schema-tool:update --complete --force --dump-sql

to validate db schema:
php bin/doctrine orm:validate-schema

to clear orm cache:
php bin/doctrine orm:clear-cache:metadata
php bin/doctrine orm:clear-cache:query
php bin/doctrine orm:clear-cache:result

#Simple docker env

Copy config/config-local.docker.dist to config/config-local.php

run container:
docker compose up -d

migrate db: 
docker compose exec app php bin/doctrine orm:schema-tool:update --complete --force --dump-sql

Frontend app is on http://localhost:8585/
Backend app is on http://localhost:8080/