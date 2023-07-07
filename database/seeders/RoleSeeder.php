<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private $roles = [
        [
            'name' => 'Dono',
            'permissions' => [
                'cardapio.all',
                'cardapio.read',
                'cardapio.create',
                'cardapio.update',
                'cardapio.delete',
                'pedido.all',
                'pedido.read',
                'pedido.create',
                'pedido.update',
                'pedido.delete',
                'estoque.all',
                'estoque.read',
                'estoque.create',
                'estoque.update',
                'estoque.delete',
                'funcionario.all',
                'funcionario.read',
                'funcionario.create',
                'funcionario.update',
                'funcionario.delete',
                'forma_pagamento.all',
                'forma_pagamento.read',
                'forma_pagamento.create',
                'forma_pagamento.update',
                'forma_pagamento.delete',
               
               
            ]
        ],
        [
            'name' => 'Funcionario',
            'permissions' => [
                'cardapio.all',
                'cardapio.read',
                'cardapio.create',
                'cardapio.update',
                'cardapio.delete',
                'pedido.all',
                'pedido.read',
                'pedido.create',
                'pedido.update',
                'pedido.delete',
                'estoque.all',
                'estoque.read',
                'estoque.create',
                'estoque.update',
                'estoque.delete',
                'forma_pagamento.all',
                'forma_pagamento.read',
                'forma_pagamento.create',
                'forma_pagamento.update',
                'forma_pagamento.delete',
              
            ]
        ],
        
    ];

    public function run()
    {
        foreach ($this->roles as $roleToCreate) {
            $role = Role::firstOrCreate([
                'name' => $roleToCreate['name']
            ]);

            if (count($roleToCreate['permissions']) > 0) {
                $role->syncPermissions($roleToCreate['permissions']);
            }
        }
    }
}