<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Cardapio;
use App\Models\FormaPagamento;
class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_mesa',
        'forma_pagamento',
        'status',
        'obs',
        
       
        
    ];


    protected $casts = [
        'cardapio_id' => 'array',
    ];
    public function cardapios()
    {
        return $this->belongsToMany(Cardapios::class, 'cardapio_id');
    }
    public function forma_pagamentos()
    {
        return $this->belongsToMany(FormaPagamento::class, 'forma_pagamento_id');
    }
}
