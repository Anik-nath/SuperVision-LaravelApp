@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="task-table">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3 class="fw-bold text-capitalize">Manage Task in list</h3>
                </div>
                <div class="table-responsive mt-4">
                <table class="table table-striped">
                    <thead class="bg-thead text-light">
                    <tr>
                        <th>
                        Date
                        </th>
                        <th>
                        TaskName
                        </th>
                        <th>
                        Description
                        </th>
                        
                        <th>
                        Visiting date
                        </th>
                        <th>
                        Delete
                        </th>
                        <th>
                        Edit
                        </th>
                        <!-- <th>
                        addMember
                        </th> -->
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($allTask as $user)
                        <tr>
                            <td>{{$user->visiting_date}}</td>
                            <td class="py-1">{{$user->task_name}}</td>
                            <td>{{$user->description}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <button data-toggle="modal" data-target="#myModal{{ $user->id }}" type="button" class="btn btn-sm btn-danger btn-rounded btn-icon"><i class="mdi mdi-delete-forever text-light"></i></button>
                                <!-- The Modal -->
                                <div class="modal" id="myModal{{ $user->id }}">
                                    <div class="modal-dialog px-5">
                                        <div class="modal-content">
                                        <!-- Modal body -->
                                        <div class="modal-body text-center">
                                            <div class="py-4"><i class="border border-danger fs-2 fw-bolder p-4 rounded-circle mdi icon-md mdi mdi mdi-account-remove text-danger"></i></div>
                                           <div class="py-3"><h2 class="display-3">Are You Sure?</h2></div>
                                            <p class="text-lead">Do you really want to delete <span class="text-dark fw-bold">{{$user->task_name}}</span> ? This process cannot be undone.</p>
                                            <div class="py-3 mt-2 d-flex flex-row justify-content-center gap-2">
                                            <a class="btn btn-info btn-md text-white" href="{{url('/deleteTask/'.$user->id)}}">Yes</a>
                                            <button type="button" class="btn btn-danger btn-md text-white" data-dismiss="modal">NO</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ------ -->
                            </td>
                            <td>
                            <a type="button" class="btn btn-sm btn-info btn-rounded btn-icon" href="{{url('/editTask/'.$user->id)}}"><i class="mdi mdi mdi-pencil text-light"></i></a>
                            </td>
                            <!-- <td>
                            <a href="{{url('/create-member/'.$user->id)}}" type="button" class="btn btn-sm btn-info btn-rounded btn-icon"><i class="mdi mdi mdi-plus text-light"></i></a>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
