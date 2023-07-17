<?php
namespace Tests\Feature;

use App\Models\Cardapio;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ManageCardapioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_cardapio_list_in_cardapio_index_page()
    {
        $cardapio = Cardapio::factory()->create();

        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('cardapio.index'))
            ->assertSee($cardapio->nome);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'nome' => 'Cardapio Teste',
            'valor' => 10.99,
            'ingredientes' => 'Ingrediente 1, Ingrediente 2',
            'status' => 'ativo',
            'imagem' => 'imagem.png',
            // adicione outros campos necessários aqui
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_cardapio()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('cardapio.index'))
            ->click(__('cardapio.create'))
            ->seeRouteIs('cardapio.create')
            ->submitForm(__('cardapio.create'), $this->getCreateFields())
            ->seeRouteIs('cardapio.show', Cardapio::first())
            ->seeInDatabase('cardapios', $this->getCreateFields());
    }

    /** @test */
    public function validate_cardapio_nome_is_required()
    {
        $user = User::factory()->create();

        // nome vazio
        $this->actingAs($user)
            ->post(route('cardapio.store'), $this->getCreateFields(['nome' => '']))
            ->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_cardapio_nome_is_not_more_than_60_characters()
    {
        $user = User::factory()->create();

        // nome com mais de 60 caracteres
        $this->actingAs($user)
            ->post(route('cardapio.store'), $this->getCreateFields([
                'nome' => str_repeat('A', 61),
            ]))
            ->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_cardapio_valor_is_required()
    {
        $user = User::factory()->create();

        // valor vazio
        $this->actingAs($user)
            ->post(route('cardapio.store'), $this->getCreateFields(['valor' => '']))
            ->assertSessionHasErrors('valor');
    }

    /** @test */
    public function validate_cardapio_ingredientes_is_required()
    {
        $user = User::factory()->create();

        // ingredientes vazio
        $this->actingAs($user)
            ->post(route('cardapio.store'), $this->getCreateFields(['ingredientes' => '']))
            ->assertSessionHasErrors('ingredientes');
    }

    /** @test */
    public function validate_cardapio_status_is_required()
    {
        $user = User::factory()->create();

        // status vazio
        $this->actingAs($user)
            ->post(route('cardapio.store'), $this->getCreateFields(['status' => '']))
            ->assertSessionHasErrors('status');
    }

    // Resto dos testes...

    // ...
}
