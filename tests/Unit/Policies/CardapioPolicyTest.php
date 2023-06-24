<?php

use App\Models\Cardapio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);


it('store a item on cardapio with permission', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->post(route('cardapios.store', [
            'nome'  => 'Pizza de Calabresa',
            'ingredientes' => 'Calabresa, molho de tomate, queijo mussarela',
            'valor' => 30,
            'status'  => 'pendente',
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
        'ingredientes' => 'Calabresa, molho de tomate, queijo mussarela',
        'valor' => 30,
        'status'  => 'pronto',
    ])->assertRedirect(route('cardapios.show', $cardapio));
});

it('show item with permission', function () {
    $user = User::factory()->create();
    $cardapio = Cardapio::factory()->create();
    $this->actingAs($user)->get(route('cardapios.show', $cardapio->id))
        ->assertStatus(200);
});

it('show a not found item', function () {
    $user = User::factory()->create();
    $notFoundCardapioId = Cardapio::latest('id')->first()?->id + 100;
    $this->actingAs($user)->get(route('cardapios.show', $notFoundCardapioId))
        ->assertStatus(404);
});

