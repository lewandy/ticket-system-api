#!/bin/bash

cp .env.example .env
composer install
compoer run post-root-package-install
composer run post-create-project-cmd
php artisan migrate
php artisan passport:install
