<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Auth\Access\HandlesAuthorization;

class FuncionarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the funcionario.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcionario  $funcionario
     * @return mixed
     */
    public function view(User $user, Funcionario $funcionario)
    {
        // Update $user authorization to view $funcionario here.
        return true;
    }

    /**
     * Determine whether the user can create funcionario.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcionario  $funcionario
     * @return mixed
     */
    public function create(User $user, Funcionario $funcionario)
    {
        // Update $user authorization to create $funcionario here.
        return true;
    }

    /**
     * Determine whether the user can update the funcionario.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcionario  $funcionario
     * @return mixed
     */
    public function update(User $user, Funcionario $funcionario)
    {
        // Update $user authorization to update $funcionario here.
        return true;
    }

    /**
     * Determine whether the user can delete the funcionario.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Funcionario  $funcionario
     * @return mixed
     */
    public function delete(User $user, Funcionario $funcionario)
    {
        // Update $user authorization to delete $funcionario here.
        return true;
    }
}
