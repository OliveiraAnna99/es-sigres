<?php

use App\Models\Cardapio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('store a item on cardapio with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->post(route('funcionarios.store', [
            'nome'        => "Pizza de Calabresa",
            'valor' => 30,
            'ingredientes' => 'Calabresa, molho de tomate, queijo mussarela',
            'status'  => 'pendente',
            'imagem' => "",
        ]))
        ->assertRedirect(route('cardapios.show', Cardapio::latest('id')->first()));
});

it('list itens with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)->get(route('cardapios.index'))
        ->assertStatus(200);
});

it('update a item with permission', function () {
    $user = User::factory()->create();
    $cardapio = Cardapio::factory()->create();
    $this->actingAs($user)->put(route('cardapios.update', $cardapio), [
        'nome'        => "Pizza de Calabresa",
        'valor' => 30,
        'ingredientes' => 'Calabresa, molho de tomate, queijo mussarela',
        'status'  => 'pronto',
        'imagem' => "",
    ])->assertRedirect(route('cardapios.show', $cardapio));
});

it('show item with permission', function () {
    $user = User::factory()->create();
    $funcionario = Cardapio::factory()->create();
    $this->actingAs($user)->get(route('cardapios.show', $funcionario->id))
        ->assertStatus(200);
});

it('show a not found item', function () {
    $user = User::factory()->create();
    $notFoundFuncionarioId = Cardapio::latest('id')->first()?->id + 100;
    $this->actingAs($user)->get(route('cardapios.show', $notFoundFuncionarioId))
        ->assertStatus(404);
});

it('delete a item with permission', function () {
    $user = User::factory()->create();
    $funcionario = Cardapio::factory()->create();
    $this->actingAs($user)->delete(route('cardapios.destroy', $funcionario))
        ->assertRedirect(route('cardapios.index'));
});
