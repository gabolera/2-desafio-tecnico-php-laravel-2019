<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    protected $fillable = ['nome','cpf','email','contatos'];
    
    protected $table = 'clientes';
}
