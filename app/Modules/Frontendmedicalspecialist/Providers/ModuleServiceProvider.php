<?php

namespace App\Modules\Frontendmedicalspecialist\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'frontendmedicalspecialist');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'frontendmedicalspecialist');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'frontendmedicalspecialist');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
