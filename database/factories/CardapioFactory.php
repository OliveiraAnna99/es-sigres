<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Cardapio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardapioFactory extends Factory
{
    protected $model = Cardapio::class;

    public function definition()
    {
        return [
            'nome'        => "Pizza de Calabresa",
            'valor' => 30,
            'ingredientes' => 'Calabresa, molho de tomate, queijo mussarela',
            'status'  => 'pendente',
            'imagem' => "",
        ];
    }
}
