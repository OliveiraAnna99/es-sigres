<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cardapio;
use App\Models\FormaPagamento;

class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_mesa',
        'status',
        'forma_pagamento_id',
        'obs',
    ];

    public function cardapios()
    {
        return $this->belongsToMany(Cardapio::class, 'pedidos_cardapio');
    }

    public function forma_pagamentos()
    {
        return $this->belongsTo(FormaPagamento::class, 'forma_pagamento_id');
    }
}
