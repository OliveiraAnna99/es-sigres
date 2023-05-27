<?php

namespace Tests\Unit\Policies;

use App\Models\Cardapio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class CardapioPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_cardapio()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Cardapio));
    }

    /** @test */
    public function user_can_view_cardapio()
    {
        $user = $this->createUser();
        $cardapio = Cardapio::factory()->create();
        $this->assertTrue($user->can('view', $cardapio));
    }

    /** @test */
    public function user_can_update_cardapio()
    {
        $user = $this->createUser();
        $cardapio = Cardapio::factory()->create();
        $this->assertTrue($user->can('update', $cardapio));
    }

    /** @test */
    public function user_can_delete_cardapio()
    {
        $user = $this->createUser();
        $cardapio = Cardapio::factory()->create();
        $this->assertTrue($user->can('delete', $cardapio));
    }
}