<?php

namespace Tests\Feature;

use App\Models\Cardapio;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageCardapioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_cardapio_list_in_cardapio_index_page()
    {
        $cardapio = Cardapio::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('cardapios.index');
        $this->see($cardapio->nome);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'nome'        => 'Cardapio 1 nome',
            'valor'       => 'Cardapio 1 valor',
            'ingredientes' => 'Cardapio 1 ingredientes',
            'status'      => 'Cardapio 1 status',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_cardapio()
    {
        $this->loginAsUser();
        $this->visitRoute('cardapios.index');

        $this->click(__('cardapio.create'));
        $this->seeRouteIs('cardapios.create');

        $this->submitForm(__('cardapio.create'), $this->getCreateFields());

        $this->seeRouteIs('cardapios.show', Cardapio::first());

        $this->seeInDatabase('cardapios', $this->getCreateFields());
    }

    /** @test */
    public function validate_cardapio_nome_is_required()
    {
        $this->loginAsUser();

        // nome empty
        $this->post(route('cardapios.store'), $this->getCreateFields(['nome' => '']));
        $this->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_cardapio_nome_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // nome 70 characters
        $this->post(route('cardapios.store'), $this->getCreateFields([
            'nome' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_cardapio_valor_is_required()
    {
        $this->loginAsUser();

        // valor empty
        $this->post(route('cardapios.store'), $this->getCreateFields(['valor' => '']));
        $this->assertSessionHasErrors('valor');
    }

    /** @test */
    public function validate_cardapio_ingredientes_is_required()
    {
        $this->loginAsUser();

        // ingredientes empty
        $this->post(route('cardapios.store'), $this->getCreateFields(['ingredientes' => '']));
        $this->assertSessionHasErrors('ingredientes');
    }

    /** @test */
    public function validate_cardapio_status_is_required()
    {
        $this->loginAsUser();

        // status empty
        $this->post(route('cardapios.store'), $this->getCreateFields(['status' => '']));
        $this->assertSessionHasErrors('status');
    }


    /** @test */
    public function validate_cardapio_nome_update_is_required()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['nome' => 'Testing 123']);

        // nome empty
        $this->patch(route('cardapios.update', $cardapio), $this->getCreateFields(['nome' => '']));
        $this->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_cardapio_nome_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['nome' => 'Testing 123']);

        // nome 70 characters
        $this->patch(route('cardapios.update', $cardapio), $this->getCreateFields([
            'nome' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_cardapio_valor_update_is_required()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['nome' => 'Testing 123']);

        // valor empty
        $this->patch(route('cardapios.update', $cardapio), $this->getCreateFields(['valor' => '']));
        $this->assertSessionHasErrors('valor');
    }

    /** @test */
    public function validate_cardapio_ingredientes_update_is_required()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['nome' => 'Testing 123']);

        // ingredientes empty
        $this->patch(route('cardapios.update', $cardapio), $this->getCreateFields(['ingredientes' => '']));
        $this->assertSessionHasErrors('ingredientes');
    }

    /** @test */
    public function validate_cardapio_status_update_is_required()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['nome' => 'Testing 123']);

        // status empty
        $this->patch(route('cardapios.update', $cardapio), $this->getCreateFields(['status' => '']));
        $this->assertSessionHasErrors('status');
    }

    /** @test */
    public function validate_cardapio_imagem_update_is_required()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['nome' => 'Testing 123']);

 
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'nome'        => 'Cardapio 1 nome',
            'valor'       => 'Cardapio 1 valor',
            'ingredientes' => 'Cardapio 1 ingredientes',
            'status'      => 'Cardapio 1 status',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_cardapio()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['nome' => 'Testing 123']);

        $this->visitRoute('cardapios.show', $cardapio);
        $this->click('edit-cardapio-'.$cardapio->id);
        $this->seeRouteIs('cardapios.edit', $cardapio);

        $this->submitForm(__('cardapio.update'), $this->getEditFields());

        $this->seeRouteIs('cardapios.show', $cardapio);

        $this->seeInDatabase('cardapios', $this->getEditFields([
            'id' => $cardapio->id,
        ]));
    }

    /** @test */
    public function user_can_delete_a_cardapio()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create();
        Cardapio::factory()->create();

        $this->visitRoute('cardapios.edit', $cardapio);
        $this->click('del-cardapio-'.$cardapio->id);
        $this->seeRouteIs('cardapios.edit', [$cardapio, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('cardapios', [
            'id' => $cardapio->id,
        ]);
    }
}