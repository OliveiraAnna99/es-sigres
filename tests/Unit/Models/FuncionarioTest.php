<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FuncionarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_funcionario()
    {
        

        $data = [
            'nome' => 'Novo nome',
            'cpf' => '12345678901',
            'endereco' => 'Novo endereco',
            'contato' => '123456789',
            'rg' => '12345678',
            'dataNascimento' => '1990-01-01',
            'funcao' => 'Nova funcao',
            'login' => 'teste',
        ];

        $funcionario = Funcionario::create($data);

        $this->assertInstanceOf(Funcionario::class, $funcionario);
        $this->assertEquals($data['nome'], $funcionario->nome);
        $this->assertEquals($data['cpf'], $funcionario->cpf);

        $this->assertEquals($data['endereco'], $funcionario->endereco);
        $this->assertEquals($data['contato'], $funcionario->contato);
        $this->assertEquals($data['rg'], $funcionario->rg);
        $this->assertEquals($data['dataNascimento'], $funcionario->dataNascimento);
        $this->assertEquals($data['funcao'], $funcionario->funcao);
        $this->assertEquals($data['login'], $funcionario->login);


    }

    /** @test */
    public function it_can_update_a_funcionario()
    {
        $funcionario = Funcionario::factory()->create();

        $data = [
            'nome' => 'Novo nome',
            'cpf' => '12345678901',
            'endereco' => 'Novo endereco',
            'contato' => '123456789',
            'rg' => '12345678',
            'dataNascimento' => '1990-01-01',
            'funcao' => 'Nova funcao',
            'login' => $funcionario->id,
        ];

        $funcionario->update($data);

        $this->assertEquals($data['nome'], $funcionario->nome);
        $this->assertEquals($data['cpf'], $funcionario->cpf);

        $this->assertEquals($data['endereco'], $funcionario->endereco);
        $this->assertEquals($data['contato'], $funcionario->contato);
        $this->assertEquals($data['rg'], $funcionario->rg);
        $this->assertEquals($data['dataNascimento'], $funcionario->dataNascimento);
        $this->assertEquals($data['funcao'], $funcionario->funcao);
        $this->assertEquals($data['login'], $funcionario->login);
    }

    /** @test */
    public function it_can_delete_a_funcionario()
    {
        $funcionario = Funcionario::factory()->create();

        $funcionario->delete();

        $this->assertDeleted($funcionario);
    }
}
