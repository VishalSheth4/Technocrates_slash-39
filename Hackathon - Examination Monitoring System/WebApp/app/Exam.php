<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    protected $table = 'exams';
    protected  $primaryKey = 'ExamId';
    protected  $fillable = ['ExamId', 'ExamCode','ExamName','ExamDate', 'ExamAuthority', 'created_at', 'updated_at'];

    public function students()
    {
        return $this->hasMany('App\Student','StudentId');
    }

    public function institutes()
    {
        return $this->belongsTo('App\Institute');
    }


}
