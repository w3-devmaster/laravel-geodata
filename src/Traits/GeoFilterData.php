<?php

namespace W3Devmaster\GeoData\Traits;

trait GeoFilterData {

    public function scopeFindName($query,string $name = null) {
        return $query->where('name_th','like','%'.$name.'%')->orWhere('name_th','like','%'.$name.'%');
    }

}
