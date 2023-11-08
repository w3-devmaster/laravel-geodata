<?php

namespace W3Devmaster\GeoData\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use W3Devmaster\GeoData\Models\District;
use W3Devmaster\GeoData\Resources\Districts;
use W3Devmaster\GeoData\Resources\Geographies;
use W3Devmaster\GeoData\Resources\Provinces;
use W3Devmaster\GeoData\Resources\SubDistricts;

class GeoInstall extends Command
{
    protected $signature = 'geodata:install';

    protected $description = 'Install for all geodata';

    public function handle()
    {
        $this->info('Wait for installing geo data...');
        $this->newLine(1);
        $dis = new District();

        $this->info('table is ' . $dis->getTable());
        if(Schema::hasTable(config('geodata.tableName.geography')) &&
            Schema::hasTable(config('geodata.tableName.province')) &&
            Schema::hasTable(config('geodata.tableName.district')) &&
            Schema::hasTable(config('geodata.tableName.subDistrict')))
        {

            // foreach (Geographies::GEOGRAPHIES as $geography) {
            //     # code...
            // }

            // foreach (Provinces::PROVINCES as $province) {
            //     # code...
            // }

            // foreach (Districts::DISTRICTS as $district) {
            //     # code...
            // }

            // foreach (SubDistricts::SUBDISTRICTS as $subDistrict) {
            //     # code...
            // }

        }else{
            $this->error('Not exists tables "use : php artisan geodata:publish && php artisan migrate" before run again');
            $this->newLine(1);
        }

        $this->info('Install geo data successfuly.');
    }
}
