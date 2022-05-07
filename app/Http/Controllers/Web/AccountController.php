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
        $this->middleware(['auth','verified']);
    }

    public function index()
    {

        $user_id = Auth::id();
        $user_info = User::find($user_id);
        $contracts = Contract::where('user_id' , $user_id )->orderBy('id','desc') ->paginate(50) ;
        $payment_methods = PaymentMethod::get();

        // View Account Blade
        return view("web.account" , compact( 'contracts' , 'payment_methods' , 'user_info' ));

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

    public function searchCoupon( Request $request ){   // check if {email?} empty


        // Check Validator
        $validator = Validator::make($request->all(), [
            'coupon'     =>  ['string',  'max:10'],
        ]);


        if ($validator->fails()) {
            // Session::set('priceDiscounted', false);
            return response() -> json([
                'status' => 'error',
                'msg'    => 'coupon not valid',
            ]);
        }


        // Get Coupon
        $user = User::where([ ["coupon" , '=' , $request->coupon ] , ["role" , "=" , "2"]  ])->get();
        if($user->isEmpty()){  // If get user fails
            // Session::set('priceDiscounted', false);
            return response() -> json([
                "status" => 'error' ,
                "msg" => "coupon not valid" ,
            ]);
        }

        return response() -> json([
            'status' => 'success',
            'user' => $user,
        ]);
        // Session::set('priceDiscounted', true);


    }




    public function updateUserInfo(Request $request)
    {

        // Check Validator
        $validator = Validator::make($request->all(), [
            'first_name'     =>  [ 'nullable' , 'string' , 'max:55' ],
            'last_name'      =>  [ 'nullable' , 'string' , 'max:55' ],
            'phone'          =>  [ 'nullable' , 'string' , 'max:55' ],
            'phone2'         =>  [ 'nullable' , 'string' , 'max:55' ],
            'facebook'       =>  [ 'nullable' , 'url' , 'max:255' ],
            'twitter'        =>  [ 'nullable' , 'url' , 'max:255' ],
            'instagram'      =>  [ 'nullable' , 'url' , 'max:255' ],
            'country'        =>  [ 'nullable' , 'string' , 'max:55' ],
            'city'           =>  [ 'nullable' , 'string' , 'max:55' ],
            'address'        =>  [ 'nullable' , 'string' , 'max:255' ],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }


        // Get User
        $user_id = Auth::id();
        $user = User::find( $user_id );
        if(!$user){  // If get user fails
            return response() -> json([
                "status" => 'error' ,
                "msg" => "get user failed" ,
            ]);
        }


        // Update in DB
        $update = $user-> update( $request->all() );
        if(!$update){  // If update user fails
            return response() -> json([
                "status" => 'error' ,
                "msg" => "update operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "information updated successfully" ,
        ]);


    }


}
