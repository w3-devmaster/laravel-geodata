<?php

namespace W3Devmaster\GeoData\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GeoPublish extends Command
{
    protected $signature = 'geodata:publish';

    protected $description = 'Install the geodata';

    public function handle()
    {
        $arguments = [
            '--provider' => 'W3Devmaster\GeoData\GeoServiceProvider',
        ];


        $headers = ['Type','File','Status',];
        $rows = [];

        $files = [
            'migrations/2023_01_01_000000_create_geographies_table.php',
            'migrations/2023_01_01_000001_create_provinces_table.php',
            'migrations/2023_01_01_000002_create_districts_table.php',
            'migrations/2023_01_01_000003_create_sub_districts_table.php',
        ];

        foreach ($files as $value) {
            if(file_exists(database_path($value))){
                $rows[] = ['migraion',$value,'Success'];
            }else{
                $rows[] = ['migraion',$value,'Already'];
            }
        }


        $this->table($headers, $rows);
        $this->newLine(1);
        Artisan::call('vendor:publish',$arguments);

        $this->info('Geodata is successfuly published. " use: php artisan geodata:install " ');
    }
}
