<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function skills_users() {
        return $this->hasOne('App\SkillsUsers');
    }
}