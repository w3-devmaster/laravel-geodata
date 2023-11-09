<?php

namespace W3Devmaster\GeoData\Models;

use Illuminate\Database\Eloquent\Model;
use W3Devmaster\GeoData\Models\District;
use W3Devmaster\GeoData\Models\Geography;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use W3Devmaster\GeoData\Traits\GeoFilterData;

class Province extends Model
{
    use HasFactory,GeoFilterData;
    protected $fillable = ['code','name_th','name_en','geography_id'];

    public function geography(){
        return $this->belongsTo(Geography::class,'geography_id','id');
    }

    public function districts() {
        return $this->hasMany(District::class,'province_id','id');
    }

}
