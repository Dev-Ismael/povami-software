<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentMethod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class PaymentMethodController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::orderBy('id','desc')->paginate(50);
        return view("admin.payment_methods" , compact('paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Check Validator
        $validator = Validator::make($request->all(), [
            'name'       =>  ['required', 'string', 'max:55'],
            'account'    =>  ['required', 'string', 'max:255'],
            'img'        => 'required|mimes:jpeg,png,jpg|max:2048' ,
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]); 
        }

        //  Upload image & Create name img
        $file_extention = $request -> img -> getClientOriginalExtension();
        $file_name = time() . "." . $file_extention;   // name => 3628.png
        $path = "images/payment_methods" ;
        $request -> img -> move( $path , $file_name );

        // Created PaymentMethod in DB
        $paymentMethods = PaymentMethod::create([   
            'name'        => $request -> name ,   
            'account'     => $request -> account , 
            'img'         => $file_name ,
        ]);

        if(!$paymentMethods){  // If Created paymentMethods fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "insert operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "paymentMethods created successfully" ,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentMethods = PaymentMethod::find( $id );  
        if(!$paymentMethods){  // If get paymentMethods fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get paymentMethods failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // get Successfully
            "msg"    => "paymentMethods get successfully" ,
            "paymentMethods"   => $paymentMethods ,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        // Check Validator
        $validator = Validator::make($request->all(), [
            'name'       =>  ['required', 'string', 'max:55'],
            'account'    =>  ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]); 
        }

        
        

        // Get payment Method
        $paymentMethod = PaymentMethod::find( $id );  
        if(!$paymentMethod){  // If get paymentMethod fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get payment Method failed" ,
            ]);
        }


        // Check If There Img Uploaded
        if( $request -> hasFile("img") ){
            //  Upload image & Create name img
            $file_extention = $request -> img -> getClientOriginalExtension();
            $file_name = time() . "." . $file_extention;   // name => 3628.png
            $path = "images/payment_methods" ;
            $request -> img -> move( $path , $file_name );
        }else{
            $file_name = $paymentMethod->img;
        }



        // Update in DB
        $update = $paymentMethod-> update([
            'name'        => $request -> name ,   
            'account'     => $request -> account , 
            'img'         => $file_name ,
        ]);
        if(!$update){  // If update paymentMethod fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "update operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "payment Method updated successfully" ,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        // Get PaymentMethod
        $paymentMethod = PaymentMethod::find( $id );  
        if(!$paymentMethod){  // If get paymentMethods fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get Payment Method failed" ,
            ]);
        }

        // Delete PaymentMethod
        $delete = $paymentMethod->delete();
        if(!$delete){  // If update paymentMethod fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "delete operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "Payment Method deleted successfully" ,
        ]);


    }


}
