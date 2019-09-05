<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## How to install

```sh
$ git clone https://github.com/dshy1/PHP-Challenge-Laravel-2.git

$ cd PHP-Challenge-Laravel-2
$ composer install

$ cp .env.example .env
```

Go to create a table on database.
Before create the table, go to `.env` file for edit settings of project.

---
On `.env` file
Change your database configurations.

##### Don't forgotten edit 
```diff
+ APP_URL=yourIP:PORT
```


#### Now lets start project 

```sh
$ php artisan migrate
$ php artisan serve
```

---

| Page         | URL                                                                           |
| ------------ | ----------------------------------------------------------------------------- |
| Default Page | [localhost:8000](http://localhost:8000)                                       |
| Register     | [localhost:8000/register](http://localhost:8000/register)                     |
| Login        | [localhost:8000/login](http://localhost:8000/login)                           |
| ---          | `Login Required`                                                              |
| Dashboard    | [localhost:8000/dashboard](http://localhost:8000/dashboard)                   |
| Clientes     | [localhost:8000/dashboard/clientes](http://localhost:8000/dashboard/clientes) |
| Produtos     | [localhost:8000/dashboard/produtos](http://localhost:8000/dashboard/produtos) |
| Pedidos      | [localhost:8000/dashboard/pedidos](http://localhost:8000/dashboard/pedidos)   |
| ---          | `API`                                                                         |
| API/Produto  | [localhost:8000/api/produto/consulta?q={$token}](#)                           |