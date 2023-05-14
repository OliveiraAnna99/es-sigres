<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Estoque;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstoquePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the estoque.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Estoque  $estoque
     * @return mixed
     */
    public function view(User $user, Estoque $estoque)
    {
        // Update $user authorization to view $estoque here.
        return true;
    }

    /**
     * Determine whether the user can create estoque.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Estoque  $estoque
     * @return mixed
     */
    public function create(User $user, Estoque $estoque)
    {
        // Update $user authorization to create $estoque here.
        return true;
    }

    /**
     * Determine whether the user can update the estoque.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Estoque  $estoque
     * @return mixed
     */
    public function update(User $user, Estoque $estoque)
    {
        // Update $user authorization to update $estoque here.
        return true;
    }

    /**
     * Determine whether the user can delete the estoque.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Estoque  $estoque
     * @return mixed
     */
    public function delete(User $user, Estoque $estoque)
    {
        // Update $user authorization to delete $estoque here.
        return true;
    }
}
