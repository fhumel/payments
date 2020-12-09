# Laradock

Project made for testing the laravel framework with the docker in a transaction application.

  - UnitTest
  - Docker
  - Laravel
  - PHP 7.4
  
### Requires

 - [Composer](https://getcomposer.org/download/)
 - [Docker](https://docs.docker.com/engine/install/)

### Installation

Clone project https://github.com/fhumel/projetoDocker

Install the dependencies of composer

```sh
$ composer install
$ chmod 777 -R storage
$ ln -s public html
```

For laravel...
copy .env.example para .env and config ports and mysql

For docker... 
/laradock
copy env-example para .env and config ports and mysql

#### Building for source
### Docker
```sh
php artisan migrate
php artisan key:generate 
```

For production release:
```sh
$ cd laradock
$ sudo docker-compose up -d nginx mysql phpmyadmin
```

Verify the deployment by navigating to your server address in your preferred browser.

```sh
127.0.0.1:8000
```

License
----

MIT


**Free Software, Hell Yeah!**

