#!/usr/bin/env bash
set -e

php artisan migrate  --force --seed

# Run the main container command
php-fpm
exec "$@"
