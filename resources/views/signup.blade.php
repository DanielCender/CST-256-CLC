@extends('layouts.auth')

@section('title')
			My New Job | Sign Up
@endsection()

@section('content')
        <div class="d-flex flex-column justify-content-center" id="login-box">
            <div class="login-box-header">
                <h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">Sign Up</h4>
            </div>
            <!-- Display all the Data Validation Rule Errors -->
<?php
    if($errors->count() != 0)
    {
        echo "<h5>List of Errors</h5>";
        foreach($errors->all() as $message)
        {
            echo $message . "<br/>";
        }
    }
?>
                <form action="/doRegister" method="post">
                {{ csrf_field() }}
            <div class="email-login" style="background-color:#ffffff;">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="John" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastName" class="form-control" placeholder="Doe" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="example@example.com" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="passwordConfirm" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
            </div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
            <button class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit">Sign Up</button>
            </div>
            </form>
            <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
                <p style="margin-bottom:0px;">Have an account?<a id="register-link" href="/login">Login</a></p>
            </div>
        </div>
@endsection()

@section('scripts')
@endsection()
