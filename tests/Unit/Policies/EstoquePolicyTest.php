<?php

use App\Models\Estoque;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('store a  with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->post(route('funcionarios.store', [
            'item' => 'Item Teste',
            'quant' => 10,
            'dataNascimento' => '1990-01-01'
        ]))
        ->assertRedirect(route('estoques.show', Estoque::latest('id')->first()));
});

it('list itens with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('estoques.index'))
        ->assertStatus(200);
});

it('update a item with permission', function () {
    $user = User::factory()->create();
    $estoque = Estoque::factory()->create();
    $this->actingAs($user)->put(route('estoques.update', $estoque), [
        'item' => 'Novo item',
        'quant' => '20',
        'date' => '1990-01-01'
    ])->assertRedirect(route('estoques.show', $estoque));
});

it('show item with permission', function () {
    $user = User::factory()->create();
    $funcionario = Estoque::factory()->create();
    $this->actingAs($user)->get(route('estoques.show', $funcionario->id))
        ->assertStatus(200);
});

it('show a not found item', function () {
    $user = User::factory()->create();
    $notFoundFuncionarioId = Estoque::latest('id')->first()?->id + 100;
    $this->actingAs($user)->get(route('estoques.show', $notFoundFuncionarioId))
        ->assertStatus(404);
});

