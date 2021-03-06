<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role' , 3 )->orderBy('id','desc')->paginate(50);
        return view("admin.users" , compact('users'));
        // return $users;
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

        // Create User in DB
        $user = User::create([   // User mean model and 
            'name'      => $request -> name ,    
            'email'     => $request -> email , 
            'phone'     => $request -> phone , 
            'address'   => $request -> address , 
            'password' => Hash::make( $request -> password ),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'coupon' => Str::random(10),
        ]);
        if(!$user){  // If Create user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "insert operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "user created successfully" ,
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
        $user = User::find( $id );  
        if(!$user){  // If get user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get user failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // get Successfully
            "msg"    => "user get successfully" ,
            "user"   => $user ,
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


        // Get User
        $user = User::find( $id );  
        if(!$user){  // If get user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get user failed" ,
            ]);
        }


        // Update in DB
        $update = $user-> update( $request ->all() );
        if(!$update){  // If update user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "update operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "user updated successfully" ,
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
        

        // Get User
        $user = User::find( $id );  
        if(!$user){  // If get user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get user failed" ,
            ]);
        }

        // Delete User
        $delete = $user->delete();
        if(!$delete){  // If update user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "delete operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "user deleted successfully" ,
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


        // Get User
        $user = User::where([ ["email" , '=' , $request->email ] , ["role" , '=' , '3' ] ])->get(); 
        if($user->isEmpty()){  // If get user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "user not found" ,
            ]);
        }

        return response() -> json([
            'status' => 'success',
            'user' => $user,
        ]);

    }



}
