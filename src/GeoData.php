<?php

namespace W3Devmaster\GeoData;

use W3Devmaster\GeoData\Models\District;
use W3Devmaster\GeoData\Models\Province;
use W3Devmaster\GeoData\Models\Geography;
use W3Devmaster\GeoData\Models\SubDistrict;


class GeoData {

    public static $geographies;
    public static $provinces;
    public static $districts;
    public static $subDistricts;

    public function __construct()
    {
        $this->initializeModel();
    }

    protected function initializeModel()
    {
        self::$geographies = app(Geography::class);
        self::$provinces = app(Province::class);
        self::$districts = app(District::class);
        self::$subDistricts = app(SubDistrict::class);
    }

    public static function geographies() {
        return self::$geographies ?: app(Geography::class);
    }

    public static function provinces() {
        return self::$provinces ?: app(Province::class);
    }

    public static function districts() {
        return self::$districts ?: app(District::class);
    }

    public static function subDistricts() {
        return self::$subDistricts ?: app(SubDistrict::class);
    }
 
}
