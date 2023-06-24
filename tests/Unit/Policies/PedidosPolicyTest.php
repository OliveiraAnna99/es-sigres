<?php

use App\Models\Cardapio;
use App\Models\Pedidos;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('store a pedidos with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->post(route('pedidos.store', [
            'nome' => 'Pedidos Teste',
            'cpf' => '12345678901',
            'endereco' => 'Endereco Teste',
            'contato' => '123456789',
            'rg' => '12345678',
            'dataNascimento' => '1990-01-01',
            'funcao' => 'Funcao Teste',
            'login' => $user->id,
        ]))
        ->assertRedirect(route('pedidos.show', Pedidos::latest('id')->first()));
});

it('list pedidos with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('pedidos.index'))
        ->assertStatus(200);
});

it('update a funcionario with permission', function () {
    $user = User::factory()->create();
    $cardapio = Cardapio::factory()->create();
    $pedido = Pedidos::factory()->create();
    $this->actingAs($user)->put(route('pedidos.update', $pedido), [
        'numero_mesa' => 23,
        'status' => '1',
        'cardapio_id' => $cardapio->id,
    ])->assertRedirect(route('pedidos.show', $pedido));
});

it('show a funcionario with permission', function () {
    $user = User::factory()->create();
    $pedido = Pedidos::factory()->create();
    $this->actingAs($user)->get(route('pedidos.show', $pedido->id))
        ->assertStatus(200);
});

it('show a not found funcionario', function () {
    $user = User::factory()->create();
    $notFoundFuncionarioId = Pedidos::latest('id')->first()?->id + 100;
    $this->actingAs($user)->get(route('fingredientesuncionarios.show', $notFoundFuncionarioId))
        ->assertStatus(404);
});

it('delete a funcionario with permission', function () {
  
        $pedido = Pedidos::factory()->create();

        $response = $this->delete(route('pedidos.destroy', $pedido), [
            'funcionario_id' => $pedido->id,
        ]);

        $response->assertRedirect(route('pedidos.index'));
        $this->assertDatabaseMissing('pedidos', ['id' => $pedido->id]);
});
