<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\CursorPaginator;

class ChatsController extends Controller
{
    public function index($id){
        return view('message.chat',[
            "title" => "Chat",
            "user" => user::all(),
            "id" => $id,
            "message" => message::all(),
        ]);
    }

    public function dashboard(){
        return view('message.chatDashboard',[
            "title" => "Chat",
            "user" => user::all(),
            "message" => message::all(),
        ]);
    }

    public function fetchMessage($id){
        return view('message.chat',[
            "title" => "Chat",
            "user" => user::find($id),
            "message" => message::all(),
        ]);
    }

    public function sendMessage(Request $request){
        $validateData=$request->validate([
            'to_user_id' => 'required',
            'from_user_id'=>'required',
            'message' => 'required'
        ]);
        message::create([
            'from_user_id' => $request->get('from_user_id'),
            'to_user_id' => $request->get('to_user_id'),
            'message' => $request->get('message')
        ]);
        $link = $request->get('to_user_id');
        return redirect()->to('/chat/'.$link);
    }
}
