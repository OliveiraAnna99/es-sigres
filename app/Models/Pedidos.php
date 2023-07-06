<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Cardapio;
class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_mesa',
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
}
