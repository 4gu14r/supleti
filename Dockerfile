FROM ubuntu

# Atualize o sistema e instale as dependências necessárias
RUN apt-get update \
    && apt-get install -y curl git zip unzip php php-cli php-mysql php-xml php-dom

# Instale o Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definindo o path de trabalho
WORKDIR /app/laravel
COPY ./api /app/laravel/

# Instalando os Path de Dependências.
RUN composer install
RUN npm install

# Expõe as portas necessárias
EXPOSE 8000
EXPOSE 5173

# Adicione um script de inicialização
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Converta quebras de linha e defina permissões de execução para executar no windows
RUN sed -i 's/\r$//' /usr/local/bin/start.sh && chmod +x /usr/local/bin/start.sh

# Defina o comando de inicialização
CMD ["/usr/local/bin/start.sh"]
