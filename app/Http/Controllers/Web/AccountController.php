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
}
