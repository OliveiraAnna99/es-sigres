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
    // public function testExclusaoDeEstoqueInvalido()
    // {
    //     // Envia uma requisição para a rota de exclusão de estoque com um estoque inválido
    //     $response = $this->delete(route('estoques.delete', ['estoque_id' => 999]));

    //     // Verifica se a resposta redireciona de volta
    //     $response->assertRedirect();
    // }

    public function testCreate()
    {
        $response = $this->get(route('estoques.create'));

        $response->assertStatus(200);
        $response->assertViewIs('estoques.create');
    }

    public function testStore()
    {
        // Simula dados de estoque para enviar na requisição
        $estoqueData = [
            'item' => 'Item de Teste',
            'quant' => 10,
            'date' => '2023-06-15',
        ];

        // Envio de uma requisição POST para a rota de armazenamento de estoque
        $response = $this->post(route('estoques.store'), $estoqueData);

        // Verifica se o estoque foi criado corretamente no banco de dados
        $this->assertDatabaseHas('estoques', $estoqueData);

        // Verifica se a resposta redireciona para a rota de exibição do estoque criado
        $response->assertRedirect(route('estoques.show', Estoque::first()));
    }

    public function testDestroy()
    {
        // Cria um estoque de teste no banco de dados
        $estoque = Estoque::factory()->create();

        // Envia uma requisição DELETE para a rota de exclusão do estoque criado
        $response = $this->delete(route('estoques.destroy', $estoque));

        // Verifica se o estoque foi marcado como excluído (para exclusão suave)
        $this->assertSoftDeleted('estoques', ['id' => $estoque->id]);

        // Verifica se a resposta redireciona para a rota de listagem de estoques
        $response->assertRedirect(route('estoques.index'));
    }
}
