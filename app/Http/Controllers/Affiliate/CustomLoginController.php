<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{

    public function login(Request $request){

        $this -> validate( $request , [
            "email"    => "required|email" ,
            "password" => "required|min:6" ,
        ]);

        if( Auth::guard("affiliator") -> attempt([ "email" => $request -> email , "password" => $request -> password ]) ){  // attempt ==> mean see it in tables
            return redirect() -> intended("/affiliate");
        }

        return  "not found";

    }

}
