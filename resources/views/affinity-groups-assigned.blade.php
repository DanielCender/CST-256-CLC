@extends('layouts.mainLayout')

@section('title')
			User's Group Browser
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
                      <!-- <th>Join/Leave</th> -->
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
                         @if($row->JOINED)
                          <form action="/groups/{{ $row->ID }}/{{ $userId }}/delete" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Leave</button>
                          </form>
                        @else
                            <form action="/groups/{{ $row->ID }}/{{ $userId }}/add" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Join</button>
                          </form>
                        @endif
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
@endsection()

@section('scripts')
@endsection()
