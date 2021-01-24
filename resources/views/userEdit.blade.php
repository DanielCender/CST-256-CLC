@extends('layouts.mainLayout')

@section('title')
			Edit User
@endsection()

@section('content')
    <nav class="navbar navbar-dark navbar-expand" style="background-color: #031D44;">
        <div class="container">
            <div class=" collapse navbar-collapse justify-content-center" id="navbarText">
                <a class="navbar-brand text-center" href="/index"><img src="/logo.png" style="width:auto; height:110px;"><br>Welcome Admin!</a>
            </div>
        </div>
    </nav>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                    <h2 class="text-center" style="margin: 0px 0px 30px;">Modify User</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- 12 row -->
                <div class="card">
                    <div class="card-header">
                        <h3>Edit User {{ $user->EMAIL }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="/admin/user-update/{{ $user->ID }}" method="POST">
                            <!-- here we update the button-->
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8">
                                    <!--col-md-8 means 8 row and form put into one row and updtate the button below-->
                                    <div class="form-group" style="text-align:left;">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" value="{{ $user->FIRSTNAME }}" class="form-control">
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="{{ $user->LASTNAME }}" class="form-control">
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ $user->EMAIL }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class='form-group' style="text-align:left;">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Suspended</label>
                                            <input class="form-check-input" name="suspended" type="checkbox" id="flexSwitchCheckDefault" {{ $user->SUSPENDED == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="form-group" style="text-align:left;">
                                        <label>Give Role</label>
                                        <select name="role" class="form-control" value="{{ $user->ROLE }}">
                                            <option value="ADMIN">ADMIN</option>
                                            <option value="USER">USER</option>
                                            <option value="MODERATOR">MODERATOR</option>
                                            <option value="UTILITY">UTILITY</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="Submit" class="btn btn-success">Submit</button>
                            <a href="/admin" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="row-md-12" style="margin: 2in 5px;">
            </div>
        </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Company Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut
                            vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit
                            pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">MyNewJob © 2021</p>
            </div>
        </footer>
    </div>
@endsection()

@section('scripts')


@endsection()
