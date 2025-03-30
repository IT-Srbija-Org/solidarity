to set local env:
*) install vagrant
*) install virtualbox
*) from app root run: vagrant up
*) add entries to etc/hosts:
192.168.25.43	solidarity.local
192.168.25.43	solidforms.local

to migrate db:
php bin/doctrine orm:schema-tool:update --complete --force --dump-sql

to validate db schema:
php bin/doctrine orm:validate-schema

to clear orm cache:
php bin/doctrine orm:clear-cache:metadata
php bin/doctrine orm:clear-cache:query
php bin/doctrine orm:clear-cache:result
