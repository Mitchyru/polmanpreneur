<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Letter;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    public function user(User $model)
    {
        $users = DB::table('user')->where('setStatus', 0)->orderByDesc('created_at' )->get();
        return view('admin.userApproval', ['users' => $users]);
    }
    public function product(Product $model)
    {
        $products = DB::table('products')->where('setStatus', 0)->orderByDesc('created_at' )->get();
        return view('admin.productApproval', ['products' => $products]);
    }
    public function letter(Letter $model)
    {
        $join = DB::table('letters')
        ->join('user', 'user.user_id', '=', 'letters.user_id')
        ->where(['user.setSeller' => '0'])->orderByDesc('letters.created_at' )->get();
        return view('admin.letterApproval', ['join' => $join]);
    }
    
}
