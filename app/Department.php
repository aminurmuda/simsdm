<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'description', 'manager_id', 'division_id'
    ];

    public function manager() {
        return $this->belongsTo('App\User');
    }

    public function division() {
        return $this->belongsTo('App\Division');
    }
}
