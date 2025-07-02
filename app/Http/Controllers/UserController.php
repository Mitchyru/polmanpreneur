<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('admin.index', ['users' => $model->paginate(15)]);
    }
    public function destroy($nim){
        User::destroy($nim);
        return redirect()->back();
    }
    function updateStatus($nim)
    {
	$user = User::select('setStatus')
				->where('nim','=',$nim)
				->first();

	if($user -> setStatus == '1'){
		$setStatus = '0';
	}else{
		$setStatus = '1';
	}

	$values = array('setStatus' => $setStatus);
	DB::table('user')->where('nim',$nim)->update($values);

    return redirect()->back();
    }
    function updateLevel($nim)
    {
	$user = DB::table('user')
				->select('setLevel','setSeller')
				->where('nim','=',$nim)
				->first();

	if($user->setLevel == '1'){
		$setLevel = '0';
        $setSeller = '0';
	}else{
		$setLevel = '1';
        $setSeller = '0';
	}

	$values = array('setLevel' => $setLevel , 'setSeller' => $setSeller );
	DB::table('user')->where('nim',$nim)->update($values);

    return redirect()->back();
    }
    function updateSeller($nim)
    {
	$user = DB::table('user')
				->select('setSeller')
				->where('nim','=',$nim)
				->first();

	if($user->setSeller == '1'){
		$setSeller = '0';
	}else{
		$setSeller = '1';
	}

	$values = array('setSeller' => $setSeller );
	DB::table('user')->where('nim',$nim)->update($values);

    return redirect()->back();
    }

    //Product

    public function yourProduct($user_id)
    {
        $products = DB::table('products')->where('user_id', $user_id)->get();
        return view('users.product', ['products' => $products]);
    }
    public function productDestroy($product_id){
        Product::destroy($product_id);
        return redirect()->back();
    }
    public function addProduct(){
        return view('users.addProduct',[
            "title" => "Add Product",
            "data" => category::all()
        ]);
    }
    public function store(Request $request){
        $request->validate([
        'user_id' => 'required',
        'name' => 'required',
        'price' => 'required',
        'category' => 'required',
        'desc' => 'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'user_id'  => $request->user_id,
            'name'  => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'desc'  => $request->desc,
            'image' => $imageName
        ]);
        return redirect()->back()->withStatus(__('Product Successfully Added.'));
    }
    function updateStock($product_id)
    {
	$user = DB::table('products')
				->select('setStock')
				->where('product_id','=',$product_id)
				->first();

	if($user->setStock == '1'){
		$setStock = '0';
	}else{
		$setStock = '1';
	}

	$values = array('setStock' => $setStock );
	DB::table('products')->where('product_id',$product_id)->update($values);

    return redirect()->back();
    }
    function updateVisible($product_id)
    {
	$user = DB::table('products')
				->select('setVisible')
				->where('product_id','=',$product_id)
				->first();

	if($user->setVisible == '1'){
		$setVisible = '0';
	}else{
		$setVisible = '1';
	}

	$values = array('setVisible' => $setVisible );
	DB::table('products')->where('product_id',$product_id)->update($values);

    return redirect()->back();
    }
    function updateStatusProduct($product_id)
    {
	$user = DB::table('products')
				->select('setStatus')
				->where('product_id','=',$product_id)
				->first();

	if($user->setStatus == '1'){
		$setStatus = '0';
	}else{
		$setStatus = '1';
	}

	$values = array('setStatus' => $setStatus );
	DB::table('products')->where('product_id',$product_id)->update($values);

    return redirect()->back();
    }
    public function editProduct($product_id)
    {
        $products = DB::table('products')->where('product_id', $product_id)->first();
        return view('users.editProduct',['title' => 'Edit Product' ],compact('products'));
    }
    public function updateProduct(Request $request, $product_id){
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
    
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        
        Product::find($product_id)->update([
            'user_id'  => $request->user_id,
            'name'  => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'desc'  => $request->desc,
            'image' => $imageName
        ]);
        return redirect()->back()->withStatus(__('Product Successfully Edited.'));
    }
    public function searchProduct(Request $request){
        $keyword = $request->search;
        $products = DB::table('products')
				->where('name', 'like', "%" . $keyword . "%")
                ->where('user_id','=',Auth::user()->user_id)
				->paginate(10);

        return view('users.product', compact('products'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function searchUser(Request $request){
        $keyword = $request->search;
        $users = User::where('nim', 'like', "%" . $keyword . "%")->orWhere(
        'name', 'like', "%" . $keyword . "%")->paginate(10);
        return view('users.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function searchUserApproval(Request $request){
        $keyword = $request->search;
        $users = DB::table('user')
				->where('name', 'like', "%" . $keyword . "%")
                ->where('setStatus','=',0)
                ->orWhere('nim', 'like', "%" . $keyword . "%")
                ->where('setStatus','=',0)
				->paginate(10);
        return view('admin.userApproval', compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function searchProductApproval(Request $request){
        $keyword = $request->search;
        $products = DB::table('products')
				->where('name', 'like', "%" . $keyword . "%")
                ->where('setStatus','=',0)
				->paginate(10);
        return view('admin.productApproval', compact('products'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}

