<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyAllocation extends Model
{
    protected $table = 'dean_allocations';

    protected $fillable = ['DeanAllocateId','DeanEmail','ExamCode','DeanRole', 'InstCode', 'created_at', 'updated_at'];

   protected $primaryKey = 'DeanAllocateId';

    public function deanInfoStatus()
    {
        return $this->hasMany('App\DeanLocationStatus','DeanAllocateId');
    }

    public function institutes()
    {
        return $this->belongsTo('App\Institute','InstCode');
    }

    public function deansInfo()
    {
        return $this->hasMany('App\Dean','DeanEmail');
    }




}
