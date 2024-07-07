<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected string $prefix = 'ttr_';

    protected array $tables = [
        'cache',
        'cache_locks',
        'failed_jobs',
        'jobs',
        'job_batches',
        'migrations',
        'password_reset_tokens',
        'sessions',
        'settings',
        'users',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach($this->tables as $table) {
            Schema::rename($table, $this->prefix.$table);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach($this->tables as $table) {
            Schema::rename($this->prefix.$table, $table);
        }
    }
};
