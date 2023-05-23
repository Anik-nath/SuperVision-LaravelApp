@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="users-table">
        <div class="card card-rounded">
            <div class="card-body">
                <h3 class="fw-bold text-capitalize">Create Group</h3>
               
                <form method="POST" action="{{ url('/updategroups/'.$singleGroup->id) }}" class="py-3">
                    @csrf
                    <div class="form-group">
                        <label for="group-name" class="control-label">Group Name</label><br>
                        <input value="{{$singleGroup->group_name}}" name="group_name" type="text" class="new-border form-control form-control-lg" required placeholder="Group name">
                    </div>
                    <div class="form-group">
                        <label for="Members" class="control-label">Total Members</label><br>
                        <input {{$singleGroup->total_member == 1 ? 'checked' : ''}} class="astro" id="one" type="radio" required name="total_member" value="1"> One
                        <input {{$singleGroup->total_member == 2 ? 'checked' : ''}} class="astro" id="Two" type="radio" required name="total_member" value="2"> Two
                        <input {{$singleGroup->total_member == 3 ? 'checked' : ''}} class="astro" id="Three" type="radio" required name="total_member" value="3"> Three
                    </div>
                    <!-- Member info -->
                    <div id="mem-container" class="form-group">
                        
                    </div>
                    <!-- all button -->
                    <div class="form-button-container d-flex gap-2 flex-md-row flex-column">
                        <!-- submit button  -->
                        <div id="Create_btn" class="mt-3">
                            <button type="submit" class="btn w-auto btn-info text-white btn-lg font-weight-medium auth-form-btn">Update Group</button>
                        </div>
                    </div>
                    
                </form>
                
               
            </div>
        </div>
    </div>
</div>
@stop