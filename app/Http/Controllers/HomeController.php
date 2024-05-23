<?php

namespace App\Http\Controllers;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::id() == 1){
            return view('admin.index');
        }else{
            $establecimientos_owner = Establecimiento::where('users_id', Auth::id())->get();
            return view('home', compact('establecimientos_owner'));
        }
        
    }
}
