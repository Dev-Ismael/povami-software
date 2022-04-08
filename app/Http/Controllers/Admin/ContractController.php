<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::orderBy('id','desc')->paginate(50);
        return view("admin.contracts" , compact('contracts'));
        // return $contracts;
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
            'email'     =>  ['required', 'string', 'email', 'max:55', 'unique:contracts'],
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

        // Create Contract in DB
        $contract = Contract::create([   // Contract mean model and 
            'name'      => $request -> name ,    
            'email'     => $request -> email , 
            'phone'     => $request -> phone , 
            'address'   => $request -> address , 
            'password' => Hash::make( $request -> password ),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'coupon' => Str::random(10),
        ]);
        if(!$contract){  // If Create contract fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "insert operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "contract created successfully" ,
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
        $contract = Contract::find( $id );  
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        // Get Contract
        $contract = Contract::find( $id );  
        if(!$contract){  // If get contract fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "get contract failed" ,
            ]);
        }

        // Delete Contract
        $delete = $contract->delete();
        if(!$delete){  // If update contract fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "delete operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // updated Successfully
            "msg" => "contract deleted successfully" ,
        ]);


    }


    

}
