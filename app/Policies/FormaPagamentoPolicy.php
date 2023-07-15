<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FormaPagamento;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormaPagamentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the forma_pagamento.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FormaPagamento  $formaPagamento
     * @return mixed
     */
    public function view(User $user, FormaPagamento $formaPagamento)
    {
        // Update $user authorization to view $formaPagamento here.
        return true;
    }

    /**
     * Determine whether the user can create forma_pagamento.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FormaPagamento  $formaPagamento
     * @return mixed
     */
    public function create(User $user, FormaPagamento $formaPagamento)
    {
        // Update $user authorization to create $formaPagamento here.
        return true;
    }

    /**
     * Determine whether the user can update the forma_pagamento.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FormaPagamento  $formaPagamento
     * @return mixed
     */
    public function update(User $user, FormaPagamento $formaPagamento)
    {
        // Update $user authorization to update $formaPagamento here.
        return true;
    }

    /**
     * Determine whether the user can delete the forma_pagamento.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FormaPagamento  $formaPagamento
     * @return mixed
     */
    public function delete(User $user, FormaPagamento $formaPagamento)
    {
        // Update $user authorization to delete $formaPagamento here.
        return true;
    }
}
