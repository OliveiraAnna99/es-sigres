<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;

class Cardapio extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor'];

    public function estoques()
    {
        return $this->belongsToMany(Estoque::class, 'cardapio_estoque')
            ->using(CardapioEstoque::class);
    }
}
