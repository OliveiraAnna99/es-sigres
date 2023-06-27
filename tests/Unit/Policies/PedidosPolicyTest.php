<?php

namespace Tests\Unit\Policies;

use App\Models\Pedidos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PedidosPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_pedidos()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Pedidos));
    }

    /** @test */
    public function user_can_view_pedidos()
    {
        $user = $this->createUser();
        $pedidos = Pedidos::factory()->create();
        $this->assertTrue($user->can('view', $pedidos));
    }

    /** @test */
    public function user_can_update_pedidos()
    {
        $user = $this->createUser();
        $pedidos = Pedidos::factory()->create();
        $this->assertTrue($user->can('update', $pedidos));
    }

    /** @test */
    public function user_can_delete_pedidos()
    {
        $user = $this->createUser();
        $pedidos = Pedidos::factory()->create();
        $this->assertTrue($user->can('delete', $pedidos));
    }
}
