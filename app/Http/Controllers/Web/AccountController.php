<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contract;

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

        // View Account Blade
        return view("web.account" , compact('contracts'));

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

    
}
