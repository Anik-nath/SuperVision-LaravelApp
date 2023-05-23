@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="users-table">
        <div class="card card-rounded">
            <div class="card-body">
                <h3 class="fw-bold text-capitalize">Add Member in {{$singleGroup->group_name}}</h3>
                <form method="POST" action="{{ url('/store-member') }}" class="py-3">
                    @csrf
                    <div class="form-group">
                    <label for="group-name" class="control-label">Group Name</label><br>
                        <select class="form-control form-control-lg new-border" name="group_id" >
                            <option selected value="{{$singleGroup->id}}">{{$singleGroup->group_name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Members" class="control-label">Total Members</label><br>
                        <input {{$singleGroup->total_member == 1 ? 'checked' : ''}} class="astro" id="one" type="radio" required name="total_member" value="1"> One
                        <input {{$singleGroup->total_member == 2 ? 'checked' : ''}} class="astro" id="Two" type="radio" required name="total_member" value="2"> Two
                        <input {{$singleGroup->total_member == 3 ? 'checked' : ''}} class="astro" id="Three" type="radio" required name="total_member" value="3"> Three
                    </div>
                    
                    <!-- Member info -->
                    <div id="mem-container" class="form-group">
                        @for ($i = 0; $i < $singleGroup->total_member; $i++)
                        <label for="" class="control-label mt-3">Member {{$i+1}}</label>
                        <div class="d-flex flex-column justify-content-between gap-2 flex-md-row">
                            <!-- <input type="text" class="new-border form-control form-control-lg" name="mem_name[]" placeholder="Enter Name"> -->
                            <select class="new-border form-control form-control-lg" name="mem_name[]" id=""> 
                                <option value="">-- Select Student Name --</option>  
                                @foreach($users as $us)
                                <option value="{{$us->username}}">{{$us->username}}</option>
                                @endforeach
                            </select>
                            <select class="new-border form-control form-control-lg" name="mem_id[]" id="">   
                                <option value="">-- Select Student Roll --</option>    
                                @foreach($users as $us)
                                <option value="{{$us->id}}">{{$us->student_id}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="new-border form-control form-control-lg" name="mem_section[]" placeholder="Enter Section">
                        </div>
                        @endfor  
                    </div>
                    <!-- all button -->
                    <div class="form-button-container d-flex flex-md-row flex-column">
                        <div class="mt-3">
                            <!-- <input id="addbtn1" class="btn w-auto btn-outline-info border border-info text-dark btn-lg font-weight-medium" type="button" value="ADD"> -->
                            <input class="btn w-auto btn-outline-info border border-info text-dark btn-lg font-weight-medium d-none" type="button" id="reset" value="RESET">
                        </div>
                        <!-- submit button  -->
                        <div id="Create_btn" class="mt-3">
                            <button type="submit" class="btn w-auto btn-info text-white btn-lg font-weight-medium auth-form-btn">Save Member</button>
                        </div>
                    </div>
                    
                </form>
               
            </div>
        </div>
    </div>
</div>
@stop

