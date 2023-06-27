<?php

namespace Tests\Feature;

use App\Models\Funcionario;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageFuncionarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_funcionario_list_in_funcionario_index_page()
    {
        $funcionario = Funcionario::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('funcionarios.index');
        $this->see($funcionario->nome);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'nome' => 'Funcionario 1 nome',
            'cpf' => '12345678901',
            'endereco' => 'Endereço do funcionário',
            'contato' => '1234567890',
            'rg' => '1234567',
            'dataNascimento' => '1990-01-01',
            'funcao' => 'Função do funcionário',
            'login' => 'login_do_funcionario',
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_funcionario()
    {
        $this->loginAsUser();
        $this->visitRoute('funcionarios.index');

        $this->click(__('funcionario.create'));
        $this->seeRouteIs('funcionarios.create');

        $this->submitForm(__('funcionario.create'), $this->getCreateFields());

        $this->seeRouteIs('funcionarios.show', Funcionario::first());

        $this->seeInDatabase('funcionarios', $this->getCreateFields());
    }

    /** @test */
    public function validate_funcionario_nome_is_required()
    {
        $this->loginAsUser();

        // nome empty
        $this->post(route('funcionarios.store'), $this->getCreateFields(['nome' => '']));
        $this->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_funcionario_cpf_is_required()
    {
        $this->loginAsUser();

        // cpf empty
        $this->post(route('funcionarios.store'), $this->getCreateFields(['cpf' => '']));
        $this->assertSessionHasErrors('cpf');
    }

    // Rest of the validation tests...

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'nome' => 'Funcionario 1 nome',
            'cpf' => '12345678901',
            'endereco' => 'Endereço do funcionário',
            'contato' => '1234567890',
            'rg' => '1234567',
            'dataNascimento' => '1990-01-01',
            'funcao' => 'Função do funcionário',
            'login' => 'login_do_funcionario',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_funcionario()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create(['nome' => 'Testing 123']);

        $this->visitRoute('funcionarios.show', $funcionario);
        $this->click('edit-funcionario-'.$funcionario->id);
        $this->seeRouteIs('funcionarios.edit', $funcionario);

        $this->submitForm(__('funcionario.update'), $this->getEditFields());

        $this->seeRouteIs('funcionarios.show', $funcionario);

        $this->seeInDatabase('funcionarios', $this->getEditFields([
            'id' => $funcionario->id,
        ]));
    }

    /** @test */
    public function validate_funcionario_nome_update_is_required()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create(['nome' => 'Testing 123']);

        // nome empty
        $this->patch(route('funcionarios.update', $funcionario), $this->getEditFields(['nome' => '']));
        $this->assertSessionHasErrors('nome');
    }

    /** @test */
    public function validate_funcionario_cpf_update_is_required()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create(['nome' => 'Testing 123']);

        // cpf empty
        $this->patch(route('funcionarios.update', $funcionario), $this->getEditFields(['cpf' => '']));
        $this->assertSessionHasErrors('cpf');
    }

    // Rest of the validation tests...

    /** @test */
    public function user_can_delete_a_funcionario()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create();
        Funcionario::factory()->create();

        $this->visitRoute('funcionarios.edit', $funcionario);
        $this->click('del-funcionario-'.$funcionario->id);
        $this->seeRouteIs('funcionarios.edit', [$funcionario, 'action' => 'delete']);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('funcionarios', [
            'id' => $funcionario->id,
        ]);
    }
}
