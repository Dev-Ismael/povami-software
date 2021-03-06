<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id' , 'title' , 'content', 'price', 'deadline',  
    ];

    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;  
    }

}
