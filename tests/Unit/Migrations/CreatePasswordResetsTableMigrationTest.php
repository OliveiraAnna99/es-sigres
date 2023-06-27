<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CreatePasswordResetsTableMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_resets_table_exists()
    {
        $this->assertTrue(Schema::hasTable('password_resets'));
    }

    public function test_password_resets_table_columns_are_correct()
    {
        $expectedColumns = [
            'email',
            'token',
            'created_at',
        ];

        $this->assertTrue(Schema::hasColumns('password_resets', $expectedColumns));
    }
}
