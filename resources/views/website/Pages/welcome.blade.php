@extends('website.layout.single')
@section('title')
welcome
@stop
@section('pagecontent')
<div class="row w-100">
    <div class="col-lg-4 mx-auto">
    <div class="auth-form-transparent text-left p-5 text-center">
        <img loading="lazy" src="{{ asset('/website/images/mylogo.jpeg') }}" class="lock-profile-img" alt="img">
        <form class="pt-5">
        <div>
            <h2 class="text-white">Supervisor System</h2>
        </div>
        <div class="mt-5">
            @if(Session::get('userrole'))
            <a class="btn btn-block btn-info btn-lg font-weight-medium" href="{{ url('/dashboard') }}">Open App</a>
            @else
            <a class="btn btn-block btn-info btn-lg font-weight-medium" href="{{ url('/login') }}">Unlock</a>
            @endif
        </div>
        </form>
    </div>
    </div>
</div>
@stop
