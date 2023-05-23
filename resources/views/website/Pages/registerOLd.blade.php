@extends('website.layout.single')
@section('title')
register
@stop
@section('pagecontent')
<div class="row w-100 mx-0">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light py-3 px-4 px-sm-5">
        <div class="brand-logo d-flex justify-content-center">
            <img src="{{ asset('/website/images/mylogo.jpeg') }}" alt="logo">
        </div>
        <h4 class="text-center">New here?</h4>
        <h6 class="font-weight-light text-center pb-3">Signing up is easy. It only takes a few steps.</h6>
        <form method="POST" action="{{ url('/store-register') }}" class="py-3">
            @csrf
            <div class="form-group">
                <input name="username" type="username" class="form-control form-control-lg" id="exampleInputUsername" placeholder="Username">
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email">
            </div>

            <div class="form-group">
                <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <input name="confirm-password" type="password" class="form-control form-control-lg" id="exampleInputConfirmPassword" placeholder="Confirm Password">
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-block w-100 btn-primary text-white btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
            </div>
            <div class="text-center font-weight-light mt-4">
                <span class="fw-light">Already have an account? </span><a href="{{ url('/login') }}" class="text-primary">Login Please</a>
            </div>
        </form>
        </div>
    </div>
</div>
@stop
