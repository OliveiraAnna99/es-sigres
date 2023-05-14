<?php

namespace Tests\Unit\Policies;

use App\Models\Estoque;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class EstoquePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_estoque()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Estoque));
    }

    /** @test */
    public function user_can_view_estoque()
    {
        $user = $this->createUser();
        $estoque = Estoque::factory()->create();
        $this->assertTrue($user->can('view', $estoque));
    }

    /** @test */
    public function user_can_update_estoque()
    {
        $user = $this->createUser();
        $estoque = Estoque::factory()->create();
        $this->assertTrue($user->can('update', $estoque));
    }

    /** @test */
    public function user_can_delete_estoque()
    {
        $user = $this->createUser();
        $estoque = Estoque::factory()->create();
        $this->assertTrue($user->can('delete', $estoque));
    }
}
