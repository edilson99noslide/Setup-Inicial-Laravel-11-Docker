# 🚀 Laravel 11 Starter Kit com Docker

Este é um boilerplate inicial do Laravel 11 com Docker, preparado para desenvolvimento moderno com PostgreSQL, Composer, e ambiente isolado. Ideal para projetos modulares, com boas práticas e foco em produtividade e testes.

## 📦 Requisitos

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- (Opcional) [PHPStorm](https://www.jetbrains.com/phpstorm/)
- (VSCode) [VSCode](https://code.visualstudio.com/)

---

## 🚀 Instalação Rápida

1. Clone o projeto:
```bash
git clone https://github.com/seu-usuario/seu-projeto.git
cd seu-projeto
```

2. Copie o arquivo `.env`
```bash
cp .env.example .env
```

3. Suba os containers Docker
```bash
docker-compose up -d --build 
```

4. Instale as dependências do PHP
```bash
docker-compose exec app composer install 
```

5. Gere a chave da aplicação
```bash
docker-compose exec app php artisan key:generate
```

## Comandos úteis
```bash
# Acessar o container da aplicação
docker-compose exec app bash

# Executar comandos Artisan
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed

# Rodar testes
docker-compose exec app php artisan test

# Instalar pacotes PHP
docker-compose exec app composer require vendor/package
```


