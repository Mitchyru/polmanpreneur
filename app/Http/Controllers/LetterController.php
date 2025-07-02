<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Letter;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LetterController extends Controller
{
    public function index(){
        return view('letter.letter',[
            "title" => "Approval",
            "data" => letter::all()
        ]);
    }

    public function create(){
        return view("letter.insertLetter",[
            "title" => "Form Pengajuan Seller"
        ]);
    }

    public function store(Request $request){
        $data = new Letter;
        $data->user_id = $request->input('user_id');
        $data->nim = $request->input('nim');
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->file = $request->input('file');

        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $filename = $request->file('file')->getClientOriginalName();
            $file->move(public_path('files'), $filename);
            $data->file = $filename;
        }

        $data->save();
        $request->session()->flash('success','Data tersimpan');
        return redirect('/dashboard');
    }

    public function destroy($id){
        letter::destroy($id);
        return redirect('letter.letter');
    }
    public function searchLetterApproval(Request $request){
        $keyword = $request->search;
        $join = DB::table('letters')
                ->join('user', 'user.user_id', '=', 'letters.user_id')
				->where('user.nim', 'like', "%" . $keyword . "%")
                ->where('setSeller','=',0)
				->paginate(10);
        return view('admin.letterApproval', compact('join'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
