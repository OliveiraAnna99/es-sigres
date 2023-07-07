<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Forma_pagamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class Forma_pagamentoFactory extends Factory
{
    protected $model = Forma_pagamento::class;

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
