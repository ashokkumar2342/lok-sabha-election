<?php

namespace App;

use App\ACDetails;
use App\PCDetails;
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
        'name', 'email', 'password','ac_code','pc_code','role'
    ];

        
         

       public function pcdetails(){

        return $this->hasOne(PCDetails::class,'id','pc_code');
       } 
       public function acdetails(){

        return $this->hasOne(ACDetails::class,'id','ac_code');
       }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
