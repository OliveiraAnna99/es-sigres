<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class FuncionarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_funcionario_has_name_link_attribute()
    {
        $funcionario = Funcionario::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $funcionario->name, 'type' => __('funcionario.funcionario'),
        ]);
        $link = '<a href="'.route('funcionarios.show', $funcionario).'"';
        $link .= ' title="'.$title.'">';
        $link .= $funcionario->name;
        $link .= '</a>';

        $this->assertEquals($link, $funcionario->name_link);
    }

    /** @test */
    public function a_funcionario_has_belongs_to_creator_relation()
    {
        $funcionario = Funcionario::factory()->make();

        $this->assertInstanceOf(User::class, $funcionario->creator);
        $this->assertEquals($funcionario->creator_id, $funcionario->creator->id);
    }
}
