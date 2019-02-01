<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityData extends Model
{
    protected  $primaryKey = 'data_id';
    protected  $fillable = ['data_id','InstCode','InstPincode','MinCapacity','NoClasses','TotalCapacity','created_at', 'updated_at'];

    public function institutes()
    {
       return $this->belongsTo('App\Institute','InstCode');
    }
}
