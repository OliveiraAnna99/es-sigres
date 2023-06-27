<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Estoque;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class EstoqueFactory extends Factory
{
    protected $model = Estoque::class;

    public function definition()
    {
        return [
            'item'        => 'Milho',
            'quant' => 10,
            'date'  => '2023-06-06 13:33:46',
        ];
    }
}
