@extends('template')
       @section('content')      
			<h2>Register New Account</h2>
			{!! Form::open(array('url' => 'users')) !!}
				<fielset>
             {!! Form::label('username', 'Username'); !!}
             {!! Form::text('username'); !!}
             {!! $errors->first('username', '<p class="error">:message</p>')!!}
             
             {!! Form::label('email', 'Email Address'); !!}
             {!! Form::text('email', 'example@mail.com'); !!}
             {!! $errors->first('email', '<p class="error">:message</p>')!!}
             
             {!! Form::label('password', 'Password'); !!}
             {!! Form::password('password'); !!}
             {!! $errors->first('password', '<p class="error">:message</p>')!!}
             
             {!! Form::label('password_confirmation', 'Confirm Password'); !!}
             {!! Form::password('password_confirmation'); !!}
             
             {!! Form::label('firstname', 'First Name'); !!}
             {!! Form::text('firstname', 'John'); !!}
             {!! $errors->first('firstname', '<p class="error">:message</p>')!!}
             
             {!! Form::label('lastname', 'Last Name'); !!}
             {!! Form::text('lastname', 'Smith'); !!}
             {!! $errors->first('lastname', '<p class="error">:message</p>')!!}
             
             {!! Form::reset('Reset', ['class' => 'form-button']); !!}
             {!! Form::submit('Register');   !!}

				</fielset>
			{!! Form::close() !!}
			
		@stop