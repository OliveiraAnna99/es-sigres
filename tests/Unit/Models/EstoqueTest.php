<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Estoque;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EstoqueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_funcionario()
    {
        

        $data = [
            'item' => 'Item Teste',
            'quant' => 10,
            'dataNascimento' => '1990-01-01'
        ];

        $estoque = Estoque::create($data);

        $this->assertInstanceOf(Estoque::class, $estoque);
        $this->assertEquals($data['item'], $estoque->item);
        $this->assertEquals($data['quant'], $estoque->quant);
        $this->assertEquals($data['dataNascimento'], $estoque->dataNascimento);
     

    }

    /** @test */
    public function it_can_update_a_funcionario()
    {
        $estoque = Estoque::factory()->create();

        $data = [
            'item' => 'Item Teste',
            'quant' => 10,
            'dataNascimento' => '1990-01-01'
        ];

        $estoque->update($data);

        $this->assertEquals($data['item'], $estoque->item);
        $this->assertEquals($data['quant'], $estoque->quant);
        $this->assertEquals($data['dataNascimento'], $estoque->dataNascimento);
     
    }

    /** @test */
    public function it_can_delete_a_funcionario()
    {
        $estoque = Estoque::factory()->create();

        $estoque->delete();

        $this->assertDeleted($estoque);
    }
}
