<?php

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list funcionarios with permission', function () {
    $user = createUserForTesting();

    $this->actingAs($user)->get(route('funcionarios.index'))
        ->assertStatus(200);
});

it('access funcionarios create page with permission', function () {
    $user = createUserForTesting('funcionarios.create');

    $this->actingAs($user)->get(route('funcionarios.create'))
        ->assertStatus(200);
});

it('store a funcionarios with permission', function () {
    $user = createUserForTesting('funcionarios.create');

    $funcionario = Funcionario::factory()->create([
        'nome' => 'John Doe',
        'cpf' => '123.456.789-00',
        'endereco' => '123 Main St',
        'contato' => 'john@example.com',
        'dataNascimento' => '1990-01-01',
        'rg' => '003.396.363',
        'funcao' => 'Employee',
        'login' => 'johndoe',
    ]);

    $response = $this->actingAs($user)
        ->post(route('funcionarios.store'), $funcionario->toArray());

    $response->assertRedirect(route('funcionarios.show', $funcionario->id));
});

it('access funcionarios edit page with permission', function () {
    $user = createUserForTesting('funcionarios.update');

    $funcionarios = Funcionario::factory()->create();

    $this->actingAs($user)->get(route('funcionarios.edit', $funcionarios))
        ->assertStatus(200);
});

it('update a funcionarios with permission', function () {
    $user = createUserForTesting('funcionarios.update');

    $funcionarios = Funcionario::factory()->create();

    $this->actingAs($user)->put(route('funcionarios.update', $funcionarios), [
        'name' => "Novo nome",
        'price' => 20.0
    ])->assertRedirect(route('funcionarios.show', $funcionarios));
});

it('show a funcionarios with permission', function () {
    $user = createUserForTesting('funcionarios.read');
    $funcionarios = Funcionario::factory()->create();

    $this->actingAs($user)->get(route('funcionarios.show', $funcionarios))
        ->assertStatus(200);
});

it('show a not found funcionarios', function () {
    $user = createUserForTesting('funcionarios.read');
    $notFoundfuncionariosId = Funcionario::latest('id')->first()?->id + 100;

    $this->actingAs($user)->get(route('funcionarios.show', $notFoundfuncionariosId))
        ->assertStatus(404);
});

it('delete a funcionarios with permission', function () {
    $user = createUserForTesting('funcionarios.delete');
    $funcionarios = Funcionario::factory()->create();

    $this->actingAs($user)->post(route('funcionarios.destroy', $funcionarios))
        ->assertRedirect(route('funcionarios.index'));
});

function createUserForTesting($permission = null)
{
    $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);

    if ($permission) {
        $user->givePermissionTo($permission);
    }

    return $user;
}

