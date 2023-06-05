<?php

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('list funcionarios with permission', function () {
    $user = createUserForTesting();

    $response = $this->actingAs($user)->get(route('funcionarios.index'));

    $response->assertStatus(200);
});

it('access funcionarios create page with permission', function () {
    $user = createUserForTesting('funcionarios.create');

    $response = $this->actingAs($user)->get(route('funcionarios.create'));

    $response->assertStatus(200);
});

it('store a funcionarios with permission', function () {
    $user = createUserForTesting('funcionarios.create');

    $funcionarioData = [
        'nome' => 'John Doe',
        'cpf' => '123.456.789-00',
        'endereco' => '123 Main St',
        'contato' => 'john@example.com',
        'dataNascimento' => '1990-01-01',
        'rg' => '003.396.363',
        'funcao' => 'Employee',
        'login' => 'johndoe',
    ];

    $response = $this->actingAs($user)->post(route('funcionarios.store'), $funcionarioData);

    $response->assertRedirect();

    // You can add additional assertions to check if the funcionario was stored successfully
});

// ... Other test cases ...


