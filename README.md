# Tasks API

Tasks API é uma API RestFul para controle de tarefas construída com PHP 5.3+

## Requisitos

Para rodar essa aplicação é necessário ter instalado uma versão igual ou superior do [PHP 5.3+](https://www.php.net/downloads.php) e do [composer](https://getcomposer.org/doc/00-intro.md).

Além disso, há a necessidade de criar um banco de dados no MySQL.

## Como usar
Realize a clonagem do repositório:
```bash
git clone https://github.com/uSouza/tasks-api.git
```
Realize a instalação dos pacotes do projeto:
```bash
composer install
```
Configure o arquivo de banco de dados "database.ini" que está na raiz do projeto:
```
[database]
host=localhost
username=root
password=root
database=tasks
```
Realize a criação das tabelas:
```bash
vendor/bin/doctrine orm:schema-tool:create 
```
Após isso basta iniciar um servidor web de preferência na raiz do projeto. Exemplo PHP:
```bash
php -S localhost:3000
```
Importe a coleção com os exemplos de request no [Postman](https://www.getpostman.com/), URL: https://www.getpostman.com/collections/a7c830dd1f998f1e123b

## Licença
[MIT](https://choosealicense.com/licenses/mit/)