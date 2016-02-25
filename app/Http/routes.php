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
        
    Route::get('products/create', function () {   

        return view('createproductform');

    });
        

    Route::post('users', function (App\Http\Requests\CreateUserRequest $req) {

        $user = App\Models\User::create(Request::all());

    });
        
    Route::post('products', function (App\Http\Requests\CreateProductRequest $req) {

        $product = App\Models\Product::create(Request::all());
        
    });
        

    Route::get('types/{id}', function ($id) {

        $type = App\Models\Type::find($id);
        return view('productlist',['type'=>$type]);

    });

    Route::get('users/{id}', function ($id) {

        $user = App\Models\User::find($id);

        return view('userdetails',['user'=>$user]);

    });
        
    Route::get('products/{id}', function ($id) {

        $product = App\Models\Product::find($id);

        return view('productdetails',['product'=>$product]);

    });
        
    Route::get('users/{id}/edit', function ($id) {
        
        $user = App\Models\User::find($id);
        
        return view('edituserform', ['user'=>$user]);

    });
        
    Route::get('products/{id}/edit', function ($id) {
        
        $product = App\Models\Product::find($id);
        
        return view('editproductform', ['product'=>$product]);

    });
        
    Route::put('users/{id}', function(App\Http\Requests\EditUserRequest $req, $id){
               
        $user = App\Models\User::find($id);
        
        $user->fill(Request::all());
        
        $user->save();
        
        return redirect('users/'. $id);
        
    });
        
    Route::put('products/{id}', function(App\Http\Requests\EditProductRequest $req, $id){
               
        $product = App\Models\Product::find($id);
        
        $product->fill(Request::all());
        
        $product->save();
        
        return redirect('products/'. $id);
        
    });
        
    Route::delete('users/{id}', function($id){
               
        
    });
});
