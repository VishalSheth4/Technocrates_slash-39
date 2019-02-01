<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institute;

class Student extends Model
{

    protected $table = 'students';
    protected $primaryKey = 'StudentId';
    protected $fillable = ['StudentId', 'Name', 'RollNo', 'InstCode','studentCity','ExamCode'];


    public function institute()
    {
       return $this->belongsTo('App\Institute','InstCode');
    }



}
