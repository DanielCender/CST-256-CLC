@extends('layouts.auth')

@section('title')
			My New Job | Login Failed
@endsection()

@section('content')
		<h2>Login Failed</h2>
		</br>
			<?php
    	echo $msg . "</br>";
			?>
		<a href = "login">Return to Login Form</a>
	<div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
	</div>
@endsection()

@section('scripts')
@endsection()