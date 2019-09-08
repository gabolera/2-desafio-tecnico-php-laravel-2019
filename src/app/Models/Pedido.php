<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;
use App\Models\Cliente;

class Pedido extends Model
{
    protected $fillable = ['cliente_id','vendedor_id','pedidos','valorTotal','desconto','subTotal','dataPedido'];

    protected $casts = [
        'pedidos' => 'array',
    ];

    public function getClient(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }

    public function getVendedor(){
        return $this->belongsTo('App\User', 'vendedor_id');
    }

}
