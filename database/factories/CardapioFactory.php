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
            'name'        => $this->faker->word,
            'description' => $this->faker->sentence,
            'creator_id'  => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}