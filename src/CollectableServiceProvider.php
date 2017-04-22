<?php



declare(strict_types=1);



namespace BrianFaust\Collectable;

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class CollectableServiceProvider extends AbstractServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishMigrations();
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'collectable';
    }
}
