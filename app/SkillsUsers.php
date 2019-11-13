<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillsUsers extends Model
{
    //
    protected $fillable = [
        'user_id', 'skill_id', 'level'
    ];

    public function skill() {
        return $this->belongsTo('App\Skill');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}