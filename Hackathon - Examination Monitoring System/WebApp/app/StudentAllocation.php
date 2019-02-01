<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAllocation extends Model
{
    protected  $primaryKey = 'SAllocateId';
    protected  $fillable = ['SAllocateId','ExamCode','SeatNo','InstCode','created_at', 'updated_at'];


   public function institute()
   {
       return $this->belongsTo('App\Institute','InstCode');
   }


}
