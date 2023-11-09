<?php

namespace W3Devmaster\GeoData\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use W3Devmaster\GeoData\Models\District;
use W3Devmaster\GeoData\Models\Geography;
use W3Devmaster\GeoData\Models\Province;
use W3Devmaster\GeoData\Models\SubDistrict;
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
        Artisan::call('migrate');
        $this->info('Migrating to database.');
        $this->newLine(1);
        $this->info('Wait for installing geo data...');
        $this->newLine(1);

        if(Schema::hasTable('geographies') &&
            Schema::hasTable('provinces') &&
            Schema::hasTable('districts') &&
            Schema::hasTable('sub_districts'))
        {
            $total = [
                'g' => 0,
                'p' => 0,
                'd' => 0,
                's' => 0
            ];

            foreach (Geographies::GEOGRAPHIES as $geography) {
                if(!Geography::whereId($geography['id'])->exists()){
                    Geography::insert($geography);
                    $total['g']++;
                }
            }
            $this->info('Add geography ' . $total['g'] . ' items.');

            foreach (Provinces::PROVINCES as $province) {
                if(!Province::whereId($province['id'])->exists()){
                    Province::insert($province);
                    $total['p']++;
                }
            }
            $this->info('Add province ' . $total['p'] . ' items.');

            foreach (Districts::DISTRICTS as $district) {
                if(!District::whereId($district['id'])->exists()){
                    District::insert($district);
                    $total['d']++;
                }
            }
            $this->info('Add district ' . $total['d'] . ' items.');

            foreach (SubDistricts::SUBDISTRICTS as $subDistrict) {
                if(!SubDistrict::whereCode($subDistrict['code'])->exists()){
                    SubDistrict::create($subDistrict);
                    $total['s']++;
                }
            }
            $this->info('Add sub-district ' . $total['s'] . ' items.');
            $this->newLine(1);

        }else{
            $this->error('Not exists tables " use : php artisan geodata:publish " before run again');
            $this->newLine(1);
        }

        $this->info('Install geo data successfuly.');
    }
}
