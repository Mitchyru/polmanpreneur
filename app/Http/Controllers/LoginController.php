<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view('auth.auth',[
            'title' => 'Auth',]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth');
    }
    public function authenticate(Request $request)
    {
       $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'setStatus' => 1
        );

        if (Auth::attempt($credentials)) 
        {
            return redirect()->intended('welcome');
        }
        else
        {
            return redirect()->back()->withErrors('Or wait for approval from admin');
        }
    }
}