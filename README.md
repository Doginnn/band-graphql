# INSTRUÇÕES PARA RODAR O PROJETO
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

# INSTRUÇÕES PARA POPULAR DADOS NO BANCO(Álbums, Músicas e Letras)

Foram criados Factories para popular o banco com Álbums, Músicas e Letras. Para popular o banco, basta rodar o comando correto.

Caso ainda não tenha rodado o "php artisan migrate"(Cria as tabelas e popula com os dados)
```sh
php artisan migrate --seed
```
Caso já tenha rodado o "php artisan migrate"(Apenas popula os dados)
```sh
php artisan db:seed
```

# INSTRUÇÕES PARA TESTAR AS QUERIES E MUTATIONS(Albums, Musics e Lyrics)
Todas foram testadas pelo [POSTMAN](https://www.postman.com/)

## QUERIES
### (ALBUMS)
POST - ID ALBUM
```sh
query {
    album(id: 1) {
        id
        title
        release_date
    }
}
```

POST - ALL ALBUMS
```shell
query {
    albums {
        id
        title
        release_date
    }
}
```

### (MUSICS)
POST - ID MUSIC
```sh
query {
    music(id: 1) {
        id
        title
        duration
        album_id
    }
}
```

POST - ALL MUSICS
```shell
query {
    musics {
        id
        title
        duration
        album_id
    }
}
```

### (LYRICS)
POST - ID LYRIC
```sh
query {
    lyric(id: 1) {
        id
        content
        music_id
    }
}
```

POST - ALL LYRICS
```shell
query {
    lyrics {
        id
        content
        music_id
    }
}
```

## MUTATIONS
### (ALBUMS)
POST - CREATE ALBUM
```shell
mutation {
    createAlbum(
        title: "Teste de criação Album",
        release_date: "2024-02-26"
    ) {
        id
        title
        release_date
    }
}
```

POST - UPDATE ALBUM
```shell
mutation {
    updateAlbum(
        id: 1
        title: "Teste de modificação Album",
        release_date: "2024-02-26"
    ) {
        id
        title
        release_date
    }
}
```

POST - DESTROY ALBUM
```shell
mutation {
    destroyAlbum(
        id: 1
    )
}
```

### (MUSICS)
POST - CREATE MUSIC
```shell
mutation {
    createMusic(
        title: "Teste de criação Música",
        duration: "2024-02-26",
        album_id: "1"
    ) {
        id
        title
        duration
        album_id
    }
}
```

POST - UPDATE MUSIC
```shell
mutation {
    updateMusic(
        id: 1
        title: "Teste de edição Música",
        duration: "33",
        album_id: "1"
    ) {
        id
        title
        duration
        album_id
    }
}
```

POST - DESTROY MUSIC
```shell
mutation {
    destroyMusic(
        id: 1
    )
}
```

### (LYRICS)
POST - CREATE LYRIC
```shell
mutation {
    createLyric(
        content: "Teste de criação Letra",
        music_id: "1"
    ) {
        id
        content
        music_id
    }
}
```

POST - UPDATE LYRIC
```shell
mutation {
    updateLyric(
        id: 31
        content: "Teste de edição Letra",
        music_id: "1"
    ) {
        id
        content
        music_id
    }
}
```

POST - DESTROY LYRIC
```shell
mutation {
    destroyLyric(
        id: 1
    )
}
```
