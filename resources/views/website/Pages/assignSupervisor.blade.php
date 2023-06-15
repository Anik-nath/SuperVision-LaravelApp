@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <h2>Assign Supervisor to Group</h2>

    <form action="{{url('/store-supervisor')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="group_id">Select Group:</label>
            <select name="group_id" id="group_id" class="form-control">
                <option selected disabled value="">Select a group</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="supervisor_id">Select Supervisor:</label>
            <select name="supervisor_id" id="supervisor_id" class="form-control">
                <option selected disabled value="">Select a supervisor</option>
                @foreach($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->username }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Supervisor</button>
    </form>
    <!-- list view -->
    <section for="assigned-supervisor">
        <h2>List of Groups Assigned to Supervisors</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Supervisor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignedGroups as $assignedGroup)
                <tr>
                    <td>{{ $assignedGroup->name }}</td>
                    <td>{{ $assignedGroup->supervisor->username }}</td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $assignedGroup->id }}">Edit </button>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $assignedGroup->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $assignedGroup->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $assignedGroup->id }}Label">Edit Assigned Supervisor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/store-supervisor') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="group_id" value="{{ $assignedGroup->id }}">
                                            <div class="form-group">
                                                <label for="supervisor_id">Select Supervisor:</label>
                                                <select name="supervisor_id" id="supervisor_id" class="form-control">
                                                    <option selected disabled value="">Select a supervisor</option>
                                                    @foreach($supervisors as $supervisor)
                                                        <option value="{{ $supervisor->id }}" {{ $assignedGroup->assigned_supervisor_id == $supervisor->id ? 'selected' : '' }}>
                                                            {{ $supervisor->username }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Supervisor</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('/delete-supervisor') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="group_id" value="{{ $assignedGroup->id }}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm(Are you sure you want to delete this {{ $assignedGroup->id }}?)">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </section>
</div>
@stop
