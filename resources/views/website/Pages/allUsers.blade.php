@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="users-table">
        <div class="card card-rounded">
            <div class="card-body">
                <h3 class="card-title">All Users Information</h3>
                <div class="table-responsive mt-4">
                <table class="table table-striped">
                    <thead class="bg-thead text-light">
                    <tr>
                        <th>
                        #
                        </th>
                        <th>
                        Username
                        </th>
                        <th>
                        Usermail
                        </th>
                        <th>
                        Role
                        </th>
                        <th>
                        Status
                        </th>
                        <th>
                        Created On
                        </th>
                        <th>
                        Delete
                        </th>
                        <th>
                        Edit
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($allUsers as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td class="py-1">{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td class="text-uppercase">{{$user->role}}</td>
                            <td>
                            @if($user->is_approved == 0)
                                <div class="badge badge-warning rounded-pill"><a class="text-decoration-none text-dark" href="{{ url('/approve-user/'.$user->id) }}">Pending</a></div>
                            @elseif($user->is_approved == 1)
                                <div class="badge badge-success rounded-pill">Approved</div>
                            @endif
                               
                            </td>
                            <td>{{$user->created_at->format('m-d-Y')}}</td>
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
                                            <p class="text-lead">Do you really want to delete <span class="text-dark fw-bold">{{$user->username}}</span> ? This process cannot be undone.</p>
                                            <div class="py-3 mt-2 d-flex flex-row justify-content-center gap-2">
                                            <a class="btn btn-info btn-md text-white" href="{{url('/delete/'.$user->id)}}">Yes</a>
                                            <button type="button" class="btn btn-danger btn-md text-white" data-dismiss="modal">NO</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ------ -->
                            </td>
                            <td>
                            <a href="{{url('/edit-user/'.$user->id)}}" type="button" class="btn btn-sm btn-info btn-rounded btn-icon"><i class="mdi mdi mdi-pencil text-light"></i></a>
                            </td>
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