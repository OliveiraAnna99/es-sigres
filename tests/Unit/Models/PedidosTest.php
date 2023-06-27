<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Pedidos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PedidosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_pedidos_has_name_link_attribute()
    {
        $pedidos = Pedidos::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $pedidos->name, 'type' => __('pedidos.pedidos'),
        ]);
        $link = '<a href="'.route('pedidos.show', $pedidos).'"';
        $link .= ' title="'.$title.'">';
        $link .= $pedidos->name;
        $link .= '</a>';

        $this->assertEquals($link, $pedidos->name_link);
    }

    /** @test */
    public function a_pedidos_has_belongs_to_creator_relation()
    {
        $pedidos = Pedidos::factory()->make();

        $this->assertInstanceOf(User::class, $pedidos->creator);
        $this->assertEquals($pedidos->creator_id, $pedidos->creator->id);
    }
}
