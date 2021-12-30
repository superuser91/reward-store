<?php

namespace Vgplay\RewardStore;

use Illuminate\Support\ServiceProvider;

class RewardStoreServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
    }
}
