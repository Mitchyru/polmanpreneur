<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Rules\AllowedEmail;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.auth',[
            'title' => 'Register',]);
    }
    public function store(Request $request){
        $request->validate([
        'nim' => 'required',
        'name' => 'required',
        'email' => ['required', 'email', new AllowedEmail, 'unique:users,email'],
        'password' => 'required|min:8',
        ]);
        if(User::create($request->all())){
            return redirect()->back()->with('status', 'Success Registration wait for approval from admin');
        }
        else{
            return redirect()->back()->with('status', 'NIM or Name Already Used');
        }
    }
}