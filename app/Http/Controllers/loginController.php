<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        
        return view('pages/loginPage');
    }

    public function store(Request $request){

        $request->validate([
            'user' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt([

            'email' => $request->user,
            'password' => $request->password

        ])) {
            return back()->with('message', 'Credenciales Incorrectas');
        }
        $request->session()->regenerate(); // Previene ataques de sesión
        return redirect()->route('mainPage');
    }
}
