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
                <form id="assignTask" action="{{ url('/updatetask/'.$singleTask->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                        <input value="{{$singleTask->due_date}}" type="date" name="due_date" class="form-control" id="date">
                    </div>
                    <label class="form-label">Assign Task</label>
                    <div class="mb-3" id="1">
                        <div class="d-flex mb-1">
                            <input value="{{$singleTask->task_name}}" type="text" id="input1" class="g form-control " name="task_name" placeholder="write a task here...">
                        </div>
                        <label class="form-label">Task Description</label>
                        <textarea value="{{$singleTask->description}}" class="form-control " name="description" placeholder="add description here..." id="description1" rows="3">{{$singleTask->description}}</textarea>
                    </div>                            
                    <!-- <button id="submitBtn" type="button" value="Submit" class="btn btn-success">Submit</button> -->
                    <input id="submitBtn" type="submit" value="Update" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>
</div>
@stop
