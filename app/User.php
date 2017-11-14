<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function payments(){

        return $this->hasmany(Payment::class);
    }


    public function isAdmin(){
        if ($this->email=='pri1.zzal@gmail.com' || $this->email=='simple.laxmi@gmail.com')
        {
            return true;
        } 
        else {return false;}
    }
}
