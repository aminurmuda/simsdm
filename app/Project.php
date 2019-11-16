<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'customer_id', 'department_id', 'address', 'start_date', 'end_date', 'status_id'
    ];

    public function manager() {
        return $this->belongsTo('App\User');
    }

    public function status() {
        return $this->belongsTo('App\ProjectStatus');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function members() {
        return $this->hasMany('App\User');
    }
}
