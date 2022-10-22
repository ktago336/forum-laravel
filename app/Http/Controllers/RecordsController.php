<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RecordsController extends Controller
{
    public function newPost(Request $request)
    {
        if (Auth::check()) {
            $input = $request->validate([
                'text' => 'required',
            ]);

            $date=date('Y/m/d  H:i:s');

            DB::insert('insert into forum_records (message, author, time) values (?, ?, ?)',
                [$request->input('text'),$name=auth()->user()->name, $date]);

            return redirect()->to('/');
        }
    }
}
