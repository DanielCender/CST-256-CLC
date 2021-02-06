@extends('layouts.mainLayout')

@section('title')
Search For Jobs
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
                                <span class="input-group-text" style="background-color:#F9AB55">What</span>
                                <input type="text" class="form-control" placeholder="Job title or Company">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text" style="background-color:#F9AB55">@ Where</span>
                                <input type="text" class="form-control" placeholder='City, state, zip or "remote"'>
                            </div>
                        </div>
                        <div class="col-md-1 col-xs-12">
                            <button type="submit" class="btn mb-3" style="background-color:#F58A07;">Search</button>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <a href="/jobs/create" class="btn mb-3" style="background-color:#5CFF7C;">Post Job</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-7 col-xl-7">
            @foreach($jobs as $row)
                <a href="/jobs?selected={{ $row->ID }}">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $row->NAME }}</h4>
                                <h6 class="text-muted card-subtitle mb-2">{{ $row->INSTITUTION }}</h6>
                                <p class="card-text">Starts: {{ $row->IDEAL_START_DATE }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach()
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Job Title - Position Text (Mornings)</h4>
                                <h6 class="text-muted card-subtitle mb-2">Company ABC</h6>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                                    odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                                    at eget metus.</p><small>5 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Job Title - Position Text (Mornings)</h4>
                                <h6 class="text-muted card-subtitle mb-2">Company ABC</h6>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                                    odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                                    at eget metus.</p><small>5 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Job Title - Position Text (Mornings)</h4>
                                <h6 class="text-muted card-subtitle mb-2">Company ABC</h6>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                                    odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                                    at eget metus.</p><small>5 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Job Title - Position Text (Mornings)</h4>
                                <h6 class="text-muted card-subtitle mb-2">Company ABC</h6>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                                    odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                                    at eget metus.</p><small>5 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Job Title - Position Text (Mornings)</h4>
                                <h6 class="text-muted card-subtitle mb-2">Company ABC</h6>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo
                                    odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida
                                    at eget metus.</p><small>5 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($selected) and isset($item))
            <div class="col-md-4 col-lg-5 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">J{{ $item->NAME }}</h4>
                        <h6 class="text-muted card-subtitle mb-2">{{ $item->INSTITUTION }}</h6>
                        <hr>
                        <p class="card-text" style="max-height: 1000px; overflow-y: auto;">Ideal Start Date: {{ $item->IDEAL_START_DATE }}</p>
                        <p class="card-text" style="max-height: 1000px; overflow-y: auto;">{{ $item->DESCRIPTION }}</p>
                    </div>
                    <!-- <small>5 hours ago</small> -->
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> -->
</div>


@endsection()
