<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CreateUsersTableMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_table_exists()
    {
        $this->assertTrue(Schema::hasTable('users'));
    }

    public function test_users_table_columns_are_correct()
    {
        $expectedColumns = [
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ];

        $this->assertTrue(Schema::hasColumns('users', $expectedColumns));
    }
}
