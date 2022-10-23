<?php

//use app\Http\Controllers\MainController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/', [\App\Http\Controllers\MainController::class, 'show']);

Route::get(
    'MakeRecord', [\App\Http\Controllers\RecordsController::class, 'newPost']);


Route::get('/login', function (){
    return view('login');
});
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);


Route::get('/register', function (){
    return view('register');
});

Route::post('reg', [\App\Http\Controllers\RegisterController::class, 'register']);
Route::get('reg', function (){
    return back()->withErrors('error','error');
});

Route::post('log', [\App\Http\Controllers\LoginController::class, 'login']);
Route::get('log', function (){
    return back()->withErrors('error','error in login');
});

Route::get('/direct', [\App\Http\Controllers\DirectMessages::class, 'list']);
Route::post('sendMessage', [\App\Http\Controllers\DirectMessages::class, 'send']);


//Route::get('/id/{name}', [\App\Http\Controllers\MainController::class, 'Answer']);
