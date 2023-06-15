@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <div id="users-table">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3 class="fw-bold text-capitalize">All Groups Information</h3>
                </div>
                @if ($allgroups->isEmpty())
                <div class="border border-info  py-5 text-center my-5">
                    <h5 class="text-info"> <b>Message:</b> You have no groups yet. Untill assign any groups for you, you can not see groups list.</h5>
                </div>
                @else
                <div class="table-responsive mt-4">
                    <table class="table table-striped">
                        <thead class="bg-thead text-light">
                        <tr>
                            <th>
                            #
                            </th>
                            <th>
                            groupname
                            </th>
                            <th>
                            members
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
                            <th>
                            Add Member
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($allgroups as $user)
                            <tr>

                                <td>{{$user->id}}</td>
                                <td class="py-1">{{$user->name}}</td>
                                <td>{{$user->totalMembers}} Members</td>
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
                                                <p class="text-lead">Do you really want to delete <span class="text-dark fw-bold">{{$user->name}}</span> ? This process cannot be undone.</p>
                                                <div class="py-3 mt-2 d-flex flex-row justify-content-center gap-2">
                                                <a class="btn btn-info btn-md text-white" href="{{url('/deleteGroup/'.$user->id)}}">Yes</a>
                                                <button type="button" class="btn btn-danger btn-md text-white" data-dismiss="modal">NO</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ------ -->
                                </td>
                                <td>
                                <a type="button" class="btn btn-sm btn-info btn-rounded btn-icon d-flex align-items-center justify-content-center " href="{{url('/editgroups/'.$user->id)}}"><i class="mdi mdi mdi-pencil text-light"></i></a>
                                </td>
                                <td>
                                <a href="{{url('/create-member/'.$user->id)}}" type="button" class="btn btn-sm btn-info btn-rounded btn-icon d-flex align-items-center justify-content-center w-50"><i class="mdi mdi mdi-plus text-light"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop