# Alura Crawler

Projeto simples de teste para buscar os cursos da Alura a partir de uma URL

## Rodando o projeto

Para instalar todas as dependências, execute:

```
docker run --rm -itv $(pwd):/app -v /home/vinicius/.composer:/root/.composer -w /app -u $(id -u):$(id -g) composer install
```

Para rodar os scripts de análise e testes (PHPCS, Phan e PHPUnit):

```
docker run --rm -itv $(pwd):/app -v /home/vinicius/.composer:/root/.composer -w /app -u $(id -u):$(id -g) composer run-script check
```

Para ver os cursos na CLI:

```
docker run --rm -itv $(pwd):/app -w /app -u $(id -u):$(id -g) php:7.3-cli php alura-crawler.php
```
