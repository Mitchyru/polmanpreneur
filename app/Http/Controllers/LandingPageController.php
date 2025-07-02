<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index(){
        $userCount = User::count();
        $productCount = Product::count();
        $activeCount = User::where('setStatus', 1)->count();
        $testimonials = DB::table('testimonials')->join('user', 'user.user_id', '=', 'testimonials.user_id')->get();
        return view('landing.index',['title' => 'Welcome',],compact('userCount'))->with('testimonials', $testimonials)->with('activeCount',$activeCount)->with('productCount',$productCount);
    }
    public function send(Request $request){
        $request->validate([
            'user_id' => 'required',
            'testimonials' => 'required',
            ]);

        Testimonials::create([
            'user_id'  => $request->user_id,
            'testimonials'  => $request->testimonials
        ]);
        return redirect()->to('/'.'#testimonials')->withStatus(__('Thank you for helping us to be better.'));
    }
}
