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

$ php artisan key:generate
```

Go to create a table on database.
Before create the table, go to `.env` file for edit settings of project.

---
On `.env` file
Change your database configurations.


#### Now lets start project 

```sh
$ php artisan migrate
$ php artisan serve
```

---

| Page         | URL                                                                           |
| ------------ | ----------------------------------------------------------------------------- |
| Default Page | `http://localhost:8000`                                                       |
| Register     | `http://localhost:8000/register`                                              |
| Login        | `http://localhost:8000/login`                                                 |
| ---          | `Login Required`                                                              |
| Dashboard    | `http://localhost:8000/dashboard`                                             |
| Clientes     | `http://localhost:8000/dashboard/clientes`                                    |
| Produtos     | `http://localhost:8000/dashboard/produtos`                                    |
| Pedidos      | `http://localhost:8000/dashboard/pedidos`                                     |
| ---          | `API JSON`                                                                    |
| API Produto  | `localhost:8000/api/produto/consulta/{id}`                                    |
| API Cliente  | `localhost:8000/api/cliente/consulta/{id}`                                    |
| API Produto  | `localhost:8000/api/pedido/consulta/{id}`                                     |

