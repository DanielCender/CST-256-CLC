@extends('layouts.appmaster')

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

<!--
	Skills Section
-->
        <div class="container">
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Professional Skills</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <!-- fetch table data -->
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
											<th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <!--fetch table data -->
                      @foreach($skills as $row)
                      <tr>
                        <td>{{ $row->ID }}</td>
                        <td>{{ $row->NAME }}</td>
                        <td>{{ $row->DESCRIPTION }}</td>
												<td>
                          <a href="/users/{{ $user->ID }}/{{ $row->ID }}/edit" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                          <form action="/users/{{ $user->ID }}/{{ $row->ID }}/delete" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE</button>
                          </form>
                        </td>
                       </tr>
                       @endforeach()
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

<!--
	Jobs Section
-->
        <div class="container">
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Professional Experience</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <!-- fetch table data -->
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Business</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <!--fetch table data -->
                      @foreach($jobs as $row)
                      <tr>
                        <td>{{ $row->ID }}</td>
                        <td>{{ $row->NAME }}</td>
                        <td>{{ $row->DESCRIPTION }}</td>
                        <td>{{ $row->INSTITUTION }}</td>
												<td>{{ $row->START_DATE }}</td>
												<td>{{ $row->END_DATE }}</td>
													<td>
                          <a href="/users/{{ $user->ID }}/{{ $row->ID }}/edit" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                          <form action="/users/{{ $user->ID }}/{{ $row->ID }}/delete" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE</button>
                          </form>
                        </td>
                       </tr>
                       @endforeach()
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

<!--
	Educational Experience Section
-->
        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Applicable Experience</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <!-- fetch table data -->
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
											<th>Institution</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <!--fetch table data -->
                      @foreach($education as $row)
                      <tr>
                        <td>{{ $row->ID }}</td>
                        <td>{{ $row->NAME }}</td>
                        <td>{{ $row->DESCRIPTION }}</td>
                        <td>{{ $row->INSTITUTION }}</td>
												<td>{{ $row->START_DATE }}</td>
												<td>{{ $row->END_DATE }}</td>
													<td>
                          <a href="/users/{{ $user->ID }}/{{ $row->ID }}/edit" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                          <form action="/users/{{ $user->ID }}/{{ $row->ID }}/delete" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE</button>
                          </form>
                        </td>
                       </tr>
                       @endforeach()
                    </tbody>
                  </table>
                </div>
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
