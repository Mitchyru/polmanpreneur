#!/usr/bin/env bash
set -e

echo "Running composer install..."
composer install --no-dev

echo "Caching config & routes..."
php artisan config:cache
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

exec /start.sh
