@extends('template')
       @section('content')       

        <h2>Register New Account</h2>
			<h3>First Name: </h3>
			<div data-editable="firstname" data-url="{!! url('users/'. $user->id) !!}">{!! $user->firstname !!}</div>
			<h3>Last Name: </h3>
			<div data-editable="lastname" data-url="{!!url('users/'. $user->id)!!}">{!!$user->lastname!!}</div>
			<h3>Email: </h3>
			<div data-editable="email" data-url="{!!url('users/'. $user->id)!!}">{!!$user->email!!}</div>
			{{--<textarea name="bla" id="bla"></textarea>--}}
			<div id="text" style="opacity:0">{{ csrf_token() }}</div>
        <h2>List of Users</h2>
        @foreach(App\Models\User::all() as $user)
        
        <a href="{{url('users/'.$user->id.'/edit')}}">{!!$user->firstname .' '. $user->lastname!!}</a><br/>
        
        @endforeach
	   @stop