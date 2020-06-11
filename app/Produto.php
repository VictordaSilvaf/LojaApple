<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',         //Nome do produto
        'src',          //Imagem do produto
        'preco',        //Preco do produto
        'descricao',    //descricao do produto
        'categoria',     //categoria produtos
        'ativo'
    ];
}
