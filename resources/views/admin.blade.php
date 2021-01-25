@extends('layouts.mainLayout')

@section('title')
			Admin Dashboard
@endsection()

@section('content')
  <nav class="navbar navbar-dark navbar-expand" style="background-color: #031D44;">
    <div class="container">
      <div class=" collapse navbar-collapse justify-content-center" id="navbarText">
        <a class="navbar-brand text-center" href="/index"><img src="logo.png" style="width:auto; height:110px;"><br>Welcome Admin!</a>
      </div>
    </div>
  </nav>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
          <h2 class="text-center" style="margin: 0px 0px 30px;">Modify Users</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Registered User's</h4>
            <!-- for show the message updadated copy from home.blade.phpfile-->
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <!-- fetch table data -->
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Suspended</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </thead>
                <tbody>
                  <!--fetch table data -->
                  @foreach($users as $row)
                  <tr>
                    <td>{{ $row->ID }}</td>
                    <td>{{ $row->FIRSTNAME . ' ' . $row->LASTNAME }}</td>
                    <td>{{ $row->EMAIL }}</td>
                    <td>{{ $row->ROLE }}</td>
                    <td>{{ $row->SUSPENDED == 1 ? 'Yes' : 'No' }}</td>
                    <td>
                      <a href="/admin/user-edit/{{ $row->ID }}" class="btn btn-success">EDIT</a>
                    </td>
                    <td>
                      <!-- we have to add form method because without form method it will show error-->
                      <form action="/admin/user-delete/{{ $row->ID }}" method="post">
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
@endsection()
