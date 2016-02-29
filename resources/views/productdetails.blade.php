@extends('template')
       @section('content')       

        <h2>Product Details</h2>
            <img src="{{url('productphotos/'.$product->photo)}}" class="productphoto"/>
			<h3>Name: </h3>
			<p>{{$product->name}}</p>
			<h3>Description: </h3>
			<p>{{$product->description}}</p>
			<h3>Price: </h3>
			<p>{{$product->price}}</p>		
			<h3>Type: </h3>
			<p>{{$product->type_id}}</p>	
			
        <h2>List of Products</h2>
        @foreach(App\Models\Product::all() as $product)
        <a href="{{url('products/'.$product->id.'/edit')}}">[edit] </a>
        <a href="{{url('products/'.$product->id)}}">{{$product->name}}</a><br/>
        
        @endforeach
		@stop