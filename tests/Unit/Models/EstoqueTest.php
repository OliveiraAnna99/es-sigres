<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Estoque;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class EstoqueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_estoque_has_name_link_attribute()
    {
        $estoque = Estoque::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $estoque->name, 'type' => __('estoque.estoque'),
        ]);
        $link = '<a href="'.route('estoques.show', $estoque).'"';
        $link .= ' title="'.$title.'">';
        $link .= $estoque->name;
        $link .= '</a>';

        $this->assertEquals($link, $estoque->name_link);
    }

    /** @test */
    public function a_estoque_has_belongs_to_creator_relation()
    {
        $estoque = Estoque::factory()->make();

        $this->assertInstanceOf(User::class, $estoque->creator);
        $this->assertEquals($estoque->creator_id, $estoque->creator->id);
    }
}
