<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Estoque;

class EstoqueControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the destroy method of EstoqueController with permission.
     *
     * @return void
     */
       /**
     * Testa a exclusão de um estoque.
     *
     * @return void
     */
  
    /**
     * Testa a exclusão de um estoque inválido.
     *
     * @return void
     */
    public function testExclusaoDeEstoqueInvalido()
    {
        // Envia uma requisição para a rota de exclusão de estoque com um estoque inválido
        $response = $this->delete(route('estoques.delete', ['estoque_id' => 999]));

        // Verifica se a resposta redireciona de volta
        $response->assertRedirect();
    }

    // ...
}
