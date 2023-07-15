<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Forma_pagamento' => 'App\Policies\Forma_pagamentoPolicy',
        'App\Models\Pedidos' => 'App\Policies\PedidosPolicy',
        'App\Models\Cardapio' => 'App\Policies\CardapioPolicy',
        'App\Models\Estoque' => 'App\Policies\EstoquePolicy',
        'App\Models\Funcionario' => 'App\Policies\FuncionarioPolicy',
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}