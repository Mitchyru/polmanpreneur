<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TestimonialsController extends Controller
{
    public function index(){
        $testimonials = DB::table('testimonials')
                    ->join('user', 'user.user_id', '=', 'testimonials.user_id')
                    ->get();
        return view('pages.testimonials',['title' => 'Testimonials',])->with('testimonials', $testimonials);
    }
    public function destroy($testi_id){
        Testimonials::destroy($testi_id);
        return redirect()->back();
    }
}
