<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaidLeave extends Model
{
    protected $fillable = [
        'user_id', 'status_id', 'type_id', 'start_date', 'end_date', 'reason'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function status() {
        return $this->belongsTo('App\PaidLeaveStatus');
    }

    public function type() {
        return $this->belongsTo('App\PaidLeaveType');
    }

    // public function duration() {
        
    // }
}
