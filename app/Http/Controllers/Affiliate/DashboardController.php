<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use App\Models\PaymentMethod;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = PaymentMethod::get();
        return view("affiliate/dashboard" , compact('payment_methods'));
    }


    public function withdrawalRequest(Request $request){


        return response()->json([
            "payment_method" => $request->payment_method,
        ]);

        // // Check Validator
        // $validator = Validator::make($request->all(), [
        //     'payment_method'  =>  ['required', 'numric' ],
        // ]);
        // if ($validator->fails()) {
        //     return response() -> json([
        //         'status' => 'error',
        //         'msg'    => 'validation error',
        //         'errors' => $validator->getMessageBag()->toArray()
        //     ]); 
        // }

        
        // $affiliator_id = Auth::guard('affiliator')->user()->id ;
        // $affiliator = Affiliator::where( 'id' , $affiliator_id )->first();


        // try {


        //     $createWithdrawal = Withdrawal::create([
        //         'affiliator_id' => $affiliator->id,
        //         'amount'        => $affiliator->balance,
        //         'status'        => '1' , 
        //     ]);
        //     if (!$createWithdrawal) {
        //         return response()->json([
        //             "status" => 'error',
        //             "msg" => "error at operation",
        //         ]);
        //     }
            
        //     // reset balance
        //     $resetBalance = $affiliator->update([
        //         'balance' => '0'
        //     ]);
        //     if (!$resetBalance) {
        //         return response()->json([
        //             "status" => 'error',
        //             "msg" => "error at operation",
        //         ]);
        //     }

        //     return response()->json([
        //         "status" => 'success',
        //         "msg" => "Withdrawal request sent successfully",
        //     ]);

        // }catch (\Exception $e) {

        //     return response()->json([
        //         "status" => 'error',
        //         "msg" => "error at operation",
        //     ]);

        // }

        
    }

}
