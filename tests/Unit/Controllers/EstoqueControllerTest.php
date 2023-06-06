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
    public function testDestroyWithPermission()
    {
        // Criar um usuário e um item de estoque no banco de dados
        $user = User::factory()->create();
        $estoque = Estoque::factory()->create();

        // Autenticar o usuário
        $this->actingAs($user);

        // Fazer uma requisição DELETE para a rota 'estoques.destroy' com o ID do item de estoque
        $response = $this->delete(route('estoques.destroy', $estoque));

        // Verificar se a resposta tem o status de redirecionamento (302)
        $response->assertStatus(302);

        // Verificar se o usuário é redirecionado para a rota 'estoques.index'
        $response->assertRedirect(route('estoques.index'));

        // Verificar se o item de estoque foi excluído do banco de dados
        $this->assertDatabaseMissing('estoques', ['id' => $estoque->id]);
    }

    // ...
}
