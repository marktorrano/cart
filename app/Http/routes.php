<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    
//    $user = App\Models\User::find(1);    
    $type = App\Models\Type::find(6);
    $types = App\Models\Type::all();
//    return $user->username;    
    
    
//    return App\Models\Order::find(1)->products;
    
//    return $type->products;
    return view('product',['type'=>$type], ['types'=>$types]);
    
    
    
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
