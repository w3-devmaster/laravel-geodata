<?php

namespace W3Devmaster\GeoData;

use Illuminate\Support\ServiceProvider;

class GeoServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerPublishables();
        $this->registerCommands();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/geodata.php', 'geodata');

        // dd('app is works.');
        // $this->app->singleton(Notibot::class,function(){
        //     return new Notibot();
        // });
    }

    protected function registerPublishables(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../config/geodata.php' => config_path('geodata.php'),
        ], 'config');

        if (empty(glob(database_path('migrations/*_create_' . config('geodata.tableName.geography') . '_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_' . config('geodata.tableName.geography') . '_table.php.stub' => database_path('migrations/2023_01_01_000000_create_' . config('geodata.tableName.geography') . '_table.php'),
            ], 'migrations');
        }
        if (empty(glob(database_path('migrations/*_create_' . config('geodata.tableName.province') . '_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_' . config('geodata.tableName.province') . '_table.php.stub' => database_path('migrations/2023_01_01_000001_create_' . config('geodata.tableName.province') . '_table.php'),
            ], 'migrations');
        }
        if (empty(glob(database_path('migrations/*_create_' . config('geodata.tableName.district') . '_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_' . config('geodata.tableName.district') . '_table.php.stub' => database_path('migrations/2023_01_01_000002_create_' . config('geodata.tableName.district') . '_table.php'),
            ], 'migrations');
        }
        if (empty(glob(database_path('migrations/*_create_' . config('geodata.tableName.subDistrict') . '_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_' . config('geodata.tableName.subDistrict') . '_table.php.stub' => database_path('migrations/2023_01_01_000003_create_' . config('geodata.tableName.subDistrict') . '_table.php'),
            ], 'migrations');
        }

    }

    protected function registerCommands(): void
    {

        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Commands\GeoPublish::class,
            Commands\GeoInstall::class,
        ]);
    }

}
