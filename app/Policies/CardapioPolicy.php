<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cardapio;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardapioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cardapio.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cardapio  $cardapio
     * @return mixed
     */
    public function view(User $user, Cardapio $cardapio)
    {
        // Update $user authorization to view $cardapio here.
        return true;
    }

    /**
     * Determine whether the user can create cardapio.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cardapio  $cardapio
     * @return mixed
     */
    public function create(User $user, Cardapio $cardapio)
    {
        // Update $user authorization to create $cardapio here.
        return true;
    }

    /**
     * Determine whether the user can update the cardapio.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cardapio  $cardapio
     * @return mixed
     */
    public function update(User $user, Cardapio $cardapio)
    {
        // Update $user authorization to update $cardapio here.
        return true;
    }

    /**
     * Determine whether the user can delete the cardapio.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cardapio  $cardapio
     * @return mixed
     */
    public function delete(User $user, Cardapio $cardapio)
    {
        // Update $user authorization to delete $cardapio here.
        return true;
    }
}