<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Institute extends Model
{
    protected $table = 'institutes';
    protected  $primaryKey = 'InstCode';
    protected  $fillable = ['InstId', 'InstCode','InstName','InstPincode','ExamCode','InstCity'];


    public function students()
    {
        return $this->hasMany('App\Student','InstCode');
    }

    public function deans()
    {
        return $this->hasMany('App\Dean');
    }

    public function deansAllocate()
    {
        return $this->hasMany('App\FacultyAllocation','InstCode');
    }

    public  function exams()
    {
       return $this->hasMany('App\Exam','ExamCode');
    }

    public function universityData()
    {
        return $this->hasMany('App\UniversityData','InstCode');
    }

    public function studentsallocated()
    {
        return $this->hasMany('App\StudentAllocation','InstCode');
    }
}
