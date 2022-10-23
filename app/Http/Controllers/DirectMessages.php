<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DirectMessages extends Controller
{
    public function list(Request $request){
        if (!Auth::check()){
            return redirect()->to('/');
        }

        $messagesFrom=DB::table('direct_messages')
            ->groupBy('send')
            ->having('receive','=', intval(auth()->user()->id))
            ->get();

        return view('direct', ['fromWho'=>$messagesFrom]);
//        foreach ($messagesFrom as $from){
//            echo $from->name.'<br>';
//        }
    }

    public function send(Request $request){
        $message=$request->validate([
            'to'=>['required', 'unique:users,id'],
            'message'=>'required'
        ]);

        $fromID=intval(auth()->user()->id);
        $toID=DB::table('users')
            ->where('name','=' ,$message['to'])
            ->first()->id;
        $date=strval(date('Y/m/d  H:i:s'));
        $text=strval($message['message']);

        DB::insert('insert into direct_messages (send, receive, message, date) values (?, ?, ?, ?)'
            ,[$fromID, $toID, $text, $date]);
        return redirect()->to('/direct');
    }
}
