# Obrigado pela a oportunidade! :smile:

Esta ferramenta levanta um ambiente de desenvolvimento para o projeto criado.

## Pré-requisitos

- Docker: [Instalar Docker](https://docs.docker.com/get-docker/)

- Git: [Instalar Git](https://git-scm.com/downloads)


---

### **IMPORTANTE | ATENÇÃO | RECOMENDADO**

:warning: **É RECOMENDADO QUE USE UM SISTEMA LINUX OU WSL2.** :warning:

---


## Configuração

-  Clone o repositório do projeto:

    ```sh
    git clone https://github.com/5gu14r/supleti.git
    ```


## Executando o Projeto
1. Navegue até o diretorio.

    ```
    cd supleti
    ```

2. Construa e inicie os contêineres usando Docker Compose:

    ```sh
    docker-compose up --build
    ```

    Isso iniciará dois serviços:
    - `db`: Contêiner MySQL
    - `app`: Contêiner da aplicação Laravel com Vue.JS

3. Acesse a aplicação no navegador:

    - [http://localhost:8000](http://localhost:8000)

## Volumes e Persistência de Dados

Os dados do banco de dados MySQL são persistidos no diretório `./database/data` no host.

## Problemas Comuns

- **Erro de Conexão Recusada**: Você terá que acessar o container e rodar o comando para força criar as tabelas.

    1. Acessar o container com o comando:
    ```
    docker exec -it app bash
    ```
    2. Dentro do container, execute o comando:
    ```
    php artisan migrate
    ```

- **Portas em Uso**: Verifique se as portas `8000` não estão sendo usadas por outros serviços.

## Parando os Contêineres

Para parar os contêineres, execute:

```sh
docker-compose down
