<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email','password'), $request->remenber)) {
            return back()->with('mensaje', 'Credenciales inválidas');
        }

        return redirect()->route('post.index', auth()->user()->username);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
