<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only'=>['store','create','edit','update','delete']]);   
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get products/create
        return view('createproductform');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        //post products
        
        $product = Product::create($request->all());

        $newName = "photo". $product->id . ".jpg";
        
        $request->file('photo')->move("productphotos", $newName);
        
        $product->photo = $newName;

        $product->save();

        return redirect('types/'. $product->type->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //products{id}
        $product = Product::find($id);

        return view('productdetails',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //products/{id}/edit
        $product = Product::find($id);
        
        return view('editproductform', ['product'=>$product]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        //put products/{id}
        
        $product = Product::find($id);
                    
        $product->fill($request->all());  
        
        $newName = "photo". $product->id . ".jpg";
        
        $request->file('photo')->move("productphotos", $newName);
        
        $product->photo = $newName;   
        
        $product->save();
        
        return redirect('products/'. $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
