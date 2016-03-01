@extends('template')
       @section('content')       

        <h2>Product Details</h2>
            <img src="{{url('productphotos/'.$product->photo)}}" class="productphoto"/>
			<h4>Name: </h4>
			<p>{{$product->name}}</p>
			<h4>Description: </h4>
			<p>{{$product->description}}</p>
			<h4>Price: </h4>
			<p>{{$product->price}}</p>		
			<h4>Type: </h4>
			<p>{{$product->type_id}}</p>	
			
           {{Form::open(array('url' => 'cart-items'))}}
           
           {{Form::label('quantity', 'Qty')}}
           {{Form::text('quantity')}}
           
           {{Form::hidden('product_id', $product->id)}}
           
           {{Form::submit('Add')}}
           
           {{Form::close()}}
       
        <h2>List of Products</h2>
        @foreach(App\Models\Product::all() as $product)
        <a href="{{url('products/'.$product->id.'/edit')}}">[edit] </a>
        <a href="{{url('products/'.$product->id)}}">{{$product->name}}</a><br/>
        
        @endforeach
		@stop