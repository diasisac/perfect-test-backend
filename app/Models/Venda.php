<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    protected $fillable = ['id','produto', 'data_venda', 'quantidade_produto', 'desconto', 'status_venda', 'fk_cliente', 'fk_produto'];

    public $timestamps = false;

}
