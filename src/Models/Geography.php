<?php

namespace W3Devmaster\GeoData\Models;

use Illuminate\Database\Eloquent\Model;
use W3Devmaster\GeoData\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Geography extends Model
{
    use HasFactory;
    protected $fillable = ['id','name_th','name_en'];

    public function provinces() {
        return $this->hasMany(Province::class,'geography_id','id');
    }
}
