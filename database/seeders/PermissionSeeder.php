<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $guards = [
        [
            'name' => 'web',
            'permissions' => [
                'estoque.all',
                'estoque.read',
                'estoque.create',
                'estoque.update',
                'estoque.delete',
                'pedido.all',
                'pedido.read',
                'pedido.create',
                'pedido.update',
                'pedido.delete',
                'cardapio.all',
                'cardapio.read',
                'cardapio.create',
                'cardapio.update',
                'cardapio.delete',
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
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->guards as $guard) {
            foreach ($guard['permissions'] as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission,
                    'guard_name' => $guard['name']
                ]);
            }
        }
    }
}