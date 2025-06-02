<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class userRegisterController extends Controller
{
    public function index(){
        
        return view('pages/userRegister');
    }

    public function store(Request $request){   
        //Request Validation
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        //User creation
        
        if($validated){
           
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //Session start
            Auth::login($user);

            //Redirect the user after complete registration
            return redirect()->route('mainPage');
        }
    }
}
