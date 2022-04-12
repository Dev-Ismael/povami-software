<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;


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
            'email'      =>  ['required', 'string', 'email', 'max:55'],
            'title'      =>  ['required', 'string', 'max:50'],
            'content'    =>  ['required', 'string', 'max:4000'],
            'price'      =>  ['required', 'numeric', 'digits_between:1,10'],
            'deadline'   =>  ['required', 'string', 'max:50'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
        
            ]); 
        }


        // Get User
        $user = User::where([ ["email" , '=' , $request->email ] , ["role" , '=' , '3' ] ])->first(); 

        
        // Create Contract in DB
        $contract = Contract::create([   // Contract mean model and 
            'user_id'   => $user -> id ,    
            'title'     => $request -> title ,    
            'content'   => $request -> content , 
            'price'     => $request -> price , 
            'deadline'  => $request -> deadline , 
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
