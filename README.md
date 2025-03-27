to set local env: 
vagrant up

to migrate db: 
php bin/doctrine orm:schema-tool:update --complete --force --dump-sql

to validate db schema:
php bin/doctrine orm:validate-schema

to clear orm cache:
php bin/doctrine orm:clear-cache:metadata
php bin/doctrine orm:clear-cache:query
php bin/doctrine orm:clear-cache:result
