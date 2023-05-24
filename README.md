# Produto para gestão de Restaurante

## Sobre o projeto

Este projeto está sendo desenvolvido durante o curso de Sistemas da Informação, na disciplina de Engenharia de Software II ministrada pelo professor Taciano
no curso de Bacharelado em Sistemas da Informação, pela Universidade Federal do Rio Grande do Norte / CERES - Caicó/RN.

## Desenvolvedores

-   [Anna Karoline](https://github.com/OliveiraAnna99)
-   [Israel Costa e Silva](https://github.com/israelsilva282)
-   [Isadora Luana](https://github.com/isazvdd)
-   [Jônatas Câmara](https://github.com/JohnnyAKing)

## Tecnologias utilizadas

-   ![PHP](https://img.shields.io/badge/PHP-F7DF1E?style=for-the-badge&logo=php&logoColor=black)
-   ![CSS](https://img.shields.io/badge/CSS-1E90FF?&style=for-the-badge&logo=css3&logoColor=white)
-   ![Laravel](https://img.shields.io/badge/Laravel-FF0000?style=for-the-badge&logo=laravel&logoColor=white)
-   ![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

## Documentação

-   [Documento de Visão](https://github.com/OliveiraAnna99/es-sigres/blob/main/docs/doc-visao.md)
-   [Documento de Modelos](https://github.com/OliveiraAnna99/es-sigres/blob/main/docs/doc-modelos.md)
-   [Plano de Iteração e Release](https://github.com/OliveiraAnna99/es-sigres/blob/main/docs/doc-iteracao.md)
-   [Lista de User Stories](https://github.com/OliveiraAnna99/es-sigres/blob/main/docs/doc-userstories.md)

## Como executar o projeto

**O tutorial abaixo assume que você já tenha instalado o [Docker](https://www.docker.com/) instalado em sua máquina**

**Caso o sistema operacional seja Windows, será necessário o [WSL](https://learn.microsoft.com/pt-br/windows/wsl/install)**

### Instalação

1. Faça o download do repositório

```
git clone https://github.com/OliveiraAnna99/es-sigres.git
```

2. Entre no diretório raiz do projeto

```
cd es-sigres
```

3. Instale as dependências do projeto. OBS: Este comando usa um pequeno container docker contendo o PHP e o Composer para instalação das dependências

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs &&
    cp .env.example .env &&
    php artisan key:generate &&
    npm install

```

### Inicialização

```
docker compose up -d

docker exec -it es-sigres-laravel.test-1 bash

php artisan serve
```

### CRUD - Tutorial

-   [Playlist CRUD Tutorial - PHP, Laravel](https://www.youtube.com/playlist?list=PLvZ08PHyHqDn1W1PKxpPIS7Bw0JqoRtB-)
