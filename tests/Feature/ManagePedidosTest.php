<?php

namespace Tests\Feature;

use App\Models\Pedidos;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagePedidosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_pedidos_list_in_pedidos_index_page()
    {
        $pedidos = Pedidos::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('pedidos.index');
        $this->see($pedidos->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Pedidos 1 name',
            'description' => 'Pedidos 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_pedidos()
    {
        $this->loginAsUser();
        $this->visitRoute('pedidos.index');

        $this->click(__('pedidos.create'));
        $this->seeRouteIs('pedidos.create');

        $this->submitForm(__('pedidos.create'), $this->getCreateFields());

        $this->seeRouteIs('pedidos.show', Pedidos::first());

        $this->seeInDatabase('pedidos', $this->getCreateFields());
    }

    /** @test */
    public function validate_pedidos_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('pedidos.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_pedidos_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('pedidos.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_pedidos_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('pedidos.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Pedidos 1 name',
            'description' => 'Pedidos 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_pedidos()
    {
        $this->loginAsUser();
        $pedidos = Pedidos::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('pedidos.show', $pedidos);
        $this->click('edit-pedidos-'.$pedidos->id);
        $this->seeRouteIs('pedidos.edit', $pedidos);

        $this->submitForm(__('pedidos.update'), $this->getEditFields());

        $this->seeRouteIs('pedidos.show', $pedidos);

        $this->seeInDatabase('pedidos', $this->getEditFields([
            'id' => $pedidos->id,
        ]));
    }

    /** @test */
    public function validate_pedidos_name_update_is_required()
    {
        $this->loginAsUser();
        $pedidos = Pedidos::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('pedidos.update', $pedidos), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_pedidos_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $pedidos = Pedidos::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('pedidos.update', $pedidos), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_pedidos_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $pedidos = Pedidos::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('pedidos.update', $pedidos), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_pedidos()
    {
        $this->loginAsUser();
        $pedidos = Pedidos::factory()->create();
        Pedidos::factory()->create();

        $this->visitRoute('pedidos.edit', $pedidos);
        $this->click('del-pedidos-'.$pedidos->id);
        $this->seeRouteIs('pedidos.edit', [$pedidos, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('pedidos', [
            'id' => $pedidos->id,
        ]);
    }
}
