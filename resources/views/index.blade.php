@extends('layouts.layout')

@section('title')
My New Job | Home
@endsection()

@section('content')

<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 offset-lg-0">
                <div class="container-fluid mt-5">
                    <div class="row mb-5">
                        <div class="col-md-5">
                            <h1 class="text-left">
                                Welcome to MyNewJob.com! <br>
                                <h3>Your professional community that can start your
                                    career in the right direction</h3>
                            </h1>
                            <p> At MyNewJob, We believe that everyone should be able to pursue their career
                                no matter how big or small it may seem. MyNewJob focuses on taking individuals and
                                connect them with professionals, provide many job opportunities, and teach skills so
                                that you can get into the career you want. Start by creating an account today, or search
                                what we have to offer below.</p>
                            <a class="btn btn-lg text-white mb-2" style="background-color:#F58A07;" href="/signup" role="button">
                                Sign Up
                            </a>
                        </div>
                        <div class="col-md-7">
                            <img class="img-fluid" src="img/colab1.jpg" />
                        </div>
                    </div>
                    <div class="container-fluid" style="margin: 2in;"></div>
                    <div class="row">
                        <div class="col-md-6 mt-5">
                            <img alt="Bootstrap Image Preview" src="img/colab2.jpg" class="img-fluid" />
                            <h3 class="text-center">
                                Connect with Others
                            </h3>
                            <p>
                                Connecting with people today helps you find an opportunity tomorrow.
                                Sign up and talk with 500M+ professionals today!
                            </p>
                        </div>
                        <div class="col-md-6 mt-5">
                            <img alt="Bootstrap Image Preview" src="img/building1.jpg" class="img-fluid" />
                            <h3 class="text-center">
                                Big Hotshot? Or A Startup?
                            </h3>
                            <p>
                                No matter the location or industry, we work along all corporations in every industry so
                                that you can find your next big opportunity. Sign up to start applying today!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" style="margin: 2in;"></div>
                <div class="row">
                    <div class="col-md-12 align-self-center" style="margin: 100px 0px 0px 0px;">
                        <h2 class="text-center" style="margin: 0px 0px 30px;">Find A Job, Person, or Company</h2>
                    </div>
                </div>
                <form>
                    <div class="row mb-5">
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color:#F9AB55">What</span>
                                <input type="text" class="form-control" placeholder="Job title, Name, or Company">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text" style="background-color:#F9AB55">@ Where</span>
                                <input type="text" class="form-control" placeholder='City, state, zip or "remote"'>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <button type="submit" class="btn btn-lg mb-3" style="background-color:#F58A07;">Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection()