<?php

namespace App\Http\Controllers;

use App\Models\ForumRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function show(){

        $ForumRecords = DB::table('forum_records')
            ->orderBy('id', 'desc')
            ->get();

        //$ForumRecords=ForumRecord::All();
        return view('main', ['records'=>$ForumRecords]);

    }
    public function Answer($a123){
        if (is_numeric($a123))
        echo "вы ввели число ". $a123." сверху, не правда ли?<br><br>Кстати это уже второй метод контроллера, а возможно и другой контрллер";
        else echo "Я СКАЗАЛ ЧИСЛО ВВЕДИ, А НЕ КРАКОЗЯБРУ<br><br>Кстати это уже второй метод контроллера, а возможно и другой контрллер";


    }
    public function ShowForum(){

    }
}
