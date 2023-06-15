@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="task-table">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3 class="fw-bold text-capitalize">Your Task in List</h3>
                </div>
                @if ($allTask->isEmpty())
                <div class="border border-info py-5 text-center my-5">
                    <h5 class="text-info"> <b>Message:</b> No tasks assigned by your supervisor yet.</h5>
                </div>
                @else
                <div class="table-responsive mt-4">
                    <form method="POST" action="{{ url('/store-update-task') }}">
                        @csrf
                        <table class="table table-striped">
                            <thead class="bg-thead text-light">
                                <tr>
                                    <th>Task</th>
                                    <th>Task Name</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <!-- <th>Complete?</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allTask as $task)
                                <tr @if(in_array($task->id, $completedTasks)) style="background-color: lightgreen !important;" @endif>
                                    <td>
                                    <input class="form-check-input p-2 taskCheckbox" type="checkbox" id="myCheckbox{{$task->id}}" name="completed_task[{{$task->id}}]" value="1" @if(in_array($task->id, $completedTasks)) checked @endif>

                                    </td>
                                    <td>{{$task->task_name}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#myModal{{ $task->id }}" type="button" class="btn btn-sm btn-outline-info">View Details</button>
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
                                        </div>
                                    </td>
                                    <td>{{$task->due_date}}</td>
                                    <!-- <td>
                                        <div class="status-badge-container">
                                            <div class="badge badge-success rounded-pill status-badge" style="@if(!in_array($task->id, $completedTasks)) display:none; @endif">
                                                <span class="status-badge"></span>Completed
                                            </div>
                                            <div class="badge badge-warning rounded-pill status-badge" style="@if(in_array($task->id, $completedTasks)) display:none; @endif">
                                                <span class="text-decoration-none text-dark status-badge">Not Complete</span>
                                            </div>
                                        </div>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="updatebtn" class="mt-3">
                            <button id="updateButton" type="submit" class="btn w-auto btn-info text-white btn-lg font-weight-medium auth-form-btn" disabled>Update</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.getElementsByClassName('taskCheckbox');
    const updateButton = document.getElementById('updateButton');

    for (const checkbox of checkboxes) {
        checkbox.addEventListener('change', function() {
            updateButton.disabled = !isChecked();
            updateStatusBadge(checkbox);
        });

        updateStatusBadge(checkbox); // Update the status badge initially
    }

    function isChecked() {
        for (const checkbox of checkboxes) {
            if (checkbox.checked) {
                return true;
            }
        }
        return false;
    }

});

</script>
----------------