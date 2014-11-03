@extends('layouts.main')

@section('content')
	<h1>Register</h1>

	@foreach ($errors->all() as $error)
		<p class="error">{{ $error }}</p>
	@endforeach

	{{ Form::open() }}
		<label for="name">Username</label><input type="text" name="name" placeholder="Username">
		<label for="password">Password</label><input type="password" name="password" placeholder="Password">
		<label for="confirmPassword">Confirm Password</label><input type="password" name="confirmPassword" placeholder="Password">
		<label for="email">Email</label><input type="text" name="email" placeholder="Email">
		<input type="submit" value="Register">
	{{ Form::close() }}
@stop