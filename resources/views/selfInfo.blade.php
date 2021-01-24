@extends('layouts.mainLayout')

@section('title')
My Profile
@endsection()

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12"><img class="img-fluid" src="img/background.png" />
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="text-align: center;"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" style="height:180px; width:180px;">
                        <h4 class="card-title">Full Name Here</h4>
                        <h6 class="text-muted card-subtitle mb-2">Position | Current Job | Degrees</h6>
                        <p class="card-text">About me, Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                            odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
                            metus.</p><a class="card-link" href="#">Edit</a><a class="card-link" href="#">Change
                            Photo</a><a class="card-link" href="#">Change Background</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <a href="#" class="btn btn-success">Add Another Job Experience</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Company ABC</h4>
                        <h6 class="text-muted card-subtitle mb-2">Position</h6>
                        <h6 class="text-muted card-subtitle mb-2">2015 - Current</h6>
                        <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,
                            dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
                            metus.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Company ZYX</h4>
                        <h6 class="text-muted card-subtitle mb-2">Position</h6>
                        <h6 class="text-muted card-subtitle mb-2">2006 - 2015</h6>
                        <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,
                            dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
                            metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">About Full Name</h4>
                        <h6 class="text-muted card-subtitle mb-2">Joined:</h6>
                        <p class="card-text">January 1, 2021</p>
                        <h6 class="text-muted card-subtitle mb-2">Lives:</h6>
                        <p class="card-text">Chicago, IL&nbsp;</p>
                        <h6 class="text-muted card-subtitle mb-2">Email:</h6>
                        <p class="card-text">FullName@email.com</p>
                        <h6 class="text-muted card-subtitle mb-2">Phone #:</h6>
                        <p class="card-text">(800)999-1234</p>
                        <h6 class="text-muted card-subtitle mb-2">Skills:</h6>
                        <p class="card-text">PHP, CSS, HTML, SQL</p>
                        <h6 class="text-muted card-subtitle mb-2"></h6>
                        <p class="card-text"></p>
                    </div>
                    <a href="#" class="btn btn-info">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection