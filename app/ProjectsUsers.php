<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsUsers extends Model
{
    //
    protected $fillable = [
        'project_id', 'user_id', 'role'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
