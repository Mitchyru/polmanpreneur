<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\CursorPaginator;

class ContactController extends Controller
{
    public function show(){
        $contacts = DB::table('contacts')->get();
        return view('admin.contact', ['contacts' => $contacts]);
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        contact::create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);
        return redirect()->to('/.#contact');
    }

    public function destroy($id){
        contact::destroy($id);
        return redirect()->back();
    }
}
