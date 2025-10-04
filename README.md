## Projeto Clientes

- Api para cadastrar clientes e recuperar os clientes salvos.

## Requisitos

* **PHP:** Versão 8.2 ou superior.
* **Composer:** Gerenciador de dependências do PHP.

-----

Siga os passos abaixo para preparar o ambiente e rodar a aplicação localmente.

### 1\. Clonar o Repositório

Baixe o código-fonte do projeto para sua máquina:

```bash
git clone https://github.com/jp-caldeira/clientes-laravel.git
cd clientes-laravel
```

### 2\. Instalar Dependências PHP

```bash
composer install
```

### 3\. Configurar o Arquivo `.env`

- Crie uma cópia do arquivo de exemplo:

    ```bash
    cp .env.example .env
    ```

### 4\. Gerar chave da Aplicação:

    ```bash
    php artisan key:generate
    ```

### 5\. Criar arquivo database.sqlite 

```bash
touch database/database.sqlite
```

### 6\. Rodar Migrations

- Cria todas as tabelas do banco de dados

```bash
php artisan migrate
```

### 7\. Iniciar o Servidor Local

```bash
php artisan serve
```

A aplicação estará acessível em: `http://127.0.0.1:8000`


### 8\. Testar Aplicação

- Importar o arquivo *Clientes.postman_collection.json* para o Postman e fazer as requisições. 
- Não há necessidade de autenticação