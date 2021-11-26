<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if($role == 'user'){
            return view('welcome');
        }else{
            $customers = DB::table('users')->where('role', 'user')->orderBy('created_at', 'DESC')->get();
            return view('home')->with('customers', $customers);
        }
        
    }
}
