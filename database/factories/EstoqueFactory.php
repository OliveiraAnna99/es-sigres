<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Estoque;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstoqueFactory extends Factory
{
    protected $model = Estoque::class;

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
