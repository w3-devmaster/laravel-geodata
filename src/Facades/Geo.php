<?php

namespace W3Devmaster\GeoData\Facades;

use Illuminate\Support\Facades\Facade;

class Geo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'geo';
    }
}
