
           @extends('template')

           @section('content') 
           

            <h2>{{$type->name}}</h2>
            
            <?php $products = $type->products()->paginate(6); ?>
            
            @foreach($products as $product)
			<article class="group">		
                <a href="{{url('products/'. $product->id)}}"><img src="{{asset('productphotos/'.$product->photo)}}" alt=""></a>
				<h4><a href="{{url('products/'. $product->id)}}">{{  $product->name }}</a></h4>
				<p>{{ $product->description}}</p>
				<span class="price"><i class="icon-dollar"></i> {{ $product->price}}</span>
				<span class="addtocart"><i class="icon-plus"></i></span>
			</article>
			@endforeach
			
			{!! $products->links() !!}
@stop