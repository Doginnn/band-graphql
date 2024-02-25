# Instruções para rodar o projeto
Clone o projeto
```sh
git clone git@github.com:Doginnn/band-graphql.git
```

Acesse o diretório clonado
```sh
cd band-graphql
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="laravel"
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container
```sh
docker-compose exec app bash
```

Instale o GraphQL no projeto
```sh
composer require rebing/graphql-laravel
```

Publique o arquivo de configuração
```sh
php artisan vendor:publish --provider="Rebing\GraphQL\GraphQLServiceProvider"
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Gere a migração do banco no projeto Laravel
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8000](http://localhost:8000)
