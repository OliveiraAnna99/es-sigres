<?php


namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cardapio;

class CardapioControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method of CardapioController.
     *
     * @return void
     */
    public function testIndex()
    {
        // Criar alguns registros de exemplo no banco de dados
        Cardapio::factory()->count(5)->create();

        // Fazer uma requisição GET para a rota 'cardapios.index'
        $response = $this->get(route('cardapios.index'));

        // Verificar se a resposta tem o status de sucesso (200)
        $response->assertStatus(200);

        // Verificar se a view 'cardapios.index' está sendo retornada
        $response->assertViewIs('cardapios.index');

        // Verificar se a variável 'cardapios' está sendo passada para a view
        $response->assertViewHas('cardapios');

        // Verificar se a variável 'cardapios' contém uma coleção de cardápios
        $cardapios = $response->viewData('cardapios');
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $cardapios);
    }

    /**
     * Test the create method of CardapioController.
     *
     * @return void
     */
    public function testCreate()
    {
        // Fazer uma requisição GET para a rota 'cardapios.create'
        $response = $this->get(route('cardapios.create'));

        // Verificar se a resposta tem o status de sucesso (200)
        $response->assertStatus(200);

        // Verificar se a view 'cardapios.create' está sendo retornada
        $response->assertViewIs('cardapios.create');
    }

    // Adicione os outros métodos de teste (store, show, edit, update, destroy) conforme necessário

    // ...
}
