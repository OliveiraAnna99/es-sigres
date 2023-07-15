<?php

namespace Database\Seeders;

use App\Models\Estoque;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class EstoqueSeeder extends Seeder
{
    public function run()
    {
        $estoques = [
            [
                'item' => 'Cebola',
                'quant' => 12,
                'date' => '20/07/2014',
            ],
            [
                'item' => 'Tomate',
                'quant' => 34,
                'date' => '20/07/2014',
            ],
            [
                'item' => 'Pão',
                'quant' => 50,
                'date' => '24/07/2014',
            ],
            [
                'item' => 'Frango',
                'quant' => 50,
                'date' => '24/07/2014',
            ],
            [
                'item' => 'Presunto',
                'quant' => 50,
                'date' => '24/07/2014',
            ],
        ];

        foreach ($estoques as $estoqueToCreate) {
            $date = Carbon::createFromFormat('d/m/Y', $estoqueToCreate['date'])->format('Y-m-d');

            Estoque::firstOrCreate([
                'item' => $estoqueToCreate['item'],
                'quant' => $estoqueToCreate['quant'],
                'date' => $date,
            ]);
        }
    }
}
