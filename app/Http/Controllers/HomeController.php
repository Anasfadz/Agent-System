<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user_id = Auth::id();
        $user = User::where('id',$user_id)->first();
        $data = User::find($user_id, 'id');
        $data2 = User::ReferalTree($data);
        $data2 = json_decode('[' . str_replace('}{', '},{', $data2) . ']',true);
    
        return view('home', compact('data2','user'));
    }

}
