<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\TokenCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferalController extends Controller
{
    public function index()
    {
        return view('referal');
    }

    public function processForm(Request $request)
    {
        $validatedData = $request->validate([
            'referal' => ['required', 'max:255', new TokenCheck], // Use the custom rule
        ]);

        $parent_id = User::where('referal_token',$request->referal)->first('id');
        
        $userId = Auth::id();
        $user = User::find($userId);
        $user->referrer_id = $parent_id->id;
        $user->save();

        return redirect()->route('home');
    }
}
