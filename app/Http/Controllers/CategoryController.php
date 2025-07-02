<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('category.category',[
            "title" => "Insert Category",]);
    }

    public function create(){
        return view("category.insertcategory",[
            "title" => "Insert Product"
        ]);
    }

    public function store(Request $request){
        $validateData=$request->validate([
            'category_name' => 'required'
        ]);

        category::create([
            'category_name' => $request->get('category_name')
        ]);
        $request->session()->flash('success','Data tersimpan');
        return redirect()->back();
    }

    public function destroy($id){
        category::destroy($id);
        return redirect()->back();
    }
    public function list(){
        $category = DB::table('categories')->get();
        return view('category.category', ['category' => $category]);
    }
}