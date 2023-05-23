@extends('website.layout.single')
@section('title')
login
@stop
@section('pagecontent')
<div class="row w-100 mx-0">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light py-3 px-4 px-sm-5">
        <div class="brand-logo d-flex justify-content-center">
            <img src="{{ asset('/website/images/mylogo2.png') }}" alt="logo">
        </div>
        <h4 class="text-center">Hello! let's get started</h4>
        <h6 class="font-weight-light text-center pb-3">Sign in to continue.</h6>
        <form method="POST" action="{{ url('/store-login') }}" class="py-3">
            @csrf
            <div class="form-group">
            <input name="email" type="email" class="form-control new-border form-control-lg" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
            <input name="password" type="password" class="form-control new-border form-control-lg" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="mt-3">
            <button type="submit" class="btn btn-block w-100 btn-info text-white btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
            </div>
            <!-- <div class="my-4 d-flex justify-content-center">
            <a href="#" class="auth-link text-black">Forgot password?</a>
            </div> -->
            <div class="text-center font-weight-light mt-3">
            <span class="fw-light">Don't have an account? </span><a href="{{ url('/register') }}" class="text-primary">Create an Account</a>
            </div>
        </form>
        </div>
    </div>
</div>
@stop

