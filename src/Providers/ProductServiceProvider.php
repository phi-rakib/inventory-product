<?php

namespace PhiRakib\InventoryProduct\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishesMigrations([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }
}
