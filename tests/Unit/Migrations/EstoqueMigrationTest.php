<?php

namespace Tests\Unit\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EstoqueMigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the "estoques" table and its columns are created correctly.
     *
     * @return void
     */
    public function testEstoqueTableAndColumnsExist()
    {
        // Run the migrations
        $this->artisan('migrate');

        // Assert that the "estoques" table exists in the database
        $this->assertTrue(Schema::hasTable('estoques'));

        // Assert that the "estoques" table has the expected columns
        $this->assertTrue(Schema::hasColumns('estoques', [
            'id', 'item', 'quant', 'date', 'created_at', 'updated_at'
        ]));
    }

    /**
     * Test if a record can be inserted into the "estoques" table.
     *
     * @return void
     */
    public function testInsertRecordIntoEstoqueTable()
    {
        // Run the migrations
        $this->artisan('migrate');

        // Insert a record into the "estoques" table
        DB::table('estoques')->insert([
            'item' => 'Item A',
            'quant' => 10,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assert that the record exists in the database
        $this->assertDatabaseHas('estoques', [
            'item' => 'Item A',
            'quant' => 10,
        ]);
    }

    
    
}
