<?php

namespace W3Devmaster\GeoData\Models;

use Illuminate\Database\Eloquent\Model;
use W3Devmaster\GeoData\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use W3Devmaster\GeoData\Traits\GeoFilterData;

class SubDistrict extends Model
{
    use HasFactory,GeoFilterData;
    protected $fillable = ['code','zip_code','name_th','name_en','district_id'];

    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }
}
