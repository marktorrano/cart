@extends('template')
       @section('content')       

        <h2>Register New Account</h2>
			<h3>Name: </h3>
			<p>{{$product->name}}</p>
			<h3>Desctiption: </h3>
			<p>{{$product->description}}</p>
			<h3>Price: </h3>
			<p>{{$product->price}}</p>		
			<h3>Type: </h3>
			<p>{{$product->type_id}}</p>	
			
        <h2>List of Products</h2>
        @foreach(App\Models\Product::all() as $product)
        
        <a href="{{url('products/'.$product->id.'/edit')}}">{{$product->name}}</a><br/>
        
        @endforeach
		@stop