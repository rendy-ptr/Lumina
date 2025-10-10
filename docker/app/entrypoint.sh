#!/usr/bin/env bash
set -e

cd /var/www/html

if [ ! -f vendor/autoload.php ]; then
    composer install --prefer-dist --no-progress --no-interaction
fi

if [ -d storage ]; then
    mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views
fi

if [ -d bootstrap/cache ]; then
    mkdir -p bootstrap/cache
fi

exec docker-php-entrypoint "$@"
