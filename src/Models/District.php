<?php

namespace W3Devmaster\GeoData\Models;

use Illuminate\Database\Eloquent\Model;
use W3Devmaster\GeoData\Models\Province;
use W3Devmaster\GeoData\Models\SubDistrict;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;
    protected $fillable = ['code','name_th','name_en','province_id'];

    public function province() {
        return $this->belongsTo(Province::class,'province_id','id');
    }

    public function subDistricts(){
        return $this->hasMany(SubDistrict::class,'district_id','id');
    }
}
