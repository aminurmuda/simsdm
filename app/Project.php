<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'customer_id', 'address', 'start_date', 'end_date'
    ];

    public function manager() {
        return $this->belongsTo('App\User');
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
