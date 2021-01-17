@extends('layouts.layout')

@section('title')
My New Job | Home
@endsection()

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                <h2 class="text-center" style="margin: 0px 0px 30px;">Find Your New Job</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 offset-lg-0">
                <form>
                    <div class="row mb-5">
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color:#F9AB55">What</span>
                                <input type="text" class="form-control" placeholder="Job title, keywords, or company">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text" style="background-color:#F9AB55">@ Where</span>
                                <input type="text" class="form-control" placeholder='City, state, zip or "remote"'>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="submit" class="btn btn-lg mb-3"
                                style="background-color:#F58A07;">Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection()
