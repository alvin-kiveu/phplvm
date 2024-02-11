@extends('layout')
@section('content')
<div class="row">

    <div class="col-xl-4 col-md-6">
        <div class="card prod-p-card">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-c-purple">Users</h6>
                        <h3 class="m-b-0 f-w-700">
                            <?php
                            //GET NUMBER OF USERS
                            $users = DB::table('users')->count();
                            echo $users;
                            ?>
                        </h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user text-c-purple f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card prod-p-card">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-c-yellow">Employees</h6>
                        <h3 class="m-b-0 f-w-700">0</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users text-c-yellow f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card prod-p-card">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-c-green">Pending Leave Requests
                        </h6>
                        <h3 class="m-b-0 f-w-700">0</h3>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tags text-c-green f-18"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
