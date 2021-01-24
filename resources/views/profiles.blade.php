@extends('layouts.mainLayout')

@section('title')
Search For Profiles
@endsection()

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="row mb-5 mt-5">
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color:#F9AB55">Name</span>
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text" style="background-color:#F9AB55">Located</span>
                                <input type="text" class="form-control" placeholder='City or state'>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="submit" class="btn mb-3" style="background-color:#F58A07;">Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card border-dark text-center" style="width: 3in;">
                    <div class="card-body">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                            style="height:180px; width:180px;"></a>
                        <h4 class="card-title">
                            <!-- links to user's page-->
                            <a style="color:black; font-weight: bolder;" href="/user">Person's Full Name</a>
                        </h4>
                        <small>Position | Current Job | City, State</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card border-dark text-center" style="width: 3in;">
                    <div class="card-body">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                            style="height:180px; width:180px;"></a>
                        <h4 class="card-title">
                            <!-- links to user's page-->
                            <a style="color:black; font-weight: bolder;" href="/user">Person's Full Name</a>
                        </h4>
                        <small>Position | Current Job | City, State</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card border-dark text-center" style="width: 3in;">
                    <div class="card-body">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                            style="height:180px; width:180px;"></a>
                        <h4 class="card-title">
                            <!-- links to user's page-->
                            <a style="color:black; font-weight: bolder;" href="/user">Person's Full Name</a>
                        </h4>
                        <small>Position | Current Job | City, State</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card border-dark text-center" style="width: 3in;">
                    <div class="card-body">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                            style="height:180px; width:180px;"></a>
                        <h4 class="card-title">
                            <!-- links to user's page-->
                            <a style="color:black; font-weight: bolder;" href="/user">Person's Full Name</a>
                        </h4>
                        <small>Position | Current Job | City, State</small>
                    </div>
                </div>
            </div>
        </div>
        @endsection()
