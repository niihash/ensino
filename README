# Plataforma de Ensino - Instruções de Execução

Este projeto é uma aplicação PHP simples seguindo o padrão MVC, com Docker para ambiente de desenvolvimento.

## Pré-requisitos

* [Docker](https://www.docker.com/get-started) instalado
* [Composer](https://getcomposer.org/) instalado

---

## Passo a passo para execução

### 1 Clonar o repositório

```bash
git clone https://github.com/niihash/ensino.git
```

### 2 Entrar na pasta do projeto

```bash
cd ensino
```

### 3 Copiar o arquivo de variáveis de ambiente

```bash
cp .env.example .env
```

> Ajuste os valores do `.env` se necessário (como usuário e senha do banco de dados).

### 4 Instalar dependências do Composer

```bash
composer install
```

### 5 Criar os containers Docker

```bash
docker-compose up -d
```

* Isso irá criar e iniciar os containers para PHP e MySQL.

### 6 Criar as tabelas no banco de dados

```bash
docker-compose exec php php Database/criar_tabelas.php
```

### 7 Popular as tabelas com dados iniciais

```bash
docker-compose exec php php Database/seed.php
```

---

## Acessando a aplicação

* Abra o navegador e acesse: [http://localhost:80](http://localhost:80)
* Login de administrador:

  * Usuário: `admin`
  * Senha: `asd123`

---

## Observações

* Todos os scripts de criação e seed das tabelas estão em `Database/`.