<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationDetect extends Model
{
    protected $table = 'location_detects';
    protected $primaryKey = 'mapping_id';
    protected $fillable = ['mapping_id', 'InstCode', 'Latitude', 'Longitude', 'created_at', 'updated_at'];

}
