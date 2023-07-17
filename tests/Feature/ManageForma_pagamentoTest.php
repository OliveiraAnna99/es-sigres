<?php
namespace Tests\Feature;

use App\Models\FormaPagamento;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ManageFormaPagamentosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_forma_pagamentos_list_in_forma_pagamentos_index_page()
    {
        $formaPagamento = FormaPagamento::factory()->create();

        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('formaPagamentos.index'))
            ->assertSee($formaPagamento->nome);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'nome' => 'Forma de Pagamento Teste',
            // adicione outros campos necessários aqui
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_forma_pagamento()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('formaPagamentos.index'))
            ->click(__('formaPagamentos.create'))
            ->seeRouteIs('formaPagamentos.create')
            ->submitForm(__('formaPagamentos.create'), $this->getCreateFields())
            ->seeRouteIs('formaPagamentos.show', FormaPagamento::first())
            ->seeInDatabase('forma_pagamentos', $this->getCreateFields());
    }

    /** @test */
    public function user_can_delete_a_forma_pagamento()
    {
        $user = User::factory()->create();
        $formaPagamento = FormaPagamento::factory()->create();
        FormaPagamento::factory()->create();

        $this->actingAs($user)
            ->get(route('formaPagamentos.edit', $formaPagamento))
            ->click('del-formaPagamentos-'.$formaPagamento->id)
            ->seeRouteIs('formaPagamentos.edit', [$formaPagamento, 'action' => 'delete'])
            ->press(__('app.delete_confirm_button'))
            ->dontSeeInDatabase('forma_pagamentos', [
                'id' => $formaPagamento->id,
            ]);
    }

    // Resto dos testes...

    // ...
}
