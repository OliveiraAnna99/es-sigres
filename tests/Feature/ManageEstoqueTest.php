<?php

namespace Tests\Feature;

use App\Models\Estoque;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageEstoqueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_estoque_list_in_estoque_index_page()
    {
        $estoque = Estoque::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('estoques.index');
        $this->see($estoque->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Estoque 1 name',
            'description' => 'Estoque 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_estoque()
    {
        $this->loginAsUser();
        $this->visitRoute('estoques.index');

        $this->click(__('estoque.create'));
        $this->seeRouteIs('estoques.create');

        $this->submitForm(__('estoque.create'), $this->getCreateFields());

        $this->seeRouteIs('estoques.show', Estoque::first());

        $this->seeInDatabase('estoques', $this->getCreateFields());
    }

    /** @test */
    public function validate_estoque_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('estoques.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_estoque_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('estoques.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_estoque_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('estoques.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Estoque 1 name',
            'description' => 'Estoque 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_estoque()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('estoques.show', $estoque);
        $this->click('edit-estoque-'.$estoque->id);
        $this->seeRouteIs('estoques.edit', $estoque);

        $this->submitForm(__('estoque.update'), $this->getEditFields());

        $this->seeRouteIs('estoques.show', $estoque);

        $this->seeInDatabase('estoques', $this->getEditFields([
            'id' => $estoque->id,
        ]));
    }

    /** @test */
    public function validate_estoque_name_update_is_required()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('estoques.update', $estoque), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_estoque_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('estoques.update', $estoque), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_estoque_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('estoques.update', $estoque), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_estoque()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create();
        Estoque::factory()->create();

        $this->visitRoute('estoques.edit', $estoque);
        $this->click('del-estoque-'.$estoque->id);
        $this->seeRouteIs('estoques.edit', [$estoque, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('estoques', [
            'id' => $estoque->id,
        ]);
    }
}
