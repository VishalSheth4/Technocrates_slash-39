<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeanLocationStatus extends Model
{
    protected  $table = 'dean_location_statuses';
    protected $fillable = ['DeanLocationStatusId','DeanAllocateId','Status','created_at','updated_at'];

    public function deansAllocation()
    {
        $this->belongsTo('App\FacultyAllocation','DeanAllocateId');
    }


}
