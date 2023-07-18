<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardapioEstoque extends Model
{
    use HasFactory;

    protected $table = 'cardapio_estoque';


    public function estoques()
    {
        return $this->belongsToMany(Estoque::class, 'cardapio_estoque')
            ->using(CardapioEstoque::class);
    }
}
