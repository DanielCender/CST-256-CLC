<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>My New Job | Sign Up</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="assets/css/Login-Box-En.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body>
    <form action="doRegister" method="POST">
    @csrf    
        <div class="d-flex flex-column justify-content-center" id="login-box">
            <div class="login-box-header">
                <h4 style="color:rgb(139,139,139);margin-bottom:0px;font-weight:400;font-size:27px;">Sign Up</h4>
            </div>
            <div class="login-box-content">
                <div class="fb-login box-shadow"><a class="d-flex flex-row align-items-center social-login-link"
                        href="#"><i class="fa fa-facebook"
                            style="margin-left:0px;padding-right:20px;padding-left:22px;width:56px;"></i>Sign Up with
                        Facebook</a></div>
                <div class="gp-login box-shadow"><a class="d-flex flex-row align-items-center social-login-link"
                        style="margin-bottom:10px;" href="#"><i class="fa fa-google"
                            style="color:rgb(255,255,255);width:56px;"></i>Sign Up with Google+</a></div>
            </div>
            <div class="d-flex flex-row align-items-center login-box-seperator-container">
                <div class="login-box-seperator"></div>
                <div class="login-box-seperator-text">
                    <p
                        style="margin-bottom:0px;padding-left:10px;padding-right:10px;font-weight:400;color:rgb(201,201,201);">
                        or</p>
                </div>
                <div class="login-box-seperator"></div>
            </div>
            <div class="email-login" style="background-color:#ffffff;">
                <form>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="John">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Doe">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="example@example.com">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" name="password2" placeholder="Confirm Password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;"><button
                    class="btn btn-primary btn-block box-shadow" id="submit-id-submit" type="submit">Sign Up</button>
            </div>
            <div id="login-box-footer" style="padding:10px 20px;padding-bottom:23px;padding-top:18px;">
                <p style="margin-bottom:0px;">Have an account?<a id="register-link" href="login">Login</a></p>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        </form>
      
    </body>

</html>

