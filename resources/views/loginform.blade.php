@extends('template')


    @section('content')  
    
    <h2>Login</h2>
        {!! Form::open(['url' => 'login']) !!}
            <fielset>
            {!! Form::label('username') !!}
            {!! Form::text('username') !!}
            {!! $errors->first('username', '<p class="error">:message</p>')!!}
            
            {!! Form::label('password') !!}
            {!! Form::password('password') !!}
            {!! $errors->first('password', '<p class="error">:message</p>')!!}
            
            {!! Form::submit('Login')   !!}
            </fielset>
        {!! Form::close() !!}
        
        {!! Session::get('message')!!}
			
   @stop