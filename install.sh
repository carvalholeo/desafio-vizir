#!/bin/bash

#Script para instalar, automaticamente, todas as dependências do projeto

php composer.phar install
cp .env.example .env
php artisan key:generate
npm install
npm run prod