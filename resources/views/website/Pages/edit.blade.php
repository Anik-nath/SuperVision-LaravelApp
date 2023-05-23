@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div class="row w-100 mx-0">
        <div class="col-lg-6 mx-auto">
            <div class="auth-form-light py-3 px-4 px-sm-5 bg-white shadow">
            <h4 class="text-center fw-bold ">Update <span class="text-info">{{$singleUser->username}}'s</span> Information</h4>
            <form method="POST" action="{{ url('/update-user/'.$singleUser->id) }}" class="py-3">
                @csrf
                <div class="form-group">
                    <label class="form-label text-info" for="username">Enter Your Fullname *</label>
                    <input required value="{{$singleUser->username}}" name="username" type="username" class="form-control new-border form-control-lg" id="exampleInputUsername" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="form-label text-info" for="email">Enter Your Email *</label>
                    <input required value="{{$singleUser->email}}" name="email" type="email" class="form-control new-border form-control-lg" id="exampleInputEmail1" placeholder="email">
                </div>
                <?php
                $studentid = $singleUser->student_id;
                ?>
                @if($studentid)
                <div class="form-group">
                <label class="form-label text-info" for="studentid">Enter Student Id *</label>
                    <input required value="{{$singleUser->student_id}}" name="student_id" type="text" class="form-control new-border form-control-lg" id="exampleInputstudentid" placeholder="Student Id">
                </div>
                @endif
                <!-- <div class="form-group">
                    <label class="form-label text-info" for="password">New Password *</label>
                    <input required value="{{$singleUser->password}}" name="password" type="password" class="form-control new-border form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div> -->
                <div class="my-3">
                    <button type="submit" class="btn btn-block w-100 btn-info text-white btn-lg font-weight-medium auth-form-btn">Save & Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@stop