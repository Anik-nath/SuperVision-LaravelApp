@extends('website.layout.main')
@section('main-content')
<!-- content-wrapper start -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="fw-bold text-capitalize">Welcome Back {{ Session::get('userrole') }}</h3>
            <h6 class="fw-normal mb-0">All systems are running smoothly! </h6>
        </div>
        <!-- <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                <a class="dropdown-item" href="#">January - March</a>
                <a class="dropdown-item" href="#">March - June</a>
                <a class="dropdown-item" href="#">June - August</a>
                <a class="dropdown-item" href="#">August - November</a>
            </div>
            </div>
            </div>
        </div> -->
    </div>
    <section class="py-4 mt-3">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-people mt-auto">
                  <img loading="lazy" src="{{asset('website/images/people.svg')}}" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup >c</sup></h2>
                      </div>
                      <div class=" ms-2 ">
                        <h4 class="location font-weight-normal">Bangladesh</h4>
                        <h6 class="font-weight-normal">Chittagong</h6>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row gy-4 ">
                    <div class="col-md-6">
                        <div class="card bg-gradient-primary text-light rounded-3">
                            <div class="card-body text-center">
                            <h3 class="py-2">Total Supervisor</h3>
                            <h4>{{$countSupervisor}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-gradient-success text-light rounded-3">
                            <div class="card-body text-center">
                            <h3 class="py-2">Total Students</h3>
                            <h4>{{$countStudent}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-gradient-info text-light rounded-3">
                            <div class="card-body text-center">
                            <h3 class="py-2">Total Task</h3>
                            <h4>5</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-gradient-warning text-light rounded-3">
                            <div class="card-body text-center">
                            <h3 class="py-2">Total Group</h3>
                            <h4>{{$countGroup}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(Session::get('userrole') == 'student' || Session::get('userrole') == 'supervisor')
    <section class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="jjj">
                    <div class="jjj">
                        <h3 class="card-title">Group Task Report</h3>
                        <div class="table-responsive mt-4">
                            <table class="table table-striped">
                                <thead class="bg-thead text-light">
                                    <th>Group Id</th>
                                    <th>Group Name</th>
                                    <th>Task Progress</th>
                                    <th>Status</th>
                                    <th>Update On</th>
                                </thead>
                                <tbody>
                                    @foreach($allUpdate as $update)
                                    <tr>
                                        <?php 
                                            $taskDone = json_decode($update->completed_task);
                                            $done =  count($taskDone);
                                            $total = $countTask;
                                            $to= ($done/$total)*100;
                                        ?>
                                        <td>
                                            <h6> {{$update->group_id}}</h6>
                                        </td>
                                        <td><h6>{{$update->group_name}}</h6></td>
                                        <td>
                                       
                                        <div class="progress  bg-secondary">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:<?php echo $to; ?>%"><?php echo round($to); ?>%</div>
                                        </div>
                                        </td>
                                        <td>
                                      
                                        <?php
                                            if($to == 100){
                                                echo '<div class="badge badge-success rounded-pill">Completed</div>';
                                            }
                                            elseif($to < 100 && $to >= 70){
                                                echo '<div class="badge badge-primary rounded-pill">Almost Done</div>';
                                            }
                                            elseif($to < 70 && $to >= 50){
                                                echo '<div class="badge badge-warning rounded-pill">In Progress</div>';
                                            }
                                            else {
                                                echo '<div class="badge badge-info rounded-pill">starting</div>';
                                            }
                                            ?>
                                      
                                            
                                        </td>
                                        <td>
                                            {{$update->created_at->format('d-m-Y')}}
                                            <!-- <button class="btn btn-outline-info">view</button> -->
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
    </section>
    @endif
    
</div>
<!-- content-wrapper ends -->
@stop