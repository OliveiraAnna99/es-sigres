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
        $this->see($estoque->item);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'item'        => 'Item 1',
            'quant'       => 10,
            'date'        => '2023-06-06',
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
    public function validate_estoque_item_is_required()
    {
        $this->loginAsUser();

        // item empty
        $this->post(route('estoques.store'), $this->getCreateFields(['item' => '']));
        $this->assertSessionHasErrors('item');
    }

    /** @test */
    public function validate_estoque_quant_is_required()
    {
        $this->loginAsUser();

        // quant empty
        $this->post(route('estoques.store'), $this->getCreateFields(['quant' => '']));
        $this->assertSessionHasErrors('quant');
    }

    /** @test */
    public function validate_estoque_quant_is_numeric()
    {
        $this->loginAsUser();

        // quant non-numeric
        $this->post(route('estoques.store'), $this->getCreateFields(['quant' => 'abc']));
        $this->assertSessionHasErrors('quant');
    }

    /** @test */
    public function validate_estoque_date_is_required()
    {
        $this->loginAsUser();

        // date empty
        $this->post(route('estoques.store'), $this->getCreateFields(['date' => '']));
        $this->assertSessionHasErrors('date');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'item'        => 'Item 1',
            'quant'       => 10,
            'date'        => '2023-06-06',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_estoque()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['item' => 'Testing 123']);

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
    public function validate_estoque_item_update_is_required()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['item' => 'Testing 123']);

        // item empty
        $this->patch(route('estoques.update', $estoque), $this->getEditFields(['item' => '']));
        $this->assertSessionHasErrors('item');
    }

    /** @test */
    public function validate_estoque_quant_update_is_required()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['item' => 'Testing 123']);

        // quant empty
        $this->patch(route('estoques.update', $estoque), $this->getEditFields(['quant' => '']));
        $this->assertSessionHasErrors('quant');
    }

    /** @test */
    public function validate_estoque_quant_update_is_numeric()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['item' => 'Testing 123']);

        // quant non-numeric
        $this->patch(route('estoques.update', $estoque), $this->getEditFields(['quant' => 'abc']));
        $this->assertSessionHasErrors('quant');
    }

    /** @test */
    public function validate_estoque_date_update_is_required()
    {
        $this->loginAsUser();
        $estoque = Estoque::factory()->create(['item' => 'Testing 123']);

        // date empty
        $this->patch(route('estoques.update', $estoque), $this->getEditFields(['date' => '']));
        $this->assertSessionHasErrors('date');
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