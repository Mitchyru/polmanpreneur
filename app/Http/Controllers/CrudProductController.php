<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CrudProductController extends Controller
{
    public function index(){
        return view('product.insertproduct',[
            "title" => "Insert Product",]);
    }

    public function create(){
        return view("product.insertproduct",[
            "title" => "Insert Product"
        ]);
    }

    public function store(Request $request){
        $validateData=$request->validate([
            'nim' => 'required',
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        product::create([
            'nim' => $request->get('nim'),
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'desc' => $request->get('desc'),
            'status' => $request->get('status'),
            'image' => $imageName
        ]);
        $request->session()->flash('success','Data tersimpan');
        return redirect('list');
    }

    public function destroy($id){
        product::destroy($id);
        return redirect('/list');
    }

    public function edit($id){
        return view("product.editproduct",[
            "title" => "Edit product",
            "id" => $id,
            "product" => product::all()->where('product_id', $id)
        ]);
    }

    public function update(Request $request){
        $validateData=$request->validate([
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        product::find($request->get('id'))->update([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'desc' => $request->get('desc'),
            'status' => $request->get('status'),
            'image' => $imageName
        ]);
        return redirect('/list');
    }
    public function show(){
        return view('product.listproduct',[
            'title' => 'List Product',
            "data" => product::all()->where('nim', Auth::user()->nim)
        ]);
    }
}
