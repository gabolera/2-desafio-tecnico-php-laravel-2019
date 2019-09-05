<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id','vendedor_id','pedidos','valorTotal','desconto','subTotal','dataPedido'];
}
