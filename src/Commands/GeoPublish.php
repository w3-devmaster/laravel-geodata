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

        if(file_exists(config_path('geodata.php'))){
            $rows[] = ['config','config/geodata.php','Already'];
        }else{
            $rows[] = ['config','config/geodata.php','Success'];
        }

        foreach (config('geodata.tableName') as $value) {
            if(empty(glob(database_path('migrations/*_create_' . $value . '_table.php')))){
                $rows[] = ['migraion','migrations/2023_01_01_00000*_create_' . $value . '_table.php','Success'];
            }else{
                $rows[] = ['migraion','migrations/2023_01_01_00000*_create_' . $value . '_table.php','Already'];
            }
        }

        $this->table($headers, $rows);
        $this->newLine(1);
        Artisan::call('vendor:publish',$arguments);

        $this->info('Geodata is successfuly published. "use: php artisan migrate && php artisan geodata:install" ');
    }
}
