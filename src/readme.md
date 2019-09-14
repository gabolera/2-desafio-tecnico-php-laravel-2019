<p align="center">
  <img src="https://img.shields.io/github/issues/dshy1/PHP-Challenge-Laravel-2">
  <img src="https://img.shields.io/github/license/dshy1/PHP-Challenge-Laravel-2">
  <img src="https://img.shields.io/github/forks/dshy1/PHP-Challenge-Laravel-2">
  <img src="https://img.shields.io/github/stars/dshy1/PHP-Challenge-Laravel-2">
</p>

### Requisitos (Laravel 6)
- PHP >= 7.2.0
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

#### Demo: 
**[Ver projeto online](http://project1.houtlyn.com.br)**
Registre-se, com seu e-mail, não é necessário fazer validação do email. 

Achou algum bug? [Clique aqui e reporte](https://github.com/dshy1/PHP-Challenge-Laravel-2/issues/new)

**Gostou? Deixe sua estrelhinha aí em cima :)**

## Como instalar

```sh
$ git clone https://github.com/dshy1/PHP-Challenge-Laravel-2.git

$ cd PHP-Challenge-Laravel-2/src
$ composer install

$ cp .env.example .env

$ php artisan key:generate
```

Agora devemos crirar um banco de dados no nosso mysql (seja `phpMyAdmin` ou outros) e passar as configurações para o `.env` na pasta do nosso projeto.

```diff
- Caso o .env não esteja aparecendo!
- Verifique se seu sistema está ocultando os arquivos ocultos (Ctrl+H)

! Caso não resolveu! provavelmente você fez algum passo errado!
! Caso você fez tudo certo, reporte o problema nesse repositório.
```

#### Agora vamos iniciar nosso pojeto.

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

