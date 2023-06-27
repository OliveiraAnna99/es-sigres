<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CreateEstoquesTableMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_estoques_table_exists()
    {
        $this->assertTrue(Schema::hasTable('estoques'));
    }

    public function test_estoques_table_columns_are_correct()
    {
        $expectedColumns = [
            'id',
            'item',
            'quant',
            'date',
            'created_at',
            'updated_at',
        ];

        $this->assertTrue(Schema::hasColumns('estoques', $expectedColumns));
    }
}
