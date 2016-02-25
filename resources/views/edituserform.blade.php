@extends('template')
       @section('content')      
			<h2>Edit User Information</h2>
			{!! Form::model($user, array('url' => 'users/'.$user->id, 'method'=>'put')) !!}
				<fielset>
             {!! Form::label('username', 'Username'); !!}
             {!! Form::text('username'); !!}
             {!! $errors->first('username', '<p class="error">:message</p>')!!}
             
             {!! Form::label('email', 'Email Address'); !!}
             {!! Form::text('email'); !!}
             {!! $errors->first('email', '<p class="error">:message</p>')!!}
             
             {!! Form::label('firstname', 'First Name'); !!}
             {!! Form::text('firstname'); !!}
             {!! $errors->first('firstname', '<p class="error">:message</p>')!!}
             
             {!! Form::label('lastname', 'Last Name'); !!}
             {!! Form::text('lastname'); !!}
             {!! $errors->first('lastname', '<p class="error">:message</p>')!!}
             
             {!! Form::submit('Update');   !!}

				</fielset>
			{!! Form::close() !!}
			
		@stop