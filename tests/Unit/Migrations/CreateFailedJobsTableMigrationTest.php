<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CreateFailedJobsTableMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_failed_jobs_table_exists()
    {
        $this->assertTrue(Schema::hasTable('failed_jobs'));
    }

    public function test_failed_jobs_table_columns_are_correct()
    {
        $expectedColumns = [
            'id',
            'uuid',
            'connection',
            'queue',
            'payload',
            'exception',
            'failed_at',
        ];

        $this->assertTrue(Schema::hasColumns('failed_jobs', $expectedColumns));
    }
}
