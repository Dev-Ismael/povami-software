<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' , 'first_name' , 'last_name' , 'email' , 'password' , 'address', 'phone', 'phone2' , 'facebook' , 'twitter' , 'instagram' , 'country' , 'city' , 'balance' , 'coupon' , 'role' ,  'email_verified_at' , 'remember_token' 
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

    
    ############################## Relations ################################
    public function contracts(){
        return  $this -> hasMany("App\Models\Contract") ;  
    }
    public function orders(){
        return  $this -> hasMany("App\Models\Order") ;  
    }
}
