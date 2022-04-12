<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('role' , 3 )->orderBy('id','desc')->paginate(50);
        return view("admin.orders" , compact('orders'));
        // return $orders;
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
            'name'      =>  ['required', 'string', 'max:55'],
            'email'     =>  ['required', 'string', 'email', 'max:55', 'unique:orders'],
            'phone'     =>  [ 'max:55' ],
            'address'   =>  [ 'max:255' ],
            'password'  =>  ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
        
            ]); 
        }

        // Create Order in DB
        $order = Order::create([   // Order mean model and 
            'name'      => $request -> name ,    
            'email'     => $request -> email , 
            'phone'     => $request -> phone , 
            'address'   => $request -> address , 
            'password' => Hash::make( $request -> password ),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'coupon' => Str::random(10),
        ]);
        if(!$order){  // If Create order fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "insert operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "order created successfully" ,
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
        $order = Order::find( $id );  
        if(!$order){  // If get order fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get order failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // get Successfully
            "msg"    => "order get successfully" ,
            "order"   => $order ,
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
            'name'      =>  ['required', 'string', 'max:55'],
            'email'     =>  ['required', 'string', 'email', 'max:55'],
            'phone'     =>  [ 'max:55' ],
            'address'   =>  [ 'max:255' ],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]); 
        }


        // Get Order
        $order = Order::find( $id );  
        if(!$order){  // If get order fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get order failed" ,
            ]);
        }


        // Update in DB
        $update = $order-> update( $request ->all() );
        if(!$update){  // If update order fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "update operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "order updated successfully" ,
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
        

        // Get Order
        $order = Order::find( $id );  
        if(!$order){  // If get order fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get order failed" ,
            ]);
        }

        // Delete Order
        $delete = $order->delete();
        if(!$delete){  // If update order fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "delete operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "order deleted successfully" ,
        ]);


    }


    public function search( Request $request ){   // check if {email?} empty

        // Check Validator
        $validator = Validator::make($request->all(), [
            'email'     =>  ['required', 'string', 'email', 'max:55'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]); 
        }


        // Get Order
        $order = Order::where([ ["email" , '=' , $request->email ] , ["role" , '=' , '3' ] ])->get(); 
        if($order->isEmpty()){  // If get order fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "order not found" ,
            ]);
        }

        return response() -> json([
            'status' => 'success',
            'order' => $order,
        ]);

    }



}
