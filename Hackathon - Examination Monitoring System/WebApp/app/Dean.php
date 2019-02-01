<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Dean extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;

    protected $table = 'deans';
    protected $primaryKey = 'DeanEmail';
    protected  $fillable = ['DeanId','DeanName','InstCode','DeanAadharNo','password','DeanEmail', 'created_at', 'updated_at'];
    protected $hidden = ['password','remember_token'];

    public $incrementing = false;


    public function deanEmail()
    {
            return $this->hasOne('App\DeanLocationStatus','DeanEmail');
    }

    public function institute()
    {
        return $this->belongsTo('App\Institute');
    }

    public function allocated()
    {
        return $this->belongsTo('App\FacultyAllocation');
    }
}
