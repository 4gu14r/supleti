#!/bin/sh

# Instala as dependências do Composer
composer install

# Instala as dependências do npm
npm install

# Caso não criei as tabelas
php artisan migrate --force

# Inicia o servidor Laravel
php artisan serve --host=0.0.0.0 --port=8000 &

# Inicia o servidor de desenvolvimento do Vite
npm run dev -- --host=0.0.0.0 --port=5173
