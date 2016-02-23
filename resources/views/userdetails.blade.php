@extends('template')
       @section('content')       

        <h2>Register New Account</h2>
			<h3>First Name: </h3>
			<p>{{$user->firstname}}</p>
			<h3>Last Name: </h3>
			<p>{{$user->lastname}}</p>
			<h3>Email: </h3>
			<p>{{$user->email}}</p>		
			
        <h2>List of Users</h2>
        @foreach(App\Models\User::all() as $user)
        
        <a href="{{url('users/'.$user->id)}}">{{$user->firstname}}</a><br/>
        
        @endforeach
		@stop