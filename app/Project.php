<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date'
    ];

    public function manager() {
        return $this->belongsTo('App\User');
    }

    public function members() {
        return $this->hasMany('App\User');
    }
}
