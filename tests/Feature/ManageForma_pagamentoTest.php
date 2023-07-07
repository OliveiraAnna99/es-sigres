<?php

namespace Tests\Feature;

use App\Models\Forma_pagamento;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageForma_pagamentoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_forma_pagamento_list_in_forma_pagamento_index_page()
    {
        $formaPagamento = Forma_pagamento::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('forma_pagamentos.index');
        $this->see($formaPagamento->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Forma_pagamento 1 name',
            'description' => 'Forma_pagamento 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_forma_pagamento()
    {
        $this->loginAsUser();
        $this->visitRoute('forma_pagamentos.index');

        $this->click(__('forma_pagamento.create'));
        $this->seeRouteIs('forma_pagamentos.create');

        $this->submitForm(__('forma_pagamento.create'), $this->getCreateFields());

        $this->seeRouteIs('forma_pagamentos.show', Forma_pagamento::first());

        $this->seeInDatabase('forma_pagamentos', $this->getCreateFields());
    }

    /** @test */
    public function validate_forma_pagamento_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('forma_pagamentos.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_forma_pagamento_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('forma_pagamentos.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_forma_pagamento_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('forma_pagamentos.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Forma_pagamento 1 name',
            'description' => 'Forma_pagamento 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_forma_pagamento()
    {
        $this->loginAsUser();
        $formaPagamento = Forma_pagamento::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('forma_pagamentos.show', $formaPagamento);
        $this->click('edit-forma_pagamento-'.$formaPagamento->id);
        $this->seeRouteIs('forma_pagamentos.edit', $formaPagamento);

        $this->submitForm(__('forma_pagamento.update'), $this->getEditFields());

        $this->seeRouteIs('forma_pagamentos.show', $formaPagamento);

        $this->seeInDatabase('forma_pagamentos', $this->getEditFields([
            'id' => $formaPagamento->id,
        ]));
    }

    /** @test */
    public function validate_forma_pagamento_name_update_is_required()
    {
        $this->loginAsUser();
        $forma_pagamento = Forma_pagamento::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('forma_pagamentos.update', $forma_pagamento), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_forma_pagamento_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $forma_pagamento = Forma_pagamento::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('forma_pagamentos.update', $forma_pagamento), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_forma_pagamento_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $forma_pagamento = Forma_pagamento::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('forma_pagamentos.update', $forma_pagamento), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_forma_pagamento()
    {
        $this->loginAsUser();
        $formaPagamento = Forma_pagamento::factory()->create();
        Forma_pagamento::factory()->create();

        $this->visitRoute('forma_pagamentos.edit', $formaPagamento);
        $this->click('del-forma_pagamento-'.$formaPagamento->id);
        $this->seeRouteIs('forma_pagamentos.edit', [$formaPagamento, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('forma_pagamentos', [
            'id' => $formaPagamento->id,
        ]);
    }
}
