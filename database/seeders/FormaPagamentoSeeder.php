<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class FormaPagamentoSeeder extends Seeder
{
    public function run()
    {
        $fps = [
            [
                'nome' => 'Cartão de Crédito',
                
            ],
            [
                'nome' => 'Cartão de Debito'
            ],
         
        ];

        foreach ($fps as $fpsToCreate) {

            FormaPagamento::firstOrCreate([
                'nome' => $fpsToCreate['nome'],
            ]);
        }
    }
}
