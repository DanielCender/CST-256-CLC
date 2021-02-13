@extends('layouts.mainLayout')

@section('title')
			Create Affinity Group
@endsection()

@section('content')
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                    </div>
                </div>
            </div>
        </div>

				<div class="container">
					<div class="row">
						<div class="col-md-12"><!-- 12 row -->
							<div class="card">
								<div class="card-header">
									<h3>New Group</h3>
								</div>
				<div class="card-body">
				 <form action="/groups/create" method="post">
        	{{ csrf_field() }}
						<div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Tell us about this group, who is it for?..." required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control" placeholder="Some value to group this group with others like it.">
                </div>
            </div>
            <button type="submit" class="btn btn-danger">ADD</button>
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
