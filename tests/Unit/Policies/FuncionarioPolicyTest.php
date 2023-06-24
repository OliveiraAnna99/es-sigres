<?php

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('store a funcionario with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->post(route('funcionarios.store', [
            'nome' => 'Funcionario Teste',
            'cpf' => '12345678901',
            'endereco' => 'Endereco Teste',
            'contato' => '123456789',
            'rg' => '12345678',
            'dataNascimento' => '1990-01-01',
            'funcao' => 'Funcao Teste',
            'login' => $user->id,
        ]))
        ->assertRedirect(route('funcionarios.show', Funcionario::latest('id')->first()));
});

it('list funcionarios with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('funcionarios.index'))
        ->assertStatus(200);
});

it('update a funcionario with permission', function () {
    $user = User::factory()->create();
    $funcionario = Funcionario::factory()->create();
    $this->actingAs($user)->put(route('funcionarios.update', $funcionario), [
        'nome' => 'Novo nome',
        'cpf' => '405.488.850-01',
        'endereco' => 'Novo endereco',
        'contato' => '123456789',
        'rg' => '12345678',
        'dataNascimento' => '1990-01-01',
        'funcao' => 'Nova funcao',
        'login' => $user->id,
    ])->assertRedirect(route('funcionarios.show', $funcionario));
});

it('show a funcionario with permission', function () {
    $user = User::factory()->create();
    $funcionario = Funcionario::factory()->create();
    $this->actingAs($user)->get(route('funcionarios.show', $funcionario->id))
        ->assertStatus(200);
});

it('show a not found funcionario', function () {
    $user = User::factory()->create();
    $notFoundFuncionarioId = Funcionario::latest('id')->first()?->id + 100;
    $this->actingAs($user)->get(route('funcionarios.show', $notFoundFuncionarioId))
        ->assertStatus(404);
});

it('delete a funcionario with permission', function () {
  
        $funcionario = Funcionario::factory()->create();

        $response = $this->delete(route('funcionarios.destroy', $funcionario), [
            'funcionario_id' => $funcionario->id,
        ]);

        $response->assertRedirect(route('funcionarios.index'));
        $this->assertDatabaseMissing('funcionarios', ['id' => $funcionario->id]);
});
