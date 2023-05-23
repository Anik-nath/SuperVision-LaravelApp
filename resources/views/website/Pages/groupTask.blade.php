@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="task-table">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3 class="fw-bold text-capitalize">Your Task in list</h3>
                </div>
                <div class="table-responsive mt-4">
                    <form method="POST" action="{{ url('/store-update-task') }}" >
                        @csrf
                        <table class="table table-striped">
                            <thead class="bg-thead text-light">
                                <tr>
                                    <th>
                                    Task
                                    </th>
                                    <th>
                                    TaskName
                                    </th>
                                    <th>
                                    Description
                                    </th>
                                    <th>
                                    Visiting Date
                                    </th>
                                    <!-- <th>
                                Status
                                    </th> -->
                                    <th>
                                Complete?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allTask as $task)
                                <tr>
                                    <td>
                                    <input disable="disable" class="form-check-input p-2" type="checkbox" id="myCheckbox" name="completed_task[]" value="{{$task->id}}">
                                    </td>
                                    <td>{{$task->task_name}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#myModal{{ $task->id }}" type="button" class="btn btn-sm btn-outline-info">Read</button>
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModal{{ $task->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{$task->task_name}} - Descriptions</h4>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <p>{{$task->description}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ------ -->
                                    </td>
                                    <td >{{$task->visiting_date}}</td>
                                    <td>
                                        @if($task->is_complete == 0)
                                            <div class="badge badge-warning rounded-pill"><a class="text-decoration-none text-dark" href="{{ url('/approve-user/'.$task->id) }}">NOT Finished</a></div>
                                        @elseif($task->is_complete == 1)
                                            <div class="badge badge-success rounded-pill">Yes</div>
                                        @endif 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- submit button  -->
                        <div id="updatebtn" class="mt-3">
                            <button type="submit" class="btn w-auto btn-info text-white btn-lg font-weight-medium auth-form-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
