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
    $type = App\Models\Type::find(2);
    $types = App\Models\Type::all();
//    return $user->username;    
    
    
//    return App\Models\Order::find(1)->products;
    
//    return $type->products;
    return view('productlist',['type'=>$type], ['types'=>$types]);
    
    
    
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


    Route::get('login', function () {



        return view('login');

    });

    Route::get('users/create', function () {

        return view('registerform');

    });

    Route::post('users', function (App\Http\Requests\CreateUserRequest $req) {

        $user = App\Models\User::create(Request::all());

//        return redirect('users/create')->with('message', 'Thanks for registering');

    });

    Route::get('types/{id}', function ($id) {

        $type = App\Models\Type::find($id);
        return view('productlist',['type'=>$type]);

    });

    Route::get('users/{id}', function ($id) {

        $user = App\Models\User::find($id);


        return view('userdetails',['user'=>$user]);

    });
    //
});
