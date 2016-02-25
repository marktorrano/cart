@extends('template')
       @section('content')    

			<h2>Create New Product</h2>
			{!! Form::open(array('url' => 'products')) !!}
				<fielset>
             {!! Form::label('name', 'Name'); !!}
             {!! Form::text('name'); !!}
             {!! $errors->first('name', '<p class="error">:message</p>')!!}
             
             {!! Form::label('description', 'Description'); !!}
             {!! Form::textarea('drescription'); !!}
             {!! $errors->first('description', '<p class="error">:message</p>')!!}
             
             {!! Form::label('price', 'Price'); !!}
             {!! Form::text('price'); !!}
             {!! $errors->first('price', '<p class="error">:message</p>')!!}
             
             {!! Form::label('type_id', 'Type'); !!}
             {!! Form::select('type_id', App\Models\Type::lists('name')); !!}
             {!! $errors->first('type_id', '<p class="error">:message</p>')!!}
              
             {!! Form::reset('Reset', ['class' => 'form-button']); !!}
             {!! Form::submit('Add Product');   !!}

				</fielset>
			{!! Form::close() !!}
			
		@stop