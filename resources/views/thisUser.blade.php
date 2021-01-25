@extends('layouts.mainLayout')

@section('title')
Full Name's Profile
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
                        <h4 class="card-title">{{ $user->FIRSTNAME . " " . $user->LASTNAME }}</h4>
                        <h6 class="text-muted card-subtitle mb-2">Position | Current Job | Degrees</h6>
                        <p class="card-text">Ability to add/edit bios and avatar images coming soon!</p><a class="card-link" href="#">Link</a><a class="card-link" href="#">Link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 col-xl-8">
            <h4 class="card-title">Jobs</h4>
            @foreach($user->JOBS as $row)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$row->INSTITUTION}}</h4>
                        <h6 class="text-muted card-subtitle mb-2">{{ $row->NAME }}</h6>
                        <h6 class="text-muted card-subtitle mb-2">{{ $row->START_DATE . " - " . $row->END_DATE }}</h6>
                        <p class="card-text">{{ $row->DESCRIPTION }}</p>
                    </div>
                </div>
            @endforeach
        </div>
            <div class="col-sm-4 col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $user->FIRSTNAME . " " . $user->LASTNAME }}</h4>
                        <h6 class="text-muted card-subtitle mb-2">Joined:</h6>
                        <p class="card-text">N/A</p>
                        <h6 class="text-muted card-subtitle mb-2">Lives:</h6>
                        <p class="card-text">N/A</p>
                        <h6 class="text-muted card-subtitle mb-2">Email:</h6>
                        <p class="card-text">{{ $user->EMAIL }}</p>
                        <h6 class="text-muted card-subtitle mb-2">Phone #:</h6>
                        <p class="card-text">N/A</p>
                        <h6 class="text-muted card-subtitle mb-2"></h6>
                        <p class="card-text"></p>
                    </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xl-8">
            <h4 class="card-title">Skills</h4>
            @foreach($user->SKILLS as $row)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$row->INSTITUTION}}</h4>
                        <h6 class="text-muted card-subtitle mb-2">{{ $row->NAME }}</h6>
                        <h6 class="text-muted card-subtitle mb-2">{{ $row->START_DATE . " - " . $row->END_DATE }}</h6>
                        <p class="card-text">{{ $row->DESCRIPTION }}</p>
                    </div>
                </div>
            @endforeach
            <div class="col-md-6 col-xl-8">
            <h4 class="card-title">Education</h4>
            @foreach($user->EDUCATION as $row)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$row->INSTITUTION}}</h4>
                        <h6 class="text-muted card-subtitle mb-2">{{ $row->NAME }}</h6>
                        <h6 class="text-muted card-subtitle mb-2">{{ $row->START_DATE . " - " . $row->END_DATE }}</h6>
                        <p class="card-text">{{ $row->DESCRIPTION }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection()
