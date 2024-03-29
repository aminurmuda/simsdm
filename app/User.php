<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'department_id', 'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function status() {
        return $this->belongsTo('App\EmployeeStatus');
    }

    public function skills() {
        return $this->hasMany('App\SkillsUsers');
    }

    public function projects() {
        return $this->hasMany('App\ProjectsUsers');
    }

    // public function skills() {
    //     return $this->hasManyThrough('App\Skill', 'App\SkillsUsers');
    // }
}
