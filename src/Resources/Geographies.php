<?php

namespace W3Devmaster\GeoData\Resources;

class Geographies {
    const GEOGRAPHIES = [
        ['id' => '1','name_th' => 'ภาคเหนือ','name_en' => 'Northern Thailand'],
        ['id' => '2','name_th' => 'ภาคกลาง','name_en' => 'Central Thailand'],
        ['id' => '3','name_th' => 'ภาคตะวันออกเฉียงเหนือ','name_en' => 'Northeastern Thailand'],
        ['id' => '4','name_th' => 'ภาคตะวันตก','name_en' => 'Western Thailand'],
        ['id' => '5','name_th' => 'ภาคตะวันออก','name_en' => 'Eastern Thailand'],
        ['id' => '6','name_th' => 'ภาคใต้','name_en' => 'Southern Thailand']
    ];

    public function __construct()
    {
        return self::GEOGRAPHIES;
    }
}
