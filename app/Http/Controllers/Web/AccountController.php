<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user_id = Auth::id();
        $contracts = Contract::where('user_id' , $user_id )->orderBy('id','desc') ->paginate(50) ;
        $payment_methods = PaymentMethod::get();

        // View Account Blade
        return view("web.account" , compact( 'contracts' , 'payment_methods' ));

    }


    public function showContract($id)
    {
        $contract = Contract::with("user")->find( $id );  
        if(!$contract){  // If get contract fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get contract failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // get Successfully
            "msg"    => "contract get successfully" ,
            "contract"   => $contract ,
        ]);
    }


    public function showPaymentMethod($id)
    {
        
        $paymentMethod = PaymentMethod::find( $id );  
        if(!$paymentMethod){  // If get paymentMethods fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get paymentMethod failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // get Successfully
            "msg"    => "paymentMethod get successfully" ,
            "paymentMethod"   => $paymentMethod ,
        ]);

    }

    public function searchCoupon(Request $request){
        
        // Check Validator
        $validator = Validator::make($request->all(), [
            'coupon'     =>  ['string',  'max:55'],
        ]);

        return response() -> json([
            'coupon' => $request->all(),
        ]); 


        // if ($validator->fails()) {
        //     return response() -> json([
        //         'status' => 'error',
        //         'msg'    => 'validation error',
        //         'errors' => $validator->getMessageBag()->toArray()
        //     ]); 
        // }


        // // Get User
        // $user = User::where([ ["coupon" , '=' , $request->coupon ]  ])->get(); 
        // if($user->isEmpty()){  // If get user fails
        //     return response() -> json([
        //         "status" => 'error' ,   
        //         "msg" => "user not found" ,
        //     ]);
        // }

        // return response() -> json([
        //     'status' => 'success',
        //     'user' => $user,
        // ]);

    }

    
}
