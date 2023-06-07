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

        public function test_new_cardapio_can_be_created()
    {
        $data = [
            'nome' => 'Novo Cardápio',
            'valor' => '10.99',
            'ingredientes' => 'Ingrediente 1, Ingrediente 2',
            'status' => 'pendente',
            'imagem' => UploadedFile::fake()->image('cardapio.jpg'),
        ];

        $response = $this->post('/cardapios', $data);

        $response->assertStatus(302);
        $response->assertRedirect('/cardapios/1');

        $this->assertDatabaseHas('cardapios', [
            'nome' => 'Novo Cardápio',
            'valor' => '10.99',
            'ingredientes' => 'Ingrediente 1, Ingrediente 2',
            'status' => 'pendente',
        ]);
    }


    public function test_delete_cardapio()
    {
        $cardapio = Cardapio::factory()->create();

        $response = $this->delete(route('cardapios.destroy', $cardapio), [
            'cardapio_id' => $cardapio->id,
        ]);

        $response->assertRedirect(route('cardapios.index'));
        $this->assertDeleted($cardapio);
    }
    
    public function test_create_form_can_be_rendered()
    {
        $response = $this->get('/cardapios/create');

        $response->assertStatus(200);
        $response->assertViewIs('cardapios.create');
    }

}

