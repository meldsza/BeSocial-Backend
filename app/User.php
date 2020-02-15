<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'points', 'avatar', 'latitude', 'longitude',
    ];
    protected $with = ['ngo'];

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

    public function quests()
    {
        return $this->hasMany("App\Quest");
    }

    public function quest_logs()
    {
        return $this->hasMany("App\QuestLog");
    }
    public function ngo()
    {
        return $this->hasOne("App\NGO");
    }
}
