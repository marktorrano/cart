@extends('template')
       @section('content')      
			<h2>Edit Product Details</h2>
			{!! Form::model($product, array('url' => 'products/'.$product->id, 'method'=>'put', 'files' => 'true', 'enctype' => "multipart/form-data")) !!}
				<fielset>
            
             <img src="{{url('productphotos/'.$product->photo)}}" class="productphoto"/>
             {!! Form::label('name', 'Product Name') !!}
             {!! Form::text('name') !!}
             {!! $errors->first('name', '<p class="error">:message</p>')!!}
             
             {!! Form::label('description', 'Description') !!}
             {!! Form::textarea('description') !!}
             {!! $errors->first('description', '<p class="error">:message</p>')!!}
             
             {!! Form::label('price', 'Price') !!}
             {!! Form::text('price') !!}
             {!! $errors->first('price', '<p class="error">:message</p>')!!}
             
             {!! Form::label('type_id', 'Type') !!}
             {!! Form::select('type_id' ,App\Models\Type::lists('name','id')) !!}
             {!! $errors->first('type_id', '<p class="error">:message</p>')!!}
             
             {!! Form::label('photo','Photo',array('id'=>'','class'=>'')) !!}
             {!! Form::file('photo','',array('id'=>'','class'=>'')) !!}
             
             {!! Form::submit('Update');   !!}

				</fielset>
			{!! Form::close() !!}
			
		@stop