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
        $this->see($funcionario->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Funcionario 1 name',
            'description' => 'Funcionario 1 description',
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
    public function validate_funcionario_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('funcionarios.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_funcionario_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('funcionarios.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_funcionario_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('funcionarios.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Funcionario 1 name',
            'description' => 'Funcionario 1 description',
        ], $overrides);
    }

    /** @test */
    public function user_can_edit_a_funcionario()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create(['name' => 'Testing 123']);

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
    public function validate_funcionario_name_update_is_required()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('funcionarios.update', $funcionario), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_funcionario_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('funcionarios.update', $funcionario), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_funcionario_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $funcionario = Funcionario::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('funcionarios.update', $funcionario), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

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
