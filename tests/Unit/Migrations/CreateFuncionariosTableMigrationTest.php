<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CreateFuncionariosTableMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_funcionarios_table_exists()
    {
        $this->assertTrue(Schema::hasTable('funcionarios'));
    }

    public function test_funcionarios_table_columns_are_correct()
    {
        $expectedColumns = [
            'id',
            'nome',
            'cpf',
            'endereco',
            'contato',
            'dataNascimento',
            'rg',
            'funcao',
            'login',
            'created_at',
            'updated_at',
        ];

        $this->assertTrue(Schema::hasColumns('funcionarios', $expectedColumns));
    }
}
