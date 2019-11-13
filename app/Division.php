<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name', 'description', 'manager_id'
    ];

    public function manager() {
        return $this->belongsTo('App\User');
    }
}
