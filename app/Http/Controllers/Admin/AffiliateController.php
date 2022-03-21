<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affiliators = User::where('role' , 2 )->orderBy('id','desc')->paginate(50);
        return view("admin.affiliators" , compact('affiliators'));
        // return $affiliators;
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
            'email'     =>  ['required', 'string', 'email', 'max:55', 'unique:users'],
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


        // Create Affiliator in DB
        $affiliator = User::create([   // Affiliator mean model and 
            'name'      => $request -> name ,    
            'email'     => $request -> email , 
            'phone'     => $request -> phone , 
            'address'   => $request -> address , 
            'password' => Hash::make( $request -> password ),
            'role' => '2',   // 2 => Affiliator
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'coupon' => Str::random(10),
        ]);
        if(!$affiliator){  // If Create affiliator fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "insert operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "affiliator created successfully" ,
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
        $affiliator = User::find( $id );  
        if(!$affiliator){  // If get affiliator fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get affiliator failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // get Successfully
            "msg"    => "affiliator get successfully" ,
            "affiliator"   => $affiliator ,
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


        // Get Affiliator
        $affiliator = User::find( $id );  
        if(!$affiliator){  // If get affiliator fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get affiliator failed" ,
            ]);
        }


        // Update in DB
        $update = $affiliator-> update( $request ->all() );
        if(!$update){  // If update affiliator fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "update operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "affiliator updated successfully" ,
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
        

        // Get Affiliator
        $affiliator = User::find( $id );  
        if(!$affiliator){  // If get affiliator fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get affiliator failed" ,
            ]);
        }

        // Delete Affiliator
        $delete = $affiliator->delete();
        if(!$delete){  // If update affiliator fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "delete operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "affiliator deleted successfully" ,
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


        // Get Affiliator
        $affiliator = User::where([ ["email" , '=' , $request->email ] , ["role" , '=' , '2' ] ])->get();  
        if($affiliator->isEmpty()){  // If get affiliator fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "affiliator not found" ,
            ]);
        }

        return response() -> json([
            'status' => 'success',
            'affiliator' => $affiliator,
        ]);

    }



}
