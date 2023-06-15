@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="task-table">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                <h3 class="fw-bold text-capitalize mb-5">Add Task in list</h3>
                <!-- <a type="button" class="btn btn-outline-info" id="addBtn" href="#">add</a> -->
                </div>
                <form id="assignTask" action="{{ url('/store-task') }}" method="post">
                    @csrf
                    <div class="form-group">
                        @if(count($assignedGroups) > 0)
                        <label for="group">Select Group:</label>
                            <select class="form-control" name="group_id" id="group">
                                @foreach($assignedGroups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <div class="border border-info  py-5 text-center">
                                <h5 class="text-info"> <b>Message:</b> You have no group yet. Untill assign any group, you can not create any assginment.</h5>
                            </div>
                        @endif
                    </div>

                    @if(count($assignedGroups) > 0)
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control" id="date">
                        </div>
                        <label class="form-label">Assign Task</label>
                        <div class="mb-3" id="1">
                            <div class="d-flex mb-1">
                                <input type="text" id="input1" class="g form-control" name="task_name" placeholder="Write a task here...">
                            </div>
                            <label class="form-label">Task Description</label>
                            <textarea class="form-control" name="description" placeholder="Add description here..." id="description1" rows="3"></textarea>
                        </div>
                        <input id="submitBtn" type="submit" value="Submit" class="btn btn-info">
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>
@stop
