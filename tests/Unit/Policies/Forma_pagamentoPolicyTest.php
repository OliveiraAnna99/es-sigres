<?php

namespace Tests\Unit\Policies;

use App\Models\Forma_pagamento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class Forma_pagamentoPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_forma_pagamento()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Forma_pagamento));
    }

    /** @test */
    public function user_can_view_forma_pagamento()
    {
        $user = $this->createUser();
        $formaPagamento = Forma_pagamento::factory()->create();
        $this->assertTrue($user->can('view', $formaPagamento));
    }

    /** @test */
    public function user_can_update_forma_pagamento()
    {
        $user = $this->createUser();
        $formaPagamento = Forma_pagamento::factory()->create();
        $this->assertTrue($user->can('update', $formaPagamento));
    }

    /** @test */
    public function user_can_delete_forma_pagamento()
    {
        $user = $this->createUser();
        $formaPagamento = Forma_pagamento::factory()->create();
        $this->assertTrue($user->can('delete', $formaPagamento));
    }
}
