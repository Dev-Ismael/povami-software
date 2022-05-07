<?php

namespace App\Http\Controllers\Affiliate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function showLoginForm()
    {
        return view("affiliate/login");
    }

    public function login()
    {

    }

    public function showRegisterForm()
    {
        return view("affiliate/register");

    }

    public function register()
    {
        
    }


}
