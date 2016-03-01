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
    Route::get('/', function () {

    return dd(Cart::contents());
 
    });

    Route::get('login', function () {

        return view('loginform');

    });
        
    Route::get('logout', function(){

        Auth::logout();
        
        return redirect('login');
        
    });
    
    Route::get('cart-items', function(){
        
        return view('showcart');
        
    })->middleware(['auth']);

    Route::get('users/create', function () {

        return view('registerform');

    })->middleware(['auth']);
        
    Route::get('products/create', function () {   

        return view('createproductform');

    })->middleware(['auth']);  
        
    Route::get('types/{id}', function ($id) {

        $type = App\Models\Type::find($id);
        
        return view('productlist',['type'=>$type]);

    })->middleware(['auth']);

    Route::get('users/{id}', function ($id) {

        $user = App\Models\User::find($id);

        return view('userdetails',['user'=>$user]);

    })->middleware(['auth', 'auth.user']);
        
    Route::get('products/{id}', function ($id) {

        $product = App\Models\Product::find($id);

        return view('productdetails',['product'=>$product]);

    })->middleware(['auth']);
        
    Route::get('users/{id}/edit', function ($id) {
        
        $user = App\Models\User::find($id);
        
        return view('edituserform', ['user'=>$user]);

    })->middleware(['auth']);
        
    Route::get('products/{id}/edit', function ($id) {
        
        $product = App\Models\Product::find($id);
        
        return view('editproductform', ['product'=>$product]);

    })->middleware(['auth']);        
    
    Route::post('cart-items', function(){
        
        $product = App\Models\Product::find(Request::input('product_id'));
        
        $items = array(
            
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => Request::input('quantity')
            
        );        
        
        Cart::insert($items);

        return redirect('cart-items');
        
    })->middleware(['auth']);
    
    Route::post('users', function (App\Http\Requests\CreateUserRequest $req) {

        $user = App\Models\User::create(Request::all());
        
        $user->password = bcrypt($user->password);
        
        $user->save();
        
        return redirect('users/'.$user->id);

    });
        
    Route::post('login', function (App\Http\Requests\LoginRequest $req) {
        
        
        $credential = $req->only('username', 'password');
        
        if(Auth::attempt($credential)){
            
            return redirect('types/1');  
            
        }else{
            
            return redirect('login')->with('message', 'Try again');
            
        }
    
    });
        
    Route::post('products', function (App\Http\Requests\CreateProductRequest $req) {

        $product = App\Models\Product::create(Request::all());

        $newName = "photo". $product->id . ".jpg";
        
        Request::file('photo')->move("productphotos", $newName);
        
        $product->photo = $newName;

        $product->save();

        return redirect('types/'. $product->type->id); 
        
    })->middleware(['auth']);
        
    Route::put('users/{id}', function(App\Http\Requests\EditUserRequest $req, $id){
               
        $user = App\Models\User::find($id);
        
        $user->fill(Request::all());
        
        $user->save();
        
        return redirect('users/'. $id);
        
    })->middleware(['auth']);
        
    Route::put('products/{id}', function(App\Http\Requests\EditProductRequest $req, $id){
               
        $product = App\Models\Product::find($id);
                    
        $product->fill(Request::all());  
        
        $newName = "photo". $product->id . ".jpg";
        
        Request::file('photo')->move("productphotos", $newName);
        
        $product->photo = $newName;   
        
        $product->save();
        
        return redirect('products/'. $id);
        
    })->middleware(['auth']);        
    
    Route::delete('cart-items/{identifier}', function($identifier){
        
        Cart::item($identifier)->remove();
        
        return redirect('cart-items');
        
    });
    
    Route::delete('users/{id}', function($id){ })->middleware(['auth']);
    
});
