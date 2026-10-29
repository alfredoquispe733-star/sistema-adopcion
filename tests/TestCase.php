<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Enable foreign keys for SQLite
        if (config('database.default') === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON');
        }
    }
}
