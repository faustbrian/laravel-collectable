<?php

namespace DraperStudio\Collectable;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'collectable';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}
