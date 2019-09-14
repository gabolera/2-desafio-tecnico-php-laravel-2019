<p align="center">
  <img src="https://img.shields.io/github/issues/dshy1/PHP-Challenge-Laravel-2">
  <img src="https://img.shields.io/github/license/dshy1/PHP-Challenge-Laravel-2">
  <img src="https://img.shields.io/github/forks/dshy1/PHP-Challenge-Laravel-2">
  <img src="https://img.shields.io/github/stars/dshy1/PHP-Challenge-Laravel-2">
</p>

### Demo: 
**[Ver projeto online](http://project1.houtlyn.com.br)**
Registre-se, com seu e-mail, não é necessário fazer validação do email. 

Achou algum bug? [Clique aqui e reporte](https://github.com/dshy1/PHP-Challenge-Laravel-2/issues/new)

**Gostou? Deixe sua estrelhinha aí em cima :)**

##### Quero baixar
  [Veja o projeto e as instruções de instalação](/src)


# O Desafio

  O desafio consiste em implementar uma aplicação Web utilizando o framework
PHP de seu conhecimento (de mercado ou caseiro), e um banco de dados relacional
SQLite, MySQL ou Postgres, a partir de uma modelagem de dados inicial
desnormalizada, que deve ser normalizada para a implementação da solução.

Você vai criar uma aplicação de cadastro de pedidos de compra, a partir de uma
modelagem inicial, com as seguintes funcionalidades:
- [x] CRUD de clientes.
- [x] CRUD de produtos.
- [x] CRUD de pedidos de compra, com status (Em Aberto, Pago ou Cancelado).
- Cada CRUD:
  - [x] o Deve ser filtrável e ordenável por qualquer campo, e possuir paginação
de 20 itens.
  - [x] Deve possuir formulários para criação e atualização de seus itens.
  - [x] Deve permitir a deleção de qualquer item de sua lista.
- [x] Barra de navegação entre os CRUDs.
- [x] Links para os outros CRUDs nas listagens (Ex: link para o detalhe do cliente da compra na lista de pedidos de compra)

Além disso, a implementação deste modelo em um banco de dados relacional
deve ser realizada levando em consideração as validações necessárias na camada que
julgar melhor.
Tecnologias a serem utilizadas
Devem ser utilizadas as seguintes tecnologias:
- HTML
- CSS
- Javascript
- PHP
- Git

---

### Modelagem de dados
| Column Name   | Data Type     |  PK |  AI | NULL|
|---------------|---------------|-----|-----|-----|
| NumeroPedido  | int           |  Y  |  Y  |  N  |
| NomeCliente   | varchar(100)  |  N  |  N  |  N  |
| CPF           | char(100)     |  N  |  N  |  N  |
| Email         | varchar(100)  |  N  |  N  |  Y  |
| dtPedido      | smallDateTime |  N  |  N  |  N  |
| CodBarras     | varchar(100)  |  N  |  N  |  N  |
| NomeProduto   | varchar(100)  |  N  |  N  |  Y  |
| ValorUnitario | money         |  N  |  N  |  N  |
| Quantidade    | int           |  N  |  N  |  N  |

Você deve alterar esta modelagem para que a mesma cumpra com as três
primeiras formas normais.
Além disso, a implementação deste modelo em um banco de dados relacional
deve ser realizada levando em consideração as validações necessárias na camada que
julgar melhor.

---

### Entrega
Criar um repositório em alguma plataforma gratuita de controle de versão (Git –
github por exemplo) e envie-nos o endereço para avaliação.

### Bônus
- [x] Implementar autenticação de usuário na aplicação.
- [x] Permitir que o usuário mude o número de itens por página.
- [x] Permitir deleção em massa de itens nos CRUDs.
- [x] Implementar aplicação de desconto em alguns pedidos de compra.
- [x] Implementar a camada de Front-End utilizando a biblioteca javascript Bootstrap e ser responsiva.
- [x] API Rest JSON para todos os CRUDS listados acima.
