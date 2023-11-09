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

        if (empty(glob(database_path('migrations/*_create_geographies_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_geographies_table.php.stub' => database_path('migrations/2023_01_01_000000_create_geographies_table.php'),
            ], 'migrations');
        }
        if (empty(glob(database_path('migrations/*_create_provinces_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_provinces_table.php.stub' => database_path('migrations/2023_01_01_000001_create_provinces_table.php'),
            ], 'migrations');
        }
        if (empty(glob(database_path('migrations/*_create_districts_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_districts_table.php.stub' => database_path('migrations/2023_01_01_000002_create_districts_table.php'),
            ], 'migrations');
        }
        if (empty(glob(database_path('migrations/*_create_sub_districts_table.php')))) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_sub_districts_table.php.stub' => database_path('migrations/2023_01_01_000003_create_sub_districts_table.php'),
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
