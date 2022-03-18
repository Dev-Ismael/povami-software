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
        $users = User::get()->where('role' , 3 );
        return view("admin.users.index" , compact('users'));
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
            "msg" => "user created" ,
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
        return "show.users";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit.users";
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
        return "update.users";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "destroy.users";
    }
}
