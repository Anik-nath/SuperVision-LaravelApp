@extends('website.layout.single')
@section('title')
welcome
@stop
@section('pagecontent')
<div class="row w-100 mx-0">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="bg-light d-flex justify-content-center">
                    <button class="tab-btn rounded-0 w-100  login-tab active">Student</button>
                    <button class="tab-btn rounded-0 w-100  register-tab">Supervisor</button>
                </div>
            </div>
        </div>
    </div>
    <!-- registration for student -->
    <div class="col-md-6 mx-auto login-box">
        <div class="auth-form-light py-3 px-4 px-sm-5">
        <div class="brand-logo d-flex justify-content-center">
            <img src="{{ asset('/website/images/mylogo.jpeg') }}" alt="logo">
        </div>
        <h4 class="text-center">New Student?</h4>
        <h6 class="font-weight-light text-center pb-3">Signing up is easy. It only takes a few steps.</h6>
        <form method="POST" action="{{ url('/store-register') }}" enctype="multipart/form-data" class="py-3">
            @csrf
            <div class="d-flex flex-row gap-2">
                <div class="form-group w-100">
                    <input required name="username" type="text" class="form-control new-border form-control-lg" id="exampleInputUsername" placeholder="Fullname">
                </div>
                <div class="form-group d-none">
                    <input required value="student" name="role" type="text" class="form-control new-border form-control-lg" id="exampleInputrole" placeholder="Supervisor or Student">
                </div>
                <div class="form-group w-100">
                    <input required name="student_id" type="text" class="form-control new-border form-control-lg" id="exampleInputUsername" placeholder="Student ID">
                </div>               
            </div>
            <div class="form-group">
                <input required name="email" type="email" class="form-control new-border form-control-lg" id="exampleInputEmail1" placeholder="Email">
            </div>

            <div class="form-group">
                <input required name="password" type="password" class="form-control new-border form-control-lg" id="Password" placeholder="Password">
            </div>
            <div class="form-group">
                <input name="confirm-password" type="password" class="form-control new-border form-control-lg" id="ConfirmPassword" placeholder="Confirm Password">
            </div>
            <div id="CheckPasswordMatch" class="mb-2"></div>
            <div class="preview-box">
                <img class="text-muted" id="blah" src="#" alt="Preview here">
            </div>
            <div class="form-group mt-3">
                <input id="imgInp" type="file" name="pro_pic" class="form-control new-border form-control-lg">
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-block w-100 btn-info text-white btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
            </div>
            <div class="text-center font-weight-light mt-4">
                <span class="fw-light">Already have an account? </span><a href="{{ url('/login') }}" class="text-primary">Login Please</a>
            </div>
        </form>
        </div>
    </div>
    <!-- registration for student -->
    <!-- registration for supervisor -->
    <div class="col-md-6 mx-auto register-box">
        <div class="auth-form-light py-3 px-4 px-sm-5">
        <div class="brand-logo d-flex justify-content-center">
            <img src="{{ asset('/website/images/mylogo.jpeg') }}" alt="logo">
        </div>
        <h4 class="text-center">New Supervisor?</h4>
        <h6 class="font-weight-light text-center pb-3">Signing up is easy. It only takes a few steps.</h6>
        <form method="POST" action="{{ url('/store-register') }}" enctype="multipart/form-data" class="py-3">
            @csrf
            <div class="form-group">
                <input required name="username" type="username" class="form-control form-control-lg" id="exampleInputUsername" placeholder="Username">
            </div>
            <div class="form-group">
                <input required name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email">
            </div>

            <div class="form-group">
                <input required name="password" type="password" class="form-control form-control-lg" id="Password2" placeholder="Password">
            </div>
            <div class="form-group">
                <input name="confirm-password" type="password" class="form-control form-control-lg" id="ConfirmPassword2" placeholder="Confirm Password">
            </div>
            <div id="CheckPasswordMatch2" class="mb-2"></div>
            <div class="form-group d-none">
                <input value="supervisor" name="role" type="text" class="form-control form-control-lg" id="exampleInputrole" placeholder="Supervisor or Student">
            </div>

            <div class="preview-box">
                <img class="img-fluid text-muted" id="blah2" src="#" alt="Preview here">
            </div>
            <div class="form-group mt-3">
                <input required id="imgInp2" type="file" name="pro_pic" class="form-control form-control-lg">
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-block w-100 btn-info text-white btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
            </div>
            <div class="text-center font-weight-light mt-4">
                <span class="fw-light">Already have an account? </span><a href="{{ url('/login') }}" class="text-primary">Login Please</a>
            </div>
        </form>
        </div>
    </div>
    <!-- registration for supervisor -->
</div>
<script>

</script>
@stop