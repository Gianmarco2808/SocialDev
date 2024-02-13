<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){
        
        $request->request->add(['username' => Str::lower($request->username)]);

        $this->validate($request,[
            'name' => 'required|max:40',
            'username' => 'required|unique:users|min:3|max:40',
            'email' => 'required|unique:users|email|max:70',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //autenticar al usuario
        auth()->attempt($request->only('email','password'));

        return redirect()->route('post.index');
    }
}
