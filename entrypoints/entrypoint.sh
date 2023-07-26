#!/usr/bin/env bash
set -e

composer install
# composer dumpautoload

npm run build

php artisan migrate  --force --seed

# Run the main container command
php-fpm
exec "$@"
