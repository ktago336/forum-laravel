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
            ->orHaving('send','=',intval(auth()->user()->id))
            ->join('users','direct_messages.send','=','users.id')
            ->get();


        return view('direct', ['fromWho'=>$messagesFrom]);

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

    public function conversation(Request $request, $withWho){

        $messages=DB::table('direct_messages')
            ->where(
                'receive', '=', intval(auth()->user()->id))
            ->where('send','=',$withWho)

            ->orWhere(
                'send', '=', intval(auth()->user()->id))
            ->where('receive','=',$withWho)

            ->get();


        $fromID=intval(auth()->user()->id);
        $toID=$withWho;

        $MyName=DB::table('users')
            ->where('id','=',$fromID)
            ->get();
        $HisName=DB::table('users')
            ->where('id','=',$toID)
            ->get();

        $MyName=strval($MyName->name);
        $CompanionName=strval($HisName->name);


        return view('dialogue', ['messages'=>$messages, 'toWho'=>$withWho, 'me'=>$MyName, 'companion'=>$CompanionName],);

    }

    public function sendTo(Request $request, $toWho){
        $message=$request->validate([
            'message'=>'required'
        ]);

        $fromID=intval(auth()->user()->id);
        $toID=$toWho;
        $date=strval(date('Y/m/d  H:i:s'));
        $text=strval($message['message']);


        DB::insert('insert into direct_messages (send, receive, message, date) values (?, ?, ?, ?)'
            ,[$fromID, $toID, $text, $date]);

        return back();
    }
}
