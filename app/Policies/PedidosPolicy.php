<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pedidos;
use Illuminate\Auth\Access\HandlesAuthorization;

class PedidosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pedidos.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedidos  $pedidos
     * @return mixed
     */
    public function view(User $user, Pedidos $pedidos)
    {
        // Update $user authorization to view $pedidos here.
        return true;
    }

    /**
     * Determine whether the user can create pedidos.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedidos  $pedidos
     * @return mixed
     */
    public function create(User $user, Pedidos $pedidos)
    {
        // Update $user authorization to create $pedidos here.
        return true;
    }

    /**
     * Determine whether the user can update the pedidos.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedidos  $pedidos
     * @return mixed
     */
    public function update(User $user, Pedidos $pedidos)
    {
        // Update $user authorization to update $pedidos here.
        return true;
    }

    /**
     * Determine whether the user can delete the pedidos.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedidos  $pedidos
     * @return mixed
     */
    public function delete(User $user, Pedidos $pedidos)
    {
        // Update $user authorization to delete $pedidos here.
        return true;
    }
}
