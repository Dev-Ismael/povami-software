<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id' , 'title' , 'content', 'price', 'deadline',  
    ];

    ############################## Relations ################################
    public function user(){
        return  $this -> belongsTo("App\Models\User") ;  
    }
    
    public function payment_method(){
        return  $this -> belongsTo("App\Models\PaymentMethod") ;  
    }

}
