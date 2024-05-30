<?php

namespace PhiRakib\InventoryProduct\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use PhiRakib\InventoryProduct\Providers\ProductServiceProvider;

abstract class TestCase extends Orchestra
{
    protected static $migration;

    protected function setUp(): void
    {
        parent::setUp();

        if (! self::$migration) {
            $this->prepareMigration();
        }

        $this->setUpDatabase($this->app);
    }

    protected function getPackageProviders($app)
    {
        return [
            ProductServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetup($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    private function prepareMigration(): void
    {
        $migrationPath = __DIR__ . '/../database/migrations/create_brands_table.php';
        self::$migration = require $migrationPath;
    }

    protected function setUpDatabase($app)
    {
        self::$migration->up();
    }
}