@extends('layouts.layout')

@section('title')
			{{ $user->FIRSTNAME . " " . $user->LASTNAME }} | User Profile Editor
@endsection()

@section('content')
        <nav class="navbar navbar-dark navbar-expand-lg bg-secondary navigation-clean-button" style="font-size: 14px;">
            <div class="container"><a class="navbar-brand" href="/index">MyNewJob</a><button data-toggle="collapse"
                    class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link active" href="/index">Find Jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Browse Companies</a></li>
                    </ul><span class="ml-auto navbar-text actions"> <a class="login" href="/Emplogin">Employers/ Post
                            Jobs</a></span><span class="ml-auto navbar-text actions" style="text-align: center;"> <a
                            class="login" href="/signup"><strong>Sign Up</strong></a><a class="login" href="/login">Log
                            In</a></span>
                </div>
            </div>
        </nav>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                        <h2 class="text-center" style="margin: 0px 0px 30px;">
													{{ $user->FIRSTNAME . ' ' . $user->LASTNAME }}
												</h2>
                        <h4 class="text-center" style="margin: 0px 0px 30px;">
												<a href="mailto:{{ $user->EMAIL }}">Contact</a>
												</h4>
                    </div>
                </div>
            </div>
        </div>

				<div class="container">
					<div class="row">
						<div class="col-md-12"><!-- 12 row -->
							<div class="card">
								<div class="card-header">
									<h3>Edit User {{ $user->EMAIL }}</h3>
								</div>
				<div class="card-body">
				 <form action="/users/{{ $user->ID }}/{{ $item->ID }}/update" method="post">
        	{{ csrf_field() }}
						<div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $item->NAME }}" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $item->DESCRIPTION }}" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Institution</label>
                    <input type="text" name="institution" class="form-control" value="{{ $item->INSTITUTION }}" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Started</label>
                    <input type="date" name="startDate" value="{{ $item->START_DATE }}" class="form-control" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Ended</label>
                    <input type="date" name="endDate" value="{{ $item->END_DATE }}" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">UPDATE</button>
        	</form>
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
                        <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a
                                href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i
                                    class="icon ion-social-snapchat"></i></a><a href="#"><i
                                    class="icon ion-social-instagram"></i></a></div>
                    </div>
                    <p class="copyright">MyNewJob © 2021</p>
                </div>
            </footer>
        </div>

@endsection()

@section('scripts')
@endsection()
