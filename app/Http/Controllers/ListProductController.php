<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ListProductController extends Controller
{
    public function index(){

        return view('product.listproduct',[
            'title' => 'List Product',
            "data" => product::all()->where('nim', Auth::user()->nim)
        ]);
    }
}
