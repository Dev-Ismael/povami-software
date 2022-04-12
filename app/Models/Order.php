<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id' , 'title' , 'content', 'price', 'deadline', 'resource_code', "progress bar" , "link" , "payment_system" , "payment_method" , "payment_status"
    ];

    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;  
    }

}
