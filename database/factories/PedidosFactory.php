<?php

namespace Database\Factories;

use App\Models\Cardapio;
use App\Models\Pedidos;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidosFactory extends Factory
{
    protected $model = Pedidos::class;

    public function definition()
    {
        return [
            'status'        => $this->faker->word,
            'numero_mesa' => $this->faker->word,
            'cardapio_id'  => function () {
                return Cardapio::factory()->create()->id;
            },
        ];
    }
}
