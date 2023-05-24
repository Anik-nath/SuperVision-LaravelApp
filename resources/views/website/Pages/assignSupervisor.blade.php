@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <h2>Assign Supervisor to Group</h2>

    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="group_id">Select Group:</label>
            <select name="group_id" id="group_id" class="form-control">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="supervisor_id">Select Supervisor:</label>
            <select name="supervisor_id" id="supervisor_id" class="form-control">
                @foreach($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}">{{ $supervisor->username }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Supervisor</button>
    </form>
</div>
@stop
