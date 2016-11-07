<?php

namespace BrianFaust\Collectable;

use BrianFaust\ServiceProvider\ServiceProvider;

class CollectableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishMigrations();
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return 'collectable';
    }
}
