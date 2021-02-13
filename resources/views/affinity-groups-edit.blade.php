@extends('layouts.mainLayout')

@section('title')
			Group Browser
@endsection()

@section('content')
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                        <h2 class="text-center" style="margin: 0px 0px 30px;">Search Groups</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <!-- <h4 class="card-title"> Registered User's</h4> -->
                  <!-- for show the message updadated copy from home.blade.phpfile-->
                 @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                  @endif
                  <a href="/groups/edit/create" class="btn btn-success">Create New Group</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <!-- fetch table data -->
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Type</th>
                      <th>User Count</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <!--fetch table data -->
                      @foreach($groups as $row)
                      <tr>
                        <td>{{ $row->ID }}</td>
                        <td>{{ $row->NAME }}</td>
                        <td>{{ $row->DESCRIPTION }}</td>
                        <td>{{ $row->TYPE }}</td>
												<td>N/A</td>
												<td>
                          <a href="/groups/edit/{{ $row->ID }}/edit" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                          <!-- we have to add form method because without form method it will show error-->
                          <form action="/groups/edit/{{ $row->ID }}/delete" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE</button>
<!-- <a href="/role-delete/" class="btn btn-danger">DELETE</a> it is not working or we are not submitting it-->
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
