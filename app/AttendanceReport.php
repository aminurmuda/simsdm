<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceReport extends Model
{
    //
    protected $fillable = [
        'user_id', 'project_id', 'date', 'clock_in', 'clock_out', 'clock_in_note', 'clock_out_note', 'status_id', 'reject_reason'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function project() {
        return $this->belongsTo('App\Project');
    }

    public function status() {
        return $this->belongsTo('App\AttendanceReportStatus');
    }
}