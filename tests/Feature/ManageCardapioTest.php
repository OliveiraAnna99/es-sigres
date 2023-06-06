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
        $this->see($cardapio->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Cardapio 1 name',
            'description' => 'Cardapio 1 description',
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
    public function validate_cardapio_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('cardapios.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_cardapio_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('cardapios.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_cardapio_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('cardapios.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Cardapio 1 name',
            'description' => 'Cardapio 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_cardapio()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['name' => 'Testing 123']);

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
    public function validate_cardapio_name_update_is_required()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('cardapios.update', $cardapio), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_cardapio_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('cardapios.update', $cardapio), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_cardapio_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $cardapio = Cardapio::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('cardapios.update', $cardapio), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
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