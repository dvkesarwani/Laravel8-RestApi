# Laravel Api

Simple example of a REST API with Laravel 8.x

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install

```

## Run migrations and seeds

```
   $ php artisan migrate --seed
```


## User Authentication with Curl with middleware auth.basic.username

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/novels  -H 'Authorization:Basic username:password'
```

## User Authentication with Curl using middleware auth.basic

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/novels  -H 'Authorization:Basic email:password'
```


## Getting with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/novels
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/novels/:id
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X POST -d '{"title":"Foo bar","price":"100","author":"Foo author","editor":"Foo editor"}' http://127.0.0.1:8000/api/novels
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X PUT -d '{"title":"Foo bar","price":"100","author":"Foo author","editor":"Foo editor"}' http://127.0.0.1:8000/api/novels/:id
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X DELETE http://127.0.0.1:8000/api/novels/:id
```

## Pagination with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/novels?page=:number_page  -H 'Authorization:Basic username:password or email:password'
```
