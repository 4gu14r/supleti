FROM ubuntu

# Atualize o sistema e instale as dependências necessárias
RUN apt-get update \
    && apt-get install -y curl git zip unzip php php-cli php-mysql php-xml php-dom


# Instale o Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instale o composer  
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definindo path pra trabalho
WORKDIR /app

COPY ./laravel /app/laravel

WORKDIR /app/laravel


RUN composer install
RUN composer require inertiajs/inertia-laravel

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
