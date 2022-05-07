<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {

    }

    public function showRegisterForm()
    {
        return view("affiliate/register");

    }

    public function register(Request $request)
    {

        // Validation
        $request->validate([
            'name'     => ['required', 'string', 'max:55'],
            'email'    => ['required', 'string', 'email', 'max:55', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Insert User in DB
        $user = User::create([   // User mean model and
            'name'     => $request -> name,
            'email'    => $request -> email,
            'password' => Hash::make( $request -> password ),
        ]);


    }


}
