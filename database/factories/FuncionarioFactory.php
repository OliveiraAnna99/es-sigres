<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
{
    protected $model = Funcionario::class;

    public function definition()
    {
        return [
            'nome' => 'Novo nome',
            'cpf' => '12345678901',
            'endereco' => 'Novo endereco',
            'contato' => '123456789',
            'rg' => '12345678',
            'dataNascimento' => '1990-01-01',
            'funcao' => 'Nova funcao',
            'login' => 'israel',
        ];
    }
}
