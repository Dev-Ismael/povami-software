<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliator_id', 'payment_method_id', 'amount', 'status' 
    ];

    ############################## Relations ################################
    public function payment_method(){
        return  $this -> belongsTo("App\Models\PaymentMethod") ;  
    }
}
