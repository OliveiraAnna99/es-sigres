<?php

namespace Tests\Unit\Policies;

use App\Models\Funcionario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class FuncionarioPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_funcionario()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Funcionario));
    }

    /** @test */
    public function user_can_view_funcionario()
    {
        $user = $this->createUser();
        $funcionario = Funcionario::factory()->create();
        $this->assertTrue($user->can('view', $funcionario));
    }

    /** @test */
    public function user_can_update_funcionario()
    {
        $user = $this->createUser();
        $funcionario = Funcionario::factory()->create();
        $this->assertTrue($user->can('update', $funcionario));
    }

    /** @test */
    public function user_can_delete_funcionario()
    {
        $user = $this->createUser();
        $funcionario = Funcionario::factory()->create();
        $this->assertTrue($user->can('delete', $funcionario));
    }
}
