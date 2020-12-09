# Payments

Project made for testing the laravel framework with the docker in a transaction application.

  - Docker
  - Lumen
  - PHP 7.4
  
#### Doc
[click](api.md)
  
### Requires

 - [Composer](https://getcomposer.org/download/)
 - [Docker](https://docs.docker.com/engine/install/)

### Installation

Clone project https://github.com/fhumel/payments.git

Install the dependencies of composer

```sh
$ composer install
$ chmod 777 -R storage
$ ln -s public html
```

For laravel...
copy .env.example para .env and config ports and mysql

For docker... 
config ports and mysql on docker-composer.yml

#### Building for source
### Docker
```sh
$ php artisan migrate
$ php artisan key:generate 
$ php artisan cache:clear
```

For production release:
```sh
$ docker-compose build && docker-compose up -d
$ docker-compose up -d --force-recreate
```

Verify the deployment by navigating to your server address in your preferred browser.

```sh
$ 127.0.0.1:8000
```

Get ip container

```sh
$ docker ps
```
Add line in /etc/hosts

ip-container-mysql       mysql


License
----

MIT


**Free Software, Hell Yeah!**

