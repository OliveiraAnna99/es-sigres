<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Forma_pagamento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class Forma_pagamentoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_forma_pagamento_has_name_link_attribute()
    {
        $formaPagamento = Forma_pagamento::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $formaPagamento->name, 'type' => __('forma_pagamento.forma_pagamento'),
        ]);
        $link = '<a href="'.route('forma_pagamentos.show', $formaPagamento).'"';
        $link .= ' title="'.$title.'">';
        $link .= $formaPagamento->name;
        $link .= '</a>';

        $this->assertEquals($link, $formaPagamento->name_link);
    }

    /** @test */
    public function a_forma_pagamento_has_belongs_to_creator_relation()
    {
        $formaPagamento = Forma_pagamento::factory()->make();

        $this->assertInstanceOf(User::class, $formaPagamento->creator);
        $this->assertEquals($formaPagamento->creator_id, $formaPagamento->creator->id);
    }
}
