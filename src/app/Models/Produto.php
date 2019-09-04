<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','valor_compra','valor_venda','barCode','qrCode'];
}
