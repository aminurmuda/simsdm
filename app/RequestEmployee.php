<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestEmployee extends Model
{
    protected $fillable = [
        'start_date', 'end_date', 'requestor_id', 'requestee_id', 'project_id', 'type_id', 'status_id', 'role'
    ];
    
    public function requestee() {
        return $this->belongsTo('App\User', 'requestee_id', 'id');
    }

    public function requestor() {
        return $this->belongsTo('App\User', 'requestor_id', 'id');
    }

    public function project() {
        return $this->belongsTo('App\Project');
    }

    public function status() {
        return $this->belongsTo('App\RequestStatus');
    }
}
