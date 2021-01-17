@extends('layouts.auth')

@section('title')
			My New Job | Login
@endsection()

@section('content')
        <div class="d-flex flex-column justify-content-center" id="login-box">
            <div class="login-box-header">
                <h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">Login</h4>
            </div>
            <form action="/doLogin" method="post">
            {{ csrf_field() }}
            <div class="email-login" style="background-color:#ffffff;">
            <input
                    class="email-input form-control" style="margin-top:10px;" name="email" type="email"  required placeholder="Email"
                    minlength="6">
                    <input type="password" class="password-input form-control" name="password" style="margin-top:10px;"
                    required placeholder="Password" minlength="6">
                    </div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;"><button
                    class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit">Login</button>
            </div>
            </form>
                <!-- <div class="d-flex justify-content-between">
                    <div class="form-check form-check-inline" id="form-check-rememberMe"><input class="form-check-input"
                            type="checkbox" id="formCheck-1" for="remember" style="cursor:pointer;" name="check">
                            <label class="form-check-label" for="formCheck-1"><span class="label-text">Remember
                                Me</span></label>
                                 </div><a id="forgot-password-link" href="#">Forgot Password?</a>
                </div> -->
            <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
                <p style="margin-bottom:0px;">Don't you have an account?<a id="register-link" href="/signup">Sign
                        Up!</a></p>
            </div>
        </div>
@endsection()

@section('scripts')
@endsection()
